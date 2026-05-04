# Maggiore fra tre numeri (versione 2)

Dati tre numeri inseriti dall'utente, il programma stampa il maggiore. In questa versione si utilizza una variabile d'appoggio per memorizzare il risultato parziale.

## Obiettivo

Leggere tre numeri da tastiera e visualizzare il valore più alto tra i tre, usando una variabile d'appoggio chiamata `maggiore`.

## Descrizione

In questa seconda versione si introduce la variabile d'appoggio `maggiore`: si inizializza con il valore del primo numero, poi si confronta con ciascuno degli altri. Se un numero successivo risulta più grande, `maggiore` viene aggiornata. Al termine del confronto, `maggiore` contiene il valore massimo tra i tre.

Questo approccio è più scalabile rispetto all'`if-else` annidato: se in futuro si volesse trovare il massimo tra dieci numeri, basterebbe aggiungere ulteriori confronti senza modificare la struttura del codice.

## Suggerimenti

- Inizializza `maggiore = a` prima di qualsiasi confronto.
- Confronta `maggiore` con `b`: se `b > maggiore`, aggiorna `maggiore = b`.
- Ripeti il confronto con `c`: se `c > maggiore`, aggiorna `maggiore = c`.
- Questa logica si generalizza facilmente a N numeri usando un ciclo, che vedremo negli esercizi successivi.

## Soluzione

```c
--8<-- "C/Maggiore-fra-tre-numeri-v2/main.c"
```

<div class="oc-embed"
     data-path="C/Maggiore-fra-tre-numeri-v2/main.c"
     data-lang="c">
</div>
