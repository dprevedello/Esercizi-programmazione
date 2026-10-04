# Connessione al database

Il database `scuola` è già importato sul tuo server e `index.php` è lo scheletro della pagina. Scrivi lo script PHP che si collega con PDO senza usare `connessione.php`, indicando a mano server, nome del database, utente e password. Se la connessione riesce, la pagina mostra la versione del server (`SELECT VERSION()`) e il numero di righe della tabella `studenti`. Se fallisce, deve rispondere con codice HTTP 500 e un messaggio generico, senza far vedere all'utente i dettagli tecnici.

## Obiettivo

Aprire una connessione PDO a MySQL/MariaDB e gestire l'errore di connessione con `try/catch`.

## Anteprima

```
Connessione riuscita                    Connessione fallita
+----------------------------------+    +------------------------------------+
| Connessione al database          |    | Connessione al database            |
| [ Connessione riuscita al        |    | [ Impossibile collegarsi al        |
|   database scuola. ]             |    |   database. ]                      |
| Versione del server: 10.11.6     |    | Dettaglio tecnico (solo sviluppo): |
| Studenti nella tabella studenti: |    | SQLSTATE[HY000] [1045] Access ...  |
| 15                               |    +------------------------------------+
+----------------------------------+
```

## Struttura

| File | Ruolo |
|------|-------|
| `index.php` | connessione, due query di prova e pagina HTML (da scrivere) |
| `../includes/stile.css` | foglio di stile condiviso (fornito) |

## Descrizione

### DSN, utente e password

`new PDO($dsn, $utente, $password)` apre la connessione. Il **DSN** (*Data Source Name*) è una stringa che dice a PDO a quale database collegarsi:

```php
$dsn = "mysql:host=$host;dbname=$database;charset=utf8mb4";
```

Contiene il tipo di database (`mysql`, che vale anche per MariaDB), il server, il nome del database e la codifica dei caratteri. Con `utf8mb4` lettere accentate ed emoji arrivano a PHP senza essere storpiate. Utente e password sono quelli del server: su XAMPP di solito `root` e password vuota, ma sul server della scuola saranno diversi.

### Perché ERRMODE_EXCEPTION

Di base PDO, davanti a un errore SQL, può restare in silenzio: la query fallisce e lo script va avanti come se nulla fosse. Con

```php
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
```

ogni errore diventa una **`PDOException`**, che puoi intercettare con `try/catch` oppure lasciare propagare. Un errore che non passa inosservato è un errore che si corregge.

!!! note "Il costruttore lancia già eccezioni"
    Dalla versione 8 di PHP anche `new PDO(...)` lancia una `PDOException` se la connessione fallisce, a prescindere dall'attributo. Per questo il `try` racchiude anche la creazione dell'oggetto.

### try/catch ed errore 500

```php
try {
    $pdo = new PDO($dsn, $utente, $password);
    $versione = $pdo->query("SELECT VERSION()")->fetchColumn();
} catch (PDOException $e) {
    http_response_code(500);
    $errore = $e->getMessage();
}
```

`fetchColumn()` legge la prima colonna della prima riga: perfetto per risultati di un solo valore come `VERSION()` o `COUNT(*)`. Se il database non risponde non è colpa di chi ha richiesto la pagina, e il codice giusto è **500** (*Internal Server Error*), non 200.

!!! warning "Il messaggio tecnico non va mostrato agli utenti"
    `$e->getMessage()` può contenere nome del server, nome dell'utente del database e altri dettagli utili a chi vuole attaccare il sito. In produzione mostra solo «Impossibile collegarsi al database» e scrivi il dettaglio in un file di log (`error_log()`). Questo esercizio stampa il dettaglio, marcato «solo durante lo sviluppo», perché ti serve per capire gli errori; ricordati di toglierlo nei progetti veri. Anche in quel caso il messaggio passa da `htmlspecialchars` (vedi [Sicurezza dell'output](21-sicurezza-output.md)).

## Suggerimenti

- Per provare l'errore cambia la password o il nome del database e ricarica la pagina.
- Controlla il codice di risposta con gli strumenti di sviluppo del browser (scheda Rete): deve essere 500 in caso di errore e 200 altrimenti.
- Il codice di connessione sta nel `try`, ma l'HTML sta fuori: prepara le variabili prima e usale poi nella pagina.
- Se `$errore` è `null` la connessione è riuscita: è la condizione che decide quale blocco HTML stampare.
- Estensione: sposta host, utente e password in costanti, poi guarda come `includes/connessione.php` fa lo stesso nella funzione `connetti()` e usala negli esercizi successivi.

## Soluzione

=== "index.php"
    ```php
    --8<-- "PHP/Connessione-db/index.php"
    ```

!!! warning "Esegui in locale"
    Richiede un **server web con PHP e MySQL/Mariascuola**: importa prima il database `scuola` (file `PHP/db/scuola.sql`, vedi [Database di esempio](index.md#database-di-esempio)), poi copia la cartella `PHP/` nella cartella pubblica del tuo server e apri `Connessione-db/index.php` dal browser (vedi [Eseguire PHP in locale](index.md#eseguire-php-in-locale)). Non si può eseguire su OneCompiler.
