import java.util.ArrayList;
import java.util.Scanner;

public class PlaylistMusicale {
	public static void main(String[] args) {
		ArrayList<String> playlist = new ArrayList<>();
		Scanner in = new Scanner(System.in);

		int scelta;
		do {
			System.out.println("=== GESTIONE PLAYLIST ===");
			System.out.println("1. Aggiungi brano in coda");
			System.out.println("2. Inserisci brano in posizione");
			System.out.println("3. Rimuovi brano");
			System.out.println("4. Sostituisci brano");
			System.out.println("5. Verifica presenza");
			System.out.println("6. Mostra numero di brani");
			System.out.println("7. Visualizza playlist");
			System.out.println("0. Esci");
			System.out.print("Scelta: ");
			scelta = in.nextInt();
			in.nextLine();
			System.out.println();

			String titolo;
			int posizione;
			switch (scelta) {
			case 1:
				System.out.print("Titolo del brano: ");
				titolo = in.nextLine().toUpperCase();
				playlist.add(titolo);
				System.out.println("Brano aggiunto.");
				break;
			case 2:
				System.out.print("Titolo del brano: ");
				titolo = in.nextLine().toUpperCase();
				System.out.print("Posizione (0-" + playlist.size() + "): ");
				posizione = in.nextInt();
				in.nextLine();
				if (posizione >= 0 && posizione <= playlist.size()) {
					playlist.add(posizione, titolo);
					System.out.println("Brano inserito in posizione " + posizione + ".");
				} else
					System.out.println("Posizione non valida.");
				break;
			case 3:
				System.out.print("Titolo da rimuovere: ");
				titolo = in.nextLine().toUpperCase();
				if (playlist.remove(titolo))
					System.out.println("Brano rimosso.");
				else
					System.out.println("Brano non trovato.");
				break;
			case 4:
				System.out.print("Titolo da sostituire: ");
				titolo = in.nextLine().toUpperCase();
				posizione = playlist.indexOf(titolo);
				if (posizione != -1) {
					System.out.print("Nuovo titolo: ");
					String nuovo = in.nextLine().toUpperCase();
					playlist.set(posizione, nuovo);
					System.out.println("Brano sostituito.");
				} else
					System.out.println("Brano non trovato.");
				break;
			case 5:
				System.out.print("Titolo da cercare: ");
				titolo = in.nextLine().toUpperCase();
				if (playlist.contains(titolo))
					System.out.println("Il brano è presente in posizione " + playlist.indexOf(titolo) + ".");
				else
					System.out.println("Brano non presente.");
				break;
			case 6:
				System.out.println("Numero totale di brani: " + playlist.size());
				break;
			case 7:
				if (playlist.isEmpty())
					System.out.println("La playlist è vuota.");
				else {
					System.out.println("--- PLAYLIST ---");
					for (int i = 0; i < playlist.size(); i++)
						System.out.println(i + ". " + playlist.get(i));
				}
				break;
			case 0:
				System.out.println("Arrivederci.");
				break;
			default:
				System.out.println("Scelta non valida.");
			}
			System.out.println();
		} while (scelta != 0);
	}
}
