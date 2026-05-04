# Stampa dei mesi

Dato un numero intero tra 1 e 12, il programma stampa per esteso il nome del mese corrispondente.

## Obiettivo

Acquisire un numero intero che rappresenta un mese e visualizzare il nome del mese corrispondente (da "Gennaio" a "Dicembre"). Se il numero non è compreso tra 1 e 12, segnalare un errore.

## Descrizione

Questo esercizio è un'applicazione classica del costrutto `switch-case`: a ciascun valore intero viene associata un'azione specifica (la stampa del nome del mese). Il caso `default` gestisce i valori non validi.

## Suggerimenti

- Usa il costrutto `switch` con un `case` per ciascuno dei 12 mesi.
- Non dimenticare l'istruzione `break` al termine di ogni `case`, altrimenti l'esecuzione prosegue nel caso successivo.
- Aggiungi un `case default` per gestire valori fuori dall'intervallo 1–12.
- In alternativa allo `switch`, potresti risolvere l'esercizio con una catena di `if-else if`, ma lo `switch` risulta più leggibile in questo caso.

## Soluzione

```c
--8<-- "C/Stampa-dei-mesi/main.c"
```

<div class="oc-embed"
     data-path="C/Stampa-dei-mesi/main.c"
     data-lang="c">
</div>
