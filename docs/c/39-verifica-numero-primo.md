# Verifica numero primo

Inserito un numero intero strettamente positivo, verificare se è primo.

## Obiettivo

Il programma deve richiedere un numero intero strettamente positivo (con validazione dell'input) e comunicare se è primo oppure no.

## Descrizione

Un numero intero N maggiore di 1 è **primo** se i suoi unici divisori sono 1 e N stesso. Per convenzione, 1 non è considerato un numero primo.

Il programma conta quanti divisori possiede il numero scorrendo tutti i valori da 1 a N: se ne viene trovato almeno uno, il numero non è primo.

**MIGLIORIA:** È possibile ottimizzare fermando la ricerca a \(\lfloor\sqrt{N}\rfloor\): se N non ha divisori fino alla sua radice quadrata, non ne avrà nemmeno oltre. Questa ottimizzazione riduce notevolmente il numero di iterazioni per numeri grandi.

I primi numeri primi sono: 2, 3, 5, 7, 11, 13, 17, 19, 23, 29, ...

## Suggerimenti

- Usa un ciclo `do-while` per la validazione: accetta solo valori maggiori di 0.
- Nel ciclo di verifica, puoi fermarti a `d * d <= N` invece di arrivare a N-1: è molto più efficiente.
- Usa un contatore per calcolare quanti divisori possiede il numero.

## Soluzione

```c
--8<-- "C/Verifica-numero-primo/main.c"
```

<div class="oc-embed"
     data-path="C/Verifica-numero-primo/main.c"
     data-lang="c"
     data-stdin="17"
     data-autorun="true">
</div>
