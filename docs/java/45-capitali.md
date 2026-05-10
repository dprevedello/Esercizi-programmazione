# Quiz Capitali

Server multi-client con thread: ogni connessione viene gestita in un thread separato. Il server propone una capitale casuale da indovinare e fornisce un suggerimento dopo tre errori. Il client interagisce da riga di comando.

## Obiettivo

Realizzare `ServerCapitali` che accetta più client contemporaneamente (un thread per cliente), gestisce una sessione di quiz (stato estratto, tentativi, aiuto), e `ClientCapitali` che si connette, inserisce il nome, tenta di indovinare la capitale e gestisce le risposte del server.

## Struttura

| File | Ruolo |
|------|-------|
| `ServerCapitali.java` | Server multi-client: `HashMap` capitali, thread per client, codici colore ANSI |
| `ClientCapitali.java` | Client interattivo: legge da tastiera, invia al server, interpreta le risposte |

## Protocollo applicativo

Il server e il client comunicano con un protocollo testuale semplice:

```
Client → Server: <nome>
Server → Client: <stato>          (es. "Italia")
Client → Server: <tentativo>
Server → Client: ERRATO           (risposta sbagliata, < 3 errori)
               | AIUTO:<lettera>  (dopo 3 errori, prima lettera della capitale)
               | TROVATO          (risposta corretta)
```

## Descrizione

### Server multi-client con thread

Ogni client che si connette viene gestito in un thread dedicato, avviato con `thread.start()`. Il ciclo `while(true)` del server rimane libero di accettare nuove connessioni:

```java
while (true) {
    Socket client = serverSocket.accept();
    gestisciClient(client);       // avvia un thread interno
}

private void gestisciClient(Socket client) {
    Thread thread = new Thread(() -> {
        // codice di gestione della sessione
    });
    thread.start();
}
```

### `try-with-resources` con il socket passato come parametro

Java 9+ permette di usare variabili già dichiarate nel `try-with-resources` scrivendo solo il nome della variabile:

```java
try (client;
     BufferedReader in = ...;
     PrintWriter out = ...) {
    // client verrà chiuso automaticamente insieme agli stream
}
```

### `HashMap` per le capitali e selezione casuale

Le coppie stato-capitale sono memorizzate in una `HashMap<String, String>`. La selezione casuale converte il set delle chiavi in array:

```java
private String estraiStatoCasuale() {
    String[] elenco = capitali.keySet().toArray(new String[0]);
    return elenco[new Random().nextInt(elenco.length)];
}
```

### Codici colore ANSI

Il server usa sequenze di escape ANSI per colorare l'output nel terminale:

```java
private String VERDE = "\u001B[32m";
private String RESET = "\u001B[0m";
System.out.println(VERDE + "Messaggio verde" + RESET);
```

I codici ANSI funzionano nella maggior parte dei terminali Unix/macOS e in Windows Terminal. Non vengono inviati al client: rimangono solo nel log del server.

### Aiuto dopo tre errori

Il server conta gli errori per sessione: al terzo errore manda `"AIUTO:"` seguito dalla prima lettera della capitale. Il client riconosce il prefisso con `startsWith`:

```java
// Server
if (errori >= 3)
    out.println("AIUTO:" + capitale.charAt(0));

// Client
if (esito.startsWith("AIUTO:"))
    System.out.println("Suggerimento! Inizia con: " + esito.substring(6));
```

## Compilazione ed esecuzione

Servono **due terminali separati**:

```bash
# Terminale 1 — avvia il server
javac *.java
java ServerCapitali

# Terminale 2 (o più) — avvia uno o più client
java ClientCapitali
```

!!! warning "OneCompiler non supportato"
    Questo esercizio richiede due processi separati (server e client) e una connessione di rete locale. Non è eseguibile in OneCompiler.

## Suggerimenti

- Apri più terminali client contemporaneamente per vedere il server gestire più sessioni in parallelo.
- Aggiungere più coppie stato-capitale alla `HashMap` aumenta la varietà delle domande.
- Estensione: memorizzare i punteggi su file alla fine di ogni sessione.

## Soluzione

=== "ServerCapitali.java"
    ```java
    --8<-- "Java/Capitali/ServerCapitali.java"
    ```

=== "ClientCapitali.java"
    ```java
    --8<-- "Java/Capitali/ClientCapitali.java"
    ```
