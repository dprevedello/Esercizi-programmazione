# Cruscotto di sistema

Scrivi uno script Bash che generi un cruscotto testuale con lo stato generale del sistema: utente corrente, versione del sistema operativo, processi attivi, memoria disponibile e spazio su disco, tutto raccolto in un unico file di report.

## Obiettivo

Costruire un report testuale che raccolga in un solo file più informazioni di sistema: utente, versione del sistema operativo, processi attivi, memoria disponibile e spazio su disco.

## Descrizione

Questo script mette insieme diversi comandi già visti nella sezione [Linux](../linux/index.md) — `whoami`, `uname`, `ps`, `free`, `df`, `du` — raggruppandone l'output con `{ ... } > file` (vista nell'esercizio "Report di sistema") in un'unica sezione ben organizzata, con intestazioni che separano visivamente le diverse informazioni.

## Suggerimenti

- Costruisci il report un pezzo alla volta: verifica prima che ogni singolo comando funzioni da solo, poi assemblali dentro il blocco `{ ... }`.
- `2>/dev/null` dopo un comando (come `free` o `df`) scarta un eventuale messaggio di errore, utile se quel comando non fosse disponibile in un dato ambiente.
- Estensione: aggiungi al cruscotto anche la lista degli utenti collegati con `who`, o il contenuto della cartella corrente con `ls`.

## Soluzione

```bash
--8<-- "Bash/Cruscotto-di-sistema/main.sh"
```

<div class="oc-embed"
     data-path="Bash/Cruscotto-di-sistema/main.sh"
     data-lang="bash"
     data-autorun="true">
</div>
