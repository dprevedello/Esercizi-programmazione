# Equazioni di secondo grado

Il programma richiede all'utente i coefficienti di un'equazione di secondo grado e ne determina il numero di soluzioni e i relativi valori.

## Obiettivo

Acquisire i coefficienti \(a\), \(b\), \(c\) di un'equazione di secondo grado \(ax^2 + bx + c = 0\), calcolare il discriminante e stampare le soluzioni, se esistono.

## Descrizione

Data un'equazione di secondo grado nella forma \(ax^2 + bx + c = 0\), il numero di soluzioni dipende dal valore del **discriminante**:

$$\Delta = b^2 - 4ac$$

- Se \(\Delta > 0\): due soluzioni distinte \(x_1 = \dfrac{-b + \sqrt{\Delta}}{2a}\) e \(x_2 = \dfrac{-b - \sqrt{\Delta}}{2a}\)
- Se \(\Delta = 0\): una soluzione (due coincidenti) \(x = \dfrac{-b}{2a}\)
- Se \(\Delta < 0\): nessuna soluzione reale

Ad esempio: \(x^2 - 3x + 2 = 0\) ha due soluzioni, \(x^2 - 2x + 1 = 0\) ha una soluzione (due coincidenti), \(x^2 + x + 1 = 0\) non ha soluzioni.

## Suggerimenti

- Includi `<math.h>` e usa la funzione `sqrt()` per calcolare la radice quadrata del discriminante.
- Gestisci il caso particolare \(a = 0\): l'equazione non è di secondo grado (potresti segnalare un errore o trattarla come equazione di primo grado).
- Calcola prima il discriminante e usa `if-else` annidati per i tre casi (\(\Delta > 0\), \(\Delta = 0\), \(\Delta < 0\)).
- Quando compili, ricorda di collegare la libreria matematica con il flag `-lm`.

## Soluzione

```c
--8<-- "C/Equazioni-di-secondo-grado/main.c"
```

<div class="oc-embed"
     data-path="C/Equazioni-di-secondo-grado/main.c"
     data-lang="c">
</div>
