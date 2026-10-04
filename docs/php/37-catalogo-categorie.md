# Catalogo per categorie

Nel database `negozio` le tabelle `categorie` (`id`, `nome`) e `prodotti` (`id`, `nome`, `descrizione`, `prezzo`, `giacenza`, `id_categoria`) sono legate da una chiave esterna. Scrivi `index.php`, che si connette con `connetti("negozio")` (file `includes/connessione.php`, fornito) e mostra il catalogo diviso per categoria: un titolo per ogni categoria seguito dalle schede dei suoi prodotti (nome, descrizione, prezzo in euro con due decimali e virgola, e l'avviso «Esaurito» se la giacenza è 0 oppure «Ultimi N pezzi» se è sotto 10). In cima alla pagina metti un indice con il nome di ogni categoria, il numero di prodotti che contiene e un link che porta alla relativa sezione della pagina.

## Obiettivo

Trasformare il risultato di una JOIN in una struttura annidata (categoria => prodotti) e usarla per costruire la pagina.

## Anteprima

```
+--------------------------------------------------------------+
| Catalogo del negozio                                         |
| Accessori (4)  Componenti PC (4)  Periferiche (4)  Reti (4)  |
|                                                              |
| Accessori                                                    |
| +----------------+ +----------------+                        |
| | Cuffie con ... | | Hub USB-C ...  |                        |
| | Chiuse, jack   | | HDMI, USB 3.0  |                        |
| | € 24,90        | | € 44,50        |                        |
| | Disponibile    | | Ultimi 4 pezzi |                        |
| +----------------+ +----------------+                        |
| Componenti PC                                                |
| ...                                                          |
+--------------------------------------------------------------+
```

## Struttura

| File | Ruolo |
|------|-------|
| `includes/connessione.php`, `includes/stile.css` | forniti |
| `index.php` | legge i dati, li raggruppa e li mostra (da scrivere) |

## Descrizione

### Una JOIN restituisce righe piatte

La query unisce `prodotti` e `categorie` e ordina per categoria e nome. Il risultato è una lista **piatta**: ogni riga ripete il nome della categoria.

```php
$righe = $pdo->query(
    "SELECT c.nome AS categoria, p.id, p.nome, p.descrizione, p.prezzo, p.giacenza
     FROM prodotti p
     JOIN categorie c ON c.id = p.id_categoria
     ORDER BY c.nome, p.nome"
)->fetchAll();
```

Per mostrare un titolo per categoria conviene raggruppare le righe in PHP, in un array associativo in cui la chiave è la categoria e il valore è l'elenco dei suoi prodotti (vedi [Array di array](08-array-di-array.md)):

```php
$perCategoria = [];
foreach ($righe as $r) {
    $perCategoria[$r["categoria"]][] = $r;
}
```

L'istruzione `$perCategoria[$r["categoria"]][] = $r;` crea da sola l'elemento della categoria se non esiste ancora e vi aggiunge la riga. Poi bastano due `foreach` annidati: uno sulle categorie, uno sui loro prodotti. Il raggruppamento funziona perché la query ha `ORDER BY c.nome`, ma l'array è corretto anche con altri ordinamenti.

### Contare anche le categorie vuote

Il conteggio dei prodotti per categoria è una seconda query, con `LEFT JOIN` e `GROUP BY`: il `LEFT JOIN` mantiene anche le categorie senza prodotti, per le quali `COUNT(p.id)` vale 0. Contare in PHP con `count($perCategoria[...])` non basterebbe, perché una categoria vuota non compare nella prima query e quindi non esisterebbe nell'array.

!!! tip "Quando usare una query e quando PHP"
    Se hai già tutte le righe, raggruppare in PHP è comodo; se ti servono dati che le righe non contengono (come le categorie vuote), serve una query in più.

### I DECIMAL sono testo

Con PDO le colonne `DECIMAL` arrivano come **stringhe** (`"24.90"`), per non perdere precisione. Prima di formattare con `number_format()` converti in numero:

```php
echo number_format((float) $p["prezzo"], 2, ",", ".");   // 24,90
```

### Ancore nella pagina

Il link dell'indice punta all'`id` del titolo. Il nome della categoria può contenere spazi (`Componenti PC`), quindi si passa da `urlencode()`, sia nel `href` sia nell'`id`; il testo visibile resta protetto con `htmlspecialchars()` (vedi [Sicurezza dell'output](21-sicurezza-output.md)):

```php
<a href="#<?= urlencode($c["nome"]) ?>"><?= htmlspecialchars($c["nome"]) ?></a>
<h2 id="<?= urlencode($categoria) ?>">...</h2>
```

## Suggerimenti

- Prova la prima query direttamente in phpMyAdmin prima di scriverla in PHP.
- Usa `fetchAll()` per avere subito un array di righe su cui fare il `foreach`.
- Se mostri un campo del database nella pagina, passalo sempre da `htmlspecialchars()`.
- Controlla le categorie: aggiungi a mano nel database una categoria senza prodotti e verifica che compaia nell'indice con `(0)`.
- Estensione: nascondi nella pagina i prodotti con giacenza 0 se è presente il parametro `?solo_disponibili=1`.

## Soluzione

=== "index.php"
    ```php
    --8<-- "PHP/Catalogo-categorie/index.php"
    ```

!!! warning "Esegui in locale"
    Richiede un **server web con PHP e MySQL/MariaDB**: importa prima il database `negozio` (file `PHP/db/negozio.sql`, vedi [Database di esempio](index.md#database-di-esempio)), poi copia la cartella `PHP/` nella cartella pubblica del tuo server e apri `Catalogo-categorie/index.php` dal browser (vedi [Eseguire PHP in locale](index.md#eseguire-php-in-locale)). Non si può eseguire su OneCompiler.
