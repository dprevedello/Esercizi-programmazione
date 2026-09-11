# Backup con timestamp

Scrivi uno script Bash che, dato un file, ne crei una copia di backup il cui nome contenga la data e l'ora correnti.

## Obiettivo

Dato un file, creare una copia di backup il cui nome contenga un timestamp (data e ora correnti).

## Descrizione

Il comando **`date`** stampa la data e l'ora correnti; con l'opzione `+"formato"` puoi personalizzarne l'aspetto:

```bash
timestamp=$(date +"%Y%m%d_%H%M%S")
```

`%Y%m%d_%H%M%S` produce qualcosa come `20260909_143205` (anno, mese, giorno, ora, minuti, secondi).

Per costruire il nome del backup senza l'estensione originale si usa il **parameter expansion** `${variabile%suffisso}`, che rimuove il suffisso indicato dalla fine della stringa, se presente:

```bash
backup="${file%.txt}_$timestamp.txt"
```

Il comando **`cp sorgente destinazione`** copia un file, lasciando invariato l'originale.

## Suggerimenti

- `${file%.txt}` toglie `.txt` solo se è effettivamente alla fine del nome; su un file senza quell'estensione la stringa resta invariata.
- Esegui `man date` (in un terminale reale) per l'elenco completo dei simboli di formattazione disponibili.
- Estensione: prova a spostare i backup in una sottocartella dedicata invece di lasciarli accanto all'originale.

## Soluzione

```bash
--8<-- "Bash/Backup-con-timestamp/main.sh"
```

<div class="oc-embed"
     data-path="Bash/Backup-con-timestamp/main.sh"
     data-lang="bash"
     data-autorun="true">
</div>
