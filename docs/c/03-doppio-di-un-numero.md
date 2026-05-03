# Doppio di un numero

Dato un numero inserito dall'utente, il programma calcola e visualizza il suo doppio.

## Obiettivo

Leggere un valore numerico da tastiera e stampare il risultato della moltiplicazione per 2.

## Descrizione

Il doppio di un numero \(n\) è semplicemente:

$$d = 2 \cdot n$$

L'esercizio introduce la lettura di un valore con `scanf()`, l'esecuzione di un'operazione aritmetica elementare e la stampa del risultato con `printf()`.

## Suggerimenti

- Usa il tipo `double` per poter gestire anche numeri con la virgola (ad esempio, il doppio di 3.5 è 7.0).
- Puoi calcolare il doppio direttamente all'interno di `printf()`, senza usare una variabile aggiuntiva: `printf("%.2f", 2 * n);`.
- Ricorda il formato `%lf` per leggere un `double` con `scanf()`.
- Verifica il programma con valori semplici: inserendo 5, il risultato atteso è 10.00.

## Soluzione

<div class="onecompiler-wrapper" markdown="0">
  <div class="onecompiler-header">
    <span class="onecompiler-icon">▶</span>
    <span class="onecompiler-title">Doppio di un numero</span>
    <a
      class="onecompiler-external"
      href="https://onecompiler.com/c?hideNew=true&hideTitle=true&code=I2luY2x1ZGUgPHN0ZGlvLmg+CgppbnQgbWFpbigpIHsKICAgIGRvdWJsZSBuOwogICAgcHJpbnRmKCJJbnNlcmlzY2kgdW4gbnVtZXJvOiAiKTsKICAgIHNjYW5mKCIlbGYiLCAmbik7CiAgICBwcmludGYoIklsIGRvcHBpbyBkaSAlLjJmIGUnOiAlLjJmXG4iLCBuLCAyICogbik7CiAgICByZXR1cm4gMDsKfQo="
      target="_blank"
      rel="noopener noreferrer"
      title="Apri in una nuova scheda"
    >↗ Apri in grande</a>
  </div>
  <iframe
    src="https://onecompiler.com/embed/c?hideNew=true&hideNewFileOption=true&hideTitle=true&theme=dark&fontSize=14&code=I2luY2x1ZGUgPHN0ZGlvLmg+CgppbnQgbWFpbigpIHsKICAgIGRvdWJsZSBuOwogICAgcHJpbnRmKCJJbnNlcmlzY2kgdW4gbnVtZXJvOiAiKTsKICAgIHNjYW5mKCIlbGYiLCAmbik7CiAgICBwcmludGYoIklsIGRvcHBpbyBkaSAlLjJmIGUnOiAlLjJmXG4iLCBuLCAyICogbik7CiAgICByZXR1cm4gMDsKfQo="
    width="100%"
    height="480"
    frameborder="0"
    allowfullscreen
    loading="lazy"
    title="Editor OneCompiler – Doppio di un numero"
  ></iframe>
</div>
