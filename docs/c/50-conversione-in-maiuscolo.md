# Conversione in maiuscolo

Chiedere all'utente una parola e convertirla interamente in maiuscolo.

## Obiettivo

Il programma deve leggere una parola inserita dall'utente e stamparla con tutte le lettere convertite in maiuscolo.

## Descrizione

In C le stringhe sono vettori di caratteri terminati dal carattere nullo `'\0'`. Per scorrere una stringa si usa un ciclo che avanza fino a incontrare il terminatore.

La conversione da minuscolo a maiuscolo sfrutta la codifica ASCII: le lettere minuscole (`'a'`–`'z'`) e le lettere maiuscole (`'A'`–`'Z'`) distano esattamente 32 posizioni. Una lettera minuscola si riconosce con la condizione `c >= 'a' && c <= 'z'` e si converte sottraendo 32 (oppure usando la funzione `toupper()` della libreria `<ctype.h>`).

I caratteri che non sono lettere minuscole (cifre, spazi, maiuscole già presenti) vengono lasciati invariati.

## Suggerimenti

- Leggi la parola con `scanf("%s", parola)`, che si ferma al primo spazio.
- Usa un ciclo `for` con indice intero oppure un ciclo `while (parola[i] != '\0')` per scorrere i caratteri.
- Applica la conversione con `toupper()` (includi `<ctype.h>`) oppure con la condizione `if (c >= 'a' && c <= 'z') c -= 32`.
- Stampa la parola convertita carattere per carattere oppure direttamente con `printf("%s", parola)` dopo la modifica in-place.

## Soluzione

```c
--8<-- "C/Conversione-in-maiuscolo/main.c"
```

<div class="oc-embed"
     data-path="C/Conversione-in-maiuscolo/main.c"
     data-lang="c">
</div>
