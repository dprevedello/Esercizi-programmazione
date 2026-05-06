# Conversione numero in binario (ricorsivo)

Convertire un numero positivo chiesto all'utente in binario, utilizzando la ricorsione.

## Obiettivo

Il programma deve richiedere un numero intero positivo (con validazione) e stamparne la rappresentazione binaria tramite una funzione ricorsiva.

## Descrizione

**Una funzione ricorsiva** richiama sé stessa (**ricorsione diretta**) o tramite un'altra funzione (**ricorsione indiretta**). Affinché il procedimento abbia fine devono esistere **casi base** e ogni chiamata ricorsiva deve avvicinare i parametri ai casi base.

Per la conversione in binario con la ricorsione si osserva che:

- **Caso base**: se n == 0 oppure n == 1, stampa n e termina.
- **Caso ricorsivo**: chiama la funzione su `n / 2`, poi stampa `n % 2`.

La chiamata ricorsiva su `n / 2` avviene prima della stampa di `n % 2`: questo fa sì che i bit vengano stampati nell'ordine corretto (dal più significativo al meno significativo), senza bisogno di un vettore di appoggio.

Ad esempio, per convertire 13: la catena di chiamate è 13 → 6 → 3 → 1, e i resti vengono stampati nella fase di risalita: 1, 1, 0, 1 → **1101**.

## Suggerimenti

- Definisci una funzione `void toBinary(int n)` con il caso base `if (n <= 1) { printf("%d", n); return; }`.
- Il caso ricorsivo è: prima `toBinary(n / 2)`, poi `printf("%d", n % 2)`.
- Usa un `do-while` per la validazione dell'input: accetta solo valori maggiori di 0.
- Confronta il risultato con quello degli esercizi 41 e 54 per verificare la correttezza.

## Soluzione

```c
--8<-- "C/Conversione-numero-in-binario-ricorsivo/main.c"
```

<div class="oc-embed"
     data-path="C/Conversione-numero-in-binario-ricorsivo/main.c"
     data-lang="c">
</div>
