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

<div class="onecompiler-wrapper" markdown="0">
  <div class="onecompiler-header">
    <span class="onecompiler-icon">▶</span>
    <span class="onecompiler-title">Hello World</span>
    <a
      class="onecompiler-external"
      href="https://onecompiler.com/c?hideNew=true&hideTitle=true&code=I2luY2x1ZGUgPHN0ZGlvLmg+CgppbnQgbWFpbigpIHsKICAgIHByaW50ZigiSGVsbG8sIFdvcmxkIVxuIik7CiAgICByZXR1cm4gMDsKfQo="
      target="_blank"
      rel="noopener noreferrer"
      title="Apri in una nuova scheda"
    >↗ Apri in grande</a>
  </div>
  <iframe
    src="https://onecompiler.com/embed/c?hideNew=true&hideNewFileOption=true&hideTitle=true&theme=dark&fontSize=14&code=I2luY2x1ZGUgPHN0ZGlvLmg+CgppbnQgbWFpbigpIHsKICAgIHByaW50ZigiSGVsbG8sIFdvcmxkIVxuIik7CiAgICByZXR1cm4gMDsKfQo="
    width="100%"
    height="480"
    frameborder="0"
    allowfullscreen
    loading="lazy"
    title="Editor OneCompiler – Hello World"
  ></iframe>
</div>
