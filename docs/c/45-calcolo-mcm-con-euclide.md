# Calcolo mcm con Euclide

Calcolare il minimo comune multiplo (mcm) di due numeri interi positivi sfruttando l'algoritmo di Euclide.

## Obiettivo

Il programma deve richiedere due numeri interi positivi e calcolarne il minimo comune multiplo utilizzando la relazione con il MCD, implementando le apposite funzioni.

## Descrizione

Dati due numeri interi N1 ed N2, l'mcm si può ottenere dividendo il loro prodotto per il MCD:

$$ mcm(N1, N2) = \frac{N1 \cdot N2}{MCD(N1, N2)} $$

Questo approccio è molto più efficiente di quello basato sui multipli, perché sfrutta l'algoritmo di Euclide che converge in pochi passi. Ad esempio:

$$mcm(12, 8) = \frac{12 \cdot 8}{MCD(12, 8)} = \frac{96}{4} = 24$$

È buona pratica eseguire prima la divisione e poi la moltiplicazione (`n1 / mcd(n1, n2) * n2`) per ridurre il rischio di overflow con numeri grandi.

## Suggerimenti

- Riutilizza (o riscrivi) la funzione `mcd(int a, int b)` dell'esercizio precedente.
- Crea una funzione `int mcm(int n1, int n2)` che chiama `mcd` e applica la formula.
- Per ridurre il rischio di overflow calcola `(n1 / mcd(n1, n2)) * n2` invece di `(n1 * n2) / mcd(n1, n2)`.
- Verifica il risultato confrontandolo con quello dell'esercizio 44 su alcuni esempi.

## Soluzione

```c
--8<-- "C/Calcolo-mcm-Euclide/main.c"
```

<div class="oc-embed"
     data-path="C/Calcolo-mcm-Euclide/main.c"
     data-lang="c"
     data-stdin="12\n8"
     data-autorun="true">
</div>
