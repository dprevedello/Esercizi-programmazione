import java.util.HashMap;
import java.util.Scanner;

public class Magazzino {
	public static void main(String[] args) {
		Scanner in = new Scanner(System.in);
		HashMap<String, Integer> magazzino = new HashMap<>();

		int scelta;
		do {
			System.out.println("=== GESTIONE MAGAZZINO ===");
			System.out.println("1. Aggiungi o aggiorna prodotto");
			System.out.println("2. Rimuovi prodotto");
			System.out.println("3. Modifica quantità");
			System.out.println("4. Verifica presenza");
			System.out.println("5. Mostra quantità disponibile");
			System.out.println("6. Visualizza elenco prodotti");
			System.out.println("7. Mostra numero di prodotti");
			System.out.println("0. Esci");
			System.out.print("Scelta: ");
			scelta = in.nextInt();
			in.nextLine();
			System.out.println();

			String codice;
			int qta;
			switch (scelta) {
			case 1:
				System.out.print("Codice prodotto: ");
				codice = in.nextLine().toUpperCase();
				System.out.print("Quantità: ");
				qta = in.nextInt();
				in.nextLine();
				if (qta < 0)
					System.out.println("Errore: quantità negativa.");
				else if (magazzino.containsKey(codice)) {
					magazzino.put(codice, magazzino.get(codice) + qta);
					System.out.println("Quantità aggiornata (somma).");
				} else {
					magazzino.put(codice, qta);
					System.out.println("Prodotto aggiunto al magazzino.");
				}
				break;
			case 2:
				System.out.print("Codice prodotto: ");
				codice = in.nextLine().toUpperCase();
				if (magazzino.containsKey(codice)) {
					magazzino.remove(codice);
					System.out.println("Prodotto rimosso.");
				} else
					System.out.println("Errore: prodotto non trovato.");
				break;
			case 3:
				System.out.print("Codice prodotto: ");
				codice = in.nextLine().toUpperCase();
				if (magazzino.containsKey(codice)) {
					System.out.print("Nuova quantità: ");
					qta = in.nextInt();
					in.nextLine();
					magazzino.put(codice, Math.max(0, qta));
					System.out.println("Quantità aggiornata.");
				} else
					System.out.println("Errore: prodotto non trovato.");
				break;
			case 4:
				System.out.print("Codice prodotto: ");
				codice = in.nextLine().toUpperCase();
				if (magazzino.containsKey(codice))
					System.out.println("Il prodotto è presente.");
				else
					System.out.println("Il prodotto non è presente.");
				break;
			case 5:
				System.out.print("Codice prodotto: ");
				codice = in.nextLine().toUpperCase();
				if (magazzino.containsKey(codice))
					System.out.println("Quantità disponibile: " + magazzino.get(codice) + " unità.");
				else
					System.out.println("Errore: prodotto non trovato.");
				break;
			case 6:
				if (magazzino.isEmpty())
					System.out.println("Il magazzino è vuoto.");
				else {
					System.out.println("--- ELENCO PRODOTTI ---");
					for (String cod : magazzino.keySet())
						System.out.println(cod + " -> " + magazzino.get(cod) + " unità");
				}
				break;
			case 7:
				System.out.println("Numero totale prodotti: " + magazzino.size());
				break;
			case 0:
				System.out.println("Arrivederci.");
				break;
			default:
				System.out.println("Scelta non valida. Riprova.");
			}
			System.out.println();
		} while (scelta != 0);
	}
}
