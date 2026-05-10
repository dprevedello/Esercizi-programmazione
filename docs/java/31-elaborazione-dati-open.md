# Elaborazione di dati open

Lettura di un file CSV reale (open data del Ministero della Salute) e calcolo della percentuale di utenti lombardi per Cannabinoidi rispetto al totale nazionale.

## Obiettivo

Leggere riga per riga con `BufferedReader` il CSV degli utenti SERD per sostanza d'abuso primaria (anno 2024), filtrare le righe per sostanza e regione, sommare i totali e calcolare la percentuale lombarda.

## File CSV

!!! info "File già presente"
    Il file `Utenti_in_carico_presso_i_SERD_secondo_la_sostanza_d_abuso_primaria_2024.csv`
    è già incluso nella cartella dell'esercizio.

    Fonte: [dati.salute.gov.it — Utenti in carico per sostanza d'abuso primaria 2024](https://www.dati.salute.gov.it/it/dataset/utenti-carico-secondo-la-sostanza-dabuso-primaria-anno-2024/)

**Struttura del file (separatore `;`):**

| Indice | Colonna | Esempio |
|--------|---------|---------|
| 0 | Anno | `2024` |
| 1 | Codice regione | `030` |
| 2 | Regione | `LOMBARDIA` |
| 3 | Codice ASL | `301` |
| 4 | ASL | `MI1` |
| 5 | SERD | `S01` |
| 6 | Categoria Sostanza | `CANNABINOIDI` |
| 7 | Utenti | `580` |

## Descrizione

### Lettura riga per riga con `BufferedReader`

`BufferedReader` è la scelta standard per leggere file di testo riga per riga in modo efficiente. Il blocco `try-with-resources` garantisce la chiusura automatica:

```java
try (BufferedReader br = new BufferedReader(new FileReader("file.csv"))) {
    String riga;
    while ((riga = br.readLine()) != null) {
        // elabora riga
    }
} catch (IOException e) {
    System.out.println("Errore: " + e.getMessage());
}
```

`br.readLine()` restituisce `null` quando il file è terminato: la condizione `!= null` nel `while` è il pattern standard.

### Parsing di una riga CSV

`riga.split(";")` divide la stringa sul separatore e restituisce un array di stringhe. Si verifica sempre che l'array abbia il numero di campi atteso prima di accedere agli indici:

```java
String[] campi = riga.split(";");
if (campi.length < 8) continue;   // riga incompleta: si salta

String sostanza  = campi[6].trim();
String utentiStr = campi[7].trim();
```

`.trim()` rimuove spazi e caratteri di controllo attorno al valore, frequenti nei CSV del Ministero.

### Filtro e aggregazione

Si mantengono due contatori separati: uno per il totale nazionale della sostanza, uno per la Lombardia. Il confronto usa `equalsIgnoreCase` per ignorare maiuscole/minuscole:

```java
if (!sostanza.equalsIgnoreCase("CANNABINOIDI")) continue;
if (utentiStr.isEmpty()) continue;

int utenti = Integer.parseInt(utentiStr);
totaleItalia += utenti;

if (regione.equalsIgnoreCase("LOMBARDIA"))
    totaleLombardia += utenti;
```

## Compilazione ed esecuzione

```bash
javac ElaborazioneDatiOpen.java
java ElaborazioneDatiOpen
```

Eseguire il programma dalla stessa cartella in cui si trova il CSV.

## Suggerimenti

- Se una riga ha il campo `Utenti` vuoto, `Integer.parseInt("")` lancerebbe `NumberFormatException`: il controllo `if (utentiStr.isEmpty()) continue` evita il crash.
- Aggiungere un contatore di righe saltate aiuta a capire quanti record sono stati ignorati.
- Le sostanze presenti nel file sono: `OPPIACEI`, `CANNABINOIDI`, `COCAINA`, `STIMOLANTI`, `ALLUCINOGENI`, `INALANTI VOLATILI`, `IPNOTICI E SEDATIVI`, `ALTRE SOSTANZE`, `ALTRE DIPENDENZE`.

## Soluzione

```java
--8<-- "Java/Elaborazione-dati-open/ElaborazioneDatiOpen.java"
```
