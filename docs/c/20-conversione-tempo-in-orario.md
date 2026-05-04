# Conversione tempo in orario

Il programma riceve dall'utente un tempo espresso in secondi e lo converte nel formato ore, minuti e secondi (```hh:mm:ss```).

## Obiettivo

Leggere un numero intero di secondi da tastiera e stampare il corrispondente orario nel formato `hh:mm:ss`.

## Descrizione

Per convertire un totale di secondi nel formato orario si sfruttano la divisione intera (`/`) e l'operatore modulo (`%`):

- **Ore**: `secondi / 3600`
- **Minuti**: `(secondi % 3600) / 60`
- **Secondi rimanenti**: `secondi % 60`

Ad esempio, 3723 secondi corrispondono a 1 ora, 2 minuti e 3 secondi (01:02:03).

## Suggerimenti

- Usa la divisione intera `/` e l'operatore modulo `%` per estrarre le tre componenti.
- Per la stampa nel formato `hh:mm:ss` usa il formato `%02d` in `printf`: il `2` indica la larghezza minima e lo `0` riempie con zeri a sinistra (es. `5` diventa `05`).
- Verifica che il valore in ingresso sia non negativo: un numero di secondi negativo non ha senso fisico.
- Testa con i valori 0, 59, 60, 3600 e 86399 (23:59:59, l'ultimo secondo della giornata).

## Soluzione

```c
--8<-- "C/Conversione-tempo-in-orario/main.c"
```

<div class="oc-embed"
     data-path="C/Conversione-tempo-in-orario/main.c"
     data-lang="c">
</div>
