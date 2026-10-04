# Pannello amministratore

Nel database `negozio` la tabella `utenti` ha la colonna `ruolo` (`cliente` oppure `admin`; account di prova: `admin` / `admin123`). I file `login.php` e `logout.php` sono già pronti, come `includes/auth_db.php` con `richiediRuolo()`. Scrivi tre pagine riservate agli amministratori, con lo stesso menu. `index.php` mostra cinque numeri: prodotti, prodotti con giacenza inferiore a 10, ordini, incasso totale (somma di `ordini.totale`) e utenti. `ordini.php` elenca tutti gli ordini con data, nome del cliente, numero di pezzi (somma di `righe_ordine.quantita`) e totale. `prodotti.php` elenca i prodotti (nome, categoria, prezzo, giacenza), ordinati per giacenza crescente, e permette di modificare **prezzo e giacenza di ogni riga** con un pulsante «Salva»; il prezzo può essere scritto con la virgola, deve essere maggiore di zero, e la giacenza deve essere un intero maggiore o uguale a zero. Dopo il salvataggio mostra un messaggio flash. Un cliente che apre una di queste pagine, o che invia a mano una richiesta `POST` a `prodotti.php`, riceve «Accesso negato» con codice 403.

## Obiettivo

Riservare a un ruolo un gruppo di pagine, controllando l'accesso in ogni pagina e in ogni tipo di richiesta.

## Anteprima

```
index.php (admin)                prodotti.php                       index.php (mario)
+---------------------------+    +------------------------------+   +-----------------------+
| Riepilogo Prodotti Ordini |    | [ Prodotto aggiornato. ]     |   | Accesso negato        |
| Pannello amministratore   |    | Prodotto  Cat.  Prezzo  Giac.|   | [ Questa pagina è     |
| Prodotti 12   In esaur. 3 |    | Mouse    Per.  [19.90] [ 4 ] |   |  riservata agli utenti|
| Ordini 5      Incasso     |    |                    [Salva]   |   |  con ruolo «admin». ] |
| Utenti 3      € 540,30    |    | Tastiera Per.  [49.90] [25 ] |   +-----------------------+
+---------------------------+    +------------------------------+   (stato HTTP 403)
```

## Struttura

| File | Ruolo |
|------|-------|
| `login.php`, `logout.php` | accesso e uscita (forniti) |
| `index.php` | statistiche generali (da scrivere) |
| `ordini.php` | elenco di tutti gli ordini (da scrivere) |
| `prodotti.php` | modifica di prezzo e giacenza (da scrivere) |

## Descrizione

### Il controllo in ogni pagina

Ogni pagina del pannello inizia con la stessa riga, subito dopo gli `require`:

```php
richiediRuolo("admin");
$utente = utenteCorrente();
```

Se l'utente non è autenticato `richiediRuolo()` lo manda al login; se lo è ma ha un altro ruolo risponde con la pagina «Accesso negato» e il codice **403**, poi termina con `exit`. Poiché l'`exit` ferma lo script, nulla di quello che segue (nemmeno una query) viene eseguito per un cliente. Una pagina in cui ci si dimentica la riga è una pagina aperta a tutti.

### Anche le richieste POST

Il controllo sta **prima** di qualunque altra logica, quindi vale anche per l'elaborazione del modulo. Questo è importante: chi non è admin non vedrà mai il modulo, ma può costruire a mano la richiesta (con `curl`, con gli strumenti del browser o con un modulo HTML scritto da lui) e inviarla a `prodotti.php`. Se il controllo fosse solo nella parte che stampa la pagina, quel `POST` modificherebbe i prezzi.

```php
richiediRuolo("admin");              // 1. prima il controllo, per ogni metodo

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // 2. poi la validazione e l'UPDATE
}
```

!!! warning "Nascondere un link non è protezione"
    Un cliente non vede la voce «Prodotti» del menu admin, ma l'indirizzo `prodotti.php` lo può digitare. La sicurezza sta nel controllo lato server, non nell'interfaccia.

### Statistiche con sottoquery scalari

Una sola query può restituire tutti i numeri del riepilogo, con una sottoquery scalare (che restituisce un solo valore) per ogni colonna:

```php
$stat = $pdo->query(
    "SELECT (SELECT COUNT(*) FROM prodotti) AS prodotti,
            (SELECT COUNT(*) FROM prodotti WHERE giacenza < 10) AS in_esaurimento,
            (SELECT COUNT(*) FROM ordini) AS ordini,
            (SELECT COALESCE(SUM(totale), 0) FROM ordini) AS incasso,
            (SELECT COUNT(*) FROM utenti) AS utenti"
)->fetch();
```

Anche in `ordini.php` una sottoquery correlata calcola i pezzi di ogni ordine. Non servono parametri, quindi basta `query()`.

### Un modulo per riga: l'attributo `form`

In una tabella i campi di una riga stanno in celle diverse, ma un `<form>` non può contenere `<tr>` né `<td>` e non può avvolgere una riga intera. La soluzione è l'attributo **`form`**: un `<input>` può trovarsi ovunque nella pagina e appartenere a un modulo identificato dal suo `id`.

```php
<td><input type="text" name="prezzo" form="riga<?= $p["id"] ?>" value="..."></td>
<td><input type="number" name="giacenza" form="riga<?= $p["id"] ?>" value="..."></td>
<td>
    <form method="post" action="prodotti.php" id="riga<?= $p["id"] ?>" class="inline">
        <input type="hidden" name="id" value="<?= $p["id"] ?>">
        <button type="submit">Salva</button>
    </form>
</td>
```

Premendo «Salva» il browser invia `id`, `prezzo` e `giacenza` della sola riga corrispondente, anche se i campi sono in altre celle.

### Validare il prezzo

Un italiano scrive `19,90`, ma PHP e MySQL vogliono il punto: si sostituisce la virgola prima di controllare. Poi si verifica che il valore sia numerico e positivo, e la giacenza con `filter_var` e `min_range`.

```php
$prezzo   = str_replace(",", ".", trim($_POST["prezzo"] ?? ""));
$giacenza = filter_var($_POST["giacenza"] ?? "", FILTER_VALIDATE_INT, ["options" => ["min_range" => 0]]);

if (!is_numeric($prezzo) || (float) $prezzo <= 0 || $giacenza === false) {
    flash("ko", "Prezzo (maggiore di zero) e giacenza (intero ≥ 0) non validi.");
}
```

Si usa `=== false` perché `0` è una giacenza valida. L'`UPDATE` è una query preparata, e il messaggio flash viene mostrato dopo il redirect a `prodotti.php` (pattern POST-Redirect-GET, come nei [messaggi flash](30-messaggi-flash.md)).

## Suggerimenti

- Ricorda `require` di `flash.php` in `prodotti.php` e `mostraFlash()` nella pagina.
- Il valore iniziale del prezzo nel campo si stampa con `number_format((float) $p["prezzo"], 2, ".", "")`, così non contiene il separatore delle migliaia.
- Verifica il 403: accedi come `mario` e apri `index.php`, `ordini.php` e `prodotti.php`.
- Prova anche con `curl -X POST -d "id=1&prezzo=0.01&giacenza=5" ...` (con il cookie di sessione di `mario`): il prezzo non deve cambiare.
- Estensione: aggiungi in `prodotti.php` un filtro «solo in esaurimento» con un parametro `?esaurimento=1`.

## Soluzione

=== "index.php"
    ```php
    --8<-- "PHP/Pannello-admin/index.php"
    ```
=== "ordini.php"
    ```php
    --8<-- "PHP/Pannello-admin/ordini.php"
    ```
=== "prodotti.php"
    ```php
    --8<-- "PHP/Pannello-admin/prodotti.php"
    ```
=== "login.php"
    ```php
    --8<-- "PHP/Pannello-admin/login.php"
    ```
=== "logout.php"
    ```php
    --8<-- "PHP/Pannello-admin/logout.php"
    ```

!!! warning "Esegui in locale"
    Richiede un **server web con PHP e MySQL/MariaDB**: importa prima il database `negozio` (file `PHP/db/negozio.sql`, vedi [Database di esempio](index.md#database-di-esempio)), poi copia la cartella `PHP/` nella cartella pubblica del tuo server e apri `Pannello-admin/index.php` dal browser (vedi [Eseguire PHP in locale](index.md#eseguire-php-in-locale)). Non si può eseguire su OneCompiler.
