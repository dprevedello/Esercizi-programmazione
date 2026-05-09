# Conversione numero in binario

Convertire un numero positivo chiesto all'utente in binario, utilizzando un vettore come ausilio per il calcolo.

## Obiettivo

Il programma deve richiedere un numero intero positivo e stamparne la rappresentazione binaria, usando un vettore per memorizzare le cifre binarie durante il calcolo.

## Descrizione

La conversione da decimale a binario si ottiene dividendo ripetutamente il numero per 2 e raccogliendo i resti. I resti, letti in ordine inverso rispetto a come vengono prodotti, formano la rappresentazione binaria.

A differenza dell'esercizio 41, in cui i passaggi intermedi venivano mostrati uno a uno, qui l'obiettivo è raccogliere tutti i resti in un vettore e poi stamparli al contrario, ottenendo direttamente la stringa binaria finale.

Ad esempio, per convertire 13:

| Divisione | Quoziente | Resto |
|-----------|-----------|-------|
| 13 ÷ 2    | 6         | 1     |
| 6 ÷ 2     | 3         | 0     |
| 3 ÷ 2     | 1         | 1     |
| 1 ÷ 2     | 0         | 1     |

I resti nel vettore sono [1, 0, 1, 1]; stampati al contrario: **1101**.

## Suggerimenti

- Dichiara un vettore di interi di dimensione 64 (sufficiente per un `long` a 64 bit) e un indice inizializzato a 0.
- Usa un ciclo per dividere progressivamente il numero per 2 salvando i resti nel vettore.
- Memorizza il numero di cifre binarie inserite.
- Stampa il vettore scorrendolo dall'ultima cifra memorizzata fino alla prima.
- Usa un ciclo `do-while` per la validazione: accetta solo valori maggiori di 0.

## Soluzione

```c
--8<-- "C/Conversione-numero-in-binario/main.c"
```

<div class="oc-embed"
     data-path="C/Conversione-numero-in-binario/main.c"
     data-lang="c">
</div>
