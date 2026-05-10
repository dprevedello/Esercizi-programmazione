# HTTPS Client

Estensione del client HTTP con connessione cifrata TLS. Usa `SSLSocketFactory` per creare una `SSLSocket` sulla porta 443 e invia le stesse intestazioni HTTP/1.1 su un canale sicuro.

## Obiettivo

Adattare il client HTTP per connettersi a siti HTTPS usando `javax.net.ssl.SSLSocket` e `SSLSocketFactory`. Il protocollo applicativo (HTTP/1.1) rimane identico; cambia solo il livello di trasporto (TLS invece di TCP semplice).

## Descrizione

### HTTP vs HTTPS: cosa cambia

| Aspetto | HTTP | HTTPS |
|---------|------|-------|
| Porta di default | 80 | 443 |
| Socket | `java.net.Socket` | `javax.net.ssl.SSLSocket` |
| Sicurezza | Testo in chiaro | Cifrato con TLS |
| Protocollo applicativo | HTTP/1.1 | HTTP/1.1 (identico) |

Il codice applicativo — invio della richiesta e lettura della risposta — è esattamente lo stesso. Cambia solo il modo in cui si apre la socket.

### `SSLSocketFactory` e `SSLSocket`

`SSLSocketFactory` è il factory per le socket TLS. Si ottiene con il metodo statico `getDefault()` che usa il keystore di sistema (certificati root già presenti nel JDK):

```java
SSLSocketFactory factory = (SSLSocketFactory) SSLSocketFactory.getDefault();
try (SSLSocket server = (SSLSocket) factory.createSocket(host, port)) {
    // stesso codice di HTTPClient
}
```

`factory.createSocket(host, port)` restituisce un `Socket` generico: il cast a `SSLSocket` è necessario per accedere ai metodi specifici TLS (es. `setEnabledProtocols`).

### Protocolli TLS abilitati

Il codice contiene (commentato) un esempio per limitare i protocolli accettati alle versioni sicure:

```java
// String[] protocols = {"TLSv1.2", "TLSv1.3"};
// server.setEnabledProtocols(protocols);
```

TLS 1.2 e 1.3 sono le versioni attualmente sicure. Le versioni precedenti (SSL 3.0, TLS 1.0, TLS 1.1) sono obsolete e vulnerabili.

### Richiesta HTTP su TLS

Una volta aperta la `SSLSocket`, il protocollo HTTP è identico al client non cifrato:

```java
PrintWriter out = new PrintWriter(server.getOutputStream(), true);
BufferedReader input = new BufferedReader(new InputStreamReader(server.getInputStream()));

out.println("GET " + path + " HTTP/1.1");
out.println("Host: " + host);
out.println("Connection: close");
out.println();

String response;
while ((response = input.readLine()) != null)
    System.out.println(response);
```

## Compilazione ed esecuzione

```bash
javac HTTPSClient.java
java HTTPSClient
```

!!! info "Connessione Internet richiesta"
    Il programma si connette a `it.wttr.in/Gallarate` (previsioni meteo in formato testo).

<div class="oc-embed"
     data-lang="java"
     data-path="Java/HTTPS-client/HTTPSClient.java">
</div>

## Suggerimenti

- Prova a cambiare l'URL con `https://it.wttr.in/Milano` o `https://it.wttr.in/Roma`.
- Il sito `wttr.in` restituisce le previsioni meteo in formato testo ASCII, perfetto per un client a riga di comando.
- `e.printStackTrace()` nel catch mostra l'intera catena di eccezioni TLS, utile per diagnosticare problemi di certificati.
