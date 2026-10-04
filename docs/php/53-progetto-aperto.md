# Progetto: bacheca annunci

Questo è l'ultimo esercizio e non ha una traccia chiusa: scegli tu un tema e progetta un piccolo sito con un database tutto tuo. Alcune idee: una bacheca di annunci, una biblioteca personale, un'agenda, un blog, una lista della spesa condivisa, un registro dei compiti. Il sito deve avere utenti che si registrano e accedono, e dati che ciascun utente crea, legge, modifica ed elimina. Alla fine consegni la cartella del progetto e il file `.sql` per ricreare il database. In fondo alla pagina trovi, come **soluzione di riferimento**, una bacheca di annunci completa che usa il database `bacheca` (file `PHP/db/bacheca.sql`, con gli utenti `anna` / `password1` e `luca` / `password2`): puoi studiarla per l'organizzazione del codice, ma il tuo progetto deve essere diverso.

## Obiettivo

Progettare e realizzare da zero un sito completo con database, utenti e dati personali, usando tutto quello che hai imparato.

## Anteprima

```
index.php (soluzione di riferimento)                  nuovo.php
+---------------------------------------------+      +------------------------------+
| Annunci | Pubblica | Esci (anna)            |      | Nuovo annuncio               |
| Bacheca annunci                             |      | Titolo [                   ] |
| Cerca [        ] Categoria [Tutte v][Filtra]|      | Categoria [ Vendo v ]        |
| +-----------------------------------------+ |      | Testo  [                   ] |
| | Vendo libro di matematica [Vendo]       | |      | [ Salva ]  Annulla           |
| | Matematica.verde vol. 3 ...             | |      +------------------------------+
| | di anna, 02/10/2025 15:20 Modifica Elimina |
| +-----------------------------------------+ |
+---------------------------------------------+
```

## Requisiti minimi

- [ ] Almeno **due tabelle** collegate da una chiave esterna.
- [ ] **Registrazione** e **login**, con `password_hash` e `password_verify`; nome utente univoco.
- [ ] **CRUD completo** (creare, leggere, modificare, eliminare) su almeno una tabella, solo con query preparate.
- [ ] Ogni utente può **modificare ed eliminare solo i propri dati**.
- [ ] **Validazione lato server** di tutti i campi, con messaggi accanto ai campi e valori conservati.
- [ ] `htmlspecialchars` su ogni dato mostrato in pagina.
- [ ] **Messaggi flash** dopo le operazioni, con POST-Redirect-GET.
- [ ] Una **ricerca o un filtro** con parametri GET.

## Requisiti facoltativi

- [paginazione](39-paginazione.md) dell'elenco;
- caricamento di un file o di un'immagine (esercizi 48-50);
- un endpoint JSON che espone i dati (esercizio 51);
- ruoli diversi (per esempio un amministratore che può moderare, vedi il [pannello admin](46-pannello-admin.md)).

## Consigli di metodo

- Disegna prima lo **schema E-R** e le tabelle su carta: quali entità, quali chiavi esterne, che cosa succede ai dati quando si elimina un utente (`ON DELETE CASCADE` o no).
- Elenca le pagine e i percorsi dell'utente prima di scrivere codice.
- Metti in un file comune (`comune.php`) sessione, connessione, funzioni di accesso e di impaginazione, per non ripetere codice.
- Procedi per passi: prima registrazione e login, poi l'elenco, poi gli altri tre verbi del CRUD, infine filtri e rifiniture. Prova ogni passo prima del successivo.
- Consegna la cartella del progetto **con** il file `.sql` (struttura e qualche dato di prova) e con gli account di prova indicati.

## Criteri di valutazione

- Correttezza e completezza rispetto ai requisiti minimi.
- Sicurezza: query preparate, escape dell'output, controllo del proprietario, password con hash.
- Qualità del codice: nomi chiari, nessuna ripetizione, file ben organizzati.
- Progettazione del database: tabelle, tipi di dato, chiavi e vincoli adeguati.
- Cura dell'esperienza d'uso: messaggi, errori comprensibili, navigazione.

## Soluzione di riferimento: la bacheca annunci

Il database `bacheca` ha due tabelle: `utenti` (`id`, `username` univoco, `password_hash`) e `annunci` (`id`, `id_utente` chiave esterna verso `utenti` con `ON DELETE CASCADE`, `titolo`, `testo`, `categoria` di tipo `ENUM('vendo','cerco','scambio','altro')`, `pubblicato`).

| File | Ruolo |
|------|-------|
| `comune.php` | sessione, connessione, funzioni `db()`, `utente()`, `richiediUtente()`, `testa()` e `coda()` |
| `modulo.php` | `validaAnnuncio()` e `modulo()`, condivisi da `nuovo.php` e `modifica.php` |
| `index.php` | elenco con ricerca e filtro per categoria |
| `registrazione.php`, `login.php`, `logout.php` | accesso |
| `nuovo.php`, `modifica.php`, `elimina.php` | creazione, modifica, eliminazione |

### `comune.php`: le parti comuni

Ogni pagina comincia con `require "comune.php"`, che avvia la sessione e carica `connessione.php` e `flash.php`. `db()` apre la connessione una sola volta (variabile `static` e operatore `??=`); `utente()` restituisce i dati dell'utente in sessione o `null`; `richiediUtente()` manda al login chi non è autenticato. `testa($titolo)` stampa l'intestazione e il menu (diverso per anonimi e autenticati) e i messaggi flash; `coda()` chiude la pagina. Le pagine diventano brevi: `testa("Nuovo annuncio"); ...; coda();`.

### Un modulo per due pagine

Creare e modificare un annuncio usano lo stesso modulo e le stesse regole. `modulo.php` contiene `validaAnnuncio()`, che restituisce l'array degli errori, e `modulo($annuncio, $errori, $azione)`, che stampa i campi conservando i valori. `nuovo.php` parte da un annuncio vuoto, `modifica.php` da quello letto dal database; il resto è identico.

### Gli annunci altrui «non esistono»

La modifica e l'eliminazione devono funzionare solo sui propri annunci. Il controllo non è un `if` in più, ma una condizione nella query:

```php
$stmt = db()->prepare("SELECT titolo, testo, categoria FROM annunci WHERE id = :id AND id_utente = :utente");
$stmt->execute(["id" => $id, "utente" => $u["id"]]);
```

Se l'annuncio appartiene a un altro utente la query non trova nulla e la pagina risponde 404, come per un `id` inventato: non si rivela nemmeno che esiste. Lo stesso `AND id_utente = :utente` sta nell'`UPDATE` e nel `DELETE`; in `elimina.php`, `rowCount() === 1` dice se qualcosa è stato davvero eliminato.

### L'autore viene dalla sessione

Nella `INSERT` di `nuovo.php` l'`id_utente` è `$u["id"]`, preso dalla sessione. Non esiste un campo «autore» nel modulo: se esistesse, chiunque potrebbe pubblicare a nome di un altro modificando la richiesta.

### Valori ammessi: la whitelist per l'ENUM

La colonna `categoria` accetta solo quattro valori. Il codice li tiene nella costante `CATEGORIE` e `validaAnnuncio()` controlla `isset(CATEGORIE[$a["categoria"]])`. La stessa costante riempie il menu a tendina del modulo e del filtro, e in `index.php` il filtro viene applicato solo se il valore è in elenco. Ogni dato che arriva dal browser, anche un menu a tendina, può essere falsificato.

!!! tip "Registrazione"
    `registrazione.php` verifica il nome utente con un'espressione regolare, impone almeno 8 caratteri alla password e la salva con `password_hash`. L'unicità si lascia al database: la `PDOException` con codice 1062 (voce duplicata) diventa il messaggio «nome utente già in uso», senza controlli preventivi che possono fallire per una gara tra due richieste.

## Soluzione

=== "comune.php"
    ```php
    --8<-- "PHP/Progetto-aperto/comune.php"
    ```
=== "modulo.php"
    ```php
    --8<-- "PHP/Progetto-aperto/modulo.php"
    ```
=== "index.php"
    ```php
    --8<-- "PHP/Progetto-aperto/index.php"
    ```
=== "registrazione.php"
    ```php
    --8<-- "PHP/Progetto-aperto/registrazione.php"
    ```
=== "login.php"
    ```php
    --8<-- "PHP/Progetto-aperto/login.php"
    ```
=== "logout.php"
    ```php
    --8<-- "PHP/Progetto-aperto/logout.php"
    ```
=== "nuovo.php"
    ```php
    --8<-- "PHP/Progetto-aperto/nuovo.php"
    ```
=== "modifica.php"
    ```php
    --8<-- "PHP/Progetto-aperto/modifica.php"
    ```
=== "elimina.php"
    ```php
    --8<-- "PHP/Progetto-aperto/elimina.php"
    ```

!!! warning "Esegui in locale"
    Richiede un **server web con PHP e MySQL/MariaDB**: importa prima il database `bacheca` (file `PHP/db/bacheca.sql`, vedi [Database di esempio](index.md#database-di-esempio)), poi copia la cartella `PHP/` nella cartella pubblica del tuo server e apri `Progetto-aperto/index.php` dal browser (vedi [Eseguire PHP in locale](index.md#eseguire-php-in-locale)). Non si può eseguire su OneCompiler.
