# Operazioni su numeri casuali

Generare 100 numeri casuali tra 0 e 1000 e calcolare minimo, massimo, media e somma dei valori ottenuti.

## Obiettivo

Il programma deve generare automaticamente 100 numeri interi casuali compresi tra 0 e 1000, quindi calcolare e stampare: il valore minimo, il valore massimo, la somma totale e la media aritmetica dei numeri generati.

## Descrizione

Per generare numeri casuali in C si utilizzano le funzioni `rand()` e `srand()` della libreria `<stdlib.h>`. È buona prassi inizializzare il generatore con `srand(time(NULL))` (dalla libreria `<time.h>`) in modo che la sequenza sia diversa ad ogni esecuzione.

Il minimo e il massimo si trovano scorrendo il vettore e aggiornando le variabili di appoggio ogni volta che si trova un valore più piccolo o più grande. La media si ottiene dividendo la somma totale per il numero di elementi.

## Suggerimenti

- Inizializza il generatore di numeri casuali con `srand(time(NULL))` prima del ciclo, altrimenti otterrai sempre la stessa sequenza.
- Per ottenere un numero casuale nell'intervallo [0, 1000] usa la formula `rand() % 1001`.
- Inizializza `min` e `max` con il primo elemento generato, non con valori arbitrari come 0 o 9999.
- Usa un unico ciclo `for` per generare i numeri e aggiornare contemporaneamente somma, minimo e massimo.

## Soluzione

```c
--8<-- "C/Operazioni-su-numeri-casuali/main.c"
```

<div class="oc-embed"
     data-path="C/Operazioni-su-numeri-casuali/main.c"
     data-lang="c">
</div>
