# Top N righe con sort e uniq

Scrivi uno script Bash che, dato un testo, individui le tre parole più frequenti e quante volte compare ciascuna.

## Obiettivo

Dato un testo, individuare le tre parole più frequenti e quante volte compaiono ciascuna.

## Descrizione

Questo esercizio combina più comandi in una sola pipeline, ognuno dei quali trasforma l'output del precedente:

```bash
tr ' ' '\n' < file | sort | uniq -c | sort -rn | head -n 3
```

- **`tr ' ' '\n'`** sostituisce ogni spazio con un a capo, mettendo così ogni parola su una riga separata.
- **`sort`** ordina le righe in ordine alfabetico: è un passaggio necessario, perché `uniq` riconosce solo duplicati **consecutivi**.
- **`uniq -c`** conta quante volte ogni riga (parola) consecutiva si ripete, e la fa precedere dal conteggio.
- **`sort -rn`** riordina per il conteggio, in modo numerico (`-n`) e decrescente (`-r`).
- **`head -n 3`** mantiene solo le prime tre righe del risultato.

## Suggerimenti

- Prova a eseguire la pipeline un pezzo alla volta (es. solo fino a `sort`) per capire come cambia l'output a ogni passaggio.
- `uniq` **senza** un `sort` prima darebbe un risultato sbagliato: verificalo togliendo temporaneamente il primo `sort`.
- `head -n N` mostra le prime N righe; il comando gemello `tail -n N` mostra invece le ultime N.

## Soluzione

```bash
--8<-- "Bash/Top-n-sort-uniq/main.sh"
```

<div class="oc-embed"
     data-path="Bash/Top-n-sort-uniq/main.sh"
     data-lang="bash"
     data-autorun="true">
</div>
