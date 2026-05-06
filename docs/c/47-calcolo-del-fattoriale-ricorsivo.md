# Calcolo del fattoriale (ricorsivo)

Calcolare il fattoriale di un numero chiesto all'utente utilizzando la ricorsione, con controllo dell'ammissibilità dell'input.

## Obiettivo

Il programma deve richiedere un numero intero non negativo, verificarne l'ammissibilità e calcolarne il fattoriale tramite una funzione ricorsiva.

## Descrizione

Il fattoriale è indicato con **n!** e vale il prodotto di tutti i naturali da 1 a n (con 0! = 1 per definizione).

**Una funzione ricorsiva** richiama sé stessa (**ricorsione diretta**) oppure richiama una funzione che a sua volta la richiama (**ricorsione indiretta**). Affinché il procedimento abbia fine devono esistere dei **casi base** per cui la funzione restituisce un valore senza richiamare sé stessa, e ogni chiamata ricorsiva deve avvicinare i parametri ai casi base.

Nel caso del fattoriale:

- **Caso base**: `fattoriale(0) = 1`
- **Caso ricorsivo**: `fattoriale(n) = n * fattoriale(n - 1)`

Ad ogni chiamata ricorsiva n diminuisce di 1, avvicinandosi al caso base. Lo stack delle chiamate cresce fino a raggiungere il caso base, dopodiché i valori vengono restituiti risalendo la catena.

## Suggerimenti

- Definisci una funzione `long long fattoriale(int n)` che implementa i due casi con un `if-else`.
- Il caso base è `if (n == 0) return 1`, il caso ricorsivo è `return n * fattoriale(n - 1)`.
- Usa il tipo `long long` per il valore di ritorno, per gestire risultati grandi senza overflow.
- Usa un ciclo `do-while` per la validazione dell'input: accetta solo valori n >= 0.

## Soluzione

```c
--8<-- "C/Calcolo-del-fattoriale-ricorsivo/main.c"
```

<div class="oc-embed"
     data-path="C/Calcolo-del-fattoriale-ricorsivo/main.c"
     data-lang="c">
</div>
