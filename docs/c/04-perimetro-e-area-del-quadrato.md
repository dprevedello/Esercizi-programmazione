# Perimetro e area del quadrato

Dato il lato di un quadrato, il programma calcola e stampa il suo perimetro e la sua area.

## Obiettivo

Leggere la misura del lato di un quadrato e calcolarne perimetro e area.

## Descrizione

Il quadrato è un poligono regolare con quattro lati uguali e quattro angoli retti. Date le sue proprietà, le formule per perimetro e area sono:

$$P = 4 \cdot l$$

$$A = l^2$$

dove \(l\) è la misura del lato.

## Suggerimenti

- Usa `double` per il lato: un quadrato può avere lato non intero (ad esempio 2.5 cm).
- Per elevare al quadrato in C non esiste un operatore dedicato: usa semplicemente `lato * lato`. La funzione `pow(lato, 2)` dalla libreria `<math.h>` è un'alternativa, ma per il quadrato la moltiplicazione diretta è più efficiente.
- Struttura l'output in modo chiaro, stampando prima il perimetro e poi l'area su righe separate.
- Prova con lato = 5: perimetro atteso 20.00, area attesa 25.00.

## Soluzione

```c
--8<-- "C/Perimetro-e-area-del-quadrato/main.c"
```

<div class="oc-embed"
     data-path="C/Perimetro-e-area-del-quadrato/main.c"
     data-lang="c">
</div>
