# Stampa di un array

Leggere 5 interi da tastiera, caricarli in un array e stamparli su una riga tramite un metodo statico dedicato.

## Obiettivo

Riempire un array di 5 interi con i valori inseriti dall'utente, poi passarlo a un metodo statico `stampaArray(int[] array)` che li visualizza separati da spazi.

## Descrizione

In Java gli **array** hanno dimensione fissa dichiarata all'atto della creazione:

```java
int[] numeri = new int[5];
```

L'indice va da `0` a `length - 1`. La proprietà `.length` restituisce la dimensione dell'array.

Quando un array viene passato a un metodo, viene passato **per riferimento**: il metodo lavora sullo stesso oggetto in memoria. Questo vale per tutti gli oggetti Java; i tipi primitivi (`int`, `double`, …) vengono invece passati per valore.

Un metodo statico con parametro array si dichiara così:

```java
public static void stampaArray(int[] array) { ... }
```

## Suggerimenti

- Usa un ciclo `for` con `i < array.length` per scorrere l'array.
- `System.out.print()` stampa senza andare a capo; `System.out.println()` aggiunge il newline finale.
- Nel `main`, chiama `stampaArray(numeri)` passando direttamente la variabile array.

## Soluzione

```java
--8<-- "Java/Stampa-di-un-array/StampaArray.java"
```

<div class="oc-embed"
     data-path="Java/Stampa-di-un-array/StampaArray.java"
     data-lang="java">
</div>
