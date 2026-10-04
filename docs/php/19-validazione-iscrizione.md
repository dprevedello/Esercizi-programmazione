# Validazione di un'iscrizione

Il modulo `index.html` (già pronto) invia a `iscrizione.php` cinque campi: `nome`, `email`, `eta`, `corso` (`python`, `web`, `php` o vuoto) e la casella `privacy`. Scrivi `iscrizione.php` in modo che controlli i dati **sul server**: nome di almeno 2 caratteri, email valida, età intera tra 14 e 19, corso scelto tra quelli ammessi, privacy accettata. Se ci sono errori mostrali tutti in un elenco con un link per tornare al modulo; altrimenti mostra un riepilogo dell'iscrizione.

## Obiettivo

Validare i dati ricevuti da un modulo raccogliendo tutti gli errori in un array.

## Anteprima

```
Dati sbagliati                          Dati corretti
+-------------------------------------+ +-----------------------------------+
| Iscrizione non riuscita             | | Iscrizione completata             |
| [ • Il nome deve avere almeno 2 ..  | | +-------------------------------+ |
|   • L'età deve essere un numero ..  | | | Anna Verdi, età 16, è iscritto| |
|   • Devi accettare il trattamento ] | | | al corso «PHP e database».    | |
| ← Torna al modulo                   | | +-------------------------------+ |
+-------------------------------------+ +-----------------------------------+
```

## Descrizione

### Perché controllare sul server

I controlli del browser (come l'attributo `required`) migliorano l'esperienza dell'utente, ma si possono **aggirare**: basta disattivare JavaScript o inviare i dati con un altro programma. Per questo i dati vanno **sempre** controllati anche dal server. Nel modulo è presente l'attributo `novalidate` proprio per escludere i controlli del browser e permetterti di provare quelli di PHP.

### Raccogliere gli errori

Si crea un array vuoto `$errori = [];` e, per ogni controllo fallito, si aggiunge un messaggio con `$errori[] = "..."`. Alla fine, `count($errori) === 0` significa che tutto è corretto. Mostrare **tutti** gli errori insieme è più gentile che fermarsi al primo.

### `filter_var`

La funzione **`filter_var($valore, FILTRO)`** controlla (e converte) un valore secondo un filtro predefinito. Restituisce il valore se è valido, `false` altrimenti.

| Filtro | Controlla |
|--------|-----------|
| `FILTER_VALIDATE_EMAIL` | indirizzo email |
| `FILTER_VALIDATE_INT` | numero intero (con opzioni `min_range` e `max_range`) |
| `FILTER_VALIDATE_URL` | indirizzo web |

```php
filter_var($eta, FILTER_VALIDATE_INT, ["options" => ["min_range" => 14, "max_range" => 19]]);
```

!!! warning "Attenzione a `0`"
    Se il valore valido fosse `0`, scrivere `if (!filter_var(...))` lo scambierebbe per un errore. Confronta il risultato con `=== false`.

### Caselle e menu

Una casella **non selezionata non viene inviata**: per sapere se è spuntata si usa `isset($_POST["privacy"])`. Per il menu a tendina il valore ricevuto va confrontato con quelli ammessi (`array_key_exists`): chi costruisce a mano una richiesta può inviare qualsiasi stringa.

## Suggerimenti

- Togli gli spazi iniziali e finali con `trim()` prima di controllare la lunghezza.
- Stampa il nome dell'utente solo dopo `htmlspecialchars()`; per l'età che hai già convertito basta `(int)`.
- Prova il modulo vuoto: devono comparire cinque messaggi.
- Estensione: aggiungi un campo `sito` facoltativo che, se compilato, deve essere un URL valido.

## Soluzione

=== "iscrizione.php"
    ```php
    --8<-- "PHP/Validazione-iscrizione/iscrizione.php"
    ```
=== "index.html"
    ```html
    --8<-- "PHP/Validazione-iscrizione/index.html"
    ```

!!! warning "Esegui in locale"
    Richiede un **server web con PHP**: OneCompiler esegue solo script da riga di comando e non può inviare moduli. Copia la cartella `PHP/` nella cartella pubblica del tuo server e apri `index.html` dal browser (vedi [Eseguire PHP in locale](index.md#eseguire-php-in-locale)).
