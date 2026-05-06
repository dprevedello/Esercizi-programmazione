# Stampa numero binario

Stampare il valore in binario di un numero positivo chiesto all'utente, visualizzando anche le divisioni successive.

## Obiettivo

Il programma deve richiedere un numero intero positivo e mostrare, passo dopo passo, le divisioni successive per 2 utilizzate per la conversione, quindi stampare il risultato in binario.

## Descrizione

La conversione di un numero decimale in binario si ottiene dividendo ripetutamente il numero per 2 e raccogliendo i resti. I resti, letti dal basso verso l'alto, formano la rappresentazione binaria.

Ad esempio, per convertire 13:

| Divisione | Quoziente | Resto |
|-----------|-----------|-------|
| 13 ÷ 2    | 6         | 1     |
| 6 ÷ 2     | 3         | 0     |
| 3 ÷ 2     | 1         | 1     |
| 1 ÷ 2     | 0         | 1     |

Leggendo i resti dal basso: 13 in binario è **1101**.

Poiché i resti vanno letti in ordine inverso rispetto a come vengono calcolati, è necessario memorizzarli (ad esempio in un vettore) prima di stamparli.

## Suggerimenti

- Usa un ciclo `do-while` per la validazione: accetta solo valori maggiori di 0.
- Stampa ogni passo della divisione (numero, quoziente, resto) durante il ciclo di conversione.
- Memorizza i resti in un vettore e stampali in ordine inverso al termine del ciclo.
- La dimensione massima del vettore può essere 32 (sufficienti per un intero a 32 bit).

## Soluzione

```c
--8<-- "C/Stampa-numero-binario/main.c"
```

<div class="oc-embed"
     data-path="C/Stampa-numero-binario/main.c"
     data-lang="c">
</div>
