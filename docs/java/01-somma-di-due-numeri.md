# Somma di due numeri

Primo esercizio con metodi statici: leggere due interi da tastiera e restituirne la somma tramite un metodo dedicato.

## Obiettivo

Leggere due numeri interi da tastiera, calcolare la loro somma tramite un metodo statico `somma(int a, int b)` e stampare il risultato.

## Descrizione

In Java i **metodi statici** appartengono alla classe e non a una singola istanza: possono essere chiamati direttamente con `NomeClasse.metodo()` oppure, dall'interno della stessa classe, semplicemente con `metodo()`.

Un metodo statico che restituisce un valore deve dichiarare il tipo di ritorno (es. `int`) e terminare con un'istruzione `return`. Un metodo che non restituisce nulla usa `void`.

L'input da tastiera si gestisce con la classe `Scanner`, che va importata da `java.util.Scanner`:

```java
Scanner in = new Scanner(System.in);
int n = in.nextInt();
```

## Suggerimenti

- Firma del metodo: `public static int somma(int a, int b)`.
- I parametri `a` e `b` sono **passati per valore**: modificarli all'interno del metodo non cambia le variabili del chiamante.
- Usa `System.out.println()` per stampare il risultato nel `main`.

## Soluzione

```java
--8<-- "Java/Somma-di-due-numeri/SommaNumeri.java"
```

<div class="oc-embed"
     data-path="Java/Somma-di-due-numeri/SommaNumeri.java"
     data-lang="java">
</div>
