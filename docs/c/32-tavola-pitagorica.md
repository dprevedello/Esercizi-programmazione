# Tavola pitagorica

Stampare la tavola pitagorica completa, con una griglia che renda leggibili righe e colonne.

## Obiettivo

Il programma deve visualizzare a schermo la classica tavola pitagorica (da 1×1 a 10×10), formattata con una griglia che allinei correttamente i valori.

## Descrizione

La tavola pitagorica è una tabella in cui ogni cella alla riga r e colonna c contiene il prodotto r × c. Per stamparla in modo leggibile è necessario usare due cicli `for` annidati: il ciclo esterno scorre le righe, quello interno scorre le colonne.

La formattazione è importante: usando `printf` con una larghezza fissa (ad esempio `%2d`) i numeri risultano allineati e la griglia è più chiara. Si può aggiungere una linea separatrice per migliorare la leggibilità.

## Suggerimenti

- Usa due cicli `for` annidati: il primo per le righe (r da 1 a 10), il secondo per le colonne (c da 1 a 10).
- Stampa ogni prodotto con `printf("%2d", r * c)` per mantenere l'allineamento.
- Aggiungi una linea di separazione (es. con trattini) prima del corpo della tabella.
- Al termine di ogni riga ricordati di andare a capo con `printf("\n")`.

## Soluzione

```c
--8<-- "C/Tavola-pitagorica/main.c"
```

<div class="oc-embed"
     data-path="C/Tavola-pitagorica/main.c"
     data-lang="c"
     data-height="550"
     data-autorun="true">
</div>
