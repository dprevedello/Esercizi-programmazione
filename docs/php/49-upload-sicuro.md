# Upload sicuro di immagini

Scrivi `index.php`, una galleria in cui chiunque può caricare immagini JPEG, PNG o GIF. Il modulo ha un campo `immagine`. Alla ricezione il programma deve rifiutare l'invio se non è stato scelto alcun file, se il codice di errore non è `UPLOAD_ERR_OK` o se il file supera i 2 MB; poi deve guardare il **contenuto** del file (non il nome né il tipo dichiarato dal browser) e accettarlo solo se è davvero un'immagine di uno dei tre tipi ammessi. Il file va salvato in `uploads/` con un nome casuale e con l'estensione ricavata dal tipo reale. L'esito si comunica con un messaggio flash e un redirect alla stessa pagina. Sotto il modulo si mostra la galleria di tutte le immagini presenti in `uploads/`. Non serve alcun database; il file `../includes/flash.php` è fornito.

## Obiettivo

Accettare un upload solo dopo aver verificato il contenuto del file e assegnargli un nome scelto dal server.

## Anteprima

```
+---------------------------------------------------+
| Galleria di immagini                              |
| [ Immagine caricata (640 × 480 pixel). ]          |
| Immagine (JPEG, PNG o GIF - massimo 2 MB)         |
| [ Scegli file ]  [ Carica ]                       |
|                                                   |
| Immagini (2)                                      |
| +-----------+  +-----------+                      |
| | (immagine)|  | (immagine)|                      |
| | 9f3c1a.jpg|  | b7e204.png|                      |
| +-----------+  +-----------+                      |
+---------------------------------------------------+
```

## Struttura

| File | Ruolo |
|------|-------|
| `index.php` | modulo, controlli sul contenuto, salvataggio, galleria (da scrivere) |
| `../includes/flash.php`, `../includes/stile.css` | forniti |
| `uploads/` | cartella delle immagini, già presente: deve essere scrivibile dal server web |

## Descrizione

### Di che cosa non fidarsi

Nell'[esercizio precedente](48-upload-file.md) hai usato l'estensione. Ma l'estensione e il campo `type` di `$_FILES` li scrive il **client**: chi vuole ingannarti può caricare uno script chiamato `foto.png` con un tipo `image/png` inventato. Contano solo i byte del file.

### Controllare il contenuto

```php
$finfo = new finfo(FILEINFO_MIME_TYPE);
$tipo = $finfo->file($f["tmp_name"]);        // tipo MIME dedotto dai byte iniziali
$misure = @getimagesize($f["tmp_name"]);     // false se non è un'immagine leggibile

if (!isset(TIPI[$tipo]) || $misure === false) {
    flash("ko", "Il file non è un'immagine JPEG, PNG o GIF valida.");
}
```

`finfo` riconosce il formato dalle firme dei file; `getimagesize` restituisce larghezza e altezza solo se l'immagine è leggibile. Si usano entrambi: uno controlla il tipo, l'altro che il file sia davvero un'immagine. La costante `TIPI` associa ogni tipo ammesso all'estensione con cui salvarlo (`"image/jpeg" => "jpg"`).

### Un nome scelto dal server

Il nome originale non si riutilizza: si genera un nome casuale con l'estensione ricavata dal tipo **reale**.

```php
$nomeFile = bin2hex(random_bytes(8)) . "." . TIPI[$tipo];
```

`random_bytes(8)` produce 8 byte imprevedibili e `bin2hex` li trasforma in 16 caratteri esadecimali. Così non ci sono sovrascritture, percorsi malevoli o caratteri strani, e nessuno può indovinare l'indirizzo del file.

Che cosa succede in due casi tipici:

- Qualcuno carica `shell.php` rinominato `shell.png`: `finfo` vede testo o codice PHP, non un'immagine, e il file viene **rifiutato**.
- Qualcuno carica un'immagine vera chiamata `foto.php`: il tipo reale è `image/jpeg`, quindi viene salvata come `9f3c1a....jpg`. Il nome `.php` scompare.

### Galleria e PRG

Dopo l'esito il programma fa `header("Location: index.php"); exit;` ([POST-Redirect-GET](30-messaggi-flash.md)): ricaricare la pagina non rinvia il file. Le immagini si elencano con `glob(CARTELLA . "*.{jpg,png,gif}", GLOB_BRACE)` e `array_map("basename", ...)`.

!!! warning "Nessuno deve poter eseguire PHP in `uploads/`"
    I controlli riducono il rischio ma non lo azzerano: un file può essere un'immagine valida e contenere anche codice PHP. La difesa finale è sul server: nella cartella degli upload l'esecuzione di PHP dovrebbe essere **disattivata** (con Apache, per esempio, con un file `.htaccess` o con la configurazione dell'host virtuale). Qui il codice salva solo file `.jpg`, `.png` e `.gif`, che il server non esegue.

## Suggerimenti

- Prova a caricare un file di testo rinominato `.png`, un PDF e un'immagine molto grande, e controlla i messaggi.
- `GLOB_BRACE` non è disponibile su tutti i sistemi: se `glob` non trova nulla sul tuo server, elenca la cartella con `scandir` e filtra le estensioni.
- Il messaggio di errore non deve mai mostrare percorsi del server.
- Aggiungi `accept="image/jpeg,image/png,image/gif"` al campo: è solo un aiuto per l'utente, **non** un controllo di sicurezza.
- Estensione: aggiungi un pulsante «Elimina» (solo POST) che rimuove un'immagine, controllando il nome con `basename()`.

## Soluzione

=== "index.php"
    ```php
    --8<-- "PHP/Upload-sicuro/index.php"
    ```

!!! warning "Esegui in locale"
    Richiede un **server web con PHP**, con l'estensione `fileinfo` attiva (lo è nelle installazioni standard), e la cartella `uploads/` deve essere scrivibile dal server web. Copia la cartella `PHP/` nella cartella pubblica del tuo server e apri `Upload-sicuro/index.php` dal browser (vedi [Eseguire PHP in locale](index.md#eseguire-php-in-locale)). Non si può eseguire su OneCompiler.
