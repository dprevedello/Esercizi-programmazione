# LibroDiario

Classe che usa un `ArrayList<String>` per gestire pagine testuali con accesso per numero di pagina (1-indexed).

## Obiettivo

Scrivere una classe `LibroDiario` con titolo, autore e un `ArrayList<String>` di pagine. Implementare `aggiungiPagina(String testo)`, `mostraPagina(int numero)` con validazione dell'indice, e `toString()` che mostri il numero totale di pagine. Nel `main` creare un diario, aggiungere pagine e visualizzarle.

## Descrizione

### `ArrayList<String>` per testi

Ogni elemento della lista è una stringa che rappresenta il testo di una pagina. La lista cresce con ogni chiamata ad `aggiungiPagina`:

```java
private ArrayList<String> pagine;

public LibroDiario(String titolo, String autore) {
    this.titolo = titolo;
    this.autore = autore;
    this.pagine = new ArrayList<>();
}

public void aggiungiPagina(String testo) {
    pagine.add(testo);   // inserisce sempre in coda
}
```

### Indice 1-based vs 0-based

`ArrayList` usa indici **0-based** (il primo elemento è all'indice 0), ma per l'utente è più naturale che le pagine partano da 1. La conversione è semplice: all'indice `n-1` corrisponde la pagina `n`:

```java
public void mostraPagina(int numero) {
    if (numero >= 1 && numero <= pagine.size())
        System.out.println("Pagina " + numero + ": " + pagine.get(numero - 1));
    else
        System.out.println("Pagina non trovata.");
}
```

Il controllo `numero >= 1 && numero <= pagine.size()` copre tutti i casi limite: numero negativo, zero, e numero oltre la fine della lista.

### `size()` in `toString()`

`pagine.size()` restituisce il numero di elementi correnti nella lista, che aumenta ad ogni `aggiungiPagina`. Usarlo in `toString()` garantisce che il conteggio sia sempre aggiornato:

```java
public String toString() {
    return "Diario \"" + titolo + "\" di " + autore
         + " - Pagine totali: " + pagine.size();
}
```

## Suggerimenti

- Un metodo `mostraTutte()` che scorre la lista con un `for-each` e stampa ogni pagina numerata è un'estensione semplice e utile.
- `pagine.get(i)` lancia `IndexOutOfBoundsException` se `i` è fuori dai limiti: per questo il controllo preventivo in `mostraPagina` è essenziale.
- A differenza di un array, non è possibile accedere alle pagine con la sintassi `pagine[i]`: si usa sempre `pagine.get(i)`.

## Soluzione

```java
--8<-- "Java/LibroDiario/LibroDiario.java"
```

<div class="oc-embed"
     data-path="Java/LibroDiario/LibroDiario.java"
     data-lang="java">
</div>
