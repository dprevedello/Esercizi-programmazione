---
icon: simple/gnubash
---

# :simple-gnubash: Bash

**Bash** (Bourne Again SHell) è la shell predefinita di Linux e macOS. Scrivere
script Bash significa automatizzare operazioni da riga di comando: copiare
file, elaborare testo, eseguire programmi in sequenza e molto altro.

È un ottimo punto di partenza per capire come funziona un sistema operativo
"dietro le quinte": a differenza di C e Java, qui non si compila nulla, si
combinano comandi già esistenti per costruire strumenti nuovi.

---

## Cosa imparerai

- Struttura di uno script: shebang, commenti, esecuzione
- Variabili, input da tastiera (`read`) e parametri posizionali (`$1`, `$#`, `$@`)
- Strutture di controllo: `if`/`elif`/`else`, `case`, cicli `for`, `while`, `until`
- Stringhe e array: lunghezza, sottostringhe, iterazione, `IFS`
- Lettura e scrittura di file, redirezione (`>`, `>>`, `<`) e pipe (`|`)
- Filtri di testo: `grep`, `sed`, `awk`, `sort`, `uniq`
- Funzioni: parametri, variabili `local`, valori di ritorno, ricorsione
- Script robusti: `set -e`, `trap`, codici di uscita
- Uso combinato di comandi Linux (permessi, processi, ricerca file) dentro gli script

---

## Compilare ed eseguire

Uno script Bash non va compilato: basta renderlo eseguibile ed eseguirlo.

```bash
chmod +x script.sh
./script.sh

# in alternativa, senza modificare i permessi:
bash script.sh
```

!!! note "Bash su Windows"
    Su Windows Bash non è disponibile nativamente: puoi usare **WSL** (Windows
    Subsystem for Linux), **Git Bash** (incluso in [Git for Windows](https://gitforwindows.org))
    oppure eseguire gli esempi direttamente nell'editor OneCompiler integrato in ogni pagina.

---

## Esercizi disponibili

### 1. Fondamentali :material-console-line:

| # | Esercizio | Argomento | Difficoltà |
|---|-----------|-----------|------------|
| 01 | [Hello World](01-hello-world.md) | Shebang, `echo`, permessi di esecuzione | :material-circle-outline: Base |
| 02 | [Variabili e concatenazione](02-variabili-e-concatenazione.md) | Assegnazione, `$variabile`, interpolazione in stringhe | :material-circle-outline: Base |
| 03 | [Input con read](03-input-con-read.md) | `read`, `read -p` | :material-circle-outline: Base |
| 04 | [Argomenti posizionali](04-argomenti-posizionali.md) | `$0`, `$1`, `$#`, `$@`, `set --` | :material-circle-slice-4: Intermedio |

### 2. Condizioni :material-account-question:

| # | Esercizio | Argomento | Difficoltà |
|---|-----------|-----------|------------|
| 05 | [Pari o dispari](05-pari-o-dispari.md) | `if`/`else`, `(( ))`, operatore `%` | :material-circle-outline: Base |
| 06 | [Maggiore fra due numeri](06-maggiore-fra-due-numeri.md) | `if`/`elif`/`else` | :material-circle-outline: Base |
| 07 | [Test file esistente](07-test-file-esistente.md) | `[ -f ]`, `[ -d ]`, `mkdir -p` | :material-circle-outline: Base |
| 08 | [Validazione argomenti script](08-validazione-argomenti-script.md) | `$#`, `[[ =~ ]]` (regex), `exit` | :material-circle-slice-4: Intermedio |

### 3. Cicli :fontawesome-solid-repeat:

| # | Esercizio | Argomento | Difficoltà |
|---|-----------|-----------|------------|
| 09 | [Somma di una sequenza](09-somma-di-una-sequenza.md) | `for (( ; ; ))`, accumulatore, `$(( ))` | :material-circle-outline: Base |
| 10 | [Ciclo for sui file di una cartella](10-ciclo-for-sui-file.md) | `for file in cartella/*`, `basename` | :material-circle-outline: Base |
| 11 | [Conto alla rovescia con while](11-conto-alla-rovescia.md) | `while`, decremento manuale | :material-circle-outline: Base |
| 12 | [Menù interattivo con until](12-menu-interattivo.md) | `until`, `case`, `read -p` in ciclo | :material-circle-slice-4: Intermedio |

### 4. Stringhe e array :material-format-list-bulleted:

| # | Esercizio | Argomento | Difficoltà |
|---|-----------|-----------|------------|
| 13 | [Palindromo](13-palindromo.md) | `${#stringa}`, `${stringa:i:1}`, `+=` | :material-circle-slice-4: Intermedio |
| 14 | [Conteggio parole di una frase](14-conteggio-parole.md) | Word splitting, array da stringa | :material-circle-outline: Base |
| 15 | [Array e iterazione](15-array-e-iterazione.md) | Array indicizzati, `"${array[@]}"`, `${#array[@]}` | :material-circle-slice-4: Intermedio |
| 16 | [Split di una stringa con IFS](16-split-stringa-ifs.md) | `IFS`, here-string `<<<`, `read` multiplo | :material-circle-slice-4: Intermedio |

### 5. File e redirezione :material-file-swap-outline:

| # | Esercizio | Argomento | Difficoltà |
|---|-----------|-----------|------------|
| 17 | [Lettura riga per riga](17-lettura-riga-per-riga.md) | `while IFS= read -r`, redirezione `< file` | :material-circle-slice-4: Intermedio |
| 18 | [Conteggio righe e parole di un file](18-conteggio-righe-parole-file.md) | `wc -l`, `wc -w`, `wc -c` | :material-circle-outline: Base |
| 19 | [Backup con timestamp](19-backup-con-timestamp.md) | `date +formato`, `${var%suffisso}`, `cp` | :material-circle-slice-4: Intermedio |
| 20 | [Log rotator semplice](20-log-rotator-semplice.md) | Redirezione `>>`, `mv`, rotazione file | :material-circle: Avanzato |

### 6. Filtri e pipe :material-filter-variant:

| # | Esercizio | Argomento | Difficoltà |
|---|-----------|-----------|------------|
| 21 | [Ricerca in un file con grep](21-ricerca-con-grep.md) | `grep`, pipe `\|`, filtri concatenati | :material-circle-outline: Base |
| 22 | [Sostituzione testo con sed](22-sostituzione-con-sed.md) | `sed 's/.../.../'`, opzione `-i` | :material-circle-slice-4: Intermedio |
| 23 | [Statistiche su CSV con awk](23-statistiche-csv-awk.md) | `awk`, `-F`, `NR`, `END { }` | :material-circle: Avanzato |
| 24 | [Top N righe con sort e uniq](24-top-n-sort-uniq.md) | `tr`, `sort`, `uniq -c`, `head` | :material-circle-slice-4: Intermedio |

### 7. Funzioni :material-function-variant:

| # | Esercizio | Argomento | Difficoltà |
|---|-----------|-----------|------------|
| 25 | [Funzione di validazione input](25-funzione-validazione-input.md) | `nome() { }`, `local`, `return` come booleano | :material-circle-slice-4: Intermedio |
| 26 | [Libreria di funzioni di utilità](26-libreria-funzioni-utility.md) | Più funzioni, `$(funzione)` come valore di ritorno | :material-circle-slice-4: Intermedio |
| 27 | [Fattoriale ricorsivo](27-fattoriale-ricorsivo.md) | Funzione ricorsiva, caso base e caso ricorsivo | :material-circle: Avanzato |

### 8. Script avanzati :material-rocket-launch:

| # | Esercizio | Argomento | Difficoltà |
|---|-----------|-----------|------------|
| 28 | [Gestione errori con trap](28-gestione-errori-trap.md) | `set -e`, `trap ... EXIT`, `>&2` | :material-circle: Avanzato |
| 29 | [Organizzatore di file per estensione](29-organizzatore-file-estensione.md) | `${file##*.}`, `find`, organizzazione file | :material-circle: Avanzato |
| 30 | [Monitor spazio disco](30-monitor-spazio-disco.md) | `du -sk`, `cut -f1`, soglie di allarme | :material-circle-slice-4: Intermedio |
| 31 | [Backup automatico con controllo argomenti](31-backup-automatico-argomenti.md) | Sintesi: validazione, backup, codici di uscita multipli | :material-circle: Avanzato |

### 9. Comandi di sistema in pipeline :material-console-network:

Esercizi che riprendono i comandi presentati nella sezione [Linux](../linux/index.md) — permessi, processi, ricerca file, informazioni di sistema — usandoli dentro veri script, in progressione dal più semplice al più complesso.

| # | Esercizio | Argomento | Difficoltà |
|---|-----------|-----------|------------|
| 32 | [Esplora una cartella](32-esplora-una-cartella.md) | `file`, `basename`, ciclo `for` su `cartella/*` | :material-circle-outline: Base |
| 33 | [Copia con permessi corretti](33-copia-con-permessi-corretti.md) | `cp`, `chmod`, verifica dei permessi con `ls -l` | :material-circle-slice-4: Intermedio |
| 34 | [Report di sistema](34-report-di-sistema.md) | `date`, `whoami`, `uname`, `du -sh`, redirezione con `{ } >` | :material-circle-slice-4: Intermedio |
| 35 | [Ricerca avanzata con find](35-ricerca-avanzata-con-find.md) | `find -name`, `find -exec`, cenno a `xargs` | :material-circle-slice-4: Intermedio |
| 36 | [Monitor processi](36-monitor-processi.md) | `ps aux`, `grep`, `awk`, `kill` | :material-circle: Avanzato |
| 37 | [Cruscotto di sistema](37-cruscotto-di-sistema.md) | Sintesi: `ps`, `free`, `df`, `du` in un unico report | :material-circle: Avanzato |

---

## Risorse utili

- [Bash Guide for Beginners](https://tldp.org/LDP/Bash-Beginners-Guide/html/) — guida gratuita e completa
- [explainshell.com](https://explainshell.com) — decostruisce qualsiasi comando
- [shellcheck.net](https://www.shellcheck.net) — controlla errori nel tuo script
