# Maggiore fra due numeri

Dati due numeri inseriti dall'utente, il programma stampa il maggiore dei due.

## Obiettivo

Leggere due numeri da tastiera e visualizzare quello con il valore più alto.

## Descrizione

Il confronto tra due valori è uno dei costrutti fondamentali della programmazione. Si acquisiscono i due numeri con `scanf`, poi si utilizza un `if-else` per stabilire quale dei due è maggiore e stamparlo. È opportuno gestire anche il caso in cui i due valori siano uguali.

## Suggerimenti

- Usa variabili di tipo `float` o `double` se vuoi permettere valori decimali, oppure `int` se lavori solo con interi.
- Considera il caso in cui i due numeri siano uguali e comunicalo all'utente.
- Puoi risolvere il problema anche con una variabile d'appoggio: inizializza `maggiore = a`, poi controlla se `b > maggiore` e, in quel caso, aggiorna `maggiore = b`.
- Questa strategia con la variabile d'appoggio risulta particolarmente utile quando in seguito si dovrà confrontare un numero maggiore di valori.

## Soluzione

```c
--8<-- "C/Maggiore-fra-due-numeri/main.c"
```

<div class="oc-embed"
     data-path="C/Maggiore-fra-due-numeri/main.c"
     data-lang="c"
     data-stdin="7\n3"
     data-autorun="true">
</div>
