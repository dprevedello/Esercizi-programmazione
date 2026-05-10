# Prodotto

Classe per la gestione di un articolo in magazzino, con calcolo del valore totale dell'inventario.

## Obiettivo

Scrivere una classe `Prodotto` con attributi codice, descrizione, prezzo e quantità. Implementare due costruttori, getter e setter, i metodi `incrementaQuantita(int n)`, `decrementaQuantita(int n)` e `calcolaValoreTotale()`. Nel `main` creare più prodotti e calcolare il valore complessivo dell'inventario.

## Descrizione

### Costruttori parziali con valori di default

Quando alcuni attributi possono essere impostati in un secondo momento, un costruttore "ridotto" inizializza solo quelli essenziali passando `0` per i valori numerici:

```java
public Prodotto(String codice, String descrizione) {
    this(codice, descrizione, 0, 0);
}
```

In questo modo un prodotto può essere creato con solo codice e descrizione, e prezzo/quantità aggiunti successivamente tramite setter.

### Controllo sui limiti nelle operazioni sulla quantità

Le operazioni di incremento e decremento non devono mai portare la quantità a valori negativi. Il decremento controlla che `quantità - n >= 0` prima di applicare la modifica:

```java
public void decrementaQuantita(int n) {
    if (n > 0 && quantità - n >= 0)
        quantità -= n;
}
```

### Calcolo derivato

`calcolaValoreTotale()` è un metodo **derivato**: non memorizza il risultato, ma lo calcola a partire dagli attributi correnti. Questo garantisce che il valore sia sempre aggiornato dopo ogni modifica a prezzo o quantità.

## Suggerimenti

- Il nome dell'attributo `quantità` contiene un carattere accentato: è valido in Java, ma per convenzione molti sviluppatori preferiscono evitare caratteri non ASCII negli identificatori.
- Nel `main`, la somma dei valori totali di tutti i prodotti rappresenta il **valore dell'inventario**: si può calcolare con un ciclo o sommando direttamente le chiamate ai metodi.
- Aggiungere un metodo `isDisponibile()` che restituisce `true` se `quantità > 0` potrebbe essere un'utile estensione.

## Soluzione

```java
--8<-- "Java/Prodotto/Prodotto.java"
```

<div class="oc-embed"
     data-path="Java/Prodotto/Prodotto.java"
     data-lang="java"
     data-autorun="true">
</div>
