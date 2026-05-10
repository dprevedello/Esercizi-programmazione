import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.io.PrintWriter;
import java.net.Socket;
import java.net.UnknownHostException;
import java.util.Scanner;

public class Client {
	public static void main(String[] args) {
		Scanner input = new Scanner(System.in);
		try( Socket server = new Socket("localhost", 1234) ){
			BufferedReader in = new BufferedReader(new InputStreamReader(server.getInputStream()));
			PrintWriter out = new PrintWriter(server.getOutputStream(), true);
			
			out.println("Hello socket!");
			String messaggio;
			while( (messaggio = in.readLine()) != null ) {
				System.out.println("Ricevuto dal server: " + messaggio);
				
				// Se mi arriva il messaggio quit, interrompe la comunicazione con il server
				if( messaggio.equals("quit") )
					break;
				// Mostriamo un messaggio all'utente per chiedere una stringa da inviare al server
				System.out.print("Messaggio: ");
				// Leggiamo la stringa e la inviamo al server
				out.println(input.nextLine());
			}
		} catch (UnknownHostException e) {
			System.out.println("Non trovo il server che hai chiesto!");
		} catch (IOException e) {
			System.out.println("Errore di comunicazione con il server");
		}
		input.close();
	}
}
