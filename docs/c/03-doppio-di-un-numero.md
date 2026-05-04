# Doppio di un numero

Dato un numero inserito dall'utente, il programma calcola e visualizza il suo doppio.

## Obiettivo

Leggere un valore numerico da tastiera e stampare il risultato della moltiplicazione per 2.

## Descrizione

Il doppio di un numero \(n\) è semplicemente:

$$d = 2 \cdot n$$

L'esercizio introduce la lettura di un valore con `scanf()`, l'esecuzione di un'operazione aritmetica elementare e la stampa del risultato con `printf()`.

## Suggerimenti

- Usa il tipo `double` per poter gestire anche numeri con la virgola (ad esempio, il doppio di 3.5 è 7.0).
- Puoi calcolare il doppio direttamente all'interno di `printf()`, senza usare una variabile aggiuntiva: `printf("%.2f", 2 * n);`.
- Ricorda il formato `%lf` per leggere un `double` con `scanf()`.
- Verifica il programma con valori semplici: inserendo 5, il risultato atteso è 10.00.

## Soluzione

```c
--8<-- "C/Doppio-di-un-numero/main.c"
```

<div class="oc-embed"
     data-path="C/Doppio-di-un-numero/main.c"
     data-lang="c">
</div>
