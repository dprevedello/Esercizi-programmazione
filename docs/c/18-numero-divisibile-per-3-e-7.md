# Numero divisibile per 3 e 7

Dato un numero intero, il programma verifica se è divisibile sia per 3 che per 7, comunicando l'esito sia in caso positivo che negativo.

## Obiettivo

Leggere un numero intero da tastiera e stabilire se è divisibile contemporaneamente per 3 e per 7, stampando un messaggio in entrambi i casi.

## Descrizione

A differenza dell'esercizio precedente (dove bastava la divisibilità per uno dei due), qui entrambe le condizioni devono essere soddisfatte contemporaneamente. Si usa l'operatore logico **AND** (`&&`):

```
if (n % 3 == 0 && n % 7 == 0)
```

In alternativa, si può sfruttare il fatto che un numero divisibile sia per 3 che per 7 è anche divisibile per 21 (il loro minimo comune multiplo, poiché 3 e 7 sono coprimi):

```
if (n % 21 == 0)
```

## Suggerimenti

- Usa l'operatore `&&` per verificare che entrambe le condizioni siano vere allo stesso tempo.
- Considera l'equivalenza con `n % 21 == 0` e rifletti sul perché è valida (3 e 7 sono numeri primi, quindi il loro mcm è 3 × 7 = 21).
- Testa il programma con i valori 21, 42, 3, 7, 1 e 0 per coprire i casi più significativi.
- Assicurati di stampare un messaggio anche quando la condizione non è soddisfatta (ramo `else`).

## Soluzione

```c
--8<-- "C/Numero-divisibile-per-3-e-7/main.c"
```

<div class="oc-embed"
     data-path="C/Numero-divisibile-per-3-e-7/main.c"
     data-lang="c"
     data-stdin="21"
     data-autorun="true">
</div>
