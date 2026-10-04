# Login con sessione

Il file `utenti.php` (già pronto) contiene l'array `$utenti` con due utenti e le loro password. Scrivi tre pagine: `login.php` mostra un modulo (nome utente e password) e, se i dati sono corretti, memorizza l'utente nella sessione e porta a `riservata.php`, altrimenti mostra «Nome utente o password errati.»; `riservata.php` mostra un saluto personalizzato ma **solo** a chi ha fatto l'accesso (gli altri tornano al login); `logout.php` chiude la sessione e riporta al login.

## Obiettivo

Realizzare il ciclo completo di autenticazione: accesso, pagina protetta e uscita.

## Anteprima

```
login.php                       riservata.php                 
+-----------------------+       +-----------------------------------+
| Accedi                |       | Area riservata                    |
| [ Nome o password ... |       | [ Benvenuto, mario! Solo chi ha   |
|   errati. ]           |       |   effettuato l'accesso ... ]      |
| Nome utente [ mario ] |       | Esci                              |
| Password    [ ***** ] |       +-----------------------------------+
| [ Entra ]             |       (senza accesso: redirect a login.php)
+-----------------------+
```

## Struttura

| File | Ruolo |
|------|-------|
| `utenti.php` | gli utenti ammessi (fornito) |
| `login.php` | modulo di accesso |
| `riservata.php` | pagina protetta |
| `logout.php` | chiusura della sessione |

## Descrizione

### Che cosa significa «essere loggati»

L'autenticazione con le sessioni si riduce a una regola: **una volta verificate le credenziali, si scrive un dato nella sessione** (per esempio `$_SESSION["utente"] = "mario"`). Da quel momento, ogni pagina protetta controlla che quel dato esista: se c'è, l'utente è riconosciuto; se manca, lo si manda al login.

```php
session_start();
if (!isset($_SESSION["utente"])) {
    header("Location: login.php");
    exit;          // fondamentale: ferma la pagina, che altrimenti continuerebbe a mostrarsi
}
```

### Rigenerare l'identificativo: `session_regenerate_id`

Al momento del login si chiama **`session_regenerate_id(true)`**, che assegna alla sessione un nuovo identificativo. Così un malintenzionato che avesse imposto un identificativo noto alla vittima (attacco di **session fixation**) non potrebbe usarlo dopo l'accesso.

### Messaggi di errore generici

Il messaggio «Nome utente o password errati» non dice quale dei due dati è sbagliato: chi prova ad accedere non scopre quali nomi utente esistono.

### Il logout

Per uscire non basta togliere l'utente dalla sessione: si svuota l'array `$_SESSION`, si cancella il cookie di sessione (con la stessa procedura mostrata nell'esempio) e si chiama `session_destroy()`.

!!! warning "Password in chiaro"
    Qui le password sono scritte in chiaro in `utenti.php` e confrontate con `===`: è accettabile solo in un esercizio. In un sito vero si memorizza un **hash** (`password_hash`) e si controlla con `password_verify`: lo vedrai negli esercizi sull'autenticazione con il database.

## Suggerimenti

- Controlla anche `isset($utenti[$username])` prima di leggere la password: un nome sconosciuto non deve generare avvisi.
- Se l'utente è già autenticato e apre `login.php`, mandalo direttamente alla pagina riservata.
- Ricorda `exit` dopo ogni `header("Location: ...")`.
- Estensione: dopo tre tentativi falliti nella stessa sessione, blocca il modulo per 30 secondi.

## Soluzione

=== "login.php"
    ```php
    --8<-- "PHP/Login-semplice/login.php"
    ```
=== "riservata.php"
    ```php
    --8<-- "PHP/Login-semplice/riservata.php"
    ```
=== "logout.php"
    ```php
    --8<-- "PHP/Login-semplice/logout.php"
    ```
=== "utenti.php"
    ```php
    --8<-- "PHP/Login-semplice/utenti.php"
    ```

!!! warning "Esegui in locale"
    Richiede un **server web con PHP**: cookie e sessioni esistono solo quando c'è un server che risponde a un browser, quindi OneCompiler non può eseguirlo. Copia la cartella `PHP/` nella cartella pubblica del tuo server e apri `index.php` dal browser (vedi [Eseguire PHP in locale](index.md#eseguire-php-in-locale)).
