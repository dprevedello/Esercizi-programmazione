# Echo Socket

Primo esempio di comunicazione client-server con socket Java. Il server accetta un client, rispecchia ogni messaggio ricevuto (echo) e termina su "quit". Introduce `ServerSocket`, `Socket`, `BufferedReader`, `PrintWriter`.

## Obiettivo

Realizzare un server (`Server.java`) che accetta connessioni sulla porta 1234 e rispecchia ogni riga ricevuta dal client. Il client (`Client.java`) si connette al server, invia messaggi letti da tastiera e stampa le risposte. Entrambi terminano quando viene ricevuto il messaggio "quit".

## Struttura

| File | Ruolo |
|------|-------|
| `Server.java` | Attende connessioni, legge messaggi, risponde con eco |
| `Client.java` | Si connette al server, invia messaggi da tastiera, mostra risposte |

## Descrizione

### Socket e stream

Una socket TCP è un canale bidirezionale. In Java si trasforma in stream di testo con:

```java
BufferedReader in  = new BufferedReader(new InputStreamReader(socket.getInputStream()));
PrintWriter    out = new PrintWriter(socket.getOutputStream(), true);
```

`true` nel costruttore di `PrintWriter` attiva l'**autoflush**: `println` invia immediatamente il dato senza aspettare che il buffer si riempia.

### `ServerSocket` e `accept()`

`ServerSocket` mette il server in ascolto su una porta. `accept()` è un metodo **bloccante**: il thread si ferma finché un client non si connette, poi restituisce un oggetto `Socket` per quella connessione:

```java
try (ServerSocket serverSocket = new ServerSocket(1234)) {
    while (true) {
        try (Socket client = serverSocket.accept()) {  // blocca qui
            // gestisci il client
        }
    }
}
```

### `try-with-resources` per le socket

Le socket implementano `Closeable`: usare `try-with-resources` garantisce la chiusura automatica anche in caso di eccezione, evitando leak di connessioni:

```java
try (Socket server = new Socket("localhost", 1234)) {
    // usa la socket
}   // chiusa automaticamente qui
```

### Protocollo dell'echo

Il protocollo è semplice: il client invia una riga, il server la rispedisce identica. Il client verifica se la risposta è "quit" per terminare. Questo pattern richiede che client e server concordino il protocollo (quale stringa significa "chiudi"):

```java
// Server
while ((messaggio = in.readLine()) != null) {
    out.println(messaggio);          // echo
    if (messaggio.equals("quit")) break;
}

// Client
while ((messaggio = in.readLine()) != null) {
    System.out.println("Ricevuto: " + messaggio);
    if (messaggio.equals("quit")) break;
    out.println(input.nextLine());   // invia il prossimo messaggio
}
```

## Suggerimenti

- Le porte sotto 1024 sono riservate al sistema: usare sempre porte ≥ 1024 (qui 1234).
- `readLine()` restituisce `null` quando la connessione viene chiusa dall'altra parte: la condizione `!= null` nel `while` gestisce questa situazione.
- Estensione: modificare il server per accettare più client contemporaneamente, avviando un thread per ciascuno (vedi esercizio [Capitali](45-capitali.md)).

## Soluzione

=== "Server.java"
    ```java
    --8<-- "Java/Echo-socket/Server.java"
    ```

=== "Client.java"
    ```java
    --8<-- "Java/Echo-socket/Client.java"
    ```

!!! warning "OneCompiler non supportato"
    Questo esercizio richiede due processi separati (server e client) e una connessione di rete locale. Non è eseguibile in OneCompiler.