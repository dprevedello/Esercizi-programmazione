# Immagini dei prodotti

Nel database `negozio` la tabella `prodotti` ha una colonna `immagine VARCHAR(100) NULL`, vuota per tutti i prodotti. I file `login.php` e `logout.php` sono forniti (copie di quelli dell'esercizio 45 sul login con il database). Scrivi `index.php`, il catalogo pubblico: legge `prodotti` e `categorie` e mostra per ogni prodotto la foto, il nome, la categoria e il prezzo; se `immagine` è `NULL` mostra un riquadro segnaposto con la scritta «nessuna immagine». Scrivi poi `admin.php`, riservata agli utenti con ruolo `admin`: elenca i prodotti con la miniatura attuale e, per ciascuno, un modulo per caricare o sostituire l'immagine e un pulsante «Rimuovi». Le immagini si salvano nella cartella `immagini/` (già presente) con un nome casuale e nel database si scrive solo il nome del file. Usa gli account `admin` / `admin123` (amministratore) e `mario` / `segreta123` (cliente, che deve ricevere «Accesso negato»).

## Obiettivo

Collegare un file caricato a una riga del database, mantenendo coerenti disco e tabella quando l'immagine viene aggiunta, sostituita o rimossa.

## Anteprima

```
index.php (catalogo)                      admin.php
+-----------------------------------+     +------------------------------------------+
| Catalogo                          |     | Immagini dei prodotti                    |
| +---------+ +---------+           |     | Prodotto    Immagine  Carica o sostituisci|
| | (foto)  | | nessuna |           |     | Monitor 24"  [foto]  [Scegli][Carica][Rimuovi]|
| | Monitor | | immagine|           |     | Mouse        —       [Scegli][Carica]     |
| | € 149,00| | Mouse   |           |     +------------------------------------------+
| +---------+ +---------+           |
+-----------------------------------+
```

## Struttura

| File | Ruolo |
|------|-------|
| `login.php`, `logout.php` | forniti |
| `index.php` | catalogo pubblico con immagini e segnaposto (da scrivere) |
| `admin.php` | caricamento, sostituzione e rimozione delle immagini (da scrivere) |
| `immagini/` | cartella delle immagini: deve essere scrivibile dal server web |

## Descrizione

### Nel database solo il nome del file

Un database può contenere anche file binari, ma nelle applicazioni web si usa un altro schema: il file sta sul disco, nella cartella `immagini/`, e nella colonna `immagine` si scrive **solo il nome** (`p3-a1b2c3d4.jpg`), non l'immagine e nemmeno il percorso completo. La pagina costruisce l'indirizzo con `"immagini/" . $p["immagine"]`. La colonna ammette `NULL` ("nessuna immagine"), quindi nel codice si controlla sempre `$p["immagine"] !== null`.

### Un modulo per ogni riga

Nella tabella di `admin.php` ogni prodotto ha il proprio modulo con `enctype="multipart/form-data"` e un campo nascosto con l'identificativo:

```php
<form method="post" action="admin.php" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $p["id"] ?>">
    <input type="file" name="immagine">
    <button type="submit">Carica</button>
</form>
```

Il pulsante «Rimuovi» è un secondo modulo, senza file, con un campo nascosto `azione` uguale a `rimuovi`. Lo script legge `$_POST["id"]` e `$_POST["azione"]` e decide che cosa fare. Il nome del file è `"p" . $id . "-" . bin2hex(random_bytes(4)) . ".jpg"` (con l'estensione ricavata dal tipo reale, come nell'[esercizio 49](49-upload-sicuro.md)).

### L'ordine delle operazioni nella sostituzione

1. Si legge il prodotto dal database, per sapere qual è la vecchia immagine.
2. Si verifica e si sposta il nuovo file con `move_uploaded_file`.
3. Si esegue l'`UPDATE` con il nuovo nome.
4. **Solo dopo** si cancella la vecchia immagine con `unlink`.

Se l'`UPDATE` fallisse e la vecchia immagine fosse già stata cancellata, il prodotto resterebbe con un riferimento a un file che non esiste più.

!!! warning "Un POST è una richiesta come le altre"
    `richiediRuolo("admin")` va chiamato **all'inizio** di `admin.php`, prima di leggere `$_POST`: protegge sia la visualizzazione sia l'invio dei moduli. Chi non è admin potrebbe costruire a mano una richiesta POST anche senza vedere la pagina.

### `basename()` prima di `unlink`

Il nome letto dal database è un dato di cui ti fidi, ma una riga modificata per errore (o per attacco) potrebbe contenere `../`. Prima di cancellare un file passa il nome da `basename()`: `unlink(CARTELLA . basename($nome))`. Non costa nulla e impedisce di uscire dalla cartella `immagini/`.

### Miniature uniformi con CSS

Le foto hanno proporzioni diverse. Con `width:100%; height:140px; object-fit:cover` ogni immagine riempie lo stesso riquadro, ritagliata al centro, senza deformarsi. Il segnaposto è un `div` con la stessa altezza.

## Suggerimenti

- Se `index.php` mostra il segnaposto per tutti i prodotti, è normale: finché non carichi nulla la colonna è `NULL`.
- `htmlspecialchars()` su tutto ciò che viene dal database, anche sul nome del file nell'attributo `src`.
- Dopo ogni POST usa un messaggio flash e un redirect ([POST-Redirect-GET](30-messaggi-flash.md)).
- Se il prodotto con quell'`id` non esiste, rispondi con un messaggio e non toccare il disco.
- Estensione: nel catalogo mostra le immagini ridimensionate con `getimagesize` per scrivere larghezza e altezza negli attributi `width` e `height`.

## Soluzione

=== "index.php"
    ```php
    --8<-- "PHP/Immagine-prodotto/index.php"
    ```
=== "admin.php"
    ```php
    --8<-- "PHP/Immagine-prodotto/admin.php"
    ```
=== "login.php"
    ```php
    --8<-- "PHP/Immagine-prodotto/login.php"
    ```
=== "logout.php"
    ```php
    --8<-- "PHP/Immagine-prodotto/logout.php"
    ```

!!! warning "Esegui in locale"
    Richiede un **server web con PHP e MySQL/MariaDB**, e la cartella `immagini/` deve essere scrivibile dal server web: importa prima il database `negozio` (file `PHP/db/negozio.sql`, vedi [Database di esempio](index.md#database-di-esempio)), poi copia la cartella `PHP/` nella cartella pubblica del tuo server e apri `Immagine-prodotto/index.php` dal browser (vedi [Eseguire PHP in locale](index.md#eseguire-php-in-locale)). Non si può eseguire su OneCompiler.
