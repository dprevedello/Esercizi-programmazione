# Ricerca sequenziale

Generare un vettore di 100 numeri casuali tra 0 e 1000, stamparlo e permettere all'utente di cercare un valore tramite ricerca sequenziale.

## Obiettivo

Il programma deve generare automaticamente un vettore di 100 numeri interi casuali tra 0 e 1000, stamparlo e poi chiedere all'utente un valore da cercare. La ricerca deve essere effettuata tramite l'algoritmo di ricerca sequenziale e il programma deve comunicare se il valore è stato trovato (e in quale posizione) oppure no.

## Descrizione

La **ricerca sequenziale** (o lineare) è l'algoritmo di ricerca più semplice: si scorre il vettore dall'inizio alla fine, confrontando ogni elemento con il valore cercato. Quando si trova una corrispondenza, si può restituire l'indice e interrompere la ricerca. Se si arriva alla fine senza trovare nulla, il valore non è presente.

La complessità nel caso peggiore è **O(n)**: si devono esaminare tutti gli n elementi. Non richiede che il vettore sia ordinato, il che la rende applicabile in qualsiasi situazione.

## Suggerimenti

- Genera e stampa il vettore prima di chiedere il valore da cercare, così l'utente vede i dati disponibili.
- Implementa la ricerca  che trovi l'indice della prima occorrenza oppure -1 se non trovata.

## Soluzione

```c
--8<-- "C/Ricerca-sequenziale/main.c"
```

<div class="oc-embed"
     data-path="C/Ricerca-sequenziale/main.c"
     data-lang="c">
</div>
