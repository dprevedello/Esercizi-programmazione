# Valore assoluto

Dato un numero inserito da tastiera, il programma ne stampa il valore assoluto.

## Obiettivo

Leggere un numero reale e visualizzarne il valore assoluto, usando una struttura condizionale `if`.

## Descrizione

Il valore assoluto di un numero \(n\) è la sua distanza dallo zero sulla retta dei numeri: è sempre non negativo. Formalmente:

$$|n| = \begin{cases} n & \text{se } n \geq 0 \\ -n & \text{se } n < 0 \end{cases}$$

Questo è uno dei primi esempi di utilizzo della struttura condizionale `if`: il programma deve prendere una decisione in base al segno del numero inserito.

## Suggerimenti

- La libreria `<math.h>` fornisce la funzione `fabs()` che calcola direttamente il valore assoluto di un `double`. In questo esercizio è però utile implementarlo manualmente con un `if` per esercitarsi con la struttura condizionale.
- Se il numero è negativo, basta cambiarne il segno moltiplicandolo per `-1` (o scrivendolo come `-n`).
- Se il numero è già positivo o zero, non serve fare nulla.
- Prova con -7.5: il risultato atteso è 7.50. Prova anche con 0 e con un numero positivo.

## Soluzione

<div class="onecompiler-wrapper" markdown="0">
  <div class="onecompiler-header">
    <span class="onecompiler-icon">▶</span>
    <span class="onecompiler-title">Valore assoluto</span>
    <a
      class="onecompiler-external"
      href="https://onecompiler.com/c?hideNew=true&hideTitle=true&code=I2luY2x1ZGUgPHN0ZGlvLmg+CgppbnQgbWFpbigpIHsKICAgIGRvdWJsZSBuOwogICAgcHJpbnRmKCJJbnNlcmlzY2kgdW4gbnVtZXJvOiAiKTsKICAgIHNjYW5mKCIlbGYiLCAmbik7CiAgICBpZiAobiA8IDApCiAgICAgICAgbiA9IC1uOwogICAgcHJpbnRmKCJWYWxvcmUgYXNzb2x1dG86ICUuMmZcbiIsIG4pOwogICAgcmV0dXJuIDA7Cn0K"
      target="_blank"
      rel="noopener noreferrer"
      title="Apri in una nuova scheda"
    >↗ Apri in grande</a>
  </div>
  <iframe
    src="https://onecompiler.com/embed/c?hideNew=true&hideNewFileOption=true&hideTitle=true&theme=dark&fontSize=14&code=I2luY2x1ZGUgPHN0ZGlvLmg+CgppbnQgbWFpbigpIHsKICAgIGRvdWJsZSBuOwogICAgcHJpbnRmKCJJbnNlcmlzY2kgdW4gbnVtZXJvOiAiKTsKICAgIHNjYW5mKCIlbGYiLCAmbik7CiAgICBpZiAobiA8IDApCiAgICAgICAgbiA9IC1uOwogICAgcHJpbnRmKCJWYWxvcmUgYXNzb2x1dG86ICUuMmZcbiIsIG4pOwogICAgcmV0dXJuIDA7Cn0K"
    width="100%"
    height="480"
    frameborder="0"
    allowfullscreen
    loading="lazy"
    title="Editor OneCompiler – Valore assoluto"
  ></iframe>
</div>
