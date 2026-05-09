# Rete di sensori urbani

Esercizio che combina classe astratta, interfaccia personalizzata, `Comparable`, `HashMap` e Javadoc per simulare una rete IoT di sensori distribuiti sul territorio.

## Obiettivo

Realizzare una gerarchia in cui `SensoreUrbano` (astratta, implementa `Comparable`) definisce la struttura base, l'interfaccia `Aggiornabile` gestisce l'aggiornamento della mappa dati e dell'affidabilità, e le classi concrete `SensoreTraffico`, `SensoreQualitaAria` e `SensoreRumore` forniscono logiche di rilevazione specifiche. Una `HashMap<String, Double>` memorizza la misura più recente per id sensore.

## Descrizione

### Architettura del sistema

```
«interface»          «abstract class»              concrete classes
Aggiornabile   ←──   SensoreUrbano         ←──     SensoreTraffico
                     (implements Comparable) ←──   SensoreQualitaAria
                                             ←──   SensoreRumore
```

`SensoreUrbano` implementa `Comparable<SensoreUrbano>` per permettere l'ordinamento per affidabilità con `Collections.sort()`. I metodi `rileva()` e `descrizione()` sono astratti: ogni tipo di sensore li implementa con la propria logica.

`Aggiornabile` è un'interfaccia separata con due responsabilità distinte: aggiornare la mappa dati centralizzata e modificare l'affidabilità del sensore. Tenerla separata da `SensoreUrbano` rispetta il **principio di separazione delle interfacce**: un sensore potrebbe essere read-only (non aggiornabile).

### Attributi `protected` e Javadoc

Gli attributi `id`, `posizione` e `affidabilita` sono `protected` per renderli accessibili alle sottoclassi senza usare getter (scelta pragmatica). Ogni elemento pubblico — classe, costruttore, metodo — è documentato con commenti Javadoc (`/** ... */`).

### Cast a `Aggiornabile`

La lista è dichiarata come `ArrayList<SensoreUrbano>`: il tipo `SensoreUrbano` non conosce `Aggiornabile`. Per chiamare `aggiornaDato()` occorre un cast esplicito, possibile perché tutte le classi concrete implementano entrambe:

```java
for (SensoreUrbano s : sensori)
    ((Aggiornabile) s).aggiornaDato(mappa);
```

In alternativa si potrebbe dichiarare la lista come `ArrayList<SensoreUrbano & Aggiornabile>` con un tipo bounded, ma il cast è più semplice a livello didattico.

### `HashMap` come mappa dati in tempo reale

```java
HashMap<String, Double> mappa = new HashMap<>();
// aggiornaDato scrive: mappa.put(id, valoreRilevato)
// per leggere: mappa.get("T01")
```

La chiave è l'id del sensore, il valore è l'ultima misura. Ogni nuova rilevazione **sovrascrive** il valore precedente con `put`.

## Compilazione ed esecuzione

```bash
javac *.java
java MainSensori
```

## Suggerimenti

- `Double.compare(a, b)` in `compareTo` è il modo corretto per confrontare `double`: restituisce negativo, zero o positivo come richiesto da `Comparable`, senza rischi di overflow o perdita di precisione.
- `new Random().nextInt(n)` genera un intero in `[0, n-1]`; sommando l'offset si sposta l'intervallo (es. `40 + new Random().nextInt(61)` → `[40, 100]`).
- Il programma usa `String.format("%.1f", valore)` per uniformare l'output numerico dei sensori.

## Soluzione

=== "MainSensori.java"
    ```java
    --8<-- "Java/Rete-sensori-urbani/MainSensori.java"
    ```

=== "SensoreUrbano.java"
    ```java
    --8<-- "Java/Rete-sensori-urbani/SensoreUrbano.java"
    ```

=== "Aggiornabile.java"
    ```java
    --8<-- "Java/Rete-sensori-urbani/Aggiornabile.java"
    ```

=== "SensoreTraffico.java"
    ```java
    --8<-- "Java/Rete-sensori-urbani/SensoreTraffico.java"
    ```

=== "SensoreQualitaAria.java"
    ```java
    --8<-- "Java/Rete-sensori-urbani/SensoreQualitaAria.java"
    ```

=== "SensoreRumore.java"
    ```java
    --8<-- "Java/Rete-sensori-urbani/SensoreRumore.java"
    ```

<div class="oc-embed"
     data-path="Java/Rete-sensori-urbani/MainSensori.java; Java/Rete-sensori-urbani/SensoreUrbano.java; Java/Rete-sensori-urbani/Aggiornabile.java; Java/Rete-sensori-urbani/SensoreTraffico.java; Java/Rete-sensori-urbani/SensoreQualitaAria.java; Java/Rete-sensori-urbani/SensoreRumore.java"
     data-lang="java">
</div>
