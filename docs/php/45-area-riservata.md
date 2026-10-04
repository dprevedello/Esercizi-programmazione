# Area riservata del cliente

Nel database `negozio` ogni ordine (tabella `ordini`: `id`, `id_utente`, `data_ordine`, `totale`) appartiene a un utente e le sue righe stanno in `righe_ordine` (`id_ordine`, `id_prodotto`, `quantita`, `prezzo_unitario`), collegate a `prodotti`. I file `login.php` e `logout.php` sono già pronti (sono quelli scritti nell'[esercizio 44](44-login-db.md), con in più il ritorno alla pagina richiesta), così come `includes/auth_db.php`. Scrivi tre pagine protette con `richiediLogin()`, con lo stesso menu: `index.php` dà il benvenuto e mostra quanti ordini ha fatto l'utente e quanto ha speso in totale; `ordini.php` elenca **solo i suoi** ordini (numero, data, totale) e, aprendo `ordini.php?id=N`, mostra il dettaglio dell'ordine N (prodotto, quantità, prezzo unitario, totale); `profilo.php` mostra nome utente, email, ruolo e data di iscrizione. Se `N` non è un ordine dell'utente, la pagina risponde con codice 404 e «Ordine non trovato.».

## Obiettivo

Mostrare a ogni cliente soltanto i propri dati, usando l'utente della sessione per filtrare le query.

## Anteprima

```
index.php                     ordini.php?id=3                  ordini.php?id=1 (di un altro)
+------------------------+    +---------------------------+    +---------------------------+
| Home Ordini Profilo    |    | Home Ordini Profilo       |    | Home Ordini Profilo       |
| Bentornato, mario      |    | Ordine n. 3 del 12/05/2026|    | [ Ordine non trovato. ]   |
| Hai effettuato 2       |    | Tastiera   1 x € 49,90    |    | N.  Data        Totale    |
| ordini per un totale   |    | Totale          € 49,90   |    | 3   12/05/2026  € 49,90   |
| di € 120,40.           |    | N.  Data        Totale    |    +---------------------------+
+------------------------+    +---------------------------+    (stato HTTP 404)
```

## Struttura

| File | Ruolo |
|------|-------|
| `login.php`, `logout.php` | accesso e uscita (forniti) |
| `index.php` | benvenuto e riepilogo degli acquisti (da scrivere) |
| `ordini.php` | elenco degli ordini dell'utente e dettaglio (da scrivere) |
| `profilo.php` | dati dell'account (da scrivere) |

## Descrizione

### Di chi sono i dati? Lo dice la sessione

La regola da applicare in ogni query è questa: **l'identità dell'utente si ricava sempre dalla sessione, mai da un valore inviato dal browser**. `GET` e `POST` li controlla chi sta usando il sito, la sessione la controlla il server.

```php
require __DIR__ . "/../includes/auth_db.php";
require __DIR__ . "/../includes/connessione.php";

richiediLogin();
$utente = utenteCorrente();     // id, username, ruolo letti dalla sessione

$stmt = connetti("negozio")->prepare("SELECT id, data_ordine, totale FROM ordini WHERE id_utente = :utente ORDER BY data_ordine DESC");
$stmt->execute(["utente" => $utente["id"]]);
```

Lo stesso vale per il riepilogo di `index.php` (`COUNT(*)` e `SUM(totale)` con `WHERE id_utente = :id`, usando `COALESCE` perché chi non ha ordini ottiene `NULL`) e per `profilo.php`, dove si legge la riga di `utenti` con `WHERE id = :id` e l'id della sessione. Non esiste un `profilo.php?id=5`: la pagina non ha bisogno di sapere chi vuoi vedere, lo sa già.

### Autorizzazione a livello di riga

`richiediLogin()` risponde alla domanda «sei autenticato?», ma non basta: un cliente autenticato non deve poter vedere gli ordini di un altro cliente. Il controllo va fatto **riga per riga**: ogni volta che si legge un dato, si verifica che appartenga all'utente.

Il dettaglio di un ordine arriva da un parametro, `?id=3`, che l'utente può cambiare a mano in `?id=4`. Se la query fosse solo `WHERE id = :id`, chiunque potrebbe leggere gli ordini degli altri provando i numeri uno dopo l'altro: è una vulnerabilità nota come **IDOR** (*Insecure Direct Object Reference*). Basta inserire l'utente della sessione nella condizione:

```php
$stmt = $pdo->prepare("SELECT id, data_ordine, totale FROM ordini WHERE id = :id AND id_utente = :utente");
$stmt->execute(["id" => $idRichiesto, "utente" => $utente["id"]]);
$dettaglio = $stmt->fetch();         // false se l'ordine non esiste O è di un altro
```

Il parametro `id` si legge con `(int) ($_GET["id"] ?? 0)`, e le righe dell'ordine si caricano solo se `$dettaglio` non è `false`.

### 404 e non 403

Per un ordine altrui la pagina risponde `http_response_code(404)` con «Ordine non trovato.», la stessa risposta che si dà a un ordine inesistente. Un 403 rivelerebbe che quell'ordine esiste ma è di qualcun altro; con il 404 chi prova i numeri non impara nulla.

!!! warning "Un id nascosto non è protezione"
    Anche se nell'HTML non compare nessun link verso gli ordini altrui, la richiesta si può scrivere a mano. La protezione sta nella query, non nei link.

### Tornare alla pagina richiesta dopo il login

Se un utente anonimo apre `ordini.php`, `richiediLogin()` salva il nome del file in `$_SESSION["dopo_login"]` e lo manda a `login.php`. Leggi il `login.php` fornito: dopo `accedi()` (che rigenera l'id di sessione ma conserva i dati) legge il valore, lo **cancella** con `unset` e lo usa per il redirect solo se rispetta l'espressione regolare `/^[a-z]+\.php$/` e non è `login.php`; altrimenti va a `index.php`. Come visto nelle [pagine protette](29-pagine-protette.md), non si fa mai un redirect verso un indirizzo scelto dall'utente (*open redirect*).

## Suggerimenti

- Prepara una sola variabile `$utente` all'inizio di ogni pagina e usa solo `$utente["id"]` nelle query.
- Per i prezzi usa `number_format((float) $valore, 2, ",", ".")` e per le date `date("d/m/Y", strtotime($data))`.
- Prova ad accedere come `mario` e a scrivere `ordini.php?id=` con il numero di un ordine di un altro cliente (guarda la tabella `ordini` nel database): devi ottenere «Ordine non trovato.».
- Con gli strumenti del browser (scheda Rete) verifica che lo stato HTTP sia 404.
- Estensione: nel dettaglio mostra il totale ricalcolato come somma di `quantita * prezzo_unitario` e confrontalo con `ordini.totale`.

## Soluzione

=== "index.php"
    ```php
    --8<-- "PHP/Area-riservata/index.php"
    ```
=== "ordini.php"
    ```php
    --8<-- "PHP/Area-riservata/ordini.php"
    ```
=== "profilo.php"
    ```php
    --8<-- "PHP/Area-riservata/profilo.php"
    ```
=== "login.php"
    ```php
    --8<-- "PHP/Area-riservata/login.php"
    ```
=== "logout.php"
    ```php
    --8<-- "PHP/Area-riservata/logout.php"
    ```

!!! warning "Esegui in locale"
    Richiede un **server web con PHP e MySQL/MariaDB**: importa prima il database `negozio` (file `PHP/db/negozio.sql`, vedi [Database di esempio](index.md#database-di-esempio)), poi copia la cartella `PHP/` nella cartella pubblica del tuo server e apri `Area-riservata/index.php` dal browser (vedi [Eseguire PHP in locale](index.md#eseguire-php-in-locale)). Non si può eseguire su OneCompiler.
