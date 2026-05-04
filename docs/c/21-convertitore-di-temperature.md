# Convertitore di temperature

Dato un valore di temperatura in gradi Celsius, il programma lo converte in Fahrenheit e in Kelvin, segnalando un errore se il valore è inferiore allo zero assoluto.

## Obiettivo

Acquisire una temperatura in gradi Celsius e stamparle le corrispondenti temperature in gradi Fahrenheit e in Kelvin. Se il valore inserito è inferiore allo zero assoluto, visualizzare un messaggio di errore.

## Descrizione

Ricordiamo che:

\(Fahrenheit = \frac{9}{5} \cdot Celsius + 32\)

\(Kelvin = Celsius + 273{,}15\)

Lo zero assoluto corrisponde a \(-273{,}15\,°C\): al di sotto di questo valore la temperatura non ha significato fisico.

## Suggerimenti

- Utilizza una variabile `double` per la temperatura, poiché i valori possono essere decimali.
- Controlla prima se il valore è valido (maggiore o uguale a \(-273{,}15\)) e poi esegui le conversioni.
- Ricorda che la divisione `9/5` tra interi in C dà `1`: scrivi `9.0/5.0` oppure usa la costante `1.8`.
- Usa `printf` con il formato `%.2f` per visualizzare i risultati con due cifre decimali.

## Soluzione

```c
--8<-- "C/Convertitore-di-temperature/main.c"
```

<div class="oc-embed"
     data-path="C/Convertitore-di-temperature/main.c"
     data-lang="c">
</div>
