# Registrazione degli utenti

Il database `negozio` ha la tabella `utenti` (`id`, `username` UNIQUE, `email` UNIQUE, `password_hash`, `ruolo`, `creato_il`). Il file `utenti.php` è già pronto: elenca gli utenti registrati e mostra, a scopo didattico, anche l'hash di ciascuna password. Scrivi `index.php`, con il modulo di registrazione (nome utente, email, password, conferma della password). Il server deve controllare che il nome utente abbia da 3 a 30 caratteri tra lettere, numeri e trattino basso, che l'email sia valida, che la password abbia almeno 8 caratteri e coincida con la conferma. Se i dati sono corretti inserisci l'utente in `utenti` salvando **l'hash** della password (mai il testo in chiaro), prepara un messaggio flash e porta l'utente a `utenti.php`. Se nome utente o email sono già presenti nel database, mostra l'errore accanto al campo giusto e conserva i valori già inseriti (tranne le password).

## Obiettivo

Registrare un nuovo utente nel database memorizzando la password come hash e gestendo i duplicati.

## Anteprima

```
index.php                          utenti.php
+------------------------------+   +-----------------------------------------+
| Crea un account              |   | [ Registrazione completata: ... ]       |
| Nome utente [ mario        ] |   | Utente  Email   Ruolo   Hash            |
| Questo nome utente è già     |   | mario   m@x.it  cliente $2y$10$q3Hd...  |
| in uso.                      |   | luca    l@x.it  cliente $2y$10$Zk8w...  |
| Email       [ m@x.it       ] |   +-----------------------------------------+
| Password    [ ********     ] |
| Ripeti      [ ********     ] |
| [ Registrati ]               |
+------------------------------+
```

## Struttura

| File | Ruolo |
|------|-------|
| `utenti.php` | elenco degli utenti con il relativo hash (fornito) |
| `index.php` | modulo, validazione, inserimento e redirect (da scrivere) |

## Descrizione

### Mai la password in chiaro

Se il database viene copiato o letto da un malintenzionato (o da un amministratore curioso), le password in chiaro sono subito utilizzabili, anche su altri siti, perché molte persone le riutilizzano. Per questo si salva solo un'**impronta** della password, calcolata con una funzione a senso unico: dall'impronta non si può risalire alla password.

Non si parla di «cifratura»: cifrare significa poter decifrare con una chiave, e chi ruba il database può rubare anche la chiave. L'hash invece non si inverte: l'unica cosa che si può fare è provare password diverse e confrontare le impronte.

```php
$hash = password_hash($password, PASSWORD_DEFAULT);
```

`PASSWORD_DEFAULT` sceglie l'algoritmo consigliato da PHP (oggi bcrypt) e lo aggiornerà nelle versioni future: per questo la colonna `password_hash` è `VARCHAR(255)`.

### Che cosa c'è dentro un hash

Guarda gli hash mostrati da `utenti.php`: sono stringhe di 60 caratteri come questa.

```
$2y$10$q3HdU1uTt7yR9u0bWm8nUeQ5mXk2oVYw1sTj3gC0e1aZr7nL4pBqS
```

- `$2y$` indica l'algoritmo (bcrypt);
- `10` è il **costo**: l'algoritmo è volutamente lento, così provare milioni di password costa molto tempo;
- i successivi 22 caratteri sono il **sale** (*salt*), un valore casuale generato a ogni chiamata;
- i restanti 31 caratteri sono l'hash vero e proprio.

Poiché il sale è casuale, **due utenti con la stessa password hanno hash diversi**: provalo registrando due account con la stessa password. Il sale è scritto dentro l'hash, quindi `password_verify` (che vedrai nell'[esercizio successivo](44-login-db.md)) sa come ricalcolarlo.

### Validare prima di inserire

I controlli sono quelli degli esercizi sui moduli: l'espressione regolare per il nome utente, `filter_var($email, FILTER_VALIDATE_EMAIL)` per l'email, `strlen()` per la password. Gli errori si raccolgono in un array `$errori` indicizzato dal nome del campo, così il modulo può stamparli accanto agli input. Dopo un errore si ripresentano nome utente ed email con `htmlspecialchars()`, ma **mai le password**.

### Duplicati: l'errore 1062

`username` ed `email` sono colonne `UNIQUE`: se esiste già un valore uguale, MySQL rifiuta l'`INSERT` con il codice di errore **1062**, che PDO trasforma in una `PDOException`. È più sicuro lasciar decidere al database che fare prima un `SELECT` per controllare, perché tra il controllo e l'inserimento un altro utente potrebbe registrarsi con lo stesso nome.

```php
try {
    $pdo->prepare("INSERT INTO utenti (username, email, password_hash) VALUES (:username, :email, :hash)")
        ->execute(["username" => $username, "email" => $email, "hash" => $hash]);
} catch (PDOException $e) {
    if (($e->errorInfo[1] ?? 0) === 1062) {
        // il messaggio di MySQL contiene il nome della chiave violata
    } else {
        throw $e;      // qualunque altro errore non è un duplicato: non nasconderlo
    }
}
```

!!! warning "Rilancia gli errori che non conosci"
    Il `catch` deve gestire solo il caso previsto (1062). Con `throw $e` gli altri errori restano visibili invece di essere scambiati per «nome già in uso».

### Redirect con messaggio flash

Dopo l'inserimento si usa il pattern POST-Redirect-GET già visto: si chiama `flash("ok", ...)` e si fa il redirect a `utenti.php`, che stampa il messaggio con `mostraFlash()` (vedi [Messaggi flash](30-messaggi-flash.md)). Ricaricare la pagina non invia di nuovo il modulo.

## Suggerimenti

- Ricordati `session_start()` prima di usare `flash()`: il messaggio vive nella sessione.
- Usa sempre query preparate con segnaposto, mai variabili dentro la stringa SQL.
- Per distinguere i duplicati cerca la parola `username` nel messaggio dell'eccezione (`$e->getMessage()`): contiene il nome della chiave violata (`utenti.username` oppure `utenti.email`).
- Il campo email del modulo è di tipo `text` e il form ha `novalidate`: i controlli del browser si possono aggirare, quelli del server no.
- Estensione: rifiuta le password troppo comuni (`12345678`, `password`) confrontandole con un piccolo elenco, e mostra la forza della password con un indicatore.

## Soluzione

=== "index.php"
    ```php
    --8<-- "PHP/Registrazione/index.php"
    ```
=== "utenti.php"
    ```php
    --8<-- "PHP/Registrazione/utenti.php"
    ```

!!! warning "Esegui in locale"
    Richiede un **server web con PHP e MySQL/MariaDB**: importa prima il database `negozio` (file `PHP/db/negozio.sql`, vedi [Database di esempio](index.md#database-di-esempio)), poi copia la cartella `PHP/` nella cartella pubblica del tuo server e apri `Registrazione/index.php` dal browser (vedi [Eseguire PHP in locale](index.md#eseguire-php-in-locale)). Non si può eseguire su OneCompiler.
