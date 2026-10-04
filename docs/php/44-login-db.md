# Login con il database

Nel database `negozio` la tabella `utenti` contiene `username`, `password_hash` e `ruolo` di ogni account (di prova: `mario` / `segreta123` come cliente e `admin` / `admin123` come amministratore). I file `index.php` e `logout.php` sono già pronti, come la libreria condivisa `includes/auth_db.php` che offre `utenteCorrente()`, `accedi()`, `esci()`, `richiediLogin()` e `richiediRuolo()`. Scrivi `login.php`: se l'utente è già autenticato lo manda a `index.php`; altrimenti mostra il modulo (nome utente e password) e, all'invio, cerca nel database l'utente con quel `username`, verifica la password e, se è corretta, memorizza l'utente nella sessione e porta a `index.php`. In caso contrario mostra «Nome utente o password non corretti.» e riempie di nuovo il campo del nome utente.

## Obiettivo

Autenticare un utente confrontando la password inserita con l'hash salvato nel database.

## Anteprima

```
login.php                          index.php
+------------------------------+   +--------------------------------+
| Accedi                       |   | Ciao, mario!                   |
| [ Nome utente o password non |   | Sei autenticato con ruolo      |
|   corretti. ]                |   | cliente.                       |
| Nome utente [ mario        ] |   | Esci                           |
| Password    [ ********     ] |   +--------------------------------+
| [ Entra ]                    |   (senza accesso: redirect a login.php)
+------------------------------+
```

## Struttura

| File | Ruolo |
|------|-------|
| `includes/auth_db.php` | sessione e funzioni di controllo (fornito) |
| `index.php` | pagina protetta con `richiediLogin()` (fornito) |
| `logout.php` | chiude la sessione (fornito) |
| `login.php` | modulo e verifica delle credenziali (da scrivere) |

## Descrizione

### Cercare l'utente, poi verificare la password

Con le password in hash non si può scrivere `WHERE username = ... AND password = ...`: il database non conosce la password, ma solo la sua impronta. Il procedimento è in due passi: prima si legge la riga dell'utente a partire dal `username` (con una query preparata), poi si controlla la password in PHP.

```php
$stmt = connetti("negozio")->prepare(
    "SELECT id, username, password_hash, ruolo FROM utenti WHERE username = :username"
);
$stmt->execute(["username" => $username]);
$utente = $stmt->fetch();      // array associativo oppure false
```

`password_verify($password, $hash)` ricalcola l'hash della password scritta usando il sale contenuto in `$hash` e confronta i risultati. Non devi mai confrontare gli hash con `===`.

```php
if ($utente !== false && password_verify($password, $utente["password_hash"])) {
    accedi($utente);
    header("Location: index.php");
    exit;
}
```

### Un solo messaggio per due errori

Se l'utente non esiste `fetch()` restituisce `false`; se esiste ma la password è sbagliata `password_verify` restituisce `false`. In entrambi i casi la risposta è lo stesso messaggio, «Nome utente o password non corretti.». Con messaggi diversi chi attacca potrebbe provare nomi a caso e scoprire quali sono registrati, per poi concentrarsi su quelli. La condizione `$utente !== false &&` serve anche a non passare `false` a `$utente["password_hash"]`.

### Che cosa fa `accedi()`

La funzione, già scritta in `includes/auth_db.php`, chiama `session_regenerate_id(true)` e salva nella sessione `utente_id`, `utente_username` e `utente_ruolo`. Cambiare l'identificativo di sessione al momento del login impedisce la **session fixation**: se un malintenzionato avesse fatto aprire alla vittima un link con un identificativo scelto da lui, dopo l'accesso quell'identificativo non varrebbe più. Nella sessione non finisce mai la password, e nemmeno l'hash.

### Proteggere le pagine

Le pagine riservate iniziano con `require __DIR__ . "/../includes/auth_db.php";` e `richiediLogin()`: se nella sessione non c'è `utente_id`, l'utente viene mandato a `login.php`. Leggi `index.php` per vedere come si legge l'utente con `utenteCorrente()`.

!!! tip "Prova"
    Apri `index.php` senza aver fatto l'accesso: devi finire su `login.php`. Accedi con `mario`, poi apri `login.php` a mano: devi tornare subito a `index.php`.

## Suggerimenti

- Non occorre `session_start()` in `login.php`: lo fa già `auth_db.php`, da includere per primo.
- Usa `trim()` sul nome utente ma non sulla password, in cui gli spazi possono essere voluti.
- Stampa il nome utente nel campo con `htmlspecialchars()`, mai la password.
- Controlla il comportamento con utente inesistente, password vuota e nome utente scritto con maiuscole diverse (con la collation predefinita di MySQL il confronto non distingue maiuscole e minuscole).
- Estensione: dopo 5 tentativi falliti consecutivi (contati in sessione) mostra un messaggio di attesa e rifiuta ulteriori tentativi per un minuto.

## Soluzione

=== "login.php"
    ```php
    --8<-- "PHP/Login-db/login.php"
    ```
=== "index.php"
    ```php
    --8<-- "PHP/Login-db/index.php"
    ```
=== "logout.php"
    ```php
    --8<-- "PHP/Login-db/logout.php"
    ```

!!! warning "Esegui in locale"
    Richiede un **server web con PHP e MySQL/MariaDB**: importa prima il database `negozio` (file `PHP/db/negozio.sql`, vedi [Database di esempio](index.md#database-di-esempio)), poi copia la cartella `PHP/` nella cartella pubblica del tuo server e apri `Login-db/index.php` dal browser (vedi [Eseguire PHP in locale](index.md#eseguire-php-in-locale)). Non si può eseguire su OneCompiler.
