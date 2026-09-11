# Statistiche su CSV con awk

Scrivi uno script Bash che, dato un file CSV con nomi e voti, calcoli e stampi la media dei voti.

## Obiettivo

Dato un file CSV con nomi e voti, calcolare e stampare la media dei voti.

## Descrizione

**`awk`** è un linguaggio pensato per elaborare testo organizzato in "campi" (colonne). Ogni riga in input viene confrontata con uno o più pattern; per ognuno che corrisponde viene eseguita l'azione associata, scritta tra `{ }`:

```bash
awk -F',' 'pattern { azione }' file.csv
```

- **`-F','`** imposta la virgola come separatore di campo (per un CSV).
- **`$1`, `$2`, ...** rappresentano il primo, secondo, ... campo della riga corrente.
- **`NR`** (Number of Record) è il numero della riga corrente: `NR>1` esclude la riga di intestazione.
- Il blocco **`END { ... }`** viene eseguito una sola volta, dopo aver letto tutte le righe: è il punto giusto per stampare un totale o una media.

## Suggerimenti

- Le variabili create dentro `awk` (come `somma` e `conta`) non richiedono dichiarazione: partono automaticamente da `0`.
- `NR>1` è un pattern come un altro: significa "esegui l'azione solo se il numero di riga è maggiore di 1".
- Prova ad aggiungere un secondo blocco `END` che stampi anche il voto più alto, usando la stessa idea vista negli esercizi sugli array.

## Soluzione

```bash
--8<-- "Bash/Statistiche-csv-awk/main.sh"
```

<div class="oc-embed"
     data-path="Bash/Statistiche-csv-awk/main.sh"
     data-lang="bash"
     data-autorun="true">
</div>
