# Prestiti e vincoli del database

Nel database `biblioteca` le tabelle `libri` (`titolo`, `copie_totali`, `copie_disponibili`), `soci` (`nome`, `cognome`, `email`, con `email` UNIQUE) e `prestiti` (`id_libro`, `id_socio`, `data_prestito`, `data_restituzione`, NULL se il libro è ancora fuori) definiscono le regole con vincoli: `UNIQUE`, `FOREIGN KEY` e `CHECK (copie_disponibili >= 0)`. `errori.php` (funzione `messaggioErrore()`) è fornito. Scrivi due pagine con un menu per passare dall'una all'altra. `index.php`: modulo per registrare un prestito (scelta di libro e socio), che inserisce il prestito e scala una copia disponibile, e l'elenco dei prestiti in corso con il bottone «Restituisci», che imposta la data di restituzione e rimette la copia. `soci.php`: modulo per aggiungere un socio e l'elenco con il bottone «Elimina». Non controllare tu in anticipo duplicati, copie esaurite o soci con prestiti: lascia che sia il database a rifiutare l'operazione e mostra all'utente un messaggio comprensibile (messaggi flash).

## Obiettivo

Delegare le regole di integrità al database e tradurre i suoi errori in messaggi chiari per l'utente.

## Anteprima

```
index.php                                  soci.php
+------------------------------------+     +--------------------------------+
| Prestiti | Soci                    |     | Prestiti | Soci                |
| [ Prestito non registrato.         |     | [ Esiste già un record con     |
|   Operazione non consentita ... ]  |     |   questo valore ... ]          |
| Libro  [ 1984 (0/4 copie)    v ]   |     | Nome [ ] Cognome [ ] Email [ ] |
| Socio  [ Bianchi Giulia      v ]   |     | [ Registra il socio ]          |
| [ Registra il prestito ]           |     | Bianchi Giulia  g@...  [Elimina]|
| Prestiti in corso (7)              |     +--------------------------------+
| Libro   Socio    Dal   [Restituisci]|
+------------------------------------+
```

## Struttura

| File | Ruolo |
|------|-------|
| `errori.php` | funzione `messaggioErrore()` che traduce le eccezioni (fornito) |
| `includes/connessione.php`, `includes/flash.php`, `includes/stile.css` | forniti |
| `index.php` | prestiti e restituzioni (da scrivere) |
| `soci.php` | elenco, inserimento ed eliminazione dei soci (da scrivere) |

## Descrizione

### Le regole stanno nel database

Controllare in PHP «esiste già questa email?» prima dell'`INSERT` sembra ragionevole, ma non è sicuro: tra il controllo e l'inserimento un altro utente può inserire la stessa email. Il vincolo `UNIQUE` del database invece vale sempre e per tutte le applicazioni. L'approccio più robusto è quindi **provare l'operazione e gestire l'errore**: se viola un vincolo, PDO lancia una `PDOException` (grazie a `ERRMODE_EXCEPTION`).

### Tradurre l'errore

L'oggetto eccezione contiene in `$e->errorInfo[1]` il **codice numerico di MySQL/MariaDB**. Quelli che incontri qui:

| Codice | Significato | Esempio |
|--------|-------------|---------|
| 1062 | valore duplicato (`UNIQUE`) | email di un socio già presente |
| 1451 | riga ancora referenziata | eliminare un socio che ha dei prestiti |
| 1452 | riferimento inesistente | prestito con un `id_libro` che non esiste |
| 3819 (MySQL) / 4025 (MariaDB) | vincolo `CHECK` violato | `copie_disponibili` scenderebbe sotto 0 |

La funzione in `errori.php` li converte in frasi per l'utente con `match`:

```php
return match (true) {
    $codice === 1062                      => "Esiste già un record con questo valore ...",
    $codice === 1451                      => "Impossibile eliminare: ci sono dati collegati ...",
    in_array($codice, [3819, 4025], true) => "Operazione non consentita: ...",
    default                               => "Errore del database: riprova più tardi.",
};
```

!!! warning "Il messaggio tecnico non va all'utente"
    Il testo di `$e->getMessage()` rivela nomi di tabelle e colonne: serve a te, non a chi usa la pagina. La funzione lo scrive nel registro del server con `error_log()` e mostra solo il messaggio generico.

### Prestito in transazione

Il prestito richiede due scritture: `INSERT` in `prestiti` e `UPDATE libri SET copie_disponibili = copie_disponibili - 1`. Se non restano copie, il `CHECK` fa fallire l'`UPDATE`: il `catch` esegue `rollBack()`, così anche l'`INSERT` appena fatto sparisce e non resta un prestito senza copia (vedi [Ordine con più prodotti](41-ordine-multiplo.md)). Nel `catch` il messaggio è `"Prestito non registrato. " . messaggioErrore($e)`.

### Restituzione

Per restituire un libro leggi il prestito con `SELECT id_libro FROM prestiti WHERE id = :id AND data_restituzione IS NULL FOR UPDATE`: la riga viene bloccata, quindi due clic simultanei su «Restituisci» non possono incrementare le copie due volte (il secondo non troverà più il prestito aperto). Se la `SELECT` non restituisce nulla annulla con `rollBack()` e informa l'utente; altrimenti aggiorna `data_restituzione` con `CURDATE()` e incrementa `copie_disponibili`.

### Un file incluso da più pagine

`messaggioErrore()` serve sia a `index.php` sia a `soci.php`: per questo sta in `errori.php`, incluso con `require __DIR__ . "/errori.php"` (vedi [Sito con include](13-sito-con-include.md)). Il menu `<nav class="menu">` collega le due pagine; la voce della pagina corrente ha la classe `attiva`.

## Suggerimenti

- Racchiudi le operazioni in un `try`/`catch (PDOException $e)`; se una transazione è aperta, chiama `rollBack()` nel `catch`.
- Per `soci.php` verifica con `rowCount()` se la `DELETE` ha eliminato davvero una riga.
- Prova i tre errori: aggiungi un socio con un'email già presente; elimina «Bianchi» (ha prestiti); presta l'ultima copia di un libro due volte.
- Dopo ogni POST fai un redirect, così ricaricare la pagina non ripete l'operazione.
- Estensione: aggiungi alla tabella `prestiti` un vincolo che impedisca due prestiti aperti dello stesso libro allo stesso socio e traduci il nuovo errore.

## Soluzione

=== "index.php"
    ```php
    --8<-- "PHP/Prestito-vincoli/index.php"
    ```
=== "soci.php"
    ```php
    --8<-- "PHP/Prestito-vincoli/soci.php"
    ```
=== "errori.php"
    ```php
    --8<-- "PHP/Prestito-vincoli/errori.php"
    ```

!!! warning "Esegui in locale"
    Richiede un **server web con PHP e MySQL/MariaDB**: importa prima il database `biblioteca` (file `PHP/db/biblioteca.sql`, vedi [Database di esempio](index.md#database-di-esempio)), poi copia la cartella `PHP/` nella cartella pubblica del tuo server e apri `Prestito-vincoli/index.php` dal browser (vedi [Eseguire PHP in locale](index.md#eseguire-php-in-locale)). Non si può eseguire su OneCompiler.
