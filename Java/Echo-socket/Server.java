import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.io.PrintWriter;
import java.net.ServerSocket;
import java.net.Socket;

public class Server {
	public static void main(String[] args) {
		
		// Diamo un numero di porta superiore a 1024
		// Well Known Ports
		
		// try-with-resource: Creo la socket in attesa di connessioni
		try ( ServerSocket socket = new ServerSocket(1234) ) {
			// Attendo all'infinito nuovi client
			System.out.println("Attendo connessioni....");
			while(true) {
				// Dopo "accept" ho una nuova connessione con un client
				try( Socket client = socket.accept() ){
					// Dal client verso il server
					// Trasformiamo lo stream di byte della socket in uno stream di caratteri
					// (InputStreamReader), poi trasformo lo stream di caratteri in uno stream
					// bufferizzato, cioè che mi permette di leggere una stringa intera invece
					// che un carattere alla volta.
					BufferedReader in = new BufferedReader(new InputStreamReader(client.getInputStream()));
					
					// Stream dal server verso il client
					PrintWriter out = new PrintWriter(client.getOutputStream(), true);
					
					String messaggio;
					while( (messaggio = in.readLine()) != null ) {
						System.out.println("Ricevuto dal client: " + messaggio);
						// Rispondo con lo stesso messaggio (Eco)
						out.println(messaggio);
						if( messaggio.equals("quit") )
							break;
					}
					break;
				} catch (IOException e) {
					System.out.println("Errore di comunicazione con il client");
				}
			}
		} catch (IOException e) {
			System.out.println("La porta del server è già in uso.\n" + e.getMessage());
		}
	}
}
