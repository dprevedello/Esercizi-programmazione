# Palindromo

Scrivi uno script Bash che, data una parola, stabilisca se è palindroma confrontandola con la sua versione invertita.

## Obiettivo

Dato un testo, stabilire se si tratta di una parola palindroma (si legge uguale da sinistra a destra e da destra a sinistra).

## Descrizione

In Bash una stringa non ha un metodo diretto per essere invertita: bisogna scorrerla un carattere alla volta. Due strumenti sono fondamentali per farlo:

- **`${#parola}`** restituisce la **lunghezza** della stringa;
- **`${parola:i:1}`** restituisce il **sottostringa** che parte dalla posizione `i` e lunga 1 carattere (le posizioni partono da 0).

Scorrendo l'indice `i` dall'ultimo carattere fino al primo e accumulando ogni carattere con l'operatore **`+=`**, si ottiene la stringa invertita.

## Suggerimenti

- L'ultimo carattere di una stringa lunga `lunghezza` si trova all'indice `lunghezza - 1` (gli indici partono da 0).
- `invertita+="${parola:i:1}"` aggiunge un carattere alla fine della stringa `invertita` a ogni iterazione.
- Confronta le due stringhe con `[ "$parola" = "$invertita" ]`, non `==`, che nel comando `[ ]` classico non è garantito su tutte le shell.

## Soluzione

```bash
--8<-- "Bash/Palindromo/main.sh"
```

<div class="oc-embed"
     data-path="Bash/Palindromo/main.sh"
     data-lang="bash"
     data-autorun="true">
</div>
