# Filesystem e navigazione

Il filesystem Linux è organizzato ad albero, con un'unica radice (`/`). Questi comandi permettono di orientarsi tra le cartelle e di scoprire cosa contengono.

## `pwd`

Stampa il percorso della cartella in cui ci si trova (**p**rint **w**orking **d**irectory).

```bash
pwd
```

## `ls`

Elenca il contenuto di una cartella.

**Sintassi**: `ls [opzioni] [cartella]`

| Opzione | Effetto |
|---|---|
| `-l` | formato lungo (permessi, proprietario, dimensione, data) |
| `-a` | mostra anche i file nascosti (che iniziano con `.`) |
| `-h` | dimensioni "leggibili" (KB, MB...) invece che in byte |

```bash
ls -la
```

## `cd`

Cambia la cartella corrente (**c**hange **d**irectory).

| Comando | Effetto |
|---|---|
| `cd cartella` | entra in `cartella` (percorso relativo) |
| `cd /percorso/assoluto` | entra in un percorso assoluto, a partire dalla radice |
| `cd ..` | sale alla cartella superiore |
| `cd ~` | va nella home dell'utente |
| `cd -` | torna alla cartella precedente |

## `file`

Indica il tipo di contenuto di un file (testo, script, immagine, eseguibile...), indipendentemente dalla sua estensione.

```bash
file main.py
```

## Un cenno a `tree`

Il comando `tree` mostra la struttura ad albero di una cartella e delle sue sottocartelle. Non è sempre installato di default: se manca, su Debian/Ubuntu si installa con `sudo apt install tree`.

## Prova tu

<div class="oc-embed"
     data-path="Linux/01-Filesystem-e-navigazione/demo.sh"
     data-lang="bash"
     data-autorun="true">
</div>
