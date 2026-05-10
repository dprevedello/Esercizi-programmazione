import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.io.PrintWriter;
import java.net.ServerSocket;
import java.net.Socket;
import java.util.HashMap;
import java.util.Map;
import java.util.Random;

public class ServerCapitali {
	private String RESET = "\u001B[0m";
	private String VERDE = "\u001B[32m";
	private String GIALLO = "\u001B[33m";
	private String BLU = "\u001B[34m";

	private Map<String, String> capitali = new HashMap<>();

	public ServerCapitali() {
		capitali.put("Italia", "Roma");
		capitali.put("Francia", "Parigi");
		capitali.put("Germania", "Berlino");
		capitali.put("Spagna", "Madrid");
		capitali.put("Portogallo", "Lisbona");
		capitali.put("Austria", "Vienna");
		capitali.put("Belgio", "Bruxelles");
		capitali.put("Grecia", "Atene");
		capitali.put("Irlanda", "Dublino");
		capitali.put("Norvegia", "Oslo");
	}

	public static void main(String[] args) throws IOException {
		System.out.println("=== SERVER QUIZ CAPITALI ===");

		try (ServerSocket serverSocket = new ServerSocket(1234)) {
			ServerCapitali server = new ServerCapitali();

			while (true) {
				Socket client = serverSocket.accept();
				server.gestisciClient(client);
			}
		}
	}

	private void gestisciClient(Socket client) {
		Thread thread = new Thread(() -> {
			try (client;
				 BufferedReader in = new BufferedReader(new InputStreamReader(client.getInputStream()));
				 PrintWriter out = new PrintWriter(client.getOutputStream(), true)) {

				String nome = in.readLine();

				String stato = estraiStatoCasuale();
				String capitale = capitali.get(stato);

				out.println(stato);

				int tentativi = 0;
				int errori = 0;

				System.out.println(BLU + "Nuovo client: " + nome + " -> Stato: " + stato + RESET);

				String risposta;
				while ((risposta = in.readLine().trim()) != null) {
					tentativi++;

					if (risposta.equalsIgnoreCase(capitale)) {
						out.println("TROVATO");

						System.out.println(
								VERDE + nome + " ha indovinato " + stato + " in " + tentativi + " tentativi." + RESET);
						break;
					} else {
						errori++;
						System.out.println(GIALLO + nome + " ha inserito " + risposta + " per lo stato " + stato + " ("
								+ tentativi + " tentativi)" + RESET);

						if (errori >= 3)
							out.println("AIUTO:" + capitale.charAt(0));
						else
							out.println("ERRATO");
					}
				}
			} catch (IOException e) {
				System.out.println("Client disconnesso.");
			}
		});
		thread.start();
	}

	private String estraiStatoCasuale() {
		String[] elenco = capitali.keySet().toArray(new String[0]);
		Random rnd = new Random();
		return elenco[rnd.nextInt(elenco.length)];
	}
}
