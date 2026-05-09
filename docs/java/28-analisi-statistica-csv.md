# Analisi statistica di un file CSV

Progetto multi-classe con POJO, `ArrayList`, `HashMap` e menù statistico per l'analisi del dataset SERD sulle dipendenze per sostanza d'abuso primaria (anno 2024).

## Obiettivo

Strutturare il programma in tre classi (`RecordSerd`, `CsvReader`, `AnalisiStatistica`), caricare il CSV in una `ArrayList<RecordSerd>`, costruire una `HashMap<String, Integer>` con i totali per sostanza e offrire un menù con 6 statistiche.

## File CSV

!!! info "File già presente"
    Il file `Utenti_in_carico_presso_i_SERD_secondo_la_sostanza_d_abuso_primaria_2024.csv`
    è già incluso nella cartella dell'esercizio (stesso file dell'esercizio 27).

## Descrizione

### Struttura del progetto

| Classe | Responsabilità |
|--------|----------------|
| `RecordSerd` | POJO con sostanza, totale, regione, ASL; costruttore + getter + `toString` |
| `CsvReader` | Metodo statico `leggi(path)` che restituisce `ArrayList<RecordSerd>` |
| `AnalisiStatistica` | `main`: carica dati, costruisce `HashMap`, presenta il menù |

### Classe POJO

Un **POJO** (Plain Old Java Object) è una classe semplice che contiene solo attributi, costruttore e getter/setter, senza logica applicativa. Rappresenta un singolo record del file:

```java
public class RecordSerd {
    private final String sostanza;
    private final int    totale;
    private final String regione;
    private final String asl;

    public RecordSerd(String sostanza, int totale, String regione, String asl) { ... }

    public String getSostanza() { return sostanza; }
    // ...
}
```

### Aggregazione in `HashMap` dopo il caricamento

La `HashMap` viene costruita scorrendo la lista già caricata, sommando i totali per sostanza:

```java
HashMap<String, Integer> totaliPerSostanza = new HashMap<>();
for (RecordSerd r : dati) {
    String s = r.getSostanza();
    totaliPerSostanza.put(s, totaliPerSostanza.getOrDefault(s, 0) + r.getTotale());
}
```

`getOrDefault(chiave, 0)` restituisce `0` se la chiave non è ancora presente, evitando la `NullPointerException` che si avrebbe sommando a `null`.

### Statistiche disponibili nel menù

| Opzione | Logica |
|---------|--------|
| 1 — Record totali | `dati.size()` |
| 2 — Utenti per sostanza | iterazione su `totaliPerSostanza.keySet()` |
| 3 — Percentuali | somma totale nazionale → divisione per ogni sostanza |
| 4 — Sostanza con più utenti | massimo su `totaliPerSostanza.values()` |
| 5 — Classifica decrescente | bubble sort su `ArrayList<String>` delle chiavi |
| 6 — Ricerca per sostanza | `contains` case-insensitive su ogni record della lista |

### `String.format` per output allineato

`String.format("%-30s : %6d%n", sostanza, totale)` produce colonne allineate: `%-30s` giustifica a sinistra in 30 caratteri, `%6d` a destra in 6.

## Compilazione ed esecuzione

```bash
javac *.java
java AnalisiStatistica
```

## Suggerimenti

- `CsvReader` è un metodo statico di utilità: non va istanziato con `new`. Il metodo dichiara `throws IOException` e delega la gestione al chiamante (`main`), che la intercetta con `try-catch`.
- Separare la lettura del CSV dalla logica del menù rende il codice più testabile: se il formato del CSV cambia, si modifica solo `CsvReader`.
- L'ordinamento per bubble sort è intenzionalmente esplicito per scopi didattici; in un programma reale si userebbe `Collections.sort` con un `Comparator`.

## Soluzione

=== "AnalisiStatistica.java"
    ```java
    --8<-- "Java/Analisi-statistica-csv/AnalisiStatistica.java"
    ```

=== "CsvReader.java"
    ```java
    --8<-- "Java/Analisi-statistica-csv/CsvReader.java"
    ```

=== "RecordSerd.java"
    ```java
    --8<-- "Java/Analisi-statistica-csv/RecordSerd.java"
    ```
