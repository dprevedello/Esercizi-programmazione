# Calcolo del fattoriale

Calcolare il fattoriale di un numero chiesto all'utente, controllando l'ammissibilità dell'input.

## Obiettivo

Il programma deve richiedere un numero intero non negativo, verificare che sia ammissibile e calcolarne il fattoriale.

## Descrizione

Il fattoriale di un numero è indicato con il simbolo **n!** e indica il prodotto di tutti i numeri naturali (escluso lo zero) minori o uguali al numero dato. Ad esempio: \( 6! = 6 \cdot 5 \cdot 4 \cdot 3 \cdot 2 \cdot 1 \). L'unica eccezione è **0!** che per definizione vale **1**. Il fattoriale è definito solo per numeri naturali (positivi).

Il calcolo si esegue con un ciclo `for` che moltiplica progressivamente i valori da 1 fino a n. Poiché il fattoriale cresce molto rapidamente (già 13! supera il massimo di un `int` a 32 bit), è opportuno usare il tipo `long` o `long long` per memorizzare il risultato.

| n  | n!          |
|----|-------------|
| 0  | 1           |
| 1  | 1           |
| 5  | 120         |
| 10 | 3 628 800   |
| 12 | 479 001 600 |

## Suggerimenti

- Usa un ciclo `do-while` per validare l'input: il fattoriale è definito solo per n >= 0.
- Inizializza il risultato a 1 (non a 0), poiché si tratta di una moltiplicazione.
- Usa il tipo `long` per il risultato e `%ld` in `printf` per stamparlo correttamente.
- Usa il tipo `long long` per il risultato e `%lld` in `printf` per stamparlo correttamente.
- Gestisci il caso n == 0 esplicitamente oppure verifica che il ciclo `for` lo gestisca correttamente senza iterazioni (il ciclo `for(i=1; i<=0; i++)` non esegue mai il corpo, lasciando il risultato a 1).

## Soluzione

```c
--8<-- "C/Calcolo-del-fattoriale/main.c"
```

<div class="oc-embed"
     data-path="C/Calcolo-del-fattoriale/main.c"
     data-lang="c"
     data-stdin="6"
     data-autorun="true">
</div>
