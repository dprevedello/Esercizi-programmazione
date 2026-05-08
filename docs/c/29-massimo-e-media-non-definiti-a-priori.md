# Massimo e media non definiti a priori

Il programma acquisisce una sequenza di numeri di lunghezza non nota in anticipo e ne calcola il massimo e la media.

## Obiettivo

Chiedere all'utente di inserire un numero qualsiasi di valori. Dopo ogni inserimento chiedere se si vuole continuare con un messaggio `"Vuoi terminare (S o N)?"`. Al termine, stampare il massimo e la media dei valori inseriti.

## Descrizione

A differenza degli esercizi precedenti, qui il numero di elementi non è fissato: si usa un ciclo `do-while` che continua finché l'utente non decide di fermarsi. È necessario tenere traccia del numero di valori inseriti per calcolare la media.

Il massimo viene aggiornato a ogni iterazione confrontando il valore corrente con il massimo temporaneo.

## Suggerimenti

- Inizializza il massimo con il primo valore letto, non con un valore arbitrario come `0` (che potrebbe essere maggiore di tutti i valori negativi inseriti).
- Conta gli elementi inseriti con un contatore `inseriti` per calcolare la media come `somma / inseriti`.
- Usa un ciclo `do-while` per garantire almeno un'iterazione.

## Soluzione

```c
--8<-- "C/Massimo-e-media-non-definiti-a-priori/main.c"
```

<div class="oc-embed"
     data-path="C/Massimo-e-media-non-definiti-a-priori/main.c"
     data-lang="c">
</div>
