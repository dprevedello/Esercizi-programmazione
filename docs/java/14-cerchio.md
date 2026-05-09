# Cerchio

Classe geometrica con uso di `Math.PI` e formattazione dell'output a due decimali con `String.format`.

## Obiettivo

Scrivere una classe `Cerchio` con attributo `raggio`, costruttori con validazione, i metodi `calcolaArea()` e `calcolaCirconferenza()`, e `toString()` che mostri i valori calcolati formattati. Nel `main` creare più cerchi con raggi diversi.

## Descrizione

### Validazione nel costruttore

Il controllo sul raggio può comparire sia nel costruttore sia nel setter, evitando duplicazioni chiamando il setter dal costruttore:

```java
public Cerchio(double raggio) {
    setRaggio(raggio);   // la validazione è solo nel setter
}

public void setRaggio(double raggio) {
    if (raggio > 0)
        this.raggio = raggio;
    // se non valido, l'attributo rimane al valore precedente (o non viene inizializzato)
}
```

In alternativa la soluzione adottata gestisce il fallback direttamente nel costruttore con un valore di default.

### `Math.PI` e le formule geometriche

La classe `Math` fornisce la costante `Math.PI` (π ≈ 3.14159…) di tipo `double`:

```java
public double calcolaArea() {
    return Math.PI * raggio * raggio;
}

public double calcolaCirconferenza() {
    return 2 * Math.PI * raggio;
}
```

Non è necessario importare nulla: `Math` fa parte di `java.lang`, incluso automaticamente.

### Formattazione dell'output

`String.format("%.2f", valore)` restituisce una stringa con esattamente due cifre decimali, utile per presentare risultati geometrici in modo leggibile:

```java
return "area: " + String.format("%.2f", calcolaArea());
```

## Suggerimenti

- `Math.PI` è una costante `static final`: si accede con `Math.PI`, non serve istanziare la classe.
- Se il raggio ricevuto non è valido, assegnare `1` come fallback garantisce che l'oggetto sia sempre in uno stato utilizzabile.
- Si possono creare più cerchi in un array e scorrerne i valori con un ciclo `for-each` per mostrare un output più compatto.

## Soluzione

```java
--8<-- "Java/Cerchio/Cerchio.java"
```

<div class="oc-embed"
     data-path="Java/Cerchio/Cerchio.java"
     data-lang="java">
</div>
