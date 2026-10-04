# Caricare un file

Scrivi `index.php`, una pagina che permette di caricare un documento sul server. Il modulo ha un solo campo `documento` di tipo file e invia la richiesta con il metodo POST. Quando arriva un file, la pagina controlla in ordine: che `$_FILES` contenga il campo, che il codice di errore sia `UPLOAD_ERR_OK`, che la dimensione non superi 2 MB, che il nome (ripulito) abbia un'estensione ammessa tra `pdf`, `txt`, `png`, `jpg` e `jpeg`, e che nella cartella `uploads/` non esista già un file con lo stesso nome. Se tutto va bene sposta il file in `uploads/` e mostra un messaggio di conferma, altrimenti spiega il motivo del rifiuto. Sotto il modulo la pagina stampa con `print_r` il contenuto di `$_FILES` dell'ultimo invio e l'elenco dei file già caricati, ciascuno con un link e la dimensione in KB. La cartella `uploads/` esiste già (contiene solo un segnaposto `.gitkeep`) e non serve alcun database.

## Obiettivo

Ricevere un file da un modulo, capire che cosa contiene `$_FILES` e salvarlo sul server controllando nome, dimensione ed estensione.

## Anteprima

```
+---------------------------------------------------+
| Carica un documento                               |
| [ File «relazione.pdf» caricato. ]                |
| File (PDF, TXT, PNG, JPG - massimo 2 MB)          |
| [ Scegli file ]  [ Carica ]                       |
|                                                   |
| Che cosa è arrivato in $_FILES                    |
|  Array ( [name] => relazione.pdf                  |
|          [type] => application/pdf                |
|          [tmp_name] => /tmp/phpA1b2C3             |
|          [error] => 0   [size] => 48213 )        |
|                                                   |
| File caricati (1)                                 |
|  - relazione.pdf (47,1 KB)                        |
+---------------------------------------------------+
```

## Struttura

| File | Ruolo |
|------|-------|
| `index.php` | modulo, controlli, salvataggio ed elenco dei file (da scrivere) |
| `uploads/` | cartella di destinazione, già presente: deve essere scrivibile dal server web |

## Descrizione

### Il modulo per i file

Per inviare un file il modulo deve usare il metodo `post` e l'attributo `enctype="multipart/form-data"`. Senza quest'ultimo il browser invia solo il nome del file, non il contenuto.

```php
<form method="post" action="index.php" enctype="multipart/form-data">
    <input type="file" id="documento" name="documento">
    <button type="submit">Carica</button>
</form>
```

### Il vettore `$_FILES`

I file non finiscono in `$_POST` ma in `$_FILES["documento"]`, un array con cinque elementi: `name` (nome originale sul computer dell'utente), `type` (tipo MIME dichiarato dal browser), `tmp_name` (percorso del file temporaneo sul server), `error` (codice di errore) e `size` (dimensione in byte). PHP salva il file in una cartella temporanea e lo cancella a fine richiesta: tocca a te spostarlo con `move_uploaded_file($tmp_name, $destinazione)`, l'unica funzione che accetta solo file arrivati davvero da un upload.

### I codici di errore

`error` vale `UPLOAD_ERR_OK` (0) se è tutto a posto. Gli altri valori sono costanti `UPLOAD_ERR_*`: `UPLOAD_ERR_INI_SIZE` (supera `upload_max_filesize`), `UPLOAD_ERR_PARTIAL`, `UPLOAD_ERR_NO_FILE` (campo lasciato vuoto), `UPLOAD_ERR_NO_TMP_DIR`, `UPLOAD_ERR_CANT_WRITE`. Un array che associa il codice al messaggio è il modo più comodo per rispondere all'utente.

!!! warning "I limiti di php.ini"
    Le direttive `upload_max_filesize` e `post_max_size` fissano la dimensione massima di un file e dell'intera richiesta. Se la richiesta supera `post_max_size`, PHP la scarta **per intero**: `$_FILES` e `$_POST` arrivano vuoti e nessun codice di errore ti avvisa. Per questo la pagina controlla anche che `$_FILES["documento"]` esista prima di leggerlo.

### Il nome del file lo decide l'utente

`$_FILES["documento"]["name"]` è scelto da chi carica il file e può contenere percorsi come `../../index.php`. Prima di usarlo:

```php
$nome = basename($infoFile["name"]);                 // toglie ogni percorso
$nome = preg_replace('/[^A-Za-z0-9._-]/', "_", $nome); // tiene solo caratteri sicuri
$estensione = strtolower(pathinfo($nome, PATHINFO_EXTENSION));
```

Poi si confronta l'estensione con una **whitelist** (elenco di ciò che è ammesso) usando `in_array($estensione, ESTENSIONI, true)`: è più sicuro che elencare ciò che è vietato, perché una blacklist dimentica sempre qualcosa. Controlla infine con `file_exists` che il nome non sia già in uso, altrimenti un nuovo file sovrascriverebbe silenziosamente uno esistente.

!!! warning "L'estensione da sola non basta"
    Un file chiamato `foto.png` può contenere qualsiasi cosa, perché nome e `type` sono dichiarati dal client. Questo esercizio usa solo l'estensione per semplicità; nell'[esercizio successivo](49-upload-sicuro.md) controllerai il contenuto reale. E non permettere mai di caricare file `.php`: se finissero in una cartella pubblica, il server li **eseguirebbe** quando qualcuno apre il loro indirizzo.

## Suggerimenti

- Per provare gli errori, scegli un file più grande di 2 MB, un file `.exe` e un file con lo stesso nome già caricato.
- Stampa `$_FILES` con `print_r` dentro `<pre>`, passando il risultato a `htmlspecialchars`: il nome del file è un input dell'utente.
- Per l'elenco dei file usa `scandir()` e salta le voci che iniziano con il punto; `filesize()` dà la dimensione.
- Nel link al file usa `rawurlencode()` per il nome, `htmlspecialchars()` per il testo.
- Estensione: rinomina il file salvato aggiungendo un contatore (`relazione-2.pdf`) invece di rifiutarlo quando il nome esiste già.

## Soluzione

=== "index.php"
    ```php
    --8<-- "PHP/Upload-file/index.php"
    ```

!!! warning "Esegui in locale"
    Richiede un **server web con PHP**, e la cartella `uploads/` deve essere scrivibile dal server web. Copia la cartella `PHP/` nella cartella pubblica del tuo server e apri `Upload-file/index.php` dal browser (vedi [Eseguire PHP in locale](index.md#eseguire-php-in-locale)). Non si può eseguire su OneCompiler.
