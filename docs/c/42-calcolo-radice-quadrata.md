# Calcolo radice quadrata

Calcolare la radice quadrata di un numero tramite il metodo babilonese, creando una funzione apposita.

## Obiettivo

Il programma deve richiedere un numero reale non negativo e calcolarne la radice quadrata utilizzando il metodo babilonese, implementato in una funzione dedicata.

## Descrizione

Il **metodo babilonese** è uno dei primi metodi iterativi per il calcolo della radice quadrata. La formula iterativa è:

$$ radQ(\alpha) = \left\{ \begin{align} r_0 &= \frac{\alpha}{2} \\ r_{n+1} &= \frac{1}{2}\left(r_n + \frac{\alpha}{r_n}\right) \end{align} \right. $$

Partendo da una stima iniziale \( r_0 = \frac{\alpha}{2} \), ogni iterazione produce un'approssimazione migliore. Il processo si ripete finché la differenza tra due approssimazioni successive è inferiore a una soglia di precisione (ad esempio \( 10^{-9} \)).

Il metodo converge molto rapidamente: bastano poche iterazioni per ottenere un risultato preciso anche per numeri grandi.

## Suggerimenti

- Crea una funzione `double radice(double alpha)` che implementa il metodo babilonese e restituisce il risultato.
- Come condizione di stop usa `fabs(r_new - r_old) > 1e-9` (dalla libreria `<math.h>`).
- Gestisci il caso \( \alpha = 0 \) separatamente per evitare divisioni per zero.
- Confronta il risultato con la funzione `sqrt()` di `<math.h>` per verificare la correttezza.

## Soluzione

```c
--8<-- "C/Calcolo-radice-quadrata/main.c"
```

<div class="oc-embed"
     data-path="C/Calcolo-radice-quadrata/main.c"
     data-lang="c">
</div>
