# Vari conteggi con il `for`

Il programma esegue sei sequenze di stampa diverse utilizzando altrettanti cicli `for`, esplorando le principali varianti del costrutto.

## Obiettivo

Stampare in sequenza:

1. I numeri da 1 a 100 (incremento di 1)
2. I numeri da 100 a 1 (decremento di 1)
3. I numeri pari da 1 a 100
4. I numeri dispari da 100 a 1
5. La tabellina del 3 fino a 100
6. Le potenze del 2 fino a 10000

## Descrizione

Questo esercizio mostra come il ciclo `for` sia flessibile: può contare in avanti, all'indietro, a passi diversi da 1 o con aggiornamenti moltiplicativi. Ogni sequenza richiede di scegliere opportunamente il valore iniziale, la condizione di uscita e l'istruzione di aggiornamento.

## Suggerimenti

- Per i numeri dispari da 100 a 1, parti da 99 (primo dispari sotto 100) e decrementa di 2.
- Per la tabellina del 3, usa `i += 3` oppure stampa `3 * i` con `i` che va da 1 in poi.
- Per le potenze del 2, l'aggiornamento è `i *= 2` anziché `i++`.
- Separa le sei sequenze con una riga vuota o un'intestazione per rendere l'output più leggibile.

## Soluzione

```c
--8<-- "C/Vari-conteggi-con-il-for/main.c"
```

<div class="oc-embed"
     data-path="C/Vari-conteggi-con-il-for/main.c"
     data-lang="c"
     data-height="550"
     data-autorun="true">
</div>
