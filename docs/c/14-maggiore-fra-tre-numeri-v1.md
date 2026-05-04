# Maggiore fra tre numeri (versione 1)

Dati tre numeri inseriti dall'utente, il programma stampa il maggiore. In questa versione si utilizza il costrutto `if-else` annidato.

## Obiettivo

Leggere tre numeri da tastiera e visualizzare il valore più alto tra i tre, usando `if-else` annidati.

## Descrizione

Quando si devono confrontare tre valori, una delle strategie possibili è l'**annidamento di costrutti `if-else`**: si confronta prima il primo numero con gli altri due, e se non è il maggiore si confrontano tra loro i rimanenti. La struttura ad albero che ne risulta copre tutti i casi possibili.

In questa prima versione il codice usa esclusivamente `if-else` annidati, senza variabili d'appoggio.

## Suggerimenti

- Inizia confrontando `a` con `b` e con `c`: se `a >= b && a >= c`, allora `a` è il maggiore.
- Nel ramo `else` del primo `if`, sai già che `a` non è il massimo: confronta quindi soltanto `b` e `c`.
- Fai attenzione al caso in cui due o tutti e tre i valori siano uguali: il programma deve comunque produrre un risultato corretto.
- Confronta questa soluzione con le versioni 2 e 3 per apprezzare i diversi approcci al medesimo problema.

## Soluzione

```c
--8<-- "C/Maggiore-fra-tre-numeri-v1/main.c"
```

<div class="oc-embed"
     data-path="C/Maggiore-fra-tre-numeri-v1/main.c"
     data-lang="c">
</div>
