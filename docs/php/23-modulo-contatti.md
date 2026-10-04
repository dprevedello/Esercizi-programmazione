# Modulo di contatto con redirect

Il modulo `index.html` (già pronto) invia a `invia.php` i campi `nome`, `email` e `messaggio`. Scrivi tre pagine: `invia.php` controlla i dati (nome non vuoto, email valida, messaggio da 5 a 500 caratteri) e, se tutto è corretto, **salva** il messaggio in coda al file `dati/messaggi.txt` e porta l'utente a `grazie.php` con un redirect; `grazie.php` mostra un ringraziamento; `leggi.php` mostra in una tabella tutti i messaggi salvati, dal più recente.

## Obiettivo

Salvare i dati su file e applicare il pattern **POST-Redirect-GET** per evitare l'invio doppio del modulo.

## Anteprima

```
invia.php (con errori)         grazie.php                leggi.php
+-----------------------+      +----------------------+  +----------------------------+
| Messaggio non inviato |      | Grazie!              |  | Messaggi ricevuti (2)      |
| [ • Email non valida. |      | [ Il tuo messaggio è |  | Data    Nome  Email  Messaggio|
|   • Il messaggio ...] |      |   stato salvato. ]   |  | 04/10.. Anna  a@x..  Ciao  |
| ← Torna al modulo     |      | Scrivi un altro ...  |  | 03/10.. Luca  l@x..  Salve |
+-----------------------+      +----------------------+  +----------------------------+
```

## Struttura

| File | Ruolo |
|------|-------|
| `index.html` | il modulo (fornito) |
| `invia.php` | controlla, salva su file, fa il redirect |
| `grazie.php` | pagina di conferma |
| `leggi.php` | elenco dei messaggi salvati |
| `dati/` | cartella dove PHP crea `messaggi.txt` |

## Descrizione

### Scrivere su un file

**`file_put_contents($file, $testo, FILE_APPEND | LOCK_EX)`** scrive `$testo` nel file; il flag **`FILE_APPEND`** lo aggiunge **in coda** invece di sostituire il contenuto, e **`LOCK_EX`** impedisce che due richieste contemporanee si sovrappongano. Ogni messaggio occupa una riga: i campi sono uniti con `implode(";", ...)` e a capo e punti e virgola scritti dall'utente vanno sostituiti (`str_replace`), altrimenti rovinerebbero la struttura del file.

### Leggere un file

**`file($percorso, FILE_IGNORE_NEW_LINES)`** restituisce un array con una riga del file per elemento; con `explode(";", $riga, 4)` si spezza ogni riga nei suoi campi. Si controlla prima con `file_exists()` che il file esista, perché al primo avvio non c'è.

### Il pattern POST-Redirect-GET

Se dopo un invio POST la pagina mostra direttamente il risultato, **ricaricando** la pagina (F5) il browser **rimanda** lo stesso modulo: il messaggio verrebbe salvato due volte. La soluzione è rispondere con un **redirect**: la pagina non mostra nulla ma ordina al browser di richiedere un'altra pagina con GET.

```php
header("Location: grazie.php");
exit;
```

L'intestazione **`header()`** va chiamata **prima di stampare qualsiasi cosa** (nemmeno uno spazio o un a capo prima di `<?php`), e **`exit`** subito dopo ferma lo script: senza, il codice continuerebbe a eseguirsi.

## Suggerimenti

- La cartella `dati/` è già presente nell'esercizio; il codice la crea comunque con `mkdir` se manca.
- Il server web deve avere il permesso di scrivere nella cartella: se il file non compare, controlla i permessi.
- In `leggi.php` usa `array_reverse()` per mostrare prima i messaggi più recenti e passa **tutto** da `htmlspecialchars()`: i messaggi li hanno scritti altri utenti.
- Prova a ricaricare `grazie.php` con F5: il numero di messaggi in `leggi.php` non deve cambiare.
- Estensione: impedisci di inviare due messaggi uguali di seguito.

## Soluzione

=== "invia.php"
    ```php
    --8<-- "PHP/Modulo-contatti/invia.php"
    ```
=== "grazie.php"
    ```php
    --8<-- "PHP/Modulo-contatti/grazie.php"
    ```
=== "leggi.php"
    ```php
    --8<-- "PHP/Modulo-contatti/leggi.php"
    ```
=== "index.html"
    ```html
    --8<-- "PHP/Modulo-contatti/index.html"
    ```

!!! warning "Esegui in locale"
    Richiede un **server web con PHP**: OneCompiler esegue solo script da riga di comando e non può inviare moduli. Copia la cartella `PHP/` nella cartella pubblica del tuo server e apri `index.html` dal browser (vedi [Eseguire PHP in locale](index.md#eseguire-php-in-locale)).
