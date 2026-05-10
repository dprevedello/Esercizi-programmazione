# Valore assoluto

Dato un numero inserito da tastiera, il programma ne stampa il valore assoluto.

## Obiettivo

Leggere un numero intero e visualizzarne il valore assoluto, usando una struttura condizionale `if`.

## Descrizione

Il valore assoluto di un numero \(n\) è la sua distanza dallo zero sulla retta dei numeri: è sempre non negativo. Formalmente:

$$|n| = \begin{cases} n & \text{se } n \geq 0 \\ -n & \text{se } n < 0 \end{cases}$$

Questo è uno dei primi esempi di utilizzo della struttura condizionale `if`: il programma deve prendere una decisione in base al segno del numero inserito.

## Suggerimenti

- La libreria `<math.h>` fornisce la funzione `abs()` che calcola direttamente il valore assoluto di un `int`. In questo esercizio è però utile implementarlo manualmente con un `if` per esercitarsi con la struttura condizionale.
- Se il numero è negativo, basta cambiarne il segno moltiplicandolo per `-1` (o scrivendolo come `-n`).
- Se il numero è già positivo o zero, non serve fare nulla.
- Prova con -7: il risultato atteso è 7. Prova anche con 0 e con un numero positivo.

## Soluzione

```c
--8<-- "C/Valore-assoluto/main.c"
```

<div class="oc-embed"
     data-path="C/Valore-assoluto/main.c"
     data-lang="c"
     data-stdin="-7"
     data-autorun="true">
</div>
