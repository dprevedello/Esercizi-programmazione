---
icon: material/language-php
---

# :material-language-php: PHP

**PHP** (Hypertext Preprocessor) è un linguaggio di scripting lato server,
nato per il web e ancora oggi tra i più usati: WordPress, Wikipedia e moltissimi
altri siti girano su PHP.

Questa sezione è pensata per la **classe quinta**: si parte da un ripasso rapido
della sintassi (si dà per scontato che tu sappia già programmare in C, Java o Python)
e si dedica il grosso del lavoro al **web**: form, `$_GET` e `$_POST`, cookie, sessioni
e soprattutto **database MySQL** con l'estensione PDO. Non si usa la programmazione
a oggetti, se non per gli oggetti già forniti da PHP (come `PDO`).

---

## Cosa imparerai

- Sintassi base: variabili, tipi, operatori, funzioni, array, stringhe
- Pagine dinamiche: PHP dentro l'HTML, `include`, parametri nell'indirizzo
- Form HTML e gestione con `$_GET` / `$_POST`, validazione lato server, `htmlspecialchars()`
- Cookie e sessioni (`$_COOKIE`, `$_SESSION`), login e ruoli, messaggi flash
- Database con **PDO**: query preparate, `INSERT`/`UPDATE`/`DELETE`, JOIN, ricerca, paginazione, transazioni
- Registrazione e accesso degli utenti con `password_hash()` e `password_verify()`
- Caricamento sicuro di file e immagini, risposte in formato JSON
- Un gestionale completo e un progetto personale

!!! tip "SQL in parallelo"
    Gli esercizi con database danno per scontata la conoscenza di SQL, che
    si studia in parallelo nella sezione [Database](../database/index.md).
    Nelle prime 30 schede non serve alcun database.

---

## Esercizi disponibili

### 1. Fondamenti del linguaggio :material-console-line:

Gli esempi di questa sezione si eseguono direttamente su OneCompiler (l'input è già precaricato). Le sezioni successive richiedono un server web.

| # | Esercizio | Argomento | Difficoltà |
|---|-----------|-----------|------------|
| 01 | [Primo script PHP](01-primo-script.md) | `echo`, variabili, tipi | :material-circle-outline: Base |
| 02 | [Operatori e input](02-operatori-e-input.md) | Operatori, `fgets(STDIN)`, conversioni | :material-circle-outline: Base |
| 03 | [Condizioni](03-condizioni.md) | `if`, `elseif`, `switch`, `match` | :material-circle-outline: Base |
| 04 | [Cicli](04-cicli.md) | `for`, `while`, `foreach` | :material-circle-outline: Base |
| 05 | [Funzioni](05-funzioni.md) | Funzioni, parametri tipizzati, scope | :material-circle-outline: Base |
| 06 | [Array indicizzati](06-array-indicizzati.md) | Array indicizzati e funzioni di array | :material-circle-outline: Base |
| 07 | [Array associativi](07-array-associativi.md) | Array associativi, `foreach` con chiave | :material-circle-outline: Base |
| 08 | [Array di array](08-array-di-array.md) | Array di array, ordinamento | :material-circle-slice-4: Intermedio |
| 09 | [Stringhe](09-stringhe.md) | Funzioni su stringhe | :material-circle-outline: Base |
| 10 | [Date e numeri](10-date-e-numeri.md) | `date()`, `number_format()`, `round()` | :material-circle-outline: Base |

### 2. Pagine dinamiche :material-web:

| # | Esercizio | Argomento | Difficoltà |
|---|-----------|-----------|------------|
| 11 | [Pagina dinamica](11-pagina-dinamica.md) | PHP dentro l'HTML | :material-circle-outline: Base |
| 12 | [Listino della pizzeria](12-listino-pizzeria.md) | Cicli e array nell'HTML | :material-circle-outline: Base |
| 13 | [Sito con include](13-sito-con-include.md) | `include` / `require`, layout comune | :material-circle-outline: Base |
| 14 | [Pagine con parametri](14-pagine-con-parametri.md) | Parametri nell'indirizzo, `$_GET` | :material-circle-slice-4: Intermedio |
| 15 | [Catalogo di film](15-catalogo-film.md) | Elenco e pagina di dettaglio | :material-circle-slice-4: Intermedio |

### 3. Form e dati dell'utente :material-form-textbox:

| # | Esercizio | Argomento | Difficoltà |
|---|-----------|-----------|------------|
| 16 | [Biglietto di auguri](16-biglietto-auguri.md) | Form HTML e `$_POST` | :material-circle-outline: Base |
| 17 | [GET e POST a confronto](17-get-e-post.md) | `$_GET` e `$_POST` a confronto | :material-circle-outline: Base |
| 18 | [Calcolatrice web](18-calcolatrice-web.md) | Calcolo con dati del form | :material-circle-outline: Base |
| 19 | [Validazione di un'iscrizione](19-validazione-iscrizione.md) | Validazione lato server | :material-circle-slice-4: Intermedio |
| 20 | [Prenotazione di un tavolo](20-prenotazione-tavolo.md) | Validazione, select, checkbox | :material-circle-slice-4: Intermedio |
| 21 | [Sicurezza dell'output](21-sicurezza-output.md) | `htmlspecialchars()`, XSS | :material-circle-slice-4: Intermedio |
| 22 | [Ordina la tua pizza](22-ordina-pizza.md) | Radio, checkbox multipli, totali | :material-circle-slice-4: Intermedio |
| 23 | [Modulo di contatto con redirect](23-modulo-contatti.md) | Scrittura e lettura di file, PRG | :material-circle-slice-4: Intermedio |
| 24 | [Iscrizione a un evento](24-iscrizione-evento.md) | File CSV, redirect, controlli | :material-circle-slice-4: Intermedio |

### 4. Cookie e sessioni :material-cookie:

| # | Esercizio | Argomento | Difficoltà |
|---|-----------|-----------|------------|
| 25 | [Cookie: tema e nome](25-cookie-tema.md) | `setcookie()`, `$_COOKIE` | :material-circle-slice-4: Intermedio |
| 26 | [Contatore di visite](26-contatore-visite.md) | `$_SESSION`, contatore | :material-circle-slice-4: Intermedio |
| 27 | [Carrello in sessione](27-carrello-sessione.md) | Carrello in sessione | :material-circle-slice-4: Intermedio |
| 28 | [Login con sessione](28-login-semplice.md) | Login con sessione, logout | :material-circle-slice-4: Intermedio |
| 29 | [Pagine protette e ruoli](29-pagine-protette.md) | Ruoli, controllo accessi | :material-circle: Avanzato |
| 30 | [Messaggi flash](30-messaggi-flash.md) | Messaggi flash | :material-circle-slice-4: Intermedio |

### 5. Database con PDO :material-database:

Da qui servono MySQL/MariaDB e i database di esempio.

| # | Esercizio | Argomento | Difficoltà |
|---|-----------|-----------|------------|
| 31 | [Connessione al database](31-connessione-db.md) | DSN, `PDO`, `try/catch` | :material-circle-slice-4: Intermedio |
| 32 | [Elenco degli studenti](32-elenco-studenti.md) | `query()`, `fetchAll()` | :material-circle-slice-4: Intermedio |
| 33 | [Scheda dello studente](33-scheda-studente.md) | `prepare()`, `execute()`, parametri GET | :material-circle-slice-4: Intermedio |
| 34 | [Aggiungere un libro](34-nuovo-libro.md) | `INSERT`, `lastInsertId()`, validazione | :material-circle-slice-4: Intermedio |
| 35 | [Modificare un libro](35-modifica-libro.md) | `UPDATE`, `rowCount()` | :material-circle-slice-4: Intermedio |
| 36 | [Eliminare un libro](36-elimina-libro.md) | `DELETE`, vincoli di chiave esterna | :material-circle-slice-4: Intermedio |

### 6. Query e dati reali :material-database-search:

| # | Esercizio | Argomento | Difficoltà |
|---|-----------|-----------|------------|
| 37 | [Catalogo per categorie](37-catalogo-categorie.md) | `JOIN`, raggruppamento in array | :material-circle-slice-4: Intermedio |
| 38 | [Ricerca dei prodotti](38-ricerca-prodotti.md) | `LIKE`, filtri dinamici con GET | :material-circle-slice-4: Intermedio |
| 39 | [Paginazione dei risultati](39-paginazione.md) | `LIMIT`/`OFFSET`, `bindValue()` | :material-circle-slice-4: Intermedio |
| 40 | [Report dei voti](40-report-voti.md) | `GROUP BY`, `AVG`, `HAVING` | :material-circle-slice-4: Intermedio |
| 41 | [Ordine con più prodotti](41-ordine-multiplo.md) | Transazioni, `FOR UPDATE` | :material-circle: Avanzato |
| 42 | [Prestiti e vincoli del database](42-prestito-vincoli.md) | `UNIQUE`, `FOREIGN KEY`, `CHECK`, errori PDO | :material-circle: Avanzato |

### 7. Utenti e sicurezza :material-account-lock:

| # | Esercizio | Argomento | Difficoltà |
|---|-----------|-----------|------------|
| 43 | [Registrazione degli utenti](43-registrazione.md) | `password_hash()`, `UNIQUE` | :material-circle-slice-4: Intermedio |
| 44 | [Login con il database](44-login-db.md) | `password_verify()`, sessione | :material-circle-slice-4: Intermedio |
| 45 | [Area riservata del cliente](45-area-riservata.md) | Dati dell'utente autenticato | :material-circle-slice-4: Intermedio |
| 46 | [Pannello amministratore](46-pannello-admin.md) | Ruolo `admin`, modifica dati | :material-circle: Avanzato |
| 47 | [Cambio della password](47-cambio-password.md) | Cambio password | :material-circle-slice-4: Intermedio |

### 8. File, API e progetti :material-folder-upload:

| # | Esercizio | Argomento | Difficoltà |
|---|-----------|-----------|------------|
| 48 | [Caricare un file](48-upload-file.md) | `$_FILES`, `move_uploaded_file()` | :material-circle-slice-4: Intermedio |
| 49 | [Upload sicuro di immagini](49-upload-sicuro.md) | `finfo`, nome casuale, immagini | :material-circle: Avanzato |
| 50 | [Immagini dei prodotti](50-immagine-prodotto.md) | Immagini associate ai record | :material-circle: Avanzato |
| 51 | [API in formato JSON](51-api-json.md) | `json_encode()`, codici HTTP | :material-circle-slice-4: Intermedio |
| 52 | [Gestionale del negozio](52-gestionale-negozio.md) | CRUD, ricerca, paginazione, immagini | :material-circle: Avanzato |
| 53 | [Progetto: bacheca annunci](53-progetto-aperto.md) | Progetto libero con database | :material-circle: Avanzato |

---

## Eseguire PHP in locale

Gli esercizi della **prima sezione** (01–10) si provano direttamente nell'editor
OneCompiler della pagina. Tutti gli altri producono pagine web e richiedono un
server con PHP: i file stanno nella cartella `PHP/` del repository, una
sottocartella per esercizio, più `includes/` (file condivisi: stile e funzioni)
e `db/` (database di esempio). Usa **l'intera cartella `PHP/`** come cartella
pubblica del server, perché le pagine si richiamano a vicenda con percorsi
relativi (per esempio `../includes/stile.css`).

=== "Con PHP integrato"

    ```bash
    # dalla cartella che contiene PHP/ : la cartella PHP/ diventa la radice del sito
    php -S localhost:8000 -t PHP

    # poi apri http://localhost:8000/Pagina-dinamica/index.php
    ```

    Per gli esercizi con database serve l'estensione `pdo_mysql`
    (verifica con `php -m | grep -i pdo`).

=== "Con XAMPP / WAMP"

    Installa [XAMPP](https://www.apachefriends.org) (Windows/Mac/Linux)
    o [WAMP](https://www.wampserver.com) (solo Windows), copia la cartella `PHP/`
    dentro `htdocs/` (per esempio come `htdocs/PHP/`), avvia **Apache** e **MySQL**
    dal pannello di controllo e apri `http://localhost/PHP/Pagina-dinamica/index.php`.

!!! note "Versione consigliata"
    Gli esercizi sono compatibili con **PHP 8.x** (verifica con `php --version`)
    e sono stati provati con MariaDB 10.x.

---

## Database di esempio

Dall'esercizio 31 in poi si usano quattro piccoli database, ciascuno in un file
`.sql` nella cartella `PHP/db/`:

| File | Database | Contenuto | Usato negli esercizi |
|------|----------|-----------|----------------------|
| `scuola.sql` | `scuola` | classi, studenti, materie, voti | 31–33, 40 |
| `biblioteca.sql` | `biblioteca` | autori, libri, soci, prestiti | 34–36, 42 |
| `negozio.sql` | `negozio` | categorie, prodotti, utenti, ordini | 37–39, 41, 43–52 |
| `bacheca.sql` | `bacheca` | utenti e annunci | 53 |

**Importa un file** con phpMyAdmin (scheda *Importa*) oppure da terminale:

```bash
mysql -u root < PHP/db/scuola.sql
```

!!! warning "Attenzione"
    Ogni file **cancella e ricrea** il proprio database: reimportarlo è il modo
    più rapido per tornare ai dati iniziali dopo aver fatto delle prove.

**Account di prova** (database `negozio`): `mario` / `segreta123` (cliente) e
`admin` / `admin123` (amministratore). Nel database `bacheca`: `anna` / `password1`
e `luca` / `password2`.

### Parametri di connessione

Tutti gli esercizi si collegano tramite il file `PHP/includes/connessione.php`.
I valori predefiniti sono quelli di XAMPP/WAMP; se il tuo server è diverso
(altro utente, password, porta o host) modificali **solo lì**:

```php
const DB_HOST = "localhost";
const DB_USER = "root";
const DB_PASS = "";
```

### Cartelle in cui si caricano file

Negli esercizi 48–50 e 52 il server web deve poter **scrivere** nelle cartelle
`uploads/` e `immagini/`. Se il caricamento fallisce, controlla i permessi di
queste cartelle.

---

## Risorse utili

- [php.net/manual](https://www.php.net/manual/it/) — manuale ufficiale in italiano
- [PDO sul manuale PHP](https://www.php.net/manual/it/book.pdo.php) — riferimento per l'accesso ai database
- [W3Schools PHP](https://www.w3schools.com/php/) — riferimento rapido con esempi
