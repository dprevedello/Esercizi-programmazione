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
     data-lang="java"
     data-stdin="50\n25\n75\n12\n37\n63\n88\n44\n56\n31\n68\n81\n93\n6\n18\n3\n9\n15\n21\n28\n34\n40\n47\n53\n59\n65\n71\n77\n84\n90\n96\n99\n100\n1\n2\n4\n5\n7\n8\n10\n11\n13\n14\n16\n17\n19\n20\n22\n23\n24\n26\n27\n29\n30\n32\n33\n35\n36\n38\n39\n41\n42\n43\n45\n46\n48\n49\n51\n52\n54\n55\n57\n58\n60\n61\n62\n64\n66\n67\n69\n70\n72\n73\n74\n76\n78\n79\n80\n82\n83\n85\n86\n87\n89\n91\n92\n94\n95\n97\n98"
     data-autorun="true">
</div>
