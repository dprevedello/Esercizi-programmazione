# Modificare un libro

Il database `biblioteca`, `includes/connessione.php` e `includes/flash.php` sono già pronti, così come `index.php`, che elenca i libri della tabella `libri` (titolo, anno, genere) con un link «Modifica» verso `modifica.php?id=N` e mostra i messaggi flash. Scrivi `modifica.php`: legge il libro con quell'`id`, e se non esiste risponde con 404. Altrimenti mostra un modulo già compilato con titolo, anno e genere, li valida sul server come nell'esercizio precedente (con errori per campo e valori conservati) e salva con un `UPDATE`. Dopo il salvataggio torna all'elenco con un messaggio flash che dice se qualcosa è cambiato.

## Obiettivo

Precompilare un modulo con i dati del database e aggiornare una riga con `UPDATE`, controllando quante righe sono state toccate.

## Anteprima

```
index.php                          modifica.php?id=3
+---------------------------+      +-----------------------------+
| Catalogo della biblioteca |      | Modifica il libro n. 3      |
| [ Libro «Il nome della    |      | Titolo [ Il nome della rosa]|
|   rosa» aggiornato. ]     |      | Anno   [ 1980             ] |
| Titolo     Anno  Genere   |      | Genere [ Giallo storico   ] |
| 1984       1949  Distopia |      | [ Salva le modifiche ]      |
| Il nome... 1980  Giallo.. |      | Annulla                     |
|            Modifica       |      +-----------------------------+
+---------------------------+
```

## Struttura

| File | Ruolo |
|------|-------|
| `index.php` | elenco dei libri con i link di modifica (fornito) |
| `modifica.php` | lettura, modulo, validazione e UPDATE (da scrivere) |
| `../includes/connessione.php`, `../includes/flash.php`, `../includes/stile.css` | forniti |

## Descrizione

### Leggere il libro e rispondere 404

`modifica.php` riceve l'id da `$_GET["id"]`, lo converte con `(int)` e lo usa in una query preparata, esattamente come nella [Scheda dello studente](33-scheda-studente.md). Se `fetch()` restituisce `false` il libro non esiste: si imposta `http_response_code(404)`, si stampa un messaggio e si termina con `exit`, così il resto della pagina (il modulo!) non viene mai eseguito.

### Precompilare il modulo

Il modulo ha due sorgenti di valori: alla prima visita quelli del database, dopo un invio sbagliato quelli appena scritti dall'utente. Si risolve partendo da un unico array:

```php
$valori = $libro;                       // dati letti dal database

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $valori["titolo"] = trim($_POST["titolo"] ?? "");
    // ...validazione su $valori
}
```

I campi mostrano sempre `htmlspecialchars($valori["titolo"])`. L'anno arriva dal database come numero: PHP lo vuole stringa per `htmlspecialchars`, quindi `(string) $valori["anno"]`.

### L'id viaggia nell'indirizzo

L'`action` del modulo è `modifica.php?id=<?= $id ?>`: l'invio è un POST, ma l'id resta nell'indirizzo, quindi anche dopo l'invio `$_GET["id"]` è disponibile e la lettura iniziale funziona in entrambi i casi.

### UPDATE e rowCount()

```php
$stmt = $pdo->prepare("UPDATE libri SET titolo = :titolo, anno = :anno, genere = :genere WHERE id = :id");
$stmt->execute([...]);

if ($stmt->rowCount() > 0) {
    flash("ok", "Libro «" . $valori["titolo"] . "» aggiornato.");
} else {
    flash("info", "Nessuna modifica: i dati erano già quelli.");
}
```

`rowCount()` restituisce il numero di righe interessate dall'istruzione. C'è una sfumatura importante: con MySQL e `PDO` conta di norma le righe **realmente cambiate**, non quelle trovate dalla `WHERE`. Quindi `0` può significare due cose diverse: l'utente ha salvato senza cambiare niente, oppure l'`id` non esiste (più). Qui il secondo caso è già escluso dal 404 iniziale (salvo che un altro utente cancelli il libro nel frattempo), per cui `0` viene letto come «nessuna modifica».

!!! warning "Non dimenticare la WHERE"
    Un `UPDATE` senza `WHERE id = :id` modifica **tutte** le righe della tabella. Controlla sempre di averla scritta, e di averla provata su una riga sola.

## Suggerimenti

- Apri `modifica.php?id=9999` e `modifica.php?id=abc`: entrambi devono dare un 404 pulito.
- Salva un modulo senza cambiare nulla e verifica che compaia il messaggio «Nessuna modifica».
- Il redirect dopo l'UPDATE è il solito POST-Redirect-GET; ricordati `session_start()` per i messaggi flash.
- Il campo `isbn` e le copie non si modificano qui: fanno parte delle estensioni.
- Estensione: aggiungi all'`UPDATE` la possibilità di cambiare l'autore con un menu a tendina, riusando la query degli autori dell'esercizio [Aggiungere un libro](34-nuovo-libro.md).

## Soluzione

=== "index.php"
    ```php
    --8<-- "PHP/Modifica-libro/index.php"
    ```
=== "modifica.php"
    ```php
    --8<-- "PHP/Modifica-libro/modifica.php"
    ```

!!! warning "Esegui in locale"
    Richiede un **server web con PHP e MySQL/MariaDB**: importa prima il database `biblioteca` (file `PHP/db/biblioteca.sql`, vedi [Database di esempio](index.md#database-di-esempio)), poi copia la cartella `PHP/` nella cartella pubblica del tuo server e apri `Modifica-libro/index.php` dal browser (vedi [Eseguire PHP in locale](index.md#eseguire-php-in-locale)). Non si può eseguire su OneCompiler.
