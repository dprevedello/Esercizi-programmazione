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

Il programma mostra le divisioni successive per 2 e successivamente stampa il numero binario utilizzando operazioni bit a bit (bitwise), senza usare vettori.

## Suggerimenti

- Usa un ciclo `do-while` per la validazione: accetta solo valori maggiori o uguali a 0.
- Stampa ogni passo della divisione (numero, quoziente, resto) durante il ciclo di conversione.
- Dopo aver determinato il numero di cifre binarie necessarie, stampa il risultato usando operazioni bit a bit con `printf("%d", 1<<i & numero && 1);`.

## Soluzione

```c
--8<-- "C/Stampa-numero-binario/main.c"
```

<div class="oc-embed"
     data-path="C/Stampa-numero-binario/main.c"
     data-lang="c"
     data-stdin="13"
     data-autorun="true">
</div>
