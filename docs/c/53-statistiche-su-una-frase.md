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

L'analisi di una stringa richiede di scorrere ogni carattere e classificarlo usando confronti diretti sui codici ASCII per distinguere:
- lettere maiuscole e minuscole
- vocali e consonanti
- cifre numeriche

Le vocali sono le lettere a, e, i, o, u (maiuscole e minuscole). Le consonanti sono tutte le lettere che non sono vocali.

Il conteggio delle parole si basa sul numero di transizioni da "spazio" a "non spazio": ogni volta che si incontra un carattere non bianco preceduto da uno spazio (o dall'inizio della stringa), si conta una nuova parola.

## Suggerimenti

- Leggi la frase con `fgets(frase, sizeof(frase), stdin)` per includere gli spazi.
- Usa confronti diretti tra caratteri (`'a' <= c <= 'z'`, ecc.) per classificare i caratteri.
- Per identificare le vocali usa confronti espliciti con:
  `a, e, i, o, u` sia maiuscole sia minuscole.
- Per contare le parole, tieni traccia di una variabile flag che passa a 1 quando trovi un carattere non bianco dopo uno spazio, torna a 0 allo spazio.

## Soluzione

```c
--8<-- "C/Statistiche-su-una-frase/main.c"
```

<div class="oc-embed"
     data-path="C/Statistiche-su-una-frase/main.c"
     data-lang="c"
     data-stdin="Hello World 123\n"
     data-autorun="true">
</div>
