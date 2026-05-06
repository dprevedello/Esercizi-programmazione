# Bubblesort e ricerca binaria

Generare un vettore di 100 numeri casuali tra 0 e 1000, ordinarlo con Bubblesort e permettere all'utente di cercare un valore tramite ricerca binaria.

## Obiettivo

Il programma deve generare un vettore di 100 numeri interi casuali tra 0 e 1000, stamparlo, ordinarlo con l'algoritmo Bubblesort, stamparlo nuovamente dopo l'ordinamento e infine permettere all'utente di cercare un valore tramite ricerca binaria.

## Descrizione

**Bubblesort** è un algoritmo di ordinamento che confronta ripetutamente coppie di elementi adiacenti e li scambia se sono nell'ordine sbagliato. Ad ogni passata, l'elemento più grande "galleggia" verso la fine del vettore come una bolla. L'algoritmo si ripete finché non viene effettuato nessuno scambio in una passata completa.

La complessità nel caso peggiore è **O(n²)**: per n = 100 è ampiamente accettabile.

La **ricerca binaria** sfrutta il fatto che il vettore è ordinato: confronta il valore cercato con l'elemento centrale e, in base al risultato, dimezza lo spazio di ricerca eliminando la metà sinistra o destra. La complessità è **O(log n)**: per n = 100 bastano al massimo 7 confronti.

La ricerca binaria può essere implementata in modo **iterativo** (con un ciclo `while` e due indici `sinistra` e `destra`) oppure **ricorsivo** (esercizio 59).

## Suggerimenti

- Implementa Bubblesort con due cicli `for` annidati: il ciclo esterno conta le passate, quello interno scorre le coppie adiacenti.
- Aggiungi una variabile `scambiato` per interrompere il ciclo esterno se una passata non ha prodotto scambi (ottimizzazione).
- Implementa la ricerca binaria in una funzione `int ricercaBinaria(int v[], int n, int target)` con un ciclo `while (sinistra <= destra)`.
- Stampa il vettore prima e dopo l'ordinamento per mostrare il funzionamento dell'algoritmo.

## Soluzione

```c
--8<-- "C/Bubblesort-e-ricerca-binaria/main.c"
```

<div class="oc-embed"
     data-path="C/Bubblesort-e-ricerca-binaria/main.c"
     data-lang="c">
</div>
