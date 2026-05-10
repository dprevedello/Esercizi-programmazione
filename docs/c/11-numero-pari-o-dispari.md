# Numero pari o dispari

Dato un numero intero inserito dall'utente, il programma determina se è pari o dispari e comunica il risultato.

## Obiettivo

Leggere un numero intero da tastiera e stampare se esso è pari o dispari.

## Descrizione

Un numero intero è **pari** se il resto della sua divisione per 2 è uguale a zero, **dispari** altrimenti. In C, il resto della divisione intera si calcola con l'operatore `%` (modulo): se `n % 2 == 0` allora il numero è pari.

## Suggerimenti

- Usa `scanf` per acquisire un intero e `printf` per stampare il risultato.
- L'operatore `%` restituisce il resto della divisione intera: verifica che `n % 2` sia uguale a `0`.
- Utilizza un costrutto `if-else` per gestire i due casi (pari / dispari).
- Considera anche il caso del numero zero: per convenzione è considerato pari.

## Soluzione

```c
--8<-- "C/Numero-pari-o-dispari/main.c"
```

<div class="oc-embed"
     data-path="C/Numero-pari-o-dispari/main.c"
     data-lang="c"
     data-stdin="7"
     data-autorun="true">
</div>
