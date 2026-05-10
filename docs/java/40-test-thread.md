# Test Thread

Panoramica completa dei modi per creare e avviare thread in Java: estendere `Thread`, implementare `Runnable`, classe anonima, lambda. Include il pattern Singleton thread-safe con `synchronized`.

## Obiettivo

Creare quattro file che mostrano i diversi approcci ai thread: `MioThread` (estende `Thread`), `MiaClasseRunnable` (implementa `Runnable`), `MioSingleton` (pattern Singleton con `getInstance` sincronizzato) e `Main` che li avvia tutti insieme mostrando anche classi anonime e lambda.

## Struttura delle classi

| Classe | Responsabilità |
|--------|---------------|
| `MioThread` | Estende `Thread`, sovrascrive `run()` |
| `MiaClasseRunnable` | Implementa `Runnable`, definisce `run()` |
| `MioSingleton` | Pattern Singleton thread-safe, `getInstance()` sincronizzato |
| `Main` | Avvia thread con tutti i pattern disponibili |

## Descrizione

### Due approcci per creare un thread

**Approccio 1 — Estendere `Thread`:**

```java
public class MioThread extends Thread {
    @Override
    public void run() {
        System.out.println("Sono MioThread");
    }
}
// Avvio:
new MioThread().start();
```

**Approccio 2 — Implementare `Runnable`:**

```java
public class MiaClasseRunnable implements Runnable {
    @Override
    public void run() {
        System.out.println("Sono un Runnable");
    }
}
// Avvio — tre varianti equivalenti:
new Thread(new MiaClasseRunnable()).start();

Runnable r = new MiaClasseRunnable();
new Thread(r).start();
```

L'approccio con `Runnable` è preferibile perché separa il task dal meccanismo di esecuzione e permette alla classe di estendere un'altra classe.

### Classe anonima e lambda

Java permette di implementare `Runnable` inline senza definire una classe separata:

```java
// Classe anonima
Runnable r = new Runnable() {
    @Override
    public void run() { System.out.println("Anonimo"); }
};
new Thread(r).start();

// Lambda (Java 8+): Runnable è un'interfaccia funzionale (1 solo metodo)
new Thread(() -> System.out.println("Lambda")).start();
```

La lambda è la forma più compatta: `() -> { corpo }` implementa direttamente `run()`.

### Pattern Singleton thread-safe

`MioSingleton` garantisce che esista una sola istanza in tutta l'applicazione. La parola chiave `synchronized` su `getInstance` impedisce che due thread creino due istanze contemporaneamente:

```java
public static synchronized MioSingleton getInstance() {
    if (instance == null)
        instance = new MioSingleton();
    return instance;
}
```

Il costruttore è `private`: nessuno può creare istanze dall'esterno. Tutti i thread che chiamano `getInstance()` ricevono lo stesso oggetto (con lo stesso `segreto`).

### Output non deterministico

Poiché i thread vengono schedulati dal sistema operativo, l'ordine delle stampe cambia ad ogni esecuzione. È normale e dimostra la natura concorrente dei thread.

## Suggerimenti

- Confronta l'output di più esecuzioni: l'ordine delle stampe sarà diverso ogni volta.
- Il `segreto` nel Singleton è sempre lo stesso per tutti i thread: conferma che è davvero un'unica istanza condivisa.
- Aggiungere `Thread.sleep(100)` all'inizio di alcuni `run()` modifica la distribuzione temporale e rende più evidente il parallelismo.

## Soluzione

=== "Main.java"
    ```java
    --8<-- "Java/Test-thread/Main.java"
    ```

=== "MioThread.java"
    ```java
    --8<-- "Java/Test-thread/MioThread.java"
    ```

=== "MiaClasseRunnable.java"
    ```java
    --8<-- "Java/Test-thread/MiaClasseRunnable.java"
    ```

=== "MioSingleton.java"
    ```java
    --8<-- "Java/Test-thread/MioSingleton.java"
    ```

<div class="oc-embed"
     data-lang="java"
     data-path="Java/Test-thread/Main.java; Java/Test-thread/MioThread.java; Java/Test-thread/MiaClasseRunnable.java; Java/Test-thread/MioSingleton.java"
	 data-autorun="true">
</div>
