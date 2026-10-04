# Cambio della password

Nel database `negozio` la tabella `utenti` memorizza in `password_hash` l'hash della password di ogni account (di prova: `mario` / `segreta123`). I file `login.php`, `logout.php` e `index.php` sono già pronti (il login è quello dell'[esercizio 44](44-login-db.md); `index.php` saluta l'utente e mostra i messaggi flash). Scrivi `password.php`, una pagina riservata agli utenti autenticati con un modulo di tre campi: password attuale, nuova password, conferma della nuova password. Il server deve controllare che la password attuale sia quella salvata nel database, che la nuova abbia almeno 8 caratteri, che sia diversa dall'attuale e che coincida con la conferma. Se tutto è corretto aggiorna `password_hash` dell'utente con il nuovo hash, rigenera l'identificativo di sessione, prepara il messaggio flash «Password aggiornata.» e porta l'utente a `index.php`. Altrimenti mostra gli errori accanto ai campi. Le password non vengono mai ristampate nel modulo.

## Obiettivo

Permettere all'utente di cambiare la propria password verificando prima quella attuale.

## Anteprima

```
password.php                         index.php
+--------------------------------+   +--------------------------------+
| Cambia password                |   | Ciao, mario                    |
| Password attuale [ ********  ] |   | [ Password aggiornata. ]       |
| La password attuale non è      |   | Cambia la password · Esci      |
| corretta.                      |   +--------------------------------+
| Nuova password   [ ********  ] |
| Ripeti           [ ********  ] |
| [ Aggiorna la password ]       |
+--------------------------------+
```

## Struttura

| File | Ruolo |
|------|-------|
| `login.php`, `logout.php`, `index.php` | accesso, uscita e home con i messaggi flash (forniti) |
| `password.php` | modulo, controlli, aggiornamento dell'hash (da scrivere) |

## Descrizione

### Perché chiedere la password attuale

L'utente è già autenticato: `richiediLogin()` basta per entrare nella pagina. Ma se qualcuno trova un computer lasciato acceso con la sessione aperta, potrebbe cambiare la password e portarsi via l'account. Chiedendo anche quella attuale ci si assicura che a usare il modulo sia davvero il proprietario. Come nell'[area riservata](45-area-riservata.md), l'utente da modificare si ricava **dalla sessione**, non da un campo del modulo.

```php
require __DIR__ . "/../includes/auth_db.php";
require __DIR__ . "/../includes/connessione.php";
require __DIR__ . "/../includes/flash.php";

richiediLogin();
$utente = utenteCorrente();
```

### Verificare l'attuale con `password_verify`

Nella sessione non c'è l'hash (e non deve esserci): lo si legge dal database con l'id dell'utente e lo si confronta con la password scritta.

```php
$stmt = $pdo->prepare("SELECT password_hash FROM utenti WHERE id = :id");
$stmt->execute(["id" => $utente["id"]]);
$hash = $stmt->fetchColumn();

if (!password_verify($attuale, $hash)) {
    $errori["attuale"] = "La password attuale non è corretta.";
}
```

`fetchColumn()` restituisce direttamente il valore della prima colonna, comodo quando si legge un solo dato.

### Controlli sulla nuova password

I controlli sulla nuova password vanno in ordine, uno solo per volta (con `if ... elseif`), così per ogni campo compare un solo messaggio:

```php
if (strlen($nuova) < 8) {
    $errori["nuova"] = "La nuova password deve avere almeno 8 caratteri.";
} elseif ($nuova === $attuale) {
    $errori["nuova"] = "La nuova password deve essere diversa da quella attuale.";
} elseif ($nuova !== $conferma) {
    $errori["conferma"] = "Le due password non coincidono.";
}
```

Il confronto con la vecchia password si fa sul testo scritto (`$nuova === $attuale`), perché è l'unico momento in cui si conoscono entrambe in chiaro.

### Aggiornare l'hash e rigenerare la sessione

Solo se `$errori` è vuoto si salva il nuovo hash, calcolato con `password_hash` (un nuovo sale, quindi un hash completamente diverso). Subito dopo si chiama `session_regenerate_id(true)`: quando cambiano le credenziali conviene cambiare anche l'identificativo di sessione, così un identificativo eventualmente rubato prima smette di valere. Poi si segue il solito POST-Redirect-GET con un messaggio flash.

```php
$pdo->prepare("UPDATE utenti SET password_hash = :hash WHERE id = :id")
    ->execute(["hash" => password_hash($nuova, PASSWORD_DEFAULT), "id" => $utente["id"]]);

session_regenerate_id(true);
flash("ok", "Password aggiornata.");
header("Location: index.php");
exit;
```

!!! warning "Non mostrare mai le password"
    Nei campi `type="password"` non si inserisce nessun `value`: anche dopo un errore l'utente deve riscriverle. Una password ristampata finirebbe nel codice HTML, nella cache del browser e potenzialmente in qualche registro. Per lo stesso motivo non si salva mai in sessione né si scrive in un messaggio d'errore.

## Suggerimenti

- Le password non vanno passate a `trim()`: gli spazi possono far parte di una password.
- Gli errori si raccolgono in un array `$errori` indicizzato dal nome del campo, come nella [registrazione](43-registrazione.md).
- Prova: cambia la password di `mario`, esci, e verifica che la vecchia non funzioni più e la nuova sì. Poi ripristina `segreta123` per gli altri esercizi.
- Guarda il campo `password_hash` prima e dopo il cambio: l'hash è completamente diverso.
- Estensione: rifiuta una nuova password uguale al nome utente o che contiene il nome utente, e mostra un indicatore di robustezza mentre l'utente scrive.

## Soluzione

=== "password.php"
    ```php
    --8<-- "PHP/Cambio-password/password.php"
    ```
=== "index.php"
    ```php
    --8<-- "PHP/Cambio-password/index.php"
    ```
=== "login.php"
    ```php
    --8<-- "PHP/Cambio-password/login.php"
    ```
=== "logout.php"
    ```php
    --8<-- "PHP/Cambio-password/logout.php"
    ```

!!! warning "Esegui in locale"
    Richiede un **server web con PHP e MySQL/MariaDB**: importa prima il database `negozio` (file `PHP/db/negozio.sql`, vedi [Database di esempio](index.md#database-di-esempio)), poi copia la cartella `PHP/` nella cartella pubblica del tuo server e apri `Cambio-password/index.php` dal browser (vedi [Eseguire PHP in locale](index.md#eseguire-php-in-locale)). Non si può eseguire su OneCompiler.
