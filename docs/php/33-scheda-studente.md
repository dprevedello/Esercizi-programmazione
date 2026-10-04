# Scheda dello studente

Il database `scuola` e `includes/connessione.php` sono già pronti. Scrivi `index.php` in modo che senza parametri mostri l'elenco degli studenti (cognome e nome, ciascuno un link) e con `index.php?id=N` mostri la scheda dello studente con quell'`id`: nome e cognome, classe e indirizzo (dalla tabella `classi`), data di nascita ed email. Sotto la scheda metti i link «Precedente», «Elenco» e «Successivo», che non devono comparire quando non hanno una destinazione. Se lo studente non esiste, la pagina risponde con codice 404 e un messaggio.

## Obiettivo

Leggere un parametro dall'indirizzo e usarlo in una query preparata per ottenere una singola riga.

## Anteprima

```
index.php                      index.php?id=3                index.php?id=99
+-----------------------+      +------------------------+    +----------------------+
| Schede degli studenti |      | Sara Conti             |    | [ Lo studente        |
| - Bianchi Giulia      |      | Classe: 3AINF          |    |   numero 99 non      |
| - Bruno Matteo        |      | (Informatica e Tel...) |    |   esiste. ]          |
| - Conti Sara          |      | Nato il: 27/01/2010    |    | < Torna all'elenco   |
| ...                   |      | Email: s.conti@...     |    +----------------------+
+-----------------------+      | < Precedente | Elenco  |
                               | | Successivo >         |
                               +------------------------+
```

## Struttura

| File | Ruolo |
|------|-------|
| `index.php` | elenco o scheda a seconda del parametro `id` (da scrivere) |
| `../includes/connessione.php`, `../includes/stile.css` | forniti |

## Descrizione

### Il parametro dall'indirizzo

L'`id` arriva da `$_GET`, quindi è **input dell'utente**: può mancare, essere un numero, un testo o qualsiasi altra cosa. Lo si converte subito in intero:

```php
$id = isset($_GET["id"]) ? (int) $_GET["id"] : null;
```

`null` significa «nessun parametro, mostra l'elenco». Il cast `(int)` trasforma `"abc"` in `0` e `"3 OR 1=1"` in `3`: un primo filtro, utile ma da solo non sufficiente.

### Query preparate

```php
$stmt = $pdo->prepare("SELECT * FROM studenti WHERE id = :id");
$stmt->execute(["id" => $id]);
$studente = $stmt->fetch();
```

In due tempi: `prepare()` invia al database l'istruzione con un **segnaposto** (`:id`), `execute()` invia il valore. Il database sa fin dall'inizio che `:id` è un dato e non codice SQL, qualunque cosa contenga.

`fetch()` legge **una sola riga**, come array associativo, oppure restituisce **`false`** se la query non ha trovato nulla. È il caso dell'id inesistente: il controllo `$studente === false` decide se mostrare la scheda o il messaggio.

!!! warning "Non concatenare mai l'input nella query"
    Scrivere `"SELECT * FROM studenti WHERE id = " . $_GET["id"]` sembra equivalente, ma non lo è. Con `?id=1 OR 1=1` la condizione diventa sempre vera; con altri input si possono leggere altre tabelle o cancellare dati. È la **SQL injection**, e nasce proprio da qui: da dati dell'utente che diventano parte del codice SQL. Con i segnaposto il problema non si pone, e vale per ogni valore proveniente da fuori, anche se sembra «solo un numero».

### 404 e seconda query

Se `fetch()` restituisce `false` chiama `http_response_code(404)` prima di stampare l'HTML: oltre al messaggio per la persona, il codice dice ai browser e ai motori di ricerca che la risorsa non esiste. Se lo studente c'è, una seconda query preparata con `$studente["id_classe"]` legge nome e indirizzo della classe (l'unione delle due tabelle con una `JOIN` farebbe lo stesso in una sola query, ed è l'estensione proposta sotto).

### Precedente e successivo

«Precedente» ha senso solo se `$id > 1`; «Successivo» solo se `$id < $ultimoId`, dove l'ultimo id si ricava con:

```php
$ultimoId = (int) $pdo->query("SELECT MAX(id) FROM studenti")->fetchColumn();
```

Questa query non ha parametri dell'utente, quindi `query()` va bene. Il codice presuppone id consecutivi: se togliessi uno studente, il link porterebbe a una scheda inesistente (e quindi al 404).

## Suggerimenti

- Prova `index.php?id=abc`, `?id=0`, `?id=-1` e `?id=1%20OR%201=1` e verifica che la pagina reagisca in modo corretto.
- Ricordati `htmlspecialchars` su tutto ciò che viene dal database, e `date("d/m/Y", strtotime(...))` per la data.
- Usa `elseif` per distinguere i tre casi: nessun id, id inesistente, id valido.
- Controlla il 404 negli strumenti di sviluppo del browser.
- Estensione: sostituisci le due query con una sola `JOIN` tra `studenti` e `classi`, poi aggiungi alla scheda la media dei voti dalla tabella `voti`.

## Soluzione

=== "index.php"
    ```php
    --8<-- "PHP/Scheda-studente/index.php"
    ```

!!! warning "Esegui in locale"
    Richiede un **server web con PHP e MySQL/Mariascuola**: importa prima il database `scuola` (file `PHP/db/scuola.sql`, vedi [Database di esempio](index.md#database-di-esempio)), poi copia la cartella `PHP/` nella cartella pubblica del tuo server e apri `Scheda-studente/index.php` dal browser (vedi [Eseguire PHP in locale](index.md#eseguire-php-in-locale)). Non si può eseguire su OneCompiler.
