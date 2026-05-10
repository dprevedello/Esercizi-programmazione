# Circonferenza inscritta e circoscritta

Dato il lato di un quadrato, il programma calcola il raggio della circonferenza inscritta e quello della circonferenza circoscritta.

## Obiettivo

Determinare i raggi delle due circonferenze associate a un quadrato, usando le proprietà geometriche del poligono regolare.

## Descrizione

<img src="../images/circonferenza-inscritta-circoscritta.png" alt="Circonferenza inscritta e circoscritta" width="300" style="display: block; margin: auto;">

La **circonferenza inscritta** in un quadrato è quella tangente ai quattro lati: il suo centro coincide con il centro del quadrato e il suo raggio è pari alla metà del lato:

$$r_i = \frac{l}{2}$$

La **circonferenza circoscritta** è quella che passa per i quattro vertici: il suo raggio è pari alla metà della diagonale del quadrato. Poiché la diagonale vale \(l\sqrt{2}\), si ha:

$$r_c = \frac{l\sqrt{2}}{2}$$

## Suggerimenti

- Includi `<math.h>` per usare la costante `sqrt(2.0)`.
- Le due formule sono semplici: derivano direttamente da metà lato e metà diagonale del quadrato.
- Verifica il programma con lato = 4: raggio inscritto atteso 2.0, raggio circoscritto atteso ≈ 2.8.
- Nota che il raggio circoscritto è sempre maggiore di quello inscritto: il rapporto tra i due è costante e vale \(\sqrt{2}\).

## Soluzione

```c
--8<-- "C/Circonferenza-inscritta-e-circoscritta/main.c"
```

<div class="oc-embed"
     data-path="C/Circonferenza-inscritta-e-circoscritta/main.c"
     data-lang="c"
     data-stdin="4"
     data-autorun="true">
</div>
