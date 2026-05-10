# Numero divisibile per 2 o 3

Dato un numero intero, il programma verifica se è divisibile per 2 o per 3 e, in base al risultato, calcola il triplo oppure la metà del numero.

## Obiettivo

Leggere un numero intero da tastiera e applicare la seguente regola: se è divisibile per 2 o per 3, stamparne il triplo; altrimenti stamparne la metà.

## Descrizione

L'esercizio combina l'uso dell'operatore modulo `%` con un operatore logico composto. Un numero è divisibile per 2 se `n % 2 == 0`, divisibile per 3 se `n % 3 == 0`. La condizione composta si scrive con l'operatore logico **OR** (`||`):

```
if (n % 2 == 0 || n % 3 == 0)
```

Se la condizione è vera si calcola il triplo (`3 * n`), altrimenti si calcola la metà (`n / 2.0`).

## Suggerimenti

- Usa `n / 2.0` (con il punto decimale) per ottenere un risultato in virgola mobile nel caso la metà non sia intera; in alternativa dichiara `n` come `float` o `double`.
- Ricorda la differenza tra `||` (OR logico, vera se almeno una condizione è vera) e `&&` (AND logico, vera solo se entrambe le condizioni sono vere).
- Testa il programma con numeri divisibili solo per 2 (es. 4), solo per 3 (es. 9), per entrambi (es. 6) e per nessuno dei due (es. 5).
- Nota che il numero 0 è divisibile per qualsiasi numero: verifica come si comporta il tuo programma con `n = 0`.

## Soluzione

```c
--8<-- "C/Numero-divisibile-per-2-o-3/main.c"
```

<div class="oc-embed"
     data-path="C/Numero-divisibile-per-2-o-3/main.c"
     data-lang="c"
     data-stdin="6"
     data-autorun="true">
</div>
