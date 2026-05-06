# Algoritmo di Cesare

Codificare una frase secondo l'algoritmo di Cesare.

## Obiettivo

Il programma deve leggere una frase inserita dall'utente e una chiave di cifratura (un numero intero), quindi codificare la frase applicando la cifratura di Cesare.

## Descrizione

La **cifratura di Cesare** è uno dei più antichi algoritmi crittografici, usata da Giulio Cesare per le comunicazioni militari. Ogni lettera del messaggio viene sostituita con la lettera che si trova k posizioni più avanti nell'alfabeto, dove k è la chiave di cifratura. I caratteri che non sono lettere (spazi, cifre, punteggiatura) vengono lasciati invariati.

Ad esempio, con chiave k = 3:

| Originale | A | B | C | ... | X | Y | Z |
|-----------|---|---|---|-----|---|---|---|
| Cifrato   | D | E | F | ... | A | B | C |

La lettera **A** diventa **D**, la **Z** diventa **C** (si "avvolge" tornando all'inizio dell'alfabeto). La stessa logica si applica separatamente alle lettere minuscole e a quelle maiuscole.

La decifratura si ottiene usando una chiave negativa oppure sottraendo k invece di sommare.

## Suggerimenti

- Leggi la frase con `fgets(frase, sizeof(frase), stdin)` per gestire anche gli spazi.
- Per ogni carattere, verifica se è una lettera maiuscola (`>= 'A' && <= 'Z'`) o minuscola (`>= 'a' && <= 'z'`) e applica lo spostamento solo in quel caso.
- Per gestire lo "avvolgimento" usa l'operatore modulo: per le maiuscole `(c - 'A' + k) % 26 + 'A'`, in modo analogo per le minuscole.
- Gestisci chiavi negative normalizzando prima: `k = ((k % 26) + 26) % 26`.

## Soluzione

```c
--8<-- "C/Algoritmo-di-Cesare/main.c"
```

<div class="oc-embed"
     data-path="C/Algoritmo-di-Cesare/main.c"
     data-lang="c">
</div>
