# Gioco "Indovina il numero"

Un classico gioco interattivo: il programma genera un numero segreto e guida il giocatore con suggerimenti "troppo alto" / "troppo basso" finché non indovina.

## Obiettivo

Implementare un metodo statico `giocoIndovina()` che genera un numero casuale tra 1 e 100, chiede ripetutamente all'utente di inserire un tentativo e, al termine, stampa il numero di tentativi impiegati.

## Descrizione

Per generare numeri casuali in Java si usa la classe `Random` (da `java.util.Random`):

```java
int n = new Random().nextInt(100) + 1;  // numero tra 1 e 100
```

Il metodo `nextInt(n)` restituisce un intero in `[0, n-1]`; sommando 1 si ottiene `[1, n]`.

Il ciclo `do-while` è ideale per questo problema: il corpo viene eseguito almeno una volta (chiediamo sempre almeno un tentativo) e si ripete finché la condizione è vera.

## Suggerimenti

- Dichiara un contatore `tentativi` e incrementalo a ogni iterazione del ciclo.
- La condizione di uscita dal `do-while` è `numero != nSegreto`.
- Il confronto `>` / `<` determina il messaggio di suggerimento.
- `new Random().nextInt(100) + 1` crea l'oggetto `Random` al volo senza salvarlo in una variabile.

## Soluzione

```java
--8<-- "Java/Gioco-indovina-il-numero/IndovinaNumero.java"
```

<div class="oc-embed"
     data-path="Java/Gioco-indovina-il-numero/IndovinaNumero.java"
     data-lang="java">
</div>
