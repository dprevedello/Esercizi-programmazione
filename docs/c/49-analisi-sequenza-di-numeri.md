# Analisi sequenza di numeri

Leggere N numeri interi da tastiera e calcolarne statistiche su segno, parità e andamento.

## Obiettivo

Il programma deve chiedere all'utente quanti numeri inserire (N), leggere la sequenza e stampare:

1. Quanti numeri sono **positivi**, **nulli** e **negativi**
2. Quanti sono **pari** e **dispari**
3. Se la sequenza è **crescente**, **decrescente** oppure **né crescente né decrescente**

## Descrizione

Dati N numeri interi letti da tastiera (con N scelto dall'utente) si vogliono calcolare e stampare: 1) quanti sono i numeri **positivi**, **nulli** e **negativi**; 2) quanti sono i numeri **pari** e **dispari**; 3) se la sequenza è **crescente**, **decrescente** oppure **né crescente né decrescente**.

Per analizzare l'andamento della sequenza è utile confrontare ogni elemento con il precedente. Si possono usare un tipo enumerativo (`enum`) o variabili flag per tenere traccia dell'andamento rilevato finora. Una sequenza è crescente se ogni elemento è strettamente maggiore del precedente, decrescente se strettamente minore; altrimenti non è né l'una né l'altra.

## Suggerimenti

- Usa un `enum` (ad esempio `CRESCENTE`, `DECRESCENTE`, `MISTO`) per rappresentare lo stato dell'andamento in modo leggibile.
- Leggi il primo numero separatamente e inizializza le variabili di confronto; poi usa un ciclo `for` per i restanti N-1 numeri.
- Aggiorna i contatori di segno e parità ad ogni iterazione con `if-else` e l'operatore `%`.
- Gestisci la validazione di N con un `do-while`: accetta solo valori N >= 1.

## Soluzione

```c
--8<-- "C/Analisi-sequenza-di-numeri/main.c"
```

<div class="oc-embed"
     data-path="C/Analisi-sequenza-di-numeri/main.c"
     data-lang="c">
</div>
