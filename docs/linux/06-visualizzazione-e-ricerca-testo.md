# Visualizzazione e ricerca testo

Comandi per leggere il contenuto di un file senza aprirlo con un editor, e per cercare al suo interno.

## `cat`

Stampa tutto il contenuto di uno o più file, uno dopo l'altro.

```bash
cat file.txt
```

## `less` e `more`

Mostrano un file **una schermata alla volta**, permettendo di scorrerlo con le frecce (utile per file lunghi, a differenza di `cat` che li stampa tutti insieme). `less` è la versione più moderna e flessibile; `more` è quella storica, più limitata. Sono comandi **interattivi**: richiedono un terminale reale, quindi non si prestano a un esempio eseguibile online.

## `head` e `tail`

Mostrano rispettivamente l'**inizio** e la **fine** di un file.

| Comando | Effetto |
|---|---|
| `head -n 5 file.txt` | prime 5 righe |
| `tail -n 5 file.txt` | ultime 5 righe |
| `tail -f file.txt` | segue il file in tempo reale, utile per i log che crescono (richiede un terminale interattivo per essere interrotto con `Ctrl+C`) |

## `grep`

Cerca un testo (o un'espressione regolare) all'interno di uno o più file, stampando le righe che corrispondono.

| Opzione | Effetto |
|---|---|
| `-i` | ignora maiuscole/minuscole |
| `-r` | cerca ricorsivamente in tutte le sottocartelle |
| `-v` | inverte la ricerca: stampa le righe che **non** corrispondono |
| `-c` | conta le righe corrispondenti, invece di stamparle |

```bash
grep -i "errore" log.txt
```

## `find`

Cerca file e cartelle in base al nome, al tipo o ad altri criteri, esplorando ricorsivamente l'albero delle cartelle.

| Opzione | Effetto |
|---|---|
| `-name "pattern"` | cerca per nome (supporta i jolly, es. `"*.txt"`) |
| `-type f` / `-type d` | filtra solo per file (`f`) o solo per cartelle (`d`) |

```bash
find . -name "*.log"
```

## Prova tu

<div class="oc-embed"
     data-path="Linux/06-Visualizzazione-e-ricerca-testo/demo.sh"
     data-lang="bash"
     data-autorun="true">
</div>
