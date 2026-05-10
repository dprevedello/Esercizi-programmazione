# Maggiore fra tre numeri (versione 3)

Dati tre numeri inseriti dall'utente, il programma stampa il maggiore. In questa versione si utilizza l'operatore ternario `?:` (if-inline).

## Obiettivo

Leggere tre numeri da tastiera e visualizzare il valore più alto tra i tre, sfruttando l'operatore condizionale `?:`.

## Descrizione

In questa terza versione si introduce l'**operatore ternario** `?:`, detto anche *if-inline*, che permette di scrivere un'espressione condizionale in forma compatta:

```
condizione ? valore_se_vero : valore_se_falso
```

L'operatore può essere usato per assegnare il risultato parziale a una variabile d'appoggio `maggiore`, oppure direttamente all'interno dell'istruzione `printf`, rendendo il codice molto conciso.

Ad esempio, per trovare il maggiore tra `a` e `b`:

```c
int maggiore = (a > b) ? a : b;
```

## Suggerimenti

- L'operatore `?:` è utile per espressioni semplici, ma non abusarne: quando la logica è complessa, un `if-else` esplicito è più leggibile.
- Puoi annidare due operatori ternari per coprire tutti e tre i valori, oppure usare una variabile d'appoggio intermedia.
- Confronta questa versione con le precedenti: stessa logica, sintassi diversa.
- L'operatore ternario ha una precedenza bassa; usa le parentesi per evitare ambiguità.

## Soluzione

```c
--8<-- "C/Maggiore-fra-tre-numeri-v3/main.c"
```

<div class="oc-embed"
     data-path="C/Maggiore-fra-tre-numeri-v3/main.c"
     data-lang="c"
     data-stdin="5\n3\n8"
     data-autorun="true">
</div>
