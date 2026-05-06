# Stampa rettangolo personalizzato

Stampare un rettangolo con caratteri scelti dall'utente per bordo e contenuto, con dimensioni minime di 3 righe e 3 colonne.

## Obiettivo

Il programma deve chiedere all'utente: il numero di righe e colonne (entrambi almeno 3), il carattere per il bordo e il carattere per il contenuto interno. Deve quindi disegnare il rettangolo rispettando queste impostazioni.

## Descrizione

A differenza del rettangolo base, qui è necessario distinguere tra le celle di bordo e quelle interne. Una cella appartiene al bordo se si trova sulla prima riga, sull'ultima riga, sulla prima colonna o sull'ultima colonna; tutte le altre celle sono interne.

La validazione dell'input con un ciclo `do-while` garantisce che l'utente inserisca valori ammissibili (almeno 3) prima di procedere con il disegno.

## Suggerimenti

- Usa un ciclo `do-while` per chiedere righe e colonne, ripetendo la richiesta finché i valori inseriti sono inferiori a 3.
- All'interno del doppio ciclo `for`, usa una condizione `if-else` per decidere quale carattere stampare: bordo se `i == 0 || i == righe-1 || j == 0 || j == colonne-1`, altrimenti contenuto.
- Leggi i caratteri con `scanf(" %c", &c)` (nota lo spazio prima di `%c`) per evitare che vengano letti caratteri bianchi residui nel buffer.
- Testa il programma con dimensioni minime (3×3) per verificare che il bordo e il contenuto siano corretti.

## Soluzione

```c
--8<-- "C/Stampa-rettangolo-personalizzato/main.c"
```

<div class="oc-embed"
     data-path="C/Stampa-rettangolo-personalizzato/main.c"
     data-lang="c">
</div>
