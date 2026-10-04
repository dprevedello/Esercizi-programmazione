# API in formato JSON

Il database `negozio` è già pronto. I file `json.php` (funzioni comuni) e `index.html` (un elenco di link per provare gli endpoint) sono forniti. Scrivi gli endpoint, pagine PHP che invece di HTML restituiscono dati in formato **JSON**: `prodotti.php` (tutti i prodotti, con i filtri facoltativi `categoria`, `q` per il nome e `max` per il prezzo massimo), `prodotto.php?id=...` (un solo prodotto), `categorie.php` (le categorie con il numero di prodotti) e `statistiche.php` (numero di prodotti, prezzo minimo, massimo e medio, pezzi in magazzino). Ogni risposta ha l'intestazione `Content-Type: application/json`; i numeri sono numeri e non stringhe; `id` mancante o non valido e `max` non numerico danno 400, un prodotto inesistente 404, un metodo diverso da GET 405 con l'intestazione `Allow`. Gli errori sono anch'essi JSON, nella forma `{"errore": "..."}`. Non serve JavaScript: si prova aprendo gli indirizzi nel browser.

## Obiettivo

Esporre i dati del database come API in sola lettura, con tipi corretti, codici di stato HTTP appropriati ed errori in JSON.

## Anteprima

```
prodotti.php?max=30                       prodotto.php?id=999
+---------------------------------+       +--------------------------------------+
| {                               |       | HTTP 404                             |
|   "totale": 2,                  |       | {                                    |
|   "prodotti": [                 |       |   "errore": "Prodotto non trovato."  |
|     { "id": 7,                  |       | }                                    |
|       "nome": "Mouse USB",      |       +--------------------------------------+
|       "prezzo": 12.9,           |
|       "giacenza": 40,           |
|       "categoria": "Periferiche"|
|     }, ...                      |
+---------------------------------+
```

## Struttura

| File | Ruolo |
|------|-------|
| `json.php`, `index.html` | forniti: `rispondi()`, `errore()`, `soloGet()`, `formattaProdotto()` e l'elenco dei link |
| `prodotti.php` | elenco con filtri (da scrivere) |
| `prodotto.php` | un singolo prodotto (da scrivere) |
| `categorie.php` | categorie con il conteggio dei prodotti (da scrivere) |
| `statistiche.php` | dati aggregati (da scrivere) |

## Descrizione

### Una pagina che non è HTML

Finora ogni pagina PHP produceva HTML. Un **endpoint** produce dati: il client (un altro programma, o una pagina JavaScript) li legge e li interpreta. **JSON** è il formato più diffuso: oggetti `{"chiave": valore}`, array `[...]`, stringhe, numeri, `true`, `false`, `null`. Prima di stampare bisogna dichiarare il tipo, altrimenti il browser lo tratta come HTML:

```php
header("Content-Type: application/json; charset=utf-8");
echo json_encode($dati);
```

### `json_encode` e le sue opzioni

`json_encode` trasforma un array PHP in JSON (un array associativo diventa un oggetto, uno indicizzato un array). Le opzioni si combinano con `|`:

- `JSON_UNESCAPED_UNICODE`: scrive le lettere accentate così come sono, non come `è`;
- `JSON_UNESCAPED_SLASHES`: non protegge le barre con `\/`;
- `JSON_PRESERVE_ZERO_FRACTION`: scrive `12.0` e non `12`;
- `JSON_PRETTY_PRINT`: indenta il risultato, comodo per leggerlo nel browser.

### Una funzione unica per rispondere

Tutti gli endpoint terminano con la stessa operazione, quindi `json.php` la raccoglie in `rispondi($dati, $codice)`: imposta il codice di stato, l'intestazione, stampa il JSON ed esce. Ha tipo di ritorno `never` (PHP 8.1): significa che la funzione non restituisce mai il controllo, perché termina lo script con `exit`. `errore($messaggio, $codice)` costruisce `["errore" => $messaggio]` e chiama `rispondi`.

### I tipi: PDO restituisce stringhe

Con MySQL, PDO restituisce le colonne `DECIMAL` (come `prezzo`) come **stringhe**, e a volte anche gli interi. Se le passi a `json_encode` così come sono, nel JSON compare `"prezzo": "12.90"` tra virgolette. Converti esplicitamente con i cast, in una funzione unica:

```php
function formattaProdotto(array $r): array
{
    return [
        "id"       => (int) $r["id"],
        "nome"     => $r["nome"],
        "prezzo"   => (float) $r["prezzo"],
        "giacenza" => (int) $r["giacenza"],
        "categoria" => $r["categoria"],
    ];
}
```

### Codici di stato ed errori

Il codice dice al client com'è andata, prima ancora di leggere il corpo: **200** tutto bene, **400** richiesta sbagliata (parametro mancante o non valido), **404** risorsa inesistente, **405** metodo non consentito. Il 405 deve accompagnarsi all'intestazione `Allow: GET`, che elenca i metodi accettati. Ricorda di controllare `$_GET["id"]` con `filter_var($_GET["id"] ?? null, FILTER_VALIDATE_INT)`: restituisce `false` se non è un intero e `null` se manca.

### Parametri facoltativi

In `prodotti.php` costruisci la clausola `WHERE` solo per i filtri presenti, accumulando condizioni e parametri in due array e unendo le condizioni con `implode(" AND ", ...)`; i valori passano sempre da query preparata, come nel [catalogo per categoria](37-catalogo-categorie.md).

!!! tip "Lo stesso endpoint, un altro client"
    Un endpoint come `prodotti.php` potrà essere letto da `fetch()` in JavaScript per riempire una pagina senza ricaricarla. Per questo conviene che restituisca JSON puro e sempre nello stesso formato: trovi come si usa `fetch()` nella sezione HTML-CSS-JavaScript di questo sito.

## Suggerimenti

- Apri ogni indirizzo nel browser e controlla il codice di stato negli strumenti per sviluppatori (scheda Rete).
- Niente `echo`, spazi o righe vuote prima di `<?php` negli endpoint: rovinerebbero l'intestazione `Content-Type`. Per lo stesso motivo non chiudere i file con `?>`.
- Per `max` verifica con `is_numeric`; per `q` aggiungi `addcslashes($q, "%_\\")` prima dei `%` del `LIKE`.
- In `statistiche.php` le funzioni di aggregazione (`MIN`, `MAX`, `AVG`, `SUM`) producono una sola riga; arrotonda la media con `round(..., 2)`.
- Estensione: aggiungi `prodotti.php?ordina=prezzo` ammettendo solo i valori di una whitelist.

## Soluzione

=== "json.php"
    ```php
    --8<-- "PHP/Api-json/json.php"
    ```
=== "prodotti.php"
    ```php
    --8<-- "PHP/Api-json/prodotti.php"
    ```
=== "prodotto.php"
    ```php
    --8<-- "PHP/Api-json/prodotto.php"
    ```
=== "categorie.php"
    ```php
    --8<-- "PHP/Api-json/categorie.php"
    ```
=== "statistiche.php"
    ```php
    --8<-- "PHP/Api-json/statistiche.php"
    ```
=== "index.html"
    ```html
    --8<-- "PHP/Api-json/index.html"
    ```

!!! warning "Esegui in locale"
    Richiede un **server web con PHP e MySQL/MariaDB**: importa prima il database `negozio` (file `PHP/db/negozio.sql`, vedi [Database di esempio](index.md#database-di-esempio)), poi copia la cartella `PHP/` nella cartella pubblica del tuo server e apri `Api-json/index.html` dal browser (vedi [Eseguire PHP in locale](index.md#eseguire-php-in-locale)). Non si può eseguire su OneCompiler.
