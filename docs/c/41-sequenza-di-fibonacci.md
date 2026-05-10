# Sequenza di Fibonacci

Calcolare l'n-esimo numero di Fibonacci con n chiesto all'utente e validato.

## Obiettivo

Il programma deve richiedere un numero intero positivo n (con validazione) e calcolare l'n-esimo termine della successione di Fibonacci.

## Descrizione

Leonardo Pisano detto "filio Bonacci" o Fibonacci (Pisa 1175 ca. – 1240 ca.) fu un famoso matematico italiano. La successione di Fibonacci nacque da un problema concreto proposto dall'Imperatore Federico II di Svevia a Pisa nel 1223: **"Quante coppie di conigli si ottengono in un anno, supponendo che ogni coppia dia alla luce un'altra coppia ogni mese e che le coppie più giovani siano in grado di riprodursi già al secondo mese di vita?"**.

La serie è: 1, 1, 2, 3, 5, 8, 13, 21, 34, 55, 89, 144, 233, 377, ... dove ogni numero si ottiene come somma dei due precedenti.

<iframe width="560" height="315" src="https://www.youtube.com/embed/cCJU5By_b8U" title="Sequenza di Fibonacci" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="display: block; margin: auto;"></iframe>

Il calcolo iterativo richiede solo tre variabili: i due termini precedenti e quello corrente, aggiornati ad ogni passo del ciclo.

## Suggerimenti

- Usa un ciclo `do-while` per validare n: accetta solo valori maggiori di 0.
- Gestisci i casi base: F(1) = 1 e F(2) = 1.
- Nel ciclo `for` da 2 a n, calcola il termine corrente come somma dei due precedenti e aggiorna le variabili di appoggio.
- Usa il tipo `long` per gestire valori di n elevati senza overflow.

## Soluzione

```c
--8<-- "C/Sequenza-di-Fibonacci/main.c"
```

<div class="oc-embed"
     data-path="C/Sequenza-di-Fibonacci/main.c"
     data-lang="c"
     data-stdin="10"
     data-autorun="true">
</div>
