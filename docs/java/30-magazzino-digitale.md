# Gestione di un Magazzino Digitale

Applicazione multi-classe con due eccezioni controllate personalizzate, `HashMap` e menù testuale robusto: ogni operazione critica è protetta da `try-catch`.

## Obiettivo

Modellare un magazzino con la classe `Articolo`, gestirlo tramite `Magazzino` (che usa `HashMap<String, Articolo>`) e implementare `ArticoloInesistenteException` e `StockInsufficienteException`. Il `main` in `MainMagazzino` offre un menù testuale in cui ogni operazione è protetta da blocchi `try-catch`.

## Descrizione

### Due eccezioni controllate

Entrambe estendono `Exception` e hanno un costruttore con messaggio:

```java
public class ArticoloInesistenteException extends Exception {
    public ArticoloInesistenteException(String messaggio) { super(messaggio); }
}

public class StockInsufficienteException extends Exception {
    public StockInsufficienteException(String messaggio)  { super(messaggio); }
}
```

Essendo controllate, i metodi di `Magazzino` che le lanciano devono dichiararle con `throws` nella firma. Il compilatore impone al chiamante di gestirle.

### Firma con `throws` multipli

Un metodo può dichiarare più eccezioni separate da virgola:

```java
public void vendita(String codice, int qta)
        throws ArticoloInesistenteException, StockInsufficienteException {
    if (!articoli.containsKey(codice))
        throw new ArticoloInesistenteException("...");
    if (qta > articoli.get(codice).getQuantita())
        throw new StockInsufficienteException("...");
    // ...
}
```

### Cattura di eccezioni multiple con `|`

Java 7+ permette di catturare più tipi di eccezione in un unico `catch` con l'operatore `|`, quando la gestione è identica:

```java
try {
    magazzino.vendita(codice, qta);
} catch (ArticoloInesistenteException | StockInsufficienteException e) {
    System.out.println("Errore: " + e.getMessage());
}
```

### `HashMap<String, Articolo>` con valori oggetto

A differenza dell'esercizio sul magazzino semplice (sezione 5, dove il valore era un `Integer`), qui il valore è un oggetto completo. Questo permette di accedere a tutti gli attributi dell'articolo tramite i getter, e di modificarne la quantità direttamente sull'oggetto in mappa:

```java
Articolo a = articoli.get(codice);
a.setQuantita(a.getQuantita() - qta);   // modifica l'oggetto nella mappa
```

Non serve `put` di nuovo: `HashMap` mantiene il riferimento all'oggetto, e modificarlo tramite il riferimento aggiorna direttamente il valore in mappa.

### Menù robusto

Il `main` protegge anche la lettura della scelta del menù con un `try-catch` per `InputMismatchException`, garantendo che un input non numerico non termini il programma:

```java
try {
    scelta = in.nextInt();
    in.nextLine();
} catch (InputMismatchException e) {
    in.nextLine();   // svuota il buffer
    scelta = -1;     // forza il caso default dello switch
}
```

## Compilazione ed esecuzione

```bash
javac *.java
java MainMagazzino
```

## Suggerimenti

- Separare `Articolo`, `Magazzino` e `MainMagazzino` in classi distinte rispetta il **principio di singola responsabilità**: ognuna si occupa di una sola cosa.
- Il metodo `visualizza()` itera con `articoli.values()` anziché `articoli.keySet()`: quando servono i valori e non le chiavi è la scelta più diretta.
- `String.format("%-10s ...", ...)` allinea le colonne dell'output: `%-10s` giustifica a sinistra in un campo di 10 caratteri.
- Estendere l'applicazione con il salvataggio su file (opzione facoltativa dell'esercizio) richiede solo di aggiungere un metodo in `Magazzino` che itera su `articoli.values()` e scrive con `BufferedWriter`.

## Soluzione

=== "MainMagazzino.java"
    ```java
    --8<-- "Java/Magazzino-digitale/MainMagazzino.java"
    ```

=== "Magazzino.java"
    ```java
    --8<-- "Java/Magazzino-digitale/Magazzino.java"
    ```

=== "Articolo.java"
    ```java
    --8<-- "Java/Magazzino-digitale/Articolo.java"
    ```

=== "ArticoloInesistenteException.java"
    ```java
    --8<-- "Java/Magazzino-digitale/ArticoloInesistenteException.java"
    ```

=== "StockInsufficienteException.java"
    ```java
    --8<-- "Java/Magazzino-digitale/StockInsufficienteException.java"
    ```

<div class="oc-embed"
     data-path="Java/Magazzino-digitale/MainMagazzino.java; Java/Magazzino-digitale/Magazzino.java; Java/Magazzino-digitale/Articolo.java; Java/Magazzino-digitale/ArticoloInesistenteException.java; Java/Magazzino-digitale/StockInsufficienteException.java"
     data-lang="java"
     data-stdin="1\nLAP001\nLaptop\n10\n999.99\n1\nMON002\nMonitor\n5\n299.99\n4\n0\n"
     data-height="600"
     data-autorun="true">
</div>
