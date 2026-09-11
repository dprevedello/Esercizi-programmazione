# Organizzatore di file per estensione

Scrivi uno script Bash che, dati alcuni file con estensioni diverse in una cartella, li organizzi automaticamente creando una sottocartella per ciascuna estensione e spostandovi i file corrispondenti.

## Obiettivo

Dati alcuni file con estensioni diverse in una cartella, organizzarli automaticamente creando una sottocartella per ciascuna estensione e spostandovi i file corrispondenti.

## Descrizione

Per estrarre l'estensione da un nome di file si usa il **parameter expansion** `${variabile##pattern}`, che rimuove dalla stringa la porzione più lunga possibile che corrisponde al pattern, partendo dall'inizio:

```bash
estensione="${file##*.}"
```

`*.` corrisponde a "tutto ciò che precede l'ultimo punto": il risultato è quindi solo l'estensione (es. `txt`, `jpg`).

Il comando **`find`** cerca file e cartelle che soddisfano certe condizioni; `find . -type f` elenca ricorsivamente tutti i **file** (non le cartelle) a partire dalla posizione corrente.

## Suggerimenti

- `[ -f "$file" ] || continue` è un modo compatto per dire "se non è un file, salta al prossimo elemento del ciclo": utile per ignorare le sottocartelle già create.
- `mkdir -p` non genera errore se la cartella di destinazione esiste già, quindi puoi richiamarlo a ogni iterazione senza controlli aggiuntivi.
- Estensione: modifica lo script per gestire anche i file senza estensione, che altrimenti finirebbero in una cartella con lo stesso nome del file.

## Soluzione

```bash
--8<-- "Bash/Organizzatore-file-estensione/main.sh"
```

<div class="oc-embed"
     data-path="Bash/Organizzatore-file-estensione/main.sh"
     data-lang="bash"
     data-autorun="true">
</div>
