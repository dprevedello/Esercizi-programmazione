# Indovina il numero

Il programma genera un numero casuale tra 1 e 100 e sfida l'utente a indovinarlo in massimo 10 tentativi, fornendo un suggerimento dopo ogni risposta errata.

## Obiettivo

Generare un numero segreto casuale compreso tra 1 e 100. A ogni tentativo dell'utente, comunicare se il numero segreto è maggiore o minore di quello inserito. Il gioco termina quando l'utente indovina oppure esaurisce i 10 tentativi.

## Descrizione

Il numero casuale viene generato con la funzione `rand()` della libreria `<stdlib.h>`. Per ottenere sequenze diverse a ogni esecuzione, è necessario inizializzare il generatore con `srand(time(NULL))`, usando la libreria `<time.h>`.

Il ciclo `for` gestisce il numero massimo di tentativi; un'istruzione `break` permette di uscire dal ciclo in anticipo se l'utente indovina.

## Suggerimenti

- Includi `<stdlib.h>` e `<time.h>` per `rand()`, `srand()` e `time()`.
- Per generare un numero tra 1 e 100: `numero_segreto = rand() % 100 + 1`.
- Usa una variabile booleana (o un intero `indovinato`) per sapere se uscire con successo.
- Dopo il ciclo, verifica se l'utente ha vinto o ha esaurito i tentativi e stampa il messaggio appropriato.

## Soluzione

```c
--8<-- "C/Indovina-il-numero/main.c"
```

<div class="oc-embed"
     data-path="C/Indovina-il-numero/main.c"
     data-lang="c">
</div>
