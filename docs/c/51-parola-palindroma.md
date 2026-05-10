# Parola palindroma

Chiedere all'utente una parola e verificare che sia palindroma.

## Obiettivo

Il programma deve leggere una parola inserita dall'utente e comunicare se è palindroma oppure no.

## Descrizione

Una parola è **palindroma** se si legge allo stesso modo sia da sinistra verso destra che da destra verso sinistra. Esempi classici: *radar*, *kayak*, *anna*, *level*.

Per verificarlo si confrontano i caratteri simmetrici rispetto al centro della parola: il primo con l'ultimo, il secondo con il penultimo, e così via. Il confronto si ferma al carattere centrale (o alla coppia centrale se la lunghezza è pari). Se tutti i confronti hanno esito positivo, la parola è palindroma; basta un solo disaccordo per escluderlo.

In C la lunghezza di una stringa si ottiene con la funzione `strlen()` della libreria `<string.h>`.

## Suggerimenti

- Leggi la parola con `scanf("%s", parola)` e calcolane la lunghezza con `strlen()`.
- Usa un ciclo `for` che va da 0 a `lunghezza/2 - 1` e confronta `parola[i]` con `parola[lunghezza - 1 - i]`.
- Usa una variabile flag (es. `int palindroma = 1`) che imposti a 0 al primo carattere diverso, uscendo dal ciclo con `break`.
- Stampa l'esito dopo il ciclo controllando il valore del flag.

## Soluzione

```c
--8<-- "C/Parola-palindroma/main.c"
```

<div class="oc-embed"
     data-path="C/Parola-palindroma/main.c"
     data-lang="c"
     data-stdin="radar"
     data-autorun="true">
</div>
