# Rettangolo

Prima classe Java con attributi privati, costruttori, getter/setter con validazione e metodi di calcolo.

## Obiettivo

Scrivere una classe `Rettangolo` con attributi `base` e `altezza` di tipo `double`, due costruttori, getter e setter con controllo sui valori, i metodi `calcolaArea()` e `calcolaPerimetro()`, e `toString()`. Nel `main` creare due oggetti e mostrarne area e perimetro.

## Descrizione

### Incapsulamento

In Java gli attributi si dichiarano `private` per impedire l'accesso diretto dall'esterno. L'accesso è controllato tramite **getter** (lettura) e **setter** (scrittura), che possono includere validazioni:

```java
private double base;

public double getBase() { return base; }

public void setBase(double base) {
    if (base > 0)
        this.base = base;
    else
        this.base = 1;   // valore di fallback
}
```

La parola chiave `this` distingue l'attributo dell'oggetto dal parametro locale con lo stesso nome.

### Costruttori e chaining

Un costruttore è un metodo speciale senza tipo di ritorno, con lo stesso nome della classe. È possibile richiamare un altro costruttore della stessa classe con `this(...)` — tecnica chiamata **constructor chaining** — per evitare duplicazioni:

```java
public Rettangolo() {
    this(1, 1);   // delega al costruttore parametrico
}
```

### Il metodo `toString()`

`toString()` è ereditato da `Object` e viene chiamato automaticamente quando si stampa un oggetto con `System.out.println()`. Sovrascriverlo con `@Override` permette di fornire una rappresentazione testuale significativa.

## Suggerimenti

- I setter vengono chiamati dal costruttore parametrico: in questo modo la validazione è centralizzata in un unico punto.
- `calcolaArea()` e `calcolaPerimetro()` non ricevono parametri: leggono direttamente gli attributi dell'oggetto tramite `this` (implicito).
- L'annotazione `@Override` non è obbligatoria ma è buona pratica: il compilatore avvisa se il metodo non sovrascrive davvero nulla.

## Soluzione

```java
--8<-- "Java/Rettangolo/Rettangolo.java"
```

<div class="oc-embed"
     data-path="Java/Rettangolo/Rettangolo.java"
     data-lang="java"
     data-autorun="true">
</div>
