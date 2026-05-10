# HTTP Client

Client HTTP/1.1 implementato a basso livello con socket TCP. Usa `URI` per analizzare l'URL, apre una socket sulla porta 80 e invia manualmente le intestazioni HTTP per scaricare una pagina web.

## Obiettivo

Realizzare un client HTTP che, dato un URL, estragga host, porta e percorso con `java.net.URI`, apra una socket TCP e invii una richiesta HTTP/1.1 manuale. Stampare a video la risposta completa (intestazioni + corpo).

## Descrizione

### `URI` per analizzare l'URL

`java.net.URI` analizza un URL nelle sue componenti senza aprire connessioni:

```java
URI url = new URI("http://www.httpforever.com/index.html");

String host = url.getHost();                          // "www.httpforever.com"
int    port = url.getPort() == -1 ? 80 : url.getPort(); // 80 se non specificata
String path = url.getPath().isEmpty() ? "/" : url.getPath(); // "/index.html"
```

`getPort()` restituisce `-1` se la porta non è esplicitamente nell'URL: in quel caso si usa la porta di default HTTP (80).

### Il protocollo HTTP/1.1 a mano

HTTP è un protocollo testuale. Una richiesta GET è composta da una riga di richiesta, intestazioni e una riga vuota finale che segnala la fine delle intestazioni:

```
GET /index.html HTTP/1.1
Host: www.httpforever.com
Connection: close

```

In Java si invia con `PrintWriter`:

```java
out.println("GET " + path + " HTTP/1.1");
out.println("Host: " + host);
out.println("Connection: close");
out.println();                  // riga vuota obbligatoria
```

`Connection: close` dice al server di chiudere la connessione dopo la risposta: `readLine()` restituirà `null` al termine, terminando il ciclo di lettura.

### Risposta HTTP

La risposta include una riga di stato, intestazioni e il corpo HTML:

```
HTTP/1.1 200 OK
Content-Type: text/html; charset=UTF-8
...

<!DOCTYPE html>
<html>...
```

Il ciclo di lettura stampa tutto:

```java
String response;
while ((response = in.readLine()) != null)
    System.out.println(response);
```

## Suggerimenti

- Prova a cambiare l'URL con un altro sito HTTP (non HTTPS). Per i siti HTTPS vedi l'esercizio [HTTPS Client](44-https-client.md).
- Aggiungere `Accept: text/html` e `Accept-Language: it` alle intestazioni personalizza la risposta.
- La riga di stato (`HTTP/1.1 200 OK`) è sempre la prima riga della risposta: si può leggere separatamente per controllare il codice di stato.

## Soluzione

```java
--8<-- "Java/HTTP-client/HTTPClient.java"
```

!!! warning "Esecuzione in locale"
    Questo esercizio apre una connessione TCP verso un host esterno.
    Eseguirlo in locale con JDK installato
