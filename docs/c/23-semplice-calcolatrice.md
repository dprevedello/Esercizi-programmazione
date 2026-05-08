# Semplice calcolatrice

Il programma realizza una calcolatrice che esegue una delle quattro operazioni fondamentali scelta dall'utente.

## Obiettivo

Acquisire due operandi e, tramite un menu, un operatore (somma, sottrazione, moltiplicazione, divisione). Stampare il risultato dell'operazione selezionata. Gestire il caso di divisione per zero.

## Descrizione

L'utente inserisce due numeri e seleziona tramite menu l'operazione da eseguire. Il programma seleziona l'operazione tramite uno `switch` sul numero corrispondente alla scelta inserita e ne stampa il risultato.

## Suggerimenti

- Acquisisci l'operazione come variabile di tipo `int`.
- Usa `switch` sul numero corrispondente all'operazione.
- Prima di eseguire la divisione, verifica che il divisore sia diverso da zero.
- Usa `float` per gli operandi in modo da gestire correttamente la divisione tra numeri non interi.

## Soluzione

```c
--8<-- "C/Semplice-calcolatrice/main.c"
```

<div class="oc-embed"
     data-path="C/Semplice-calcolatrice/main.c"
     data-lang="c">
</div>
