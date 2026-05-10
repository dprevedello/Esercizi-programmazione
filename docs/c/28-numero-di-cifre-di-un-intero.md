# Numero di cifre di un intero

Il programma calcola il numero di cifre di un intero letto in input, sia in base 10 sia in base 2.

## Obiettivo

Dato un numero intero letto da tastiera, determinare:

1. Quante cifre ha in base 10 (sistema decimale).
2. Quante cifre ha in base 2 (sistema binario).

## Descrizione

Il numero di cifre decimali di un intero positivo \(n\) si può calcolare contando quante volte si riesce a dividere \(n\) per 10 prima di ottenere 0. La stessa logica vale in base 2, dividendo per 2.

Ad esempio, il numero \(345\) ha 3 cifre decimali e, poiché \(345 = 101011001_2\), ha 9 cifre binarie.

## Suggerimenti

- Usa un ciclo `for` (o `while`) che divide ripetutamente il numero per la base (10 o 2) e conta le iterazioni.
- Attenzione al caso `n = 0`: ha 1 cifra in entrambe le basi; gestiscilo separatamente con un `if`.
- Se il numero può essere negativo, lavora sul valore assoluto prima di contare le cifre.
- In alternativa, per la base 10, potresti usare `floor(log10(n)) + 1` dalla libreria `<math.h>`, ma il metodo iterativo è più diretto.

## Soluzione

```c
--8<-- "C/Numero-di-cifre-di-un-intero/main.c"
```

<div class="oc-embed"
     data-path="C/Numero-di-cifre-di-un-intero/main.c"
     data-lang="c"
     data-stdin="345"
     data-autorun="true">
</div>
