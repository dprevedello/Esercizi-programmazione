# Quicksort e ricerca binaria

Generare un vettore di 100 numeri casuali tra 0 e 1000, ordinarlo con Quicksort e permettere all'utente di cercare un valore tramite ricerca binaria.

## Obiettivo

Il programma deve generare un vettore di 100 numeri interi casuali tra 0 e 1000, stamparlo, ordinarlo con l'algoritmo Quicksort (implementato in modo ricorsivo), stamparlo dopo l'ordinamento e permettere all'utente di cercare un valore tramite ricerca binaria.

## Descrizione

**Quicksort** è un algoritmo di ordinamento ricorsivo basato sulla strategia *divide et impera*. Il funzionamento è il seguente:

1. Si sceglie un elemento **pivot** (ad esempio l'ultimo elemento del segmento).
2. Si ripartisce il segmento in due parti: gli elementi minori o uguali al pivot a sinistra, quelli maggiori a destra (**fase di partizione**).
3. Si applica ricorsivamente Quicksort alle due parti.

I **casi base** sono i segmenti di lunghezza 0 o 1, già ordinati per definizione.

La complessità media è **O(n log n)**, migliore del Bubblesort O(n²) per n grandi. Nel caso peggiore (vettore già ordinato con pivot scelto male) può degradare a O(n²).

La ricerca binaria è la stessa dell'esercizio precedente: il vettore deve essere ordinato prima di applicarla.

## Suggerimenti

- Implementa la funzione di partizione `int partition(int v[], int sx, int dx)` che riposiziona il pivot e restituisce il suo indice finale.
- La funzione `quicksort(int v[], int sx, int dx)` chiama `partition`, poi richiama sé stessa sulle due metà solo se `sx < dx`.
- Riutilizza la funzione `ricercaBinaria` dell'esercizio precedente.
- Stampa il vettore prima e dopo l'ordinamento per confrontare il risultato con Bubblesort.

## Soluzione

```c
--8<-- "C/Quicksort-e-ricerca-binaria/main.c"
```

<div class="oc-embed"
     data-path="C/Quicksort-e-ricerca-binaria/main.c"
     data-lang="c">
</div>
