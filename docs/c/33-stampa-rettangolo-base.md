# Stampa rettangolo base

Stampare un rettangolo composto dal carattere `#`, con dimensioni fisse di 10 righe e 20 colonne.

## Obiettivo

Il programma deve disegnare su schermo un rettangolo pieno di 10 righe e 20 colonne, usando il carattere `#` per riempire tutte le celle.

## Descrizione

Il rettangolo è una figura semplice da realizzare con due cicli `for` annidati: il ciclo esterno gestisce le righe, quello interno stampa i caratteri di ogni riga. Poiché il rettangolo è pieno, ogni cella contiene il carattere `#` senza distinzione tra bordo e interno.

Questo esercizio costituisce la base per varianti più complesse in cui si distinguono bordo e contenuto oppure si usano dimensioni variabili.

## Suggerimenti

- Usa due cicli `for` annidati: `for(int i = 0; i < 10; i++)` per le righe e `for(int j = 0; j < 20; j++)` per le colonne.
- All'interno del ciclo interno stampa il carattere `#` senza andare a capo.
- Al termine di ogni riga (dopo il ciclo interno) stampa un `\n` per passare alla riga successiva.
- Le costanti 10 e 20 possono essere definite come macro con `#define RIGHE 10` e `#define COLONNE 20` per rendere il codice più leggibile.

## Soluzione

```c
--8<-- "C/Stampa-rettangolo-base/main.c"
```

<div class="oc-embed"
     data-path="C/Stampa-rettangolo-base/main.c"
     data-lang="c">
</div>
