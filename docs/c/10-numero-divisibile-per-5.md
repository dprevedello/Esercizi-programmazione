# Numero divisibile per 5

Dato un numero intero, il programma comunica all'utente se è divisibile per 5, ma solo in caso affermativo.

## Obiettivo

Leggere un numero intero e stampare un messaggio esclusivamente se il numero è divisibile per 5.

## Descrizione

Un numero intero \(n\) è divisibile per 5 se il resto della divisione intera per 5 è zero:

$$n \mod 5 = 0$$

In C, l'operatore modulo `%` calcola il resto della divisione intera. Se `n % 5 == 0`, il numero è divisibile per 5 e si stampa il messaggio; altrimenti il programma termina senza produrre output.

Questo esercizio introduce l'uso di `if` senza `else`: la struttura condizionale esegue un'azione solo al verificarsi di una condizione, ignorando il caso contrario.

## Suggerimenti

- L'operatore `%` funziona solo con operandi di tipo intero (`int`, `long`): non usarlo con `float` o `double`.
- Il numero 0 è divisibile per qualsiasi numero diverso da zero: verificalo inserendo 0 nel programma.
- Prova con 15 (divisibile), con 7 (non divisibile) e con -10 (divisibile: il modulo in C può restituire un resto negativo, ma il confronto con 0 funziona correttamente).
- Per esercizio, prova a estendere il programma aggiungendo un `else` che stampa un messaggio anche nel caso di non divisibilità.

## Soluzione

<div class="onecompiler-wrapper" markdown="0">
  <div class="onecompiler-header">
    <span class="onecompiler-icon">▶</span>
    <span class="onecompiler-title">Numero divisibile per 5</span>
    <a
      class="onecompiler-external"
      href="https://onecompiler.com/c?hideNew=true&hideTitle=true&code=I2luY2x1ZGUgPHN0ZGlvLmg+CgppbnQgbWFpbigpIHsKICAgIGludCBuOwogICAgcHJpbnRmKCJJbnNlcmlzY2kgdW4gbnVtZXJvIGludGVybzogIik7CiAgICBzY2FuZigiJWQiLCAmbik7CiAgICBpZiAobiAlIDUgPT0gMCkKICAgICAgICBwcmludGYoIiVkIGUnIGRpdmlzaWJpbGUgcGVyIDUuXG4iLCBuKTsKICAgIHJldHVybiAwOwp9Cg=="
      target="_blank"
      rel="noopener noreferrer"
      title="Apri in una nuova scheda"
    >↗ Apri in grande</a>
  </div>
  <iframe
    src="https://onecompiler.com/embed/c?hideNew=true&hideNewFileOption=true&hideTitle=true&theme=dark&fontSize=14&code=I2luY2x1ZGUgPHN0ZGlvLmg+CgppbnQgbWFpbigpIHsKICAgIGludCBuOwogICAgcHJpbnRmKCJJbnNlcmlzY2kgdW4gbnVtZXJvIGludGVybzogIik7CiAgICBzY2FuZigiJWQiLCAmbik7CiAgICBpZiAobiAlIDUgPT0gMCkKICAgICAgICBwcmludGYoIiVkIGUnIGRpdmlzaWJpbGUgcGVyIDUuXG4iLCBuKTsKICAgIHJldHVybiAwOwp9Cg=="
    width="100%"
    height="480"
    frameborder="0"
    allowfullscreen
    loading="lazy"
    title="Editor OneCompiler – Numero divisibile per 5"
  ></iframe>
</div>
