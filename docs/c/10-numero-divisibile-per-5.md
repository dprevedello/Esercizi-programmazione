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

```c
--8<-- "C/Numero-divisibile-per-5/main.c"
```

<div class="oc-embed"
     data-path="C/Numero-divisibile-per-5/main.c"
     data-lang="c"
     data-stdin="15"
     data-autorun="true">
</div>
