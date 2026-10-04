# Aggiungere un libro

Il database `biblioteca`, `includes/connessione.php` e `includes/flash.php` sono già pronti. Scrivi `index.php`, che mostra un modulo per inserire un libro nella tabella `libri`: titolo (2-120 caratteri), autore (menu a tendina costruito leggendo la tabella `autori`), anno (intero tra 1000 e 2100), ISBN (13 cifre, unico), genere (2-30 caratteri) e numero di copie (da 1 a 50). Il controllo avviene sul server, con un errore accanto a ogni campo sbagliato e i valori già inseriti che restano nel modulo. Se tutto è corretto, inserisci il libro (con `copie_disponibili` uguale a `copie_totali`), prepara un messaggio flash con l'id assegnato e torna alla pagina con un redirect. Sotto il modulo mostra gli ultimi cinque libri inseriti.

## Obiettivo

Inserire una riga con una query preparata, validando l'input sul server e gestendo i dati duplicati.

## Anteprima

```
+----------------------------------------+
| Aggiungi un libro                      |
| [ Libro «Dune» aggiunto con id 15. ]   |
| Titolo [ D                           ] |
| Il titolo deve avere da 2 a 120 car.   |
| Autore [ -- scegli --              v ] |
| ISBN   [ 9788800000011               ] |
| Esiste già un libro con questo ISBN.   |
| [ Aggiungi il libro ]                  |
| Ultimi libri inseriti                  |
| # Titolo   Anno  Genere  Copie         |
+----------------------------------------+
```

## Struttura

| File | Ruolo |
|------|-------|
| `index.php` | modulo, validazione, INSERT e redirect (da scrivere) |
| `../includes/connessione.php`, `../includes/flash.php`, `../includes/stile.css` | forniti |

## Descrizione

### INSERT con query preparata

```php
$stmt = $pdo->prepare(
    "INSERT INTO libri (titolo, id_autore, anno, isbn, genere, copie_totali, copie_disponibili)
     VALUES (:titolo, :id_autore, :anno, :isbn, :genere, :copie_totali, :copie_disponibili)"
);
$stmt->execute(["titolo" => $titolo, "id_autore" => $autore, /* ... */]);
```

Ogni dato del modulo passa da un segnaposto nominato, mai dalla concatenazione ([Scheda dello studente](33-scheda-studente.md) spiega il perché). Un titolo come `L'isola` con l'apostrofo funziona senza nessuna precauzione: il database lo riceve come dato.

### Validazione con errori per campo

Come in [Validazione iscrizione](19-validazione-iscrizione.md), un array associativo `$errori` raccoglie un messaggio per campo, e l'INSERT parte solo se `count($errori) === 0`. Alcune particolarità:

- l'autore ricevuto deve essere **uno di quelli esistenti**: gli id letti dalla tabella `autori` finiscono in `$idAutori` e si controlla con `in_array($autore, $idAutori, true)`. Chi modifica a mano il menu a tendina non può inserire un id inventato;
- anno e copie si verificano con `filter_var(..., FILTER_VALIDATE_INT, ["options" => ["min_range" => ..., "max_range" => ...]])`;
- l'ISBN deve rispettare `preg_match('/^[0-9]{13}$/', $isbn)`.

### Mantenere i valori nel modulo

Una piccola funzione evita ripetizioni e ricorda `htmlspecialchars`:

```php
function vecchio(string $campo): string
{
    return htmlspecialchars($_POST[$campo] ?? "");
}
```

Nel campo si scrive `value="<?= vecchio("titolo") ?>"`. Per il menu a tendina si aggiunge `selected` all'opzione che coincide con il valore inviato.

### Dati duplicati

Nella tabella `libri` la colonna `isbn` è `UNIQUE`: il database rifiuta due libri con lo stesso codice. Questo esercizio controlla **prima** con `SELECT COUNT(*) ... WHERE isbn = :isbn`, così l'errore compare accanto al campo giusto. Il controllo però non è a prova di corsa: se due utenti inviano lo stesso ISBN nello stesso istante, entrambi passano il `SELECT` e il secondo `INSERT` fallisce. Il vincolo `UNIQUE` del database è la difesa vera, e in quel caso PDO lancia una `PDOException` il cui codice MySQL sta in `$e->errorInfo[1]` (**1062** = *duplicate entry*):

```php
try {
    $stmt->execute($dati);
} catch (PDOException $e) {
    if ((int) $e->errorInfo[1] === 1062) {
        $errori["isbn"] = "Esiste già un libro con questo ISBN.";
    } else {
        throw $e;
    }
}
```

### Flash, `lastInsertId()` e redirect

Dopo l'INSERT `$pdo->lastInsertId()` restituisce l'id `AUTO_INCREMENT` appena assegnato. Lo si mette nel messaggio con `flash("ok", ...)` e poi `header("Location: index.php"); exit;`: è lo schema **POST-Redirect-GET** ([Messaggi flash](30-messaggi-flash.md)), che evita di reinserire il libro se l'utente ricarica la pagina.

## Suggerimenti

- Ricordati `session_start()` prima di usare `flash()`, e `mostraFlash()` dove vuoi il messaggio.
- Prova a inviare lo stesso ISBN di un libro esistente (per esempio `9788800000011`) e controlla l'errore.
- Il valore `(int) $anno` va convertito prima dell'INSERT: dal modulo arriva sempre una stringa.
- Dopo l'inserimento ricarica la pagina con F5: non deve comparire un secondo libro.
- Estensione: aggiungi la gestione del codice 1062 mostrata sopra, così anche la corsa tra due invii simultanei dà un errore comprensibile.

## Soluzione

=== "index.php"
    ```php
    --8<-- "PHP/Nuovo-libro/index.php"
    ```

!!! warning "Esegui in locale"
    Richiede un **server web con PHP e MySQL/MariaDB**: importa prima il database `biblioteca` (file `PHP/db/biblioteca.sql`, vedi [Database di esempio](index.md#database-di-esempio)), poi copia la cartella `PHP/` nella cartella pubblica del tuo server e apri `Nuovo-libro/index.php` dal browser (vedi [Eseguire PHP in locale](index.md#eseguire-php-in-locale)). Non si può eseguire su OneCompiler.
