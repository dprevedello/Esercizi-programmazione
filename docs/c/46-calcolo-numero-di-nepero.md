# Calcolo del numero di Nepero

Calcolare il numero di Nepero e tramite la sua definizione come serie infinita.

## Obiettivo

Il programma deve calcolare un'approssimazione del numero **e** sommando i primi 21 termini (da n=0 a n=20) della sua serie di definizione, usando il tipo `long double` per massimizzare la precisione.

## Descrizione

Il numero **e** può essere definito come la serie:

$$ e := \sum_{n=0}^\infty \frac{1}{n!} = \frac{1}{0!} + \frac{1}{1!} + \frac{1}{2!} + \frac{1}{3!} + \frac{1}{4!} + \ldots $$

A causa dei limiti di rappresentazione dei tipi `float` e `double`, si usa il tipo `long double` (16 byte). Il calcolo si ferma al 20° termine poiché oltre non si ottiene beneficio per i limiti di precisione.

Il valore atteso è: **e ≈ 2.71828182845904523536...**

Ogni termine della serie è \(\frac{1}{n!}\): invece di ricalcolare il fattoriale da zero ad ogni passo, è possibile aggiornare il termine corrente moltiplicandolo per \(\frac{1}{n}\) ad ogni iterazione, rendendo il calcolo molto più efficiente.

## Suggerimenti

- Usa il tipo `long double` per le variabili e `%Lf` (con L maiuscola) in `printf` per stamparle.
- Ottimizza il calcolo aggiornando il termine corrente: `termine /= n` ad ogni iterazione, evitando di ricalcolare n! da zero.
- Stampa il valore di e con almeno 15 cifre decimali per apprezzare la precisione ottenuta.
- Confronta il risultato con la costante `M_E` della libreria `<math.h>`.

## Soluzione

```c
--8<-- "C/Calcolo-numero-di-Nepero/main.c"
```

<div class="oc-embed"
     data-path="C/Calcolo-numero-di-Nepero/main.c"
     data-lang="c"
     data-autorun="true">
</div>
