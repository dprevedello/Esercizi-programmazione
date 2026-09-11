# Conto alla rovescia con while

Scrivi uno script Bash che stampi un conto alla rovescia da un numero a tua scelta fino a zero, seguito da un messaggio finale.

## Obiettivo

Stampare un conto alla rovescia da un valore iniziale fino a zero, poi un messaggio finale.

## Descrizione

Il ciclo **`while`** ripete le istruzioni al suo interno finché la condizione è vera, senza un contatore di iterazioni prefissato come nel `for`:

```bash
while (( n >= 0 )); do
    ...
done
```

A differenza del `for` in stile C, qui inizializzazione e aggiornamento della variabile vanno gestiti manualmente: la variabile va creata *prima* del ciclo, e aggiornata *dentro* il ciclo — altrimenti la condizione resterebbe sempre vera (o sempre falsa), generando un ciclo infinito o nessuna iterazione.

## Suggerimenti

- Aggiorna sempre la variabile di controllo dentro il corpo del ciclo: dimenticarlo è la causa più comune di cicli infiniti.
- `while` e `for` sono intercambiabili in molti casi: usa `while` quando il numero di ripetizioni non è noto in anticipo o dipende da una condizione.
- Prova a invertire la condizione (`(( n <= 5 ))` con incremento) per ottenere un conteggio crescente.

## Soluzione

```bash
--8<-- "Bash/Conto-alla-rovescia/main.sh"
```

<div class="oc-embed"
     data-path="Bash/Conto-alla-rovescia/main.sh"
     data-lang="bash"
     data-autorun="true">
</div>
