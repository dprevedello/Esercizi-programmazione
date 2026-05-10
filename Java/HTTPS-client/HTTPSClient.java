import java.io.BufferedReader;
import java.io.InputStreamReader;
import java.io.PrintWriter;
import java.net.URI;
import java.net.URISyntaxException;

import javax.net.ssl.SSLSocket;
import javax.net.ssl.SSLSocketFactory;

public class HTTPSClient {
	public static void main(String[] args) {
		try {
			URI url = new URI("https://it.wttr.in/Gallarate");

			String host = url.getHost();
			int port = url.getPort() == -1 ? 443 : url.getPort(); // default 80 se non specificata
			String path = url.getPath().isEmpty() ? "/" : url.getPath();

			System.out.println("HOST: " + host);
			System.out.println("Port: " + port);
			System.out.println("Path: " + path);
			System.out.println("URL: " + url);
			System.out.println("\n== RESPONSE ==\n");
			try {
				// Accesso alla libreria crittografica di creazione delle socket sicure
				SSLSocketFactory factory = (SSLSocketFactory) SSLSocketFactory.getDefault();
				// Apertura della socket con crittografia
				try (SSLSocket server = (SSLSocket) factory.createSocket(host, port)){
					// Imposto i protocolli accettati per la comunicazione sicura
					// Le versioni 1.2 e 1.3 sono le ultime e attualmente sicure
					//String[] protocols = {"TLSv1.2", "TLSv1.3"};
					//server.setEnabledProtocols(protocols);
					
					// Creazione degli stream di caratteri per la cumunicazione sulla socket
					PrintWriter out = new PrintWriter(server.getOutputStream(), true);
					BufferedReader input = new BufferedReader(
							new InputStreamReader(server.getInputStream()));
					
					// Ripercorriamo il protocollo HTTP per instaurare la comunicazione con il server Web
					out.println("GET " + path + " HTTP/1.1");
					out.println("Host: " + host);
					out.println("Connection: close");
					out.println();
					
					String response;
					// Leggiamo riga per riga quello che ci viene mandato dal server e lo stampiamo a video
					while( (response = input.readLine()) != null ) {
						System.out.println(response);
					}
				}
			} catch (Exception e) {
				e.printStackTrace();
			}
		} catch (URISyntaxException e) {
			System.out.println("URL non valido: " + e.getMessage());
		}
	}
}
