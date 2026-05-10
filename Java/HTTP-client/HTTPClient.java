import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.io.PrintWriter;
import java.net.Socket;
import java.net.URI;
import java.net.URISyntaxException;
import java.net.UnknownHostException;

public class HTTPClient {

	public static void main(String[] args) {
		try {
			URI url = new URI("http://www.httpforever.com/index.html");

			String host = url.getHost();
			int port = url.getPort() == -1 ? 80 : url.getPort(); // default 80 se non specificata
			String path = url.getPath().isEmpty() ? "/" : url.getPath();

			System.out.println("HOST: " + host);
			System.out.println("Port: " + port);
			System.out.println("Path: " + path);
			System.out.println("URL: " + url);
			System.out.println("\n== RESPONSE ==\n");

			try (Socket server = new Socket(host, port)) {
				// Creazione degli stream di input e output
				PrintWriter out = new PrintWriter(server.getOutputStream(), true);
				BufferedReader in = new BufferedReader(new InputStreamReader(server.getInputStream()));

				// Utilizzo il protocollo HTTP per richiedere una pagina web
				out.println("GET " + path + " HTTP/1.1");
				// Specifichiamo l'host da contattare
				out.println("Host: " + host);
				// Informiamo che la connessione deve essere chiusa al termine del trasferimento
				out.println("Connection: close");
				// Una riga vuota attiva il server
				out.println();

				String response;
				// Leggiamo riga per riga quello che ci viene mandato dal server e lo stampiamo
				// a video
				while ((response = in.readLine()) != null) {
					System.out.println(response);
				}
			} catch (UnknownHostException e) {
				System.out.println("Non riesco a trovare il server");
			} catch (IOException e) {
				System.out.println("Errore di comunicazione");
			}
		} catch (URISyntaxException e) {
			System.out.println("URL non valido: " + e.getMessage());
		}
	}
}
