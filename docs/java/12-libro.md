# Libro

Classe che modella un libro in una biblioteca con gestione dello stato di disponibilità tramite attributo booleano.

## Obiettivo

Scrivere una classe `Libro` con attributi titolo, autore, numeroPagine e `disponibile`. Implementare costruttori vuoto e parametrico, i metodi `presta()` e `restituisci()` con logica di stato, e `toString()` che rispecchi la disponibilità. Nel `main` simulare il prestito e la restituzione.

## Descrizione

### Attributo booleano come stato

Il tipo `boolean` può assumere solo i valori `true` e `false` ed è ideale per rappresentare stati binari. La convenzione Java prevede che il getter di un booleano si chiami `isNomeAttributo()` anziché `getNomeAttributo()`:

```java
private boolean disponibile;

public boolean isDisponibile() {
    return disponibile;
}
```

### Metodi con logica di transizione di stato

`presta()` non si limita ad assegnare `false`: verifica prima che il libro sia effettivamente disponibile, evitando di prestare qualcosa già in prestito:

```java
public void presta() {
    if (disponibile)
        disponibile = false;
}

public void restituisci() {
    disponibile = true;   // può sempre essere restituito
}
```

### Operatore ternario in `toString()`

L'espressione `condizione ? valoreSeVero : valoreSefalso` è utile per scegliere tra due stringhe in modo compatto:

```java
return "\"" + titolo + "\" - " + (disponibile ? "Disponibile" : "In prestito");
```

Le virgolette all'interno della stringa si ottengono con la sequenza di escape `\"`.

## Suggerimenti

- Il costruttore vuoto può usare `this("", "", 0, true)` per delegare al costruttore completo con valori di default sensati.
- Aggiungere un attributo `dataRestituzione` (come `String` o futura `LocalDate`) potrebbe essere un'estensione realistica del modello.
- Stampare il risultato di `toString()` prima del prestito, dopo il prestito e dopo la restituzione è il modo più diretto per verificare la correttezza della logica.

## Soluzione

```java
--8<-- "Java/Libro/Libro.java"
```

<div class="oc-embed"
     data-path="Java/Libro/Libro.java"
     data-lang="java"
     data-autorun="true">
</div>
