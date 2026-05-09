import java.io.BufferedWriter;
import java.io.FileWriter;
import java.io.IOException;
import java.util.ArrayList;
import java.util.Scanner;

/**
 * Applicazione principale di MediaBox.
 * Gestisce una libreria di contenuti multimediali tramite menù testuale.
 */
public class MainMediaBox {

	public static void main(String[] args) {
		ArrayList<Contenuto> libreria = new ArrayList<>();
		Scanner in = new Scanner(System.in);
		int scelta;

		do {
			System.out.println("\n=== MEDIABOX ===");
			System.out.println("1. Aggiungi contenuto");
			System.out.println("2. Visualizza tutti i contenuti");
			System.out.println("3. Cerca contenuto per titolo");
			System.out.println("4. Riproduci contenuto");
			System.out.println("5. Aggiungi voto");
			System.out.println("6. Scrivi libreria su file");
			System.out.println("0. Esci");
			System.out.print("Scelta: ");
			scelta = in.nextInt();
			in.nextLine();
			System.out.println();

			switch (scelta) {
			case 1:
				aggiungiContenuto(libreria, in);
				break;
			case 2:
				if (libreria.isEmpty())
					System.out.println("La libreria è vuota.");
				else
					for (Contenuto c : libreria)
						System.out.println(c);
				break;
			case 3:
				System.out.print("Titolo da cercare: ");
				String titolo = in.nextLine();
				Contenuto trovato = cercaPerTitolo(libreria, titolo);
				System.out.println(trovato != null ? trovato : "Contenuto non trovato.");
				break;
			case 4:
				System.out.print("Titolo da riprodurre: ");
				String titoloR = in.nextLine();
				Contenuto daRipr = cercaPerTitolo(libreria, titoloR);
				if (daRipr != null)
					daRipr.riproduci();
				else
					System.out.println("Contenuto non trovato.");
				break;
			case 5:
				System.out.print("Titolo a cui aggiungere un voto: ");
				String titoloV = in.nextLine();
				Contenuto daVotare = cercaPerTitolo(libreria, titoloV);
				if (daVotare == null) {
					System.out.println("Contenuto non trovato.");
				} else if (daVotare instanceof Valutabile) {
					System.out.print("Voto (1-10): ");
					int voto = in.nextInt();
					in.nextLine();
					try {
						((Valutabile) daVotare).aggiungiVoto(voto);
						System.out.println("Voto aggiunto.");
					} catch (IllegalArgumentException e) {
						System.out.println("Errore: " + e.getMessage());
					}
				} else {
					System.out.println("Questo contenuto non supporta le valutazioni.");
				}
				break;
			case 6:
				scriviSuFile(libreria);
				break;
			case 0:
				System.out.println("Arrivederci.");
				break;
			default:
				System.out.println("Scelta non valida.");
			}
		} while (scelta != 0);
	}

	/** Guida l'utente nella creazione di un nuovo contenuto e lo aggiunge alla libreria. */
	private static void aggiungiContenuto(ArrayList<Contenuto> libreria, Scanner in) {
		System.out.println("Tipo: 1) Film  2) Serie TV  3) Podcast  4) Audiolibro");
		System.out.print("Scelta: ");
		int tipo = in.nextInt();
		in.nextLine();

		System.out.print("Titolo: ");
		String titolo = in.nextLine();
		System.out.print("Autore/Regista: ");
		String autore = in.nextLine();
		System.out.print("Anno: ");
		int anno = in.nextInt();
		in.nextLine();

		try {
			switch (tipo) {
			case 1:
				System.out.print("Durata (minuti): ");
				int durata = in.nextInt(); in.nextLine();
				libreria.add(new Film(titolo, autore, anno, durata));
				break;
			case 2:
				System.out.print("Stagioni: ");
				int stagioni = in.nextInt();
				System.out.print("Episodi totali: ");
				int episodi = in.nextInt(); in.nextLine();
				libreria.add(new SerieTV(titolo, autore, anno, stagioni, episodi));
				break;
			case 3:
				System.out.print("Numero episodi: ");
				int ep = in.nextInt();
				System.out.print("Durata media episodio (min): ");
				int durataEp = in.nextInt(); in.nextLine();
				libreria.add(new Podcast(titolo, autore, anno, ep, durataEp));
				break;
			case 4:
				System.out.print("Narratore: ");
				String narratore = in.nextLine();
				System.out.print("Durata (minuti): ");
				int durataAL = in.nextInt(); in.nextLine();
				libreria.add(new Audiolibro(titolo, autore, anno, narratore, durataAL));
				break;
			default:
				System.out.println("Tipo non valido.");
				return;
			}
			System.out.println("Contenuto aggiunto.");
		} catch (Exception e) {
			System.out.println("Errore durante l'inserimento: " + e.getMessage());
			in.nextLine();
		}
	}

	/** Cerca un contenuto per titolo (case-insensitive). */
	private static Contenuto cercaPerTitolo(ArrayList<Contenuto> libreria, String titolo) {
		for (Contenuto c : libreria)
			if (c.getTitolo().equalsIgnoreCase(titolo))
				return c;
		return null;
	}

	/** Scrive tutti i contenuti della libreria su file di testo. */
	private static void scriviSuFile(ArrayList<Contenuto> libreria) {
		if (libreria.isEmpty()) {
			System.out.println("La libreria è vuota, nessun file scritto.");
			return;
		}
		try (BufferedWriter bw = new BufferedWriter(new FileWriter("libreria.txt"))) {
			for (Contenuto c : libreria) {
				bw.write(c.toString());
				bw.newLine();
			}
			System.out.println("Libreria salvata su 'libreria.txt' (" + libreria.size() + " contenuti).");
		} catch (IOException e) {
			System.out.println("Errore durante la scrittura: " + e.getMessage());
		}
	}
}
