# Calcolo MCD

Letti due numeri interi, calcolare il massimo comun divisore (MCD) tramite l'algoritmo di Euclide, creando un'apposita funzione.

## Obiettivo

Il programma deve richiedere due numeri interi positivi e calcolarne il massimo comun divisore utilizzando l'algoritmo di Euclide, implementato in una funzione dedicata.

## Descrizione

**L'algoritmo di Euclide** è un metodo per trovare il massimo comune divisore tra due numeri interi: anziché calcolare tutti i divisori, si divide a per b ottenendo il resto r, poi si calcola l'MCD tra b ed r, e si procede finché il resto è 0. L'ultimo divisore non nullo è l'MCD cercato.

Ad esempio, per calcolare MCD(48, 18):

| Passo | a  | b  | r = a % b |
|-------|----|----|-----------|
| 1     | 48 | 18 | 12        |
| 2     | 18 | 12 | 6         |
| 3     | 12 | 6  | 0         |

Il risultato è **MCD(48, 18) = 6**.

L'algoritmo funziona perché MCD(a, b) = MCD(b, a % b), proprietà dimostrabile con semplici argomenti di divisibilità.

## Suggerimenti

- Crea una funzione `int mcd(int n1, int n2)` che implementa il ciclo `do-while`.
- All'interno del ciclo, aggiorna le variabili: `r = a % b; a = b; b = r;`.
- Questa funzione sarà riutilizzata nell'esercizio sul minimo comune multiplo con Euclide.

## Soluzione

```c
--8<-- "C/Calcolo-MCD/main.c"
```

<div class="oc-embed"
     data-path="C/Calcolo-MCD/main.c"
     data-lang="c"
     data-stdin="48\n18"
     data-autorun="true">
</div>
