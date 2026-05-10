# Indovina il numero

Il programma genera un numero casuale tra 1 e 100 e sfida l'utente a indovinarlo in massimo 10 tentativi, fornendo un suggerimento dopo ogni risposta errata.

## Obiettivo

Generare un numero segreto casuale compreso tra 1 e 100. A ogni tentativo dell'utente, comunicare se il numero segreto è maggiore o minore di quello inserito. Il gioco termina quando l'utente indovina oppure esaurisce i 10 tentativi.

## Descrizione

Il numero casuale viene generato con la funzione `rand()` della libreria `<stdlib.h>`. Per ottenere sequenze diverse a ogni esecuzione, è necessario inizializzare il generatore con `srand(time(NULL))`, usando la libreria `<time.h>`.

Il ciclo `for` gestisce il numero massimo di tentativi; la condizione del for deve permettere di uscire dal ciclo in anticipo se l'utente indovina.

## Suggerimenti

- Includi `<stdlib.h>` e `<time.h>` per `rand()`, `srand()` e `time()`.
- Per generare un numero tra 1 e 100: `n = rand() % 100 + 1`.
- Usa una condizione composta per sapere se uscire con successo `valore!=n`.
- Nel ciclo, verifica se l'utente ha vinto o meno e stampa il messaggio appropriato.

## Soluzione

```c
--8<-- "C/Indovina-il-numero/main.c"
```

<div class="oc-embed"
     data-path="C/Indovina-il-numero/main.c"
     data-lang="c"
     data-stdin="50\n25\n75\n12\n37\n63\n88\n44\n56\n31\n68\n81\n93\n6\n18\n3\n9\n15\n21\n28\n34\n40\n47\n53\n59\n65\n71\n77\n84\n90\n96\n99\n100\n1\n2\n4\n5\n7\n8\n10\n11\n13\n14\n16\n17\n19\n20\n22\n23\n24\n26\n27\n29\n30\n32\n33\n35\n36\n38\n39\n41\n42\n43\n45\n46\n48\n49\n51\n52\n54\n55\n57\n58\n60\n61\n62\n64\n66\n67\n69\n70\n72\n73\n74\n76\n78\n79\n80\n82\n83\n85\n86\n87\n89\n91\n92\n94\n95\n97\n98"
     data-autorun="true">
</div>
