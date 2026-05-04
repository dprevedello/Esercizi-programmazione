# Somma numeri da 10 a 20

Il programma calcola la somma di tutti i numeri interi compresi tra 10 e 20 (estremi inclusi).

## Obiettivo

Calcolare e stampare il valore di \(10 + 11 + 12 + \ldots + 20\) tramite un ciclo `for`.

## Descrizione

Questo esercizio è una variante del precedente: il ciclo non parte da 1 ma da un valore diverso da zero. Il risultato atteso è \(165\).

## Suggerimenti

- Dichiara una variabile `int somma = 0` prima del ciclo.
- Il ciclo `for` deve iterare con `i` che parte da 10 e arriva a 20 incluso.
- La condizione di uscita è `i <= 20`.
- Prova a verificare il risultato con la formula di Gauss applicata all'intervallo: \(\frac{(10 + 20) \cdot 11}{2} = 165\).

## Soluzione

```c
--8<-- "C/Somma-numeri-da-10-a-20/main.c"
```

<div class="oc-embed"
     data-path="C/Somma-numeri-da-10-a-20/main.c"
     data-lang="c">
</div>
