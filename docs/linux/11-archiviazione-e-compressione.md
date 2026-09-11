# Archiviazione e compressione

Comandi per raggruppare più file in un unico archivio e per ridurne le dimensioni tramite compressione: utili per backup, invii e download.

## `tar`

Crea o estrae un **archivio** (un unico file che ne contiene molti altri), tradizionalmente abbinato alla compressione gzip (estensione `.tar.gz`, spesso abbreviata `.tgz`).

| Opzione | Significato |
|---|---|
| `-c` | crea un nuovo archivio |
| `-x` | estrae un archivio esistente |
| `-z` | comprimi/decomprimi con gzip |
| `-v` | modalità **v**erbosa: elenca i file via via processati |
| `-f nome_archivio` | indica il nome del file archivio (quasi sempre presente, per ultima) |

```bash
tar -czvf archivio.tar.gz cartella/     # crea
tar -xzvf archivio.tar.gz -C destinazione/   # estrae in "destinazione"
```

## `zip` e `unzip`

Creano ed estraggono archivi in formato `.zip`, lo stesso usato da Windows e macOS — comodo quando i file devono essere condivisi anche con chi non usa Linux.

```bash
zip -r archivio.zip cartella/
unzip archivio.zip -d destinazione/
```

## `gzip` e `gunzip`

Comprimono un **singolo file** (a differenza di `tar`/`zip`, non raggruppano più file insieme). Il file compresso ha lo stesso nome dell'originale, con `.gz` in più.

| Opzione | Effetto |
|---|---|
| `-k` | mantiene (**k**eep) il file originale invece di sostituirlo con la versione compressa |

```bash
gzip file.txt        # crea file.txt.gz e rimuove l'originale
gzip -k file.txt      # crea file.txt.gz mantenendo anche file.txt
gunzip file.txt.gz    # decomprime, ripristinando file.txt
```

## Prova tu

<div class="oc-embed"
     data-path="Linux/11-Archiviazione-e-compressione/demo.sh"
     data-lang="bash"
     data-autorun="true">
</div>
