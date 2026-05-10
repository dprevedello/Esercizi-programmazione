# Analisi sequenza di numeri

Leggere N numeri interi da tastiera e calcolarne statistiche su segno, parità e andamento.

## Obiettivo

Il programma deve chiedere all'utente quanti numeri inserire (N), leggere la sequenza e stampare:

1. Quanti numeri sono **positivi**, **nulli** e **negativi**
2. Quanti sono **pari** e **dispari**
3. Se la sequenza è **crescente**, **decrescente**, **né crescente né decrescente** oppure **senza andamento definibile**

## Descrizione

Dati N numeri interi letti da tastiera (con N scelto dall'utente) si vogliono calcolare e stampare: 
1) quanti sono i numeri **positivi**, **nulli** e **negativi**; 
2) quanti sono i numeri **pari** e **dispari**; 
3) se la sequenza è **crescente**, **decrescente** oppure **né crescente né decrescente**.

Per analizzare l'andamento della sequenza è utile confrontare ogni elemento con il precedente. Si possono usare un tipo enumerativo (`enum`) o variabili flag per tenere traccia dell'andamento rilevato finora. Una sequenza è crescente se ogni elemento è strettamente maggiore del precedente, decrescente se strettamente minore; altrimenti non è né l'una né l'altra.

Per tenere traccia dell'andamento della sequenza si può usare un `enum` con diversi stati:
- crescente
- decrescente
- misto
- indefinito

Lo stato `indefinito` è utile all'inizio dell'analisi, quando non è ancora possibile determinare l'andamento della sequenza.

## Suggerimenti

- Usa un `enum` per rappresentare lo stato dell'andamento della sequenza (`crescente`, `decrescente`, `misto`, `indefinito`).
- Puoi leggere tutti gli N numeri all'interno di un unico ciclo `for`.
- Mantieni in una variabile il numero precedente per confrontarlo con quello corrente.
- All'inizio usa lo stato `indefinito`, poi aggiorna il tipo della sequenza dopo i primi confronti.
- Aggiorna i contatori di segno e parità ad ogni iterazione con `if-else` e l'operatore `%`.
- Gestisci la validazione di N con un `do-while`: accetta solo valori N >= 1.

## Soluzione

```c
--8<-- "C/Analisi-sequenza-di-numeri/main.c"
```

<div class="oc-embed"
     data-path="C/Analisi-sequenza-di-numeri/main.c"
     data-lang="c"
     data-stdin="5\n1\n2\n3\n4\n5"
     data-autorun="true">
</div>
