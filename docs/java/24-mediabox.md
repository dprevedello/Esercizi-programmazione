# MediaBox

Applicazione completa che integra classi astratte, interfacce, `ArrayList`, `instanceof`, casting, gestione delle eccezioni e scrittura su file.

## Obiettivo

Realizzare una libreria multimediale con classe astratta `Contenuto`, interfaccia `Valutabile`, quattro classi concrete (`Film`, `SerieTV`, `Podcast`, `Audiolibro`) e un `main` con menù testuale per aggiungere, cercare, riprodurre, votare e salvare i contenuti su file.

## Descrizione

### Struttura delle classi

```
«interface»        «abstract class»          concrete classes
Valutabile   ←──   Contenuto         ←──     Film      (implements Valutabile)
                                      ←──    SerieTV   (implements Valutabile)
                                      ←──    Podcast
                                      ←──    Audiolibro
```

`Contenuto` definisce gli attributi comuni (`titolo`, `autore`, `anno`) e i metodi astratti `getTipo()` e `riproduci()`. `Valutabile` è implementata solo da `Film` e `SerieTV`: non tutti i contenuti supportano le valutazioni.

### `instanceof` e casting

Prima di aggiungere un voto occorre verificare a runtime se il contenuto supporta `Valutabile`:

```java
if (contenuto instanceof Valutabile) {
    ((Valutabile) contenuto).aggiungiVoto(voto);
} else {
    System.out.println("Questo contenuto non supporta le valutazioni.");
}
```

`instanceof` restituisce `true` solo se l'oggetto è un'istanza della classe o interfaccia specificata. Il cast `(Valutabile)` è necessario perché il riferimento è di tipo `Contenuto`, che non conosce `aggiungiVoto`.

### Eccezioni nella validazione

`aggiungiVoto` lancia `IllegalArgumentException` se il voto è fuori range (1–10). Il `main` la intercetta con `try-catch`:

```java
try {
    ((Valutabile) daVotare).aggiungiVoto(voto);
} catch (IllegalArgumentException e) {
    System.out.println("Errore: " + e.getMessage());
}
```

### Scrittura su file con `BufferedWriter`

Il blocco `try-with-resources` garantisce la chiusura automatica del file anche in caso di eccezione:

```java
try (BufferedWriter bw = new BufferedWriter(new FileWriter("libreria.txt"))) {
    for (Contenuto c : libreria) {
        bw.write(c.toString());
        bw.newLine();
    }
} catch (IOException e) {
    System.out.println("Errore: " + e.getMessage());
}
```

`bw.newLine()` scrive il separatore di riga corretto per il sistema operativo corrente.

## Compilazione ed esecuzione

```bash
javac *.java
java MainMediaBox
```

## Suggerimenti

- La ricerca per titolo usa `equalsIgnoreCase` per essere case-insensitive: "inception" e "Inception" trovano lo stesso film.
- Separare la logica di aggiunta contenuti nel metodo privato `aggiungiContenuto` mantiene il `main` leggibile.
- Il metodo `toString()` di `Contenuto` viene chiamato implicitamente quando si passa un oggetto a `bw.write()`: non serve `c.toString()` esplicito, ma è buona pratica renderlo esplicito per chiarezza.
- Aggiungere un quinto tipo (es. `VideoCorso`) richiede solo di estendere `Contenuto` e aggiungere un `case` nel metodo `aggiungiContenuto`.

## Soluzione

=== "MainMediaBox.java"
    ```java
    --8<-- "Java/MediaBox/MainMediaBox.java"
    ```

=== "Contenuto.java"
    ```java
    --8<-- "Java/MediaBox/Contenuto.java"
    ```

=== "Valutabile.java"
    ```java
    --8<-- "Java/MediaBox/Valutabile.java"
    ```

=== "Film.java"
    ```java
    --8<-- "Java/MediaBox/Film.java"
    ```

=== "SerieTV.java"
    ```java
    --8<-- "Java/MediaBox/SerieTV.java"
    ```

=== "Podcast.java"
    ```java
    --8<-- "Java/MediaBox/Podcast.java"
    ```

=== "Audiolibro.java"
    ```java
    --8<-- "Java/MediaBox/Audiolibro.java"
    ```

<div class="oc-embed"
     data-path="Java/MediaBox/MainMediaBox.java; Java/MediaBox/Contenuto.java; Java/MediaBox/Valutabile.java; Java/MediaBox/Film.java; Java/MediaBox/SerieTV.java; Java/MediaBox/Podcast.java; Java/MediaBox/Audiolibro.java"
     data-lang="java"
     data-stdin="1\n1\nInception\nNolan\n2010\n148\n1\n2\nBreaking Bad\nGilligan\n2008\n5\n30\n2\n3\nInception\n4\nBreaking Bad\n6\n0\n"
     data-height="650"
     data-autorun="true">
</div>
