# Pagine protette e ruoli

I file `utenti.php`, `login.php`, `logout.php` e `index.php` sono già pronti. In `utenti.php` ogni utente ha una password e un **ruolo** (`utente` oppure `admin`). Scrivi `auth.php`, il file che ogni pagina include all'inizio, con le funzioni `utenteCorrente()` (restituisce i dati dell'utente autenticato oppure `null`), `richiediLogin()` (manda al login chi non è autenticato e ricorda la pagina richiesta, così dopo l'accesso ci si torna) e `richiediRuolo($ruolo)` (risponde con «Accesso negato» e codice 403 a chi ha un ruolo diverso). Poi scrivi `profilo.php` (solo utenti autenticati) e `admin.php` (solo amministratori).

## Obiettivo

Centralizzare i controlli di accesso in un file incluso da tutte le pagine e distinguere gli utenti in base al ruolo.

## Anteprima

```
Home (utente non autenticato)    Home (utente "admin")        admin.php per "mario"
+---------------------------+    +---------------------------+ +-------------------------+
| Home  Accedi              |    | Home Profilo Amministraz. | | Accesso negato          |
|                           |    | Esci (admin)              | | [ Questa pagina è       |
| Benvenuto nel sito        |    |                           | |  riservata agli utenti  |
| Questa pagina è pubblica. |    | Benvenuto nel sito        | |  con ruolo «admin». ]   |
+---------------------------+    +---------------------------+ +-------------------------+
```

## Struttura

| File | Ruolo |
|------|-------|
| `utenti.php`, `login.php`, `logout.php`, `index.php` | forniti |
| `auth.php` | avvia la sessione e offre le funzioni di controllo (da scrivere) |
| `profilo.php` | richiede il login |
| `admin.php` | richiede il ruolo `admin` |

## Descrizione

### Un file da includere ovunque

Ripetere in ogni pagina gli stessi controlli è faticoso e pericoloso: basta dimenticarsene in una per lasciare un buco. La soluzione è un file **`auth.php`** incluso come prima riga di ogni pagina, che chiama `session_start()` e definisce le funzioni di controllo. Una pagina protetta si riduce a due righe:

```php
require __DIR__ . "/auth.php";
richiediLogin();
```

### Autenticazione e autorizzazione

Sono due domande diverse: **autenticazione** = «chi sei?» (login), **autorizzazione** = «hai il diritto di fare questo?» (ruolo). Un utente autenticato può comunque non essere autorizzato a vedere una pagina: in quel caso la risposta corretta è **403** (*Forbidden*, accesso vietato), diversa dal redirect al login che si usa per chi non è autenticato.

### Tornare alla pagina richiesta

Se un utente anonimo apre `profilo.php`, dopo il login deve tornare lì, non a una pagina qualsiasi. `richiediLogin()` salva la pagina richiesta in `$_SESSION["dopo_login"]` e `login.php` la usa dopo l'accesso.

!!! warning "Open redirect"
    Non salvare mai nella sessione (e non usare nel `Location`) un indirizzo scelto dall'utente, per esempio da un parametro `?next=...`: un malintenzionato potrebbe mandare la vittima su un sito falso dopo il login. Salva solo il **nome del file** della pagina corrente, ricavato dal server con `basename()`.

### Il menu cambia con l'utente

Con `utenteCorrente()` la home può mostrare voci diverse: «Accedi» agli anonimi; «Profilo» e «Esci» agli autenticati; «Amministrazione» solo agli admin. **Nascondere** una voce non basta a proteggere la pagina: il controllo vero resta in `admin.php`.

## Suggerimenti

- Salva nella sessione anche il ruolo al momento del login (lo fa già `login.php`).
- `richiediRuolo()` chiama prima `richiediLogin()`: un anonimo va al login, non vede «Accesso negato».
- `http_response_code(403)` va chiamato prima di stampare l'HTML della pagina di rifiuto, che termina con `exit`.
- Prova: accedi come `mario` e scrivi a mano `admin.php` nella barra degli indirizzi.
- Estensione: aggiungi il ruolo `moderatore` con una pagina accessibile ai moderatori **e** agli admin.

## Soluzione

=== "auth.php"
    ```php
    --8<-- "PHP/Pagine-protette/auth.php"
    ```
=== "profilo.php"
    ```php
    --8<-- "PHP/Pagine-protette/profilo.php"
    ```
=== "admin.php"
    ```php
    --8<-- "PHP/Pagine-protette/admin.php"
    ```
=== "login.php"
    ```php
    --8<-- "PHP/Pagine-protette/login.php"
    ```
=== "index.php"
    ```php
    --8<-- "PHP/Pagine-protette/index.php"
    ```
=== "logout.php"
    ```php
    --8<-- "PHP/Pagine-protette/logout.php"
    ```
=== "utenti.php"
    ```php
    --8<-- "PHP/Pagine-protette/utenti.php"
    ```

!!! warning "Esegui in locale"
    Richiede un **server web con PHP**: cookie e sessioni esistono solo quando c'è un server che risponde a un browser, quindi OneCompiler non può eseguirlo. Copia la cartella `PHP/` nella cartella pubblica del tuo server e apri `index.php` dal browser (vedi [Eseguire PHP in locale](index.md#eseguire-php-in-locale)).
