# Disegno di figure geometriche

Leggere un numero intero N e visualizzare quattro diverse figure geometriche basate su asterischi e caratteri misti.

## Obiettivo

Il programma deve leggere un intero N e stampare le seguenti figure:

1. Un quadrato pieno di asterischi di lato N
2. Lo stesso quadrato con solo i lati (versione vuota)
3. Un triangolo isoscele rettangolo di lato N
4. Un quadrato di lato N con caratteri alternati `*` e `+`

## Descrizione

Ogni figura richiede una logica diversa per decidere quale carattere stampare in ogni posizione:

1. **Quadrato pieno**: ogni cella contiene `*`.
2. **Quadrato vuoto**: si stampa `*` solo se la cella è sul bordo (prima/ultima riga o prima/ultima colonna), altrimenti uno spazio.
3. **Triangolo isoscele rettangolo**: alla riga i (partendo da 0) si stampano i+1 asterischi. La figura cresce verso destra scendendo di riga in riga.
4. **Quadrato con caratteri misti**: il carattere varia in base alla posizione. Ad esempio, si usa `*` se la somma degli indici i+j è pari, `+` se è dispari (o viceversa), ottenendo un effetto a scacchiera.

## Suggerimenti

- Struttura il programma in quattro sezioni distinte, ognuna con il proprio doppio ciclo `for`.
- Per il triangolo, il ciclo interno va da 0 a i (compreso), dove i è l'indice di riga.
- Per il quadrato con caratteri misti, sfrutta la parità di `(i + j)` per alternare i caratteri.
- Separa le figure con una riga vuota e un'intestazione (es. "Figura 1:") per rendere l'output più chiaro.

## Soluzione

```c
--8<-- "C/Disegno-di-figure-geometriche/main.c"
```

<div class="oc-embed"
     data-path="C/Disegno-di-figure-geometriche/main.c"
     data-lang="c">
</div>
