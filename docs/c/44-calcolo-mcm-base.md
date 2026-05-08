# Calcolo mcm (base)

Calcolare il minimo comune multiplo (mcm) di due numeri interi positivi tramite apposita funzione.

## Obiettivo

Il programma deve richiedere due numeri interi positivi e calcolarne il minimo comune multiplo con un approccio diretto basato sui multipli, implementato in una funzione dedicata.

## Descrizione

Dati due numeri interi N1 ed N2, il minimo comune multiplo è il più piccolo numero M divisibile sia per N1 che per N2. L'mcm può essere trovato cercando il primo multiplo del numero minore che sia divisibile per il numero maggiore (con resto pari a zero).

Ad esempio, per calcolare mcm(12, 8): si scorrono i multipli di 8 (16, 24, 32, ...) e si verifica quale è il primo divisibile per 12. Il primo è 24, quindi **mcm(12, 8) = 24**.

Questo approccio è semplice da implementare ma può risultare lento per numeri grandi. L'esercizio successivo mostra un metodo più efficiente basato sull'algoritmo di Euclide.

## Suggerimenti

- Crea una funzione `int mcm(int n1, int n2)` che individua il numero maggiore e quello minore.
- Genera progressivamente i multipli del numero minore.
- Per ogni multiplo verifica se è divisibile per il numero maggiore usando l'operatore `%`.
- Puoi usare un ciclo `for` e calcolare i multipli come `minore * i`.
- Imposta una condizione di uscita sicura (ad esempio un numero massimo di iterazioni) per evitare cicli infiniti in caso di input anomali.

## Soluzione

```c
--8<-- "C/Calcolo-mcm-base/main.c"
```

<div class="oc-embed"
     data-path="C/Calcolo-mcm-base/main.c"
     data-lang="c">
</div>
