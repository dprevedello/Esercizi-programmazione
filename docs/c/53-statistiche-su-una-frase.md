# Statistiche su una frase

Letta una frase, dire da quanti caratteri, lettere maiuscole/minuscole, vocali/consonanti, cifre, parole è composta.

## Obiettivo

Il programma deve leggere una frase inserita dall'utente e stampare le seguenti statistiche:

- numero totale di caratteri (escluso il terminatore `\0`)
- numero di lettere maiuscole e di lettere minuscole
- numero di vocali e di consonanti
- numero di cifre numeriche
- numero di parole

## Descrizione

L'analisi di una stringa richiede di scorrere ogni carattere e classificarlo. La libreria `<ctype.h>` mette a disposizione funzioni utili: `isupper()`, `islower()`, `isdigit()`, `isalpha()`, `isspace()` che restituiscono un valore non nullo se la condizione è vera.

Le vocali sono le lettere a, e, i, o, u (maiuscole e minuscole). Le consonanti sono tutte le lettere che non sono vocali.

Il conteggio delle parole si basa sul numero di transizioni da "spazio" a "non spazio": ogni volta che si incontra un carattere non bianco preceduto da uno spazio (o dall'inizio della stringa), si conta una nuova parola.

## Suggerimenti

- Leggi la frase con `fgets(frase, sizeof(frase), stdin)` per includere gli spazi.
- Usa un ciclo `for` o `while` con le funzioni di `<ctype.h>` per classificare ogni carattere.
- Per riconoscere le vocali, crea una stringa di riferimento `"aeiouAEIOU"` e usa `strchr()` oppure un `if` con condizioni multiple.
- Per contare le parole, tieni traccia di una variabile booleana `in_parola`: passa a 1 quando trovi un carattere non bianco dopo uno spazio, torna a 0 allo spazio.

## Soluzione

```c
--8<-- "C/Statistiche-su-una-frase/main.c"
```

<div class="oc-embed"
     data-path="C/Statistiche-su-una-frase/main.c"
     data-lang="c">
</div>
