# Calcolo radice quadrata

Calcolare la radice quadrata di un numero tramite il metodo babilonese, creando una funzione apposita.

## Obiettivo

Il programma deve richiedere un numero reale non negativo e calcolarne la radice quadrata utilizzando il metodo babilonese, implementato in una funzione dedicata.

## Descrizione

Il **metodo babilonese** è uno dei primi metodi iterativi per il calcolo della radice quadrata. La formula iterativa è:

$$ radQ(\alpha) = \left\{ \begin{align} r_0 &= \frac{\alpha}{2} \\ r_{n+1} &= \frac{1}{2}\left(r_n + \frac{\alpha}{r_n}\right) \end{align} \right. $$

Partendo da una stima iniziale \( r_0 = 1 \), ogni iterazione produce un'approssimazione migliore. Il processo si ripete finché non si è raggiunta una buona approssimazione. Ad esempio lo si puà iterare per 100 volte.

Il metodo converge molto rapidamente: bastano poche iterazioni per ottenere un risultato preciso anche per numeri grandi.

## Suggerimenti

- Crea una funzione `double radQuadrata(double valore)` che implementa il metodo babilonese e restituisce il risultato.
- Gestisci il caso \( \alpha = 0 \) separatamente per evitare divisioni per zero.
- Confronta il risultato con la funzione `sqrt()` di `<math.h>` per verificare la correttezza.

## Soluzione

```c
--8<-- "C/Calcolo-radice-quadrata/main.c"
```

<div class="oc-embed"
     data-path="C/Calcolo-radice-quadrata/main.c"
     data-lang="c"
     data-stdin="25"
     data-autorun="true">
</div>
