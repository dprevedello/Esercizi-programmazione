# Temperatura

Classe per la conversione tra scale termometriche con validazione del limite fisico assoluto (zero assoluto).

## Obiettivo

Scrivere una classe `Temperatura` con attributo `valoreCelsius`. Implementare costruttori, il setter con controllo (≥ −273.15 °C), i metodi di conversione `inFahrenheit()` e `inKelvin()`, e `toString()` che mostri il valore nelle tre scale. Nel `main` creare e stampare diverse temperature.

## Descrizione

### Validazione con vincolo fisico

Il setter controlla che il valore non scenda sotto lo zero assoluto (−273.15 °C), il limite fisico minimo della temperatura:

```java
public void setValoreCelsius(double valoreCelsius) {
    if (valoreCelsius >= -273.15)
        this.valoreCelsius = valoreCelsius;
}
```

Se il valore non è valido, l'attributo rimane invariato. Questa scelta silenziosa è semplice ma accettabile in un contesto didattico; in un'applicazione reale si potrebbe lanciare un'eccezione.

### Formule di conversione

Le tre scale termometriche sono legate da relazioni lineari:

| Conversione | Formula |
|---|---|
| Celsius → Fahrenheit | `°C × 9/5 + 32` |
| Celsius → Kelvin | `°C + 273.15` |

In Java è importante usare `9.0 / 5.0` (divisione tra `double`) anziché `9 / 5` (divisione intera, che restituisce `1`):

```java
public double inFahrenheit() {
    return valoreCelsius * 9.0 / 5.0 + 32;
}
```

### `toString()` con più valori

Il metodo può chiamare altri metodi dello stesso oggetto per costruire la stringa:

```java
public String toString() {
    return valoreCelsius + " °C = " + inFahrenheit() + " °F = " + inKelvin() + " K";
}
```

## Suggerimenti

- Lo zero assoluto (−273.15 °C = 0 K) è il valore minimo fisicamente ammissibile: qualsiasi temperatura al di sotto è impossibile.
- Valori notevoli da testare nel `main`: 0 °C (ghiaccio), 100 °C (ebollizione), 37 °C (corpo umano), −273.15 °C (zero assoluto).
- Un'estensione naturale è aggiungere un costruttore statico di fabbrica `Temperatura.daFahrenheit(double f)` che converta all'indietro.

## Soluzione

```java
--8<-- "Java/Temperatura/Temperatura.java"
```

<div class="oc-embed"
     data-path="Java/Temperatura/Temperatura.java"
     data-lang="java"
     data-autorun="true">
</div>
