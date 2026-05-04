# Hello World

Il primo programma che si scrive in quasi tutti i linguaggi di programmazione: visualizzare un messaggio di saluto sulla console.

## Obiettivo

Stampare la stringa `Hello, World!` sullo schermo.

## Descrizione

"Hello, World!" è per tradizione il programma introduttivo di ogni linguaggio di programmazione. La sua semplicità lo rende ideale per verificare che l'ambiente di sviluppo funzioni correttamente e per prendere confidenza con la struttura di base di un programma in C.

Un programma in C è composto almeno da:
- la direttiva `#include <stdio.h>` che include la libreria standard di input/output,
- la funzione `main()` che è il punto di ingresso del programma,
- la funzione `printf()` che stampa testo sulla console.

## Suggerimenti

- Ogni istruzione in C termina con il punto e virgola `;`.
- La sequenza `\n` all'interno di una stringa rappresenta il carattere di a capo (newline).
- La funzione `printf()` è dichiarata nell'intestazione `<stdio.h>`: senza l'inclusione di questa libreria il programma non compila.
- Il valore restituito da `main()` con `return 0;` indica al sistema operativo che il programma è terminato senza errori.

## Soluzione

```c
--8<-- "C/Hello-world/main.c"
```

<div class="oc-embed"
     data-path="C/Hello-world/main.c"
     data-lang="c">
</div>
