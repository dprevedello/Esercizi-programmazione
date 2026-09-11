---
icon: simple/linux
---

# :simple-linux: Linux

**Linux** è il sistema operativo su cui si basano la maggior parte dei server, dei sistemi embedded e degli strumenti di sviluppo professionali. Conoscerne i comandi fondamentali è indispensabile per programmare, amministrare sistemi e automatizzare compiti con gli script (vedi la sezione [Bash](../bash/index.md)).

A differenza delle altre sezioni del sito, questa non propone esercizi da consegnare, ma una guida di riferimento ai comandi principali: consultala mentre scrivi i tuoi script, o usala come ripasso rapido prima di una verifica.

---

## Cosa imparerai

- Muoverti nel filesystem ed esplorarne il contenuto
- Creare, copiare, spostare ed eliminare file e cartelle
- Leggere e modificare permessi e proprietari
- Riconoscere utenti e gruppi in un sistema multiutente
- Collegare comandi tra loro con redirezione e pipe
- Cercare testo e file con `grep` e `find`
- Usare variabili d'ambiente e alias
- Gestire processi e monitorare le risorse del sistema
- I concetti base di rete, gestione pacchetti e compressione dei file

---

## Argomenti disponibili

| # | Pagina | Comandi principali |
|---|--------|---------------------|
| 01 | [Filesystem e navigazione](01-filesystem-e-navigazione.md) | `pwd`, `ls`, `cd`, `file` |
| 02 | [Gestione di file e cartelle](02-gestione-file-e-cartelle.md) | `touch`, `mkdir`, `cp`, `mv`, `rm`, `ln` |
| 03 | [Permessi e proprietari](03-permessi-e-proprietari.md) | `chmod`, `chown`, `chgrp` |
| 04 | [Utenti e gruppi](04-utenti-e-gruppi.md) | `whoami`, `id`, `who`, `su`, `sudo` |
| 05 | [Redirezione e pipe](05-redirezione-e-pipe.md) | `>`, `>>`, `<`, `2>`, `\|` |
| 06 | [Visualizzazione e ricerca testo](06-visualizzazione-e-ricerca-testo.md) | `cat`, `less`, `head`, `tail`, `grep`, `find` |
| 07 | [Variabili d'ambiente e alias](07-variabili-ambiente-e-alias.md) | `env`, `export`, `$PATH`, `alias` |
| 08 | [Processi e risorse di sistema](08-processi-e-risorse.md) | `ps`, `top`, `kill`, `jobs`, `df`, `du`, `free` |
| 09 | [Reti](09-reti.md) | `ip`, `ping`, `curl`, `wget`, `ssh`, `scp` |
| 10 | [Pacchetti e informazioni di sistema](10-pacchetti-e-informazioni-di-sistema.md) | `uname`, `apt`, `dpkg`, `history`, `man` |
| 11 | [Archiviazione e compressione](11-archiviazione-e-compressione.md) | `tar`, `zip`/`unzip`, `gzip`/`gunzip` |

---

## Risorse utili

- [explainshell.com](https://explainshell.com) — spiega comando per comando cosa fa una riga di terminale
- [Linux Command](https://linuxcommand.org) — guida gratuita completa
- [tldr.sh](https://tldr.sh) — versione semplificata delle pagine di manuale, con esempi pratici
