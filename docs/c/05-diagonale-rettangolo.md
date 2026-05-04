# Diagonale del rettangolo

Dati l'area e l'altezza di un rettangolo, il programma determina la lunghezza della diagonale.

## Obiettivo

Ricavare la base del rettangolo dall'area e dall'altezza, quindi calcolare la diagonale con il teorema di Pitagora.

## Descrizione

La diagonale di un rettangolo è il segmento che collega due vertici opposti. Per calcolarla si applica il teorema di Pitagora al triangolo rettangolo formato dalla base, dall'altezza e dalla diagonale stessa:

$$d = \sqrt{b^2 + h^2}$$

Poiché l'area è nota (\(A = b \cdot h\)), la base si ricava come:

$$b = \frac{A}{h}$$

## Suggerimenti

- Includi la libreria `<math.h>` per usare la funzione `sqrt()`, che calcola la radice quadrata.
- Non dimenticare di ricavare prima la base dalla formula \(b = A / h\) prima di calcolare la diagonale.
- Presta attenzione al caso in cui l'altezza sia zero: causerebbe una divisione per zero. Per ora puoi supporre che l'utente inserisca valori validi.
- Prova con area = 12 e altezza = 3: la base è 4, la diagonale è \(\sqrt{16 + 9} = 5.0000\).

## Soluzione

```c
--8<-- "C/Diagonale-rettangolo/main.c"
```

<div class="oc-embed"
     data-path="C/Diagonale-rettangolo/main.c"
     data-lang="c">
</div>
