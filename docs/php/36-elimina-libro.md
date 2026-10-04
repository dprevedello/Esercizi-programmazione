# Eliminare un libro

Il database `biblioteca`, `includes/connessione.php` e `includes/flash.php` sono già pronti, così come `index.php`, che elenca i libri della tabella `libri` con un link «Elimina…» verso `elimina.php?id=N`. Scrivi `elimina.php`, che ha due comportamenti. Aperta con un normale link (GET) mostra una pagina di conferma con titolo e anno del libro (404 se non esiste) e un modulo con il pulsante «Sì, elimina». Ricevendo il modulo (POST) esegue il `DELETE` e torna all'elenco con un messaggio flash. Un libro presente in qualche prestito (tabella `prestiti`) non può essere eliminato: invece dell'errore fatale, deve comparire un messaggio comprensibile.

## Obiettivo

Cancellare una riga in modo sicuro: solo via POST, con conferma e gestione del vincolo di chiave esterna.

## Anteprima

```
elimina.php?id=14 (GET)           index.php dopo il POST
+---------------------------+     +-------------------------------+
| Eliminare questo libro?   |     | Gestione dei libri            |
| Guida galattica per       |     | [ Impossibile eliminare il    |
| autostoppisti (1979)      |     |   libro: risulta in uno o più |
| L'operazione non si può   |     |   prestiti. ]                 |
| annullare.                |     | # Titolo         Anno         |
| [ Sì, elimina ]  Annulla  |     | 1 Il barone...   1957 Elimina |
+---------------------------+     +-------------------------------+
```

## Struttura

| File | Ruolo |
|------|-------|
| `index.php` | elenco dei libri con i link «Elimina…» (fornito) |
| `elimina.php` | conferma (GET) ed eliminazione (POST) (da scrivere) |
| `../includes/connessione.php`, `../includes/flash.php`, `../includes/stile.css` | forniti |

## Descrizione

### Mai cancellare con un link

La regola è: le operazioni che **modificano dati** si fanno con POST, quelle che li **leggono** con GET. Un `DELETE` fatto da un link `elimina.php?id=5` ha tre problemi:

- **crawler e anticipo del browser**: i motori di ricerca seguono i link, e molti browser caricano in anticipo quelli che pensano ti serviranno. Un link che cancella verrebbe «cliccato» da un programma;
- **errori**: basta un doppio clic o un preferito salvato per cancellare di nuovo, o cancellare altro;
- **CSRF** (*Cross-Site Request Forgery*): una pagina di un altro sito può contenere `<img src="https://tuosito/elimina.php?id=5">`, e il browser dell'utente, che magari è autenticato, esegue la richiesta senza accorgersene. Con POST l'attacco è più difficile (non è il solo rimedio: in un sito vero servono anche i token CSRF, ma questa è la base).

Per questo `elimina.php` fa il `DELETE` solo se `$_SERVER["REQUEST_METHOD"] === "POST"`; con GET mostra soltanto la pagina di conferma, che non cambia nulla.

### Conferma

La pagina di conferma è la protezione contro i clic sbagliati: il link «Elimina…» porta lì, e solo il pulsante del modulo cancella davvero. L'id viaggia in un campo nascosto:

```php
<form method="post" action="elimina.php">
    <input type="hidden" name="id" value="<?= $libro["id"] ?>">
    <button type="submit">Sì, elimina</button>
</form>
```

Una conferma lato client con `onclick="return confirm('Sicuro?')"` è comoda, ma **non basta**: è codice nel browser, si disattiva con JavaScript spento e non ferma chi invia la richiesta a mano. Il controllo che conta, il metodo POST, deve stare sul server.

### Il vincolo di chiave esterna

In `prestiti` la colonna `id_libro` è una chiave esterna verso `libri`. Se il libro risulta in un prestito, il database rifiuta il `DELETE` e PDO lancia una `PDOException`. Il codice MySQL dell'errore si legge in `$e->errorInfo[1]`: **1451** significa «riga referenziata da un'altra tabella».

```php
try {
    $stmt = $pdo->prepare("DELETE FROM libri WHERE id = :id");
    $stmt->execute(["id" => $id]);
    // rowCount() === 1: eliminata; 0: l'id non esiste
} catch (PDOException $e) {
    if ((int) $e->errorInfo[1] === 1451) {
        flash("ko", "Impossibile eliminare il libro: risulta in uno o più prestiti.");
    } else {
        throw $e;      // altri errori: non nasconderli
    }
}
```

Intercettiamo solo il codice che sappiamo spiegare all'utente; ogni altro errore viene rilanciato con `throw`, perché nasconderlo renderebbe i guasti invisibili. Dopo il `try/catch`, in ogni caso, si fa il redirect all'elenco.

## Suggerimenti

- Prova con il libro 2 (`Le città invisibili`), che ha un prestito in corso: deve comparire il messaggio sul vincolo. Prova poi con il libro 11, senza prestiti, e verifica che sparisca dall'elenco.
- Se vuoi riavere i dati originali, reimporta `biblioteca.sql`.
- Apri `elimina.php?id=11` direttamente dalla barra degli indirizzi: deve mostrare la conferma e non cancellare nulla.
- `rowCount()` vale 1 quando la riga è stata cancellata e 0 se l'id non esisteva.
- Estensione: aggiungi un `onsubmit="return confirm(...)"` al modulo di conferma, poi gestisci anche il caso di un libro ancora in prestito con un messaggio che indichi quanti prestiti lo riguardano.

## Soluzione

=== "index.php"
    ```php
    --8<-- "PHP/Elimina-libro/index.php"
    ```
=== "elimina.php"
    ```php
    --8<-- "PHP/Elimina-libro/elimina.php"
    ```

!!! warning "Esegui in locale"
    Richiede un **server web con PHP e MySQL/MariaDB**: importa prima il database `biblioteca` (file `PHP/db/biblioteca.sql`, vedi [Database di esempio](index.md#database-di-esempio)), poi copia la cartella `PHP/` nella cartella pubblica del tuo server e apri `Elimina-libro/index.php` dal browser (vedi [Eseguire PHP in locale](index.md#eseguire-php-in-locale)). Non si può eseguire su OneCompiler.
