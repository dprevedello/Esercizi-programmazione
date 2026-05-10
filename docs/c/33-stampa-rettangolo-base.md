# Stampa rettangolo base

Stampare un rettangolo composto dal carattere `#`, con dimensioni fisse di 10 righe e 20 colonne.

## Obiettivo

Il programma deve disegnare su schermo un rettangolo vuoto di 10 righe e 20 colonne, usando il carattere `#` per riempire tutte le celle del bordo e lo spazio per il contenuto del rettangolo.

## Descrizione

Il rettangolo è una figura semplice da realizzare con due cicli `for` annidati: il ciclo esterno gestisce le righe, quello interno stampa i caratteri di ogni riga. Poiché il rettangolo è vuoto, ogni cella del bordo contiene il carattere `#` mentre  l'interno contiene spazi.

Questo esercizio costituisce la base per varianti più complesse come ad esempio l'uso di dimensioni variabili.

## Suggerimenti

- Usa due cicli `for` annidati: `for(int r = 1; r <= 10; r++)` per le righe e `for(int c = 1; c <= 20; c++)` per le colonne.
- All'interno del ciclo interno stampa il carattere `#` se ci si trova sul bordo senza andare a capo.
- Al termine di ogni riga (dopo il ciclo interno) stampa un `\n` per passare alla riga successiva.
- Le costanti 10 e 20 possono essere definite come macro con `#define RIGHE 10` e `#define COLONNE 20` per rendere il codice più leggibile.

## Soluzione

```c
--8<-- "C/Stampa-rettangolo-base/main.c"
```

<div class="oc-embed"
     data-path="C/Stampa-rettangolo-base/main.c"
     data-lang="c"
     data-autorun="true">
</div>
