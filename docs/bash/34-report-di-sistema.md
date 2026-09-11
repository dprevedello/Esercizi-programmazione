# Report di sistema

Scrivi uno script Bash che generi un file di report con alcune informazioni di base sul sistema: data e ora, utente corrente, versione del sistema operativo e spazio occupato dalla cartella di lavoro.

## Obiettivo

Raccogliere in un unico file di testo alcune informazioni di sistema (data, utente, versione del sistema operativo, spazio occupato), usando i comandi visti nella sezione [Linux](../linux/index.md).

## Descrizione

Per raggruppare l'output di più comandi e reindirizzarlo **una sola volta** su un file, si possono racchiudere tutti i comandi tra parentesi graffe:

```bash
{
    echo "riga 1"
    comando_qualsiasi
} > file.txt
```

Senza le parentesi graffe, servirebbe ripetere `> file.txt` (o peggio, `>>`) dopo ogni singolo comando, con il rischio di sovrascrivere il file più volte per errore.

Il report combina alcuni comandi già visti: `date` con un formato personalizzato, `whoami`, `uname` (con le opzioni `-s` per il nome del sistema e `-r` per la versione del kernel) e `du -sh`.

## Suggerimenti

- Le parentesi graffe `{ ... }` richiedono uno spazio dopo `{` e un punto e virgola (o un a capo) prima di `}`.
- `$(comando)` dentro una stringa tra virgolette esegue il comando e ne inserisce l'output al suo posto: è così che il report include data, utente e versione del sistema nello stesso `echo`.
- Estensione: aggiungi al report anche l'elenco dei file nella cartella corrente, con `ls`.

## Soluzione

```bash
--8<-- "Bash/Report-di-sistema/main.sh"
```

<div class="oc-embed"
     data-path="Bash/Report-di-sistema/main.sh"
     data-lang="bash"
     data-autorun="true">
</div>
