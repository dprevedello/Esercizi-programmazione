# Generazione numeri casuali

Il programma genera un numero casuale per ciascuno dei sei intervalli specificati e ne stampa il valore.

## Obiettivo

Generare e stampare un numero casuale per ciascuno dei seguenti intervalli:

1. \([0,\ 100)\) — intero, 0 incluso, 100 escluso
2. \([10,\ 100)\) — intero, 10 incluso, 100 escluso
3. \([10,\ 100]\) — intero, 10 incluso, 100 incluso
4. \([-50,\ 100)\) — intero, -50 incluso, 100 escluso
5. \([0{,}00,\ 1{,}00]\) — numero reale tra 0 e 1
6. \([10\,000,\ 100\,000]\) — numero reale tra 10 000 e 100 000

## Descrizione

La funzione `rand()` della libreria `<stdlib.h>` restituisce un intero pseudo-casuale nell'intervallo \([0,\ RAND\_MAX]\). Per ottenere numeri in un intervallo arbitrario si usa l'operatore modulo `%` e uno scostamento. Per i numeri reali si divide il risultato di `rand()` per `(double)RAND_MAX`.

La formula generale per un intero in \([a,\ b]\) è:

\( n = rand() \% (b - a + 1) + a \)

## Suggerimenti

- Includi `<stdlib.h>` e `<time.h>`, e chiama `srand(time(NULL))` all'inizio del `main` per avere sequenze diverse a ogni esecuzione.
- Per l'intervallo semiaperto \([a,\ b)\), usa `rand() % (b - a) + a`.
- Per un reale in \([0,\ 1]\), usa `(double)rand() / RAND_MAX`.
- Per scalare il reale in \([min,\ max]\), usa `min + (double)rand() / RAND_MAX * (max - min)`.

## Soluzione

```c
--8<-- "C/Generazione-numeri-casuali/main.c"
```

<div class="oc-embed"
     data-path="C/Generazione-numeri-casuali/main.c"
     data-lang="c">
</div>
