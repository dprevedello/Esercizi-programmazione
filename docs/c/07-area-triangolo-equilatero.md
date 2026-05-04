# Area del triangolo equilatero

Dato il perimetro di un triangolo equilatero, il programma ne calcola l'area.

## Obiettivo

Ricavare il lato dal perimetro e poi calcolare l'area del triangolo equilatero con la formula apposita.

## Descrizione

Un triangolo equilatero ha tutti e tre i lati uguali. Conoscendo il perimetro \(P\), il lato vale:

$$l = \frac{P}{3}$$

L'area si calcola con la formula:

$$A = \frac{\sqrt{3}}{4} \cdot l^2$$

Questa formula si ricava applicando il teorema di Pitagora per determinare l'altezza del triangolo, che vale \(h = \frac{l\sqrt{3}}{2}\), e poi usando la formula generale dell'area \(A = \frac{b \cdot h}{2}\).

## Suggerimenti

- Includi `<math.h>` per usare `sqrt(3.0)`.
- Il calcolo è sequenziale: prima si ricava il lato, poi si applica la formula dell'area.
- Prova con perimetro = 12: il lato è 4, l'area attesa è \(\frac{\sqrt{3}}{4} \cdot 16 \approx 6.9282\).
- Il risultato ha molte cifre decimali: usa `%.4f` per stampare con quattro decimali, sufficiente per questo tipo di esercizio.

## Soluzione

```c
--8<-- "C/Area-triangolo-equilatero/main.c"
```

<div class="oc-embed"
     data-path="C/Area-triangolo-equilatero/main.c"
     data-lang="c">
</div>
