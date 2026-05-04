# Equazione della retta

Data l'equazione di una retta nella forma \(y = mx + q\) e le coordinate di un punto, il programma stabilisce se il punto appartiene alla retta.

## Obiettivo

Leggere i parametri \(m\) e \(q\) della retta e le coordinate \((x, y)\) di un punto, quindi verificare se il punto soddisfa l'equazione.

## Descrizione

Una retta nel piano cartesiano è descritta dall'equazione esplicita:

$$y = mx + q$$

dove \(m\) è il **coefficiente angolare** (pendenza della retta) e \(q\) è il **termine noto** (intercetta con l'asse \(y\)).

Un punto \(P = (x_0, y_0)\) appartiene alla retta se e solo se le sue coordinate soddisfano l'equazione, cioè:

$$y_0 = m \cdot x_0 + q$$

Il programma deve leggere \(m\), \(q\), \(x_0\) e \(y_0\), calcolare il valore \(m \cdot x_0 + q\) e confrontarlo con \(y_0\).

## Suggerimenti

- Con i numeri in virgola mobile, il confronto diretto `y == m * x + q` può essere impreciso a causa degli errori di arrotondamento. È preferibile verificare che la differenza in valore assoluto sia inferiore a una soglia piccola, ad esempio `fabs(y - (m * x + q)) < 1e-9`. Questo richiede `#include <math.h>`.
- Struttura l'output in modo chiaro: stampa le coordinate del punto e comunica esplicitamente se appartiene o no alla retta.
- Prova con \(m = 2\), \(q = 1\), punto \((3, 7)\): il valore della retta in \(x = 3\) è \(2 \cdot 3 + 1 = 7\), quindi il punto appartiene alla retta.
- Prova anche con un punto che non appartiene, ad esempio \((3, 8)\) con gli stessi parametri.

## Soluzione

```c
--8<-- "C/Equazione-della-retta/main.c"
```

<div class="oc-embed"
     data-path="C/Equazione-della-retta/main.c"
     data-lang="c">
</div>