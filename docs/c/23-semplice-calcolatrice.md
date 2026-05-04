# Semplice calcolatrice

Il programma realizza una calcolatrice che esegue una delle quattro operazioni fondamentali scelta dall'utente.

## Obiettivo

Acquisire due operandi e un operatore (`+`, `-`, `*`, `/`) e stampare il risultato dell'operazione selezionata. Gestire il caso di divisione per zero.

## Descrizione

L'utente inserisce due numeri e un carattere che rappresenta l'operazione da eseguire. Il programma seleziona l'operazione tramite uno `switch` sul carattere inserito e ne stampa il risultato. Per la divisione è necessario verificare che il secondo operando non sia zero.

## Suggerimenti

- Acquisisci l'operatore come variabile di tipo `char`.
- Usa `switch` sul carattere dell'operatore: i `case` saranno `'+'`, `'-'`, `'*'`, `'/'`.
- Prima di eseguire la divisione, verifica che il divisore sia diverso da zero.
- Usa `double` per gli operandi in modo da gestire correttamente la divisione tra numeri non interi.

## Soluzione

```c
--8<-- "C/Semplice-calcolatrice/main.c"
```

<div class="oc-embed"
     data-path="C/Semplice-calcolatrice/main.c"
     data-lang="c">
</div>
