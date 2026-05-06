# Calcolo mcm (base)

Calcolare il minimo comune multiplo (mcm) di due numeri interi positivi tramite apposita funzione.

## Obiettivo

Il programma deve richiedere due numeri interi positivi e calcolarne il minimo comune multiplo con un approccio diretto basato sui multipli, implementato in una funzione dedicata.

## Descrizione

Dati due numeri interi N1 ed N2, il minimo comune multiplo è il più piccolo numero M divisibile sia per N1 che per N2. Ipotizzando che N1 sia più grande di N2, l'mcm è il primo multiplo di N1 che risulta divisibile per N2 (con resto pari a zero).

Ad esempio, per calcolare mcm(12, 8): si scorrono i multipli di 12 (12, 24, 36, ...) e si verifica quale è il primo divisibile per 8. Il primo è 24, quindi **mcm(12, 8) = 24**.

Questo approccio è semplice da implementare ma può risultare lento per numeri grandi. L'esercizio successivo mostra un metodo più efficiente basato sull'algoritmo di Euclide.

## Suggerimenti

- Crea una funzione `int mcm(int n1, int n2)` che scorre i multipli del maggiore tra n1 e n2.
- Prima di entrare nel ciclo, determina quale dei due numeri è il maggiore.
- Il ciclo parte dal valore maggiore e avanza di quel valore ad ogni passo: `m += maggiore`.
- Imposta una condizione di uscita sicura (ad esempio un numero massimo di iterazioni) per evitare cicli infiniti in caso di input anomali.

## Soluzione

```c
--8<-- "C/Calcolo-mcm-base/main.c"
```

<div class="oc-embed"
     data-path="C/Calcolo-mcm-base/main.c"
     data-lang="c">
</div>
