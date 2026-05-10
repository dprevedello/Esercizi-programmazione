# Media di due numeri

Dati due numeri inseriti da tastiera, il programma calcola e visualizza la loro media aritmetica.

## Obiettivo

Acquisire due valori numerici dall'utente e stamparne la media aritmetica.

## Descrizione

La media aritmetica di due numeri \(a\) e \(b\) è definita come:

$$m = \frac{a + b}{2}$$

Il programma deve leggere i due valori tramite `scanf()`, calcolare la media e stamparla con `printf()`.

## Suggerimenti

- Usa il tipo `float` per gestire correttamente i numeri decimali: la media di 3 e 4, ad esempio, è 3.5.
- Con `scanf()`, il formato corretto per leggere un `float` è `%f`; per stamparlo con `printf()` si usa `%f` oppure `%.1f` per limitare a una cifra decimale.
- Fai attenzione alla divisione intera: se `a` e `b` fossero dichiarati `int`, l'espressione `(a + b) / 2` troncherebbe il risultato. Dividendo per `2.0` si forza la divisione in virgola mobile.
- Prova il programma con coppie di valori di cui conosci già il risultato, ad esempio 10 e 20 (media attesa: 15.00).

## Soluzione

```c
--8<-- "C/Media-due-numeri/main.c"
```

<div class="oc-embed"
     data-path="C/Media-due-numeri/main.c"
     data-lang="c"
     data-stdin="10\n20"
     data-autorun="true">
</div>
