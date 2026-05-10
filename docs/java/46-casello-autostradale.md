# Casello Autostradale

Simulazione di un casello con thread e socket: i varchi (`SensoreVarco`) inviano transiti al server (`CaselloServer`) che li conteggia per tipo di veicolo, stampa un report ogni 5 secondi e termina automaticamente dopo 1 minuto.

## Obiettivo

`CaselloServer` ascolta sulla porta 1234, conta i transiti ricevuti per categoria (auto, moto, furgoni, camion) con contatori `synchronized`, stampa report periodici tramite thread daemon e si auto-termina dopo 60 secondi. `SensoreVarco` estende `Thread`: ogni varco invia transiti casuali al server finché la connessione non viene rifiutata.

## Struttura

| File | Ruolo |
|------|-------|
| `CaselloServer.java` | Server: contatori sincronizzati, thread stampa, thread timer, report ASCII |
| `SensoreVarco.java` | Client/Thread: invia transiti casuali a intervalli casuali finché il server è attivo |

## Descrizione

### `volatile` per la variabile di controllo

`running` è dichiarata `static volatile boolean`: `volatile` garantisce che le modifiche effettuate da un thread siano immediatamente visibili a tutti gli altri, senza cache in registri CPU:

```java
static volatile boolean running = true;
```

Senza `volatile`, il thread del timer potrebbe impostare `running = false` ma il ciclo del server potrebbe non accorgersene per via dell'ottimizzazione della JVM.

### Thread daemon

I thread di stampa e di timer sono impostati come **daemon** con `setDaemon(true)`. I thread daemon non impediscono alla JVM di terminare: quando tutti i thread non-daemon finiscono, la JVM si chiude anche se i daemon sono ancora attivi:

```java
threadStampa.setDaemon(true);
threadStampa.start();
```

### Contatori `synchronized`

`registraTransito` e `stampaReport` sono `synchronized`: solo un thread alla volta può modificare o leggere i contatori, evitando race condition:

```java
private synchronized void registraTransito(String varco, int codice) {
    switch (codice) {
        case 1 -> auto++;
        // ...
    }
}
```

Il `switch` usa la sintassi con freccia `->` (Java 14+): più compatta del `case: break` tradizionale.

### Auto-terminazione del server

Il thread timer aspetta 60 secondi, imposta `running = false` e chiude `serverSocket`. La chiusura del `ServerSocket` provoca una `IOException` in `accept()`, che interrompe il ciclo di accettazione:

```java
try {
    Socket client = serverSocket.accept();
} catch (IOException e) {
    if (!running) break;   // uscita pulita se il server si è fermato
}
```

### `SensoreVarco` estende `Thread`

Ogni varco è un thread che invia un transito casuale al server, poi aspetta un tempo casuale:

```java
while (true) {
    Thread.sleep(new Random().nextInt(500, 3000));
    try (Socket server = new Socket("localhost", 1234);
         PrintWriter out = ...) {
        out.println(getName());                  // nome del varco
        out.println(new Random().nextInt(1, 5)); // tipo veicolo 1-4
    } catch (Exception e) {
        System.out.println("Varco " + getName() + " terminato");
        return;   // il server ha chiuso: il varco termina
    }
}
```

Quando il server chiude, `new Socket(...)` lancia un'eccezione: il varco la intercetta e termina ordinatamente.

### Report ASCII con `printf`

Il report usa `System.out.printf` con formattazione per allineare le colonne:

```java
System.out.printf("│  Auto    : %5d                    │\n", auto);
```

`%5d` formatta un intero in un campo di 5 caratteri allineato a destra.

## Suggerimenti

- Osserva il report che si aggiorna ogni 5 secondi mentre i varchi inviano transiti.
- Modifica `nextInt(500, 3000)` in `SensoreVarco` per aumentare o diminuire la frequenza dei transiti.
- Estensione: aggiungere una tariffa per tipo veicolo e calcolare il totale degli incassi nel report.

## Soluzione

=== "CaselloServer.java"
    ```java
    --8<-- "Java/Casello-autostradale/CaselloServer.java"
    ```

=== "SensoreVarco.java"
    ```java
    --8<-- "Java/Casello-autostradale/SensoreVarco.java"
    ```

!!! warning "OneCompiler non supportato"
    Questo esercizio richiede due processi separati e una connessione di rete locale. Non è eseguibile in OneCompiler.