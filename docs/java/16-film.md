# Film

Classe che usa un `ArrayList<Double>` per raccogliere valutazioni e calcolarne la media in modo dinamico.

## Obiettivo

Scrivere una classe `Film` con attributi titolo, genere e durata, e un `ArrayList<Double>` per le valutazioni. Implementare `aggiungiValutazione(double voto)` con validazione (0–5) e `getValutazioneMedia()`. Nel `main` creare più film, aggiungere valutazioni e stamparli.

## Descrizione

### `ArrayList` come attributo di istanza

A differenza di un array tradizionale, `ArrayList` cresce dinamicamente: non bisogna dichiarare una dimensione massima in anticipo. Si inizializza nel costruttore con le parentesi angolari che specificano il tipo degli elementi (**generics**):

```java
import java.util.ArrayList;

private ArrayList<Double> valutazioni;

public Film(String titolo, String genere, int durata) {
    // ...
    this.valutazioni = new ArrayList<>();   // lista vuota, crescerà con add()
}
```

Il tipo `Double` (con la D maiuscola) è il **wrapper** del primitivo `double`: `ArrayList` non può contenere tipi primitivi, solo oggetti. Java converte automaticamente tra `double` e `Double` tramite **autoboxing**.

### Metodi fondamentali di `ArrayList`

| Metodo | Effetto |
|--------|---------|
| `add(elemento)` | Aggiunge in coda |
| `get(indice)` | Legge l'elemento all'indice |
| `size()` | Numero di elementi presenti |
| `isEmpty()` | `true` se la lista è vuota |

### Calcolo della media con guardia su lista vuota

Prima di calcolare la media occorre verificare che la lista non sia vuota, altrimenti si dividerebbe per zero:

```java
public double getValutazioneMedia() {
    if (valutazioni.isEmpty())
        return 0;
    double somma = 0;
    for (int i = 0; i < valutazioni.size(); i++)
        somma += valutazioni.get(i);
    return somma / valutazioni.size();
}
```

## Suggerimenti

- Il ciclo `for` classico con indice è equivalente al `for-each`: `for (double v : valutazioni) somma += v;` è più compatto e idiomatico in Java.
- `valutazioni.isEmpty()` è preferibile a `valutazioni.size() == 0`: esprime meglio l'intento.
- Aggiungere un metodo `getNumeroValutazioni()` che espone `valutazioni.size()` permette al chiamante di sapere quante recensioni ha ricevuto il film senza accedere alla lista interna.

## Soluzione

```java
--8<-- "Java/Film/Film.java"
```

<div class="oc-embed"
     data-path="Java/Film/Film.java"
     data-lang="java"
     data-autorun="true">
</div>
