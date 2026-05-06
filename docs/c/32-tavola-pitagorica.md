# Tavola pitagorica

Stampare la tavola pitagorica completa, con una griglia che renda leggibili righe e colonne.

## Obiettivo

Il programma deve visualizzare a schermo la classica tavola pitagorica (da 1×1 a 10×10), formattata con una griglia che allinei correttamente i valori.

## Descrizione

La tavola pitagorica è una tabella in cui ogni cella alla riga i e colonna j contiene il prodotto i × j. Per stamparla in modo leggibile è necessario usare due cicli `for` annidati: il ciclo esterno scorre le righe, quello interno scorre le colonne.

La formattazione è importante: usando `printf` con una larghezza fissa (ad esempio `%4d`) i numeri risultano allineati e la griglia è più chiara. Si può aggiungere una riga di intestazione con i numeri da 1 a 10 e una linea separatrice per migliorare la leggibilità.

## Suggerimenti

- Usa due cicli `for` annidati: il primo per le righe (i da 1 a 10), il secondo per le colonne (j da 1 a 10).
- Stampa ogni prodotto con `printf("%4d", i * j)` per mantenere l'allineamento.
- Aggiungi una riga di intestazione con i valori da 1 a 10 e una linea di separazione (es. con trattini) prima del corpo della tabella.
- Al termine di ogni riga ricordati di andare a capo con `printf("\n")`.

## Soluzione

```c
--8<-- "C/Tavola-pitagorica/main.c"
```

<div class="oc-embed"
     data-path="C/Tavola-pitagorica/main.c"
     data-lang="c">
</div>
