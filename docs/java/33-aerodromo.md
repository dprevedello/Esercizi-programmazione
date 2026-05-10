# Aerodromo

Progetto con interfaccia `CMP`, classe astratta `Aeromobile`, due classi concrete, serializzazione con `ObjectOutputStream`/`ObjectInputStream` e menù testuale con persistenza tra sessioni.

## Obiettivo

Definire l'interfaccia `CMP` con il metodo `superiore(CMP x)`, la classe astratta `Aeromobile` (implementa `CMP` e `Serializable`), le classi `Aliante` e `Aereomotore` con criteri di confronto diversi. Il `main` in `MainAerodromo` gestisce la lista tramite menù e la serializza su file all'uscita, ricaricandola all'avvio.

## Descrizione

### Architettura

```
«interface»    «interface»    «abstract class»          concrete classes
CMP            Serializable   Aeromobile         ←──    Aliante
                              (implements both)  ←──    Aereomotore
```

### Interfaccia `CMP` e `instanceof`

Il metodo `superiore` deve restituire `false` se `x` è `null` **o** se i due oggetti non sono dello stesso tipo. Il controllo con `instanceof` è essenziale per evitare confronti tra tipi diversi (aliantevs aereomotore):

```java
@Override
public boolean superiore(CMP x) {
    if (x == null || !(x instanceof Aliante)) return false;
    return this.efficienza > ((Aliante) x).efficienza;
}
```

Il cast `(Aliante) x` è sicuro dopo il controllo `instanceof`.

### Serializzazione

La serializzazione Java trasforma un oggetto in una sequenza di byte che può essere salvata su file e ricaricata in una sessione successiva. La classe deve implementare `Serializable` (interfaccia marker, senza metodi) e dichiarare un `serialVersionUID`:

```java
public abstract class Aeromobile implements CMP, Serializable {
    private static final long serialVersionUID = 1L;
    // ...
}
```

**Scrittura:**
```java
try (ObjectOutputStream oos = new ObjectOutputStream(new FileOutputStream("file.ser"))) {
    oos.writeObject(lista);
}
```

**Lettura:**
```java
try (ObjectInputStream ois = new ObjectInputStream(new FileInputStream("file.ser"))) {
    ArrayList<Aeromobile> lista = (ArrayList<Aeromobile>) ois.readObject();
}
```

Il cast genera un warning di tipo non controllato (`unchecked cast`): si sopprime con `@SuppressWarnings("unchecked")`.

### Perché `serialVersionUID`?

Se si modifica la classe dopo aver serializzato degli oggetti e il `serialVersionUID` non corrisponde, la deserializzazione lancia `InvalidClassException`. Dichiararlo esplicitamente evita comportamenti imprevisti.

### Trovare il migliore con `superiore()`

Il pattern per trovare il massimo sfrutta `superiore()` invece di confrontare direttamente gli attributi — così il codice non dipende dall'implementazione specifica:

```java
Aliante migliore = null;
for (Aeromobile a : lista) {
    if (a instanceof Aliante) {
        Aliante al = (Aliante) a;
        if (migliore == null || al.superiore(migliore))
            migliore = al;
    }
}
```

## Compilazione ed esecuzione

```bash
javac *.java
java MainAerodromo
```

Al termine, il file `aerodromo.ser` viene creato nella cartella corrente. Alla successiva esecuzione la lista viene ricaricata automaticamente.

## Suggerimenti

- `Serializable` è un'interfaccia **marker**: non dichiara metodi, serve solo a indicare alla JVM che la classe può essere serializzata.
- Tutte le classi della gerarchia devono implementare `Serializable` (anche le sottoclassi), altrimenti la serializzazione lancia `NotSerializableException`.
- `equals` in `Aeromobile` confronta le sigle: questo permette di verificare se un aeromobile è già in lista con `lista.contains(a)`.

## Soluzione

=== "MainAerodromo.java"
    ```java
    --8<-- "Java/Aerodromo/MainAerodromo.java"
    ```

=== "Aeromobile.java"
    ```java
    --8<-- "Java/Aerodromo/Aeromobile.java"
    ```

=== "CMP.java"
    ```java
    --8<-- "Java/Aerodromo/CMP.java"
    ```

=== "Aliante.java"
    ```java
    --8<-- "Java/Aerodromo/Aliante.java"
    ```

=== "Aereomotore.java"
    ```java
    --8<-- "Java/Aerodromo/Aereomotore.java"
    ```

<div class="oc-embed"
     data-path="Java/Aerodromo/MainAerodromo.java; Java/Aerodromo/Aeromobile.java; Java/Aerodromo/CMP.java; Java/Aerodromo/Aliante.java; Java/Aerodromo/Aereomotore.java"
     data-lang="java"
     data-stdin="1\nI-ALFA\n35\n1\nI-BETA\n28\n2\nI-GAMMA\n150.5\n3\n4\n0\n"
     data-height="600"
     data-autorun="true">
</div>
