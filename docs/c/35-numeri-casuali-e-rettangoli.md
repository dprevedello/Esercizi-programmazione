# Numeri casuali e rettangoli

Generare due numeri casuali R e C tra 5 e 20 e disegnare un rettangolo le cui caratteristiche dipendono dai valori estratti.

## Obiettivo

Il programma deve generare casualmente il numero di righe R e di colonne C (entrambi tra 5 e 20), quindi disegnare un rettangolo seguendo queste regole:

- il rettangolo è **pieno** se R è pari, **vuoto** (solo bordo) se R è dispari;
- il carattere usato è `*` se C è minore di 10, oppure `#` se C è maggiore o uguale a 10.

## Descrizione

Questo esercizio combina la generazione di numeri casuali con il disegno di figure geometriche condizionale. Le dimensioni e l'aspetto del rettangolo cambiano ad ogni esecuzione, rendendo il programma dinamico.

Per determinare se il rettangolo è pieno o vuoto, si usa la parità di R. Per distinguere bordo e interno nelle versioni vuote, si applica la stessa logica dell'esercizio precedente: una cella è di bordo se si trova sulla prima o ultima riga oppure sulla prima o ultima colonna.

## Suggerimenti

- Per generare R e C nell'intervallo [5, 20] usa la formula `rand() % 16 + 5`.
- Stampa i valori di R e C generati, così l'utente può vedere da cosa dipende il disegno.
- Usa una variabile `char c` per memorizzare il carattere scelto in base a C, prima di entrare nei cicli.
- Gestisci i due casi (pieno/vuoto) con una condizione `if-else` all'interno del doppio ciclo `for`.

## Soluzione

```c
--8<-- "C/Numeri-casuali-e-rettangoli/main.c"
```

<div class="oc-embed"
     data-path="C/Numeri-casuali-e-rettangoli/main.c"
     data-lang="c"
     data-autorun="true">
</div>
