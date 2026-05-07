# Sequenza di Fibonacci (ricorsivo)

Calcolare l'n-esimo numero di Fibonacci con n chiesto all'utente e validato, utilizzando le funzioni ricorsive.

## Obiettivo

Il programma deve richiedere un numero intero positivo n (con validazione) e calcolare l'n-esimo termine della successione di Fibonacci tramite una funzione ricorsiva.

## Descrizione

La successione di Fibonacci (1, 1, 2, 3, 5, 8, ...) nasce da un problema proposto da Federico II di Svevia nel 1223 e fu risolta da Leonardo Pisano detto Fibonacci.

<iframe width="560" height="315" src="https://www.youtube.com/embed/cCJU5By_b8U" title="Sequenza di Fibonacci" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="display: block; margin: auto;"></iframe>

**Una funzione ricorsiva** richiama sé stessa (**ricorsione diretta**) o tramite un'altra funzione (**ricorsione indiretta**). Sono necessari **casi base** e ogni chiamata deve avvicinare i parametri ai casi base.

Nel caso di Fibonacci:

- **Casi base**: `F(1) = 1` e `F(2) = 1`
- **Caso ricorsivo**: `F(n) = F(n-1) + F(n-2)`

A differenza della versione iterativa, quella ricorsiva è più elegante ma meno efficiente: per calcolare F(n) vengono effettuate un numero esponenziale di chiamate, poiché molti sottoproblemi vengono ricalcolati più volte.

## Suggerimenti

- Definisci una funzione `long long fibonacci(int n)` con due casi base (`if (n <= 2) return 1`) e il caso ricorsivo.
- Usa un ciclo `do-while` per la validazione: accetta solo valori n >= 1.
- Testa il programma con valori di n non troppo grandi (fino a circa 40): oltre, il tempo di calcolo cresce rapidamente.
- Confronta i tempi di esecuzione con la versione iterativa per apprezzare la differenza di efficienza.

## Soluzione

```c
--8<-- "C/Sequenza-di-Fibonacci-ricorsivo/main.c"
```

<div class="oc-embed"
     data-path="C/Sequenza-di-Fibonacci-ricorsivo/main.c"
     data-lang="c">
</div>
