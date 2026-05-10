# Somma dei primi 12 numeri naturali

Il programma calcola la somma dei primi 12 numeri naturali (da 1 a 12) utilizzando un ciclo `for`.

## Obiettivo

Calcolare e stampare il valore di \(1 + 2 + 3 + \ldots + 12\) tramite un ciclo.

## Descrizione

Questo esercizio introduce l'uso del ciclo `for` per accumulare una somma. Si parte da una variabile `somma` inizializzata a 0 e si aggiunge il valore del contatore a ogni iterazione.

Il risultato atteso è \(78\), ottenibile anche con la formula di Gauss: \(\frac{n(n+1)}{2} = \frac{12 \cdot 13}{2} = 78\).

## Suggerimenti

- Dichiara una variabile `int somma = 0` prima del ciclo.
- Il ciclo `for` deve iterare con `i` che va da 1 a 12 incluso.
- All'interno del ciclo, aggiorna la somma con `somma += i`.
- Dopo il ciclo, stampa il risultato con `printf`.

## Soluzione

```c
--8<-- "C/Somma-dei-primi-12-numeri-naturali/main.c"
```

<div class="oc-embed"
     data-path="C/Somma-dei-primi-12-numeri-naturali/main.c"
     data-lang="c"
     data-autorun="true">
</div>
