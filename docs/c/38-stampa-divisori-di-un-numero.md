# Stampa divisori di un numero

Chiedere un numero intero strettamente positivo e stampare tutti i suoi divisori.

## Obiettivo

Il programma deve richiedere un numero intero strettamente positivo (con validazione dell'input) e stampare tutti i valori interi che lo dividono esattamente, cioè con resto pari a zero.

## Descrizione

Un divisore di un numero N è un intero d tale che N % d == 0. Per trovare tutti i divisori basta scorrere con un ciclo tutti i valori da 1 fino a N e verificare, per ognuno, se la divisione è esatta.

Si noti che 1 e N stesso sono sempre divisori di N. Se gli unici divisori sono proprio 1 e N, allora N è un numero primo (concetto che verrà approfondito nell'esercizio successivo).

Un'ottimizzazione possibile, non obbligatoria, consiste nel cercare i divisori solo fino a √N, poiché i divisori si presentano sempre a coppie.

## Suggerimenti

- Usa un ciclo `do-while` per la validazione: ripeti la richiesta finché l'utente non inserisce un valore maggiore di 0.
- All'interno del ciclo `for` da 1 a N, controlla la condizione `N % d == 0` con un `if` e stampa d.
- Conta i divisori trovati con una variabile contatore: se alla fine vale 2 (solo 1 e N), il numero è primo.
- Per numeri molto grandi, considera di fermare la ricerca a √N e stampare entrambi gli elementi della coppia.

## Soluzione

```c
--8<-- "C/Stampa-divisori-di-un-numero/main.c"
```

<div class="oc-embed"
     data-path="C/Stampa-divisori-di-un-numero/main.c"
     data-lang="c">
</div>
