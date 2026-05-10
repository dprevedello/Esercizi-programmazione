import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.io.PrintWriter;
import java.net.Socket;
import java.util.Scanner;

public class ClientCapitali {

	public static void main(String[] args) {

		try (Socket server = new Socket("localhost", 1234);
			 BufferedReader in = new BufferedReader(new InputStreamReader(server.getInputStream()));
			 PrintWriter out = new PrintWriter(server.getOutputStream(), true);
			 Scanner tastiera = new Scanner(System.in)) {

			System.out.println("=== QUIZ CAPITALI ===");

			System.out.print("Inserisci il tuo nome: ");
			String nome = tastiera.nextLine();
			out.println(nome);

			String stato = in.readLine();
			System.out.println("Indovina la capitale di: " + stato);

			int tentativi = 0;
			while (true) {
				System.out.print("Risposta: ");
				String risposta = tastiera.nextLine().trim();

				if (risposta.isEmpty()) {
					System.out.println("Inserisci un valore valido.");
					continue;
				}

				out.println(risposta);
				tentativi++;

				String esito = in.readLine();
				if (esito.equals("ERRATO"))
					System.out.println("Sbagliato, riprova.");
				else if (esito.startsWith("AIUTO:"))
					System.out.println("Suggerimento! Inizia con: " + esito.substring(6));
				else if (esito.equals("TROVATO")) {
					System.out.println("Complimenti! Hai indovinato in " + tentativi + " tentativi.");
					break;
				}
			}
		} catch (IOException e) {
			System.out.println("Errore di connessione al server.");
		}
	}
}
