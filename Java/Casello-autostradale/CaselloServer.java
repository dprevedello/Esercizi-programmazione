import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.io.PrintWriter;
import java.net.ServerSocket;
import java.net.Socket;

public class CaselloServer {
	private int auto = 0;
	private int moto = 0;
	private int furgoni = 0;
	private int camion = 0;

	static volatile boolean running = true;

	public static void main(String[] args) throws IOException {
		System.out.println("=== Casello Autostradale Como-Centro ===");

		ServerSocket serverSocket = new ServerSocket(1234);
		CaselloServer casello = new CaselloServer();

		// Thread che stampa ogni 5 secondi
		Thread threadStampa = new Thread(() -> {
			while (running) {
				casello.stampaReport();
				try {
					Thread.sleep(5000);
				} catch (InterruptedException e) {
					Thread.currentThread().interrupt();
				}
			}
		});
		threadStampa.setDaemon(true);
		threadStampa.start();

		// Thread che ferma tutto dopo 1 minuto
		Thread timerThread = new Thread(() -> {
			try {
				Thread.sleep(60000);
			} catch (InterruptedException e) {
				Thread.currentThread().interrupt();
			}
			
			System.out.println("\n⏱  Tempo scaduto! Il server sta terminando...");
			running = false;
			casello.stampaReport(); // report finale
			System.out.println("\n=== SERVER TERMINATO ===");
			try {
				serverSocket.close();
			} catch (IOException ignored) {
				; // TMCH
			}
		});
		timerThread.setDaemon(true);
		timerThread.start();

		// Accetta connessioni dai varchi (client)
		while (running) {
			try {
				Socket client = serverSocket.accept();
				casello.gestoreVarco(client);
			} catch (IOException  e) {
				// serverSocket.close() chiamato dal timer: uscita pulita
				if (!running)
					break;
			}
		}
	}

	private void gestoreVarco(Socket client) {
		Thread thread = new Thread(() -> {
			try (client;
				 BufferedReader in = new BufferedReader(new InputStreamReader(client.getInputStream()));
				 PrintWriter out = new PrintWriter(client.getOutputStream(), true)) {

				String nome = in.readLine().trim();
				int codice = Integer.parseInt(in.readLine().trim());
				registraTransito(nome, codice);
			} catch (IOException e) {
				; // Connessione chiusa dal client o dal timer
			}
		});
		thread.start();
	}

	private synchronized void registraTransito(String varco, int codice) {
		switch (codice) {
		case 1:
			auto++;
			break;
		case 2:
			moto++;
			break;
		case 3:
			furgoni++;
			break;
		case 4:
			camion++;
		}

		String tipo = switch (codice) {
		case 1 -> "Auto";
		case 2 -> "Moto";
		case 3 -> "Furgone";
		case 4 -> "Camion";
		default -> "Sconosciuto";
		};
		System.out.println("[Varco " + varco + "] Transito: " + tipo);
	}

	private synchronized void stampaReport() {
		int totale = auto + moto + furgoni + camion;
		System.out.println("┌─────────────────────────────────────────┐");
		System.out.println("│       REPORT CASELLO COMO-CENTRO        │");
		System.out.println("├─────────────────────────────────────────┤");
		System.out.printf( "│  🚗  Auto    : %5d                    │\n", auto);
		System.out.printf( "│  🏍  Moto    : %5d                    │\n", moto);
		System.out.printf( "│  🚐  Furgoni : %5d                    │\n", furgoni);
		System.out.printf( "│  🚛  Camion  : %5d                    │\n", camion);
		System.out.println("├─────────────────────────────────────────┤");
		System.out.printf( "│  TOTALE      : %5d                    │\n", totale);
		System.out.println("└─────────────────────────────────────────┘\n");
	}
}