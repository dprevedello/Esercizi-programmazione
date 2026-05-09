import java.util.Scanner;

/**
 * Punto di ingresso dell'applicazione Magazzino Digitale.
 * Presenta un menù testuale e protegge ogni operazione con try-catch.
 */
public class MainMagazzino {

	public static void main(String[] args) {
		Magazzino magazzino = new Magazzino();
		Scanner in = new Scanner(System.in);
		int scelta;

		do {
			System.out.println("\n=== MAGAZZINO DIGITALE ===");
			System.out.println("1. Aggiungi articolo");
			System.out.println("2. Vendi articolo");
			System.out.println("3. Rimuovi articolo");
			System.out.println("4. Visualizza magazzino");
			System.out.println("0. Esci");
			System.out.print("Scelta: ");

			try {
				scelta = in.nextInt();
				in.nextLine();
			} catch (java.util.InputMismatchException e) {
				System.out.println("Inserisci un numero valido.");
				in.nextLine();
				scelta = -1;
				continue;
			}

			System.out.println();

			switch (scelta) {
			case 1:
				try {
					System.out.print("Codice: ");
					String codice = in.nextLine().toUpperCase();
					System.out.print("Descrizione: ");
					String desc = in.nextLine();
					System.out.print("Quantità: ");
					int qta = in.nextInt();
					System.out.print("Prezzo unitario: ");
					double prezzo = in.nextDouble();
					in.nextLine();
					magazzino.aggiungiArticolo(new Articolo(codice, desc, qta, prezzo));
					System.out.println("Articolo aggiunto.");
				} catch (java.util.InputMismatchException e) {
					System.out.println("Errore: valore non valido per quantità o prezzo.");
					in.nextLine();
				}
				break;
			case 2:
				try {
					System.out.print("Codice articolo: ");
					String codice = in.nextLine().toUpperCase();
					System.out.print("Quantità da vendere: ");
					int qta = in.nextInt();
					in.nextLine();
					magazzino.vendita(codice, qta);
					System.out.println("Vendita registrata.");
				} catch (ArticoloInesistenteException | StockInsufficienteException e) {
					System.out.println("Errore: " + e.getMessage());
				} catch (java.util.InputMismatchException e) {
					System.out.println("Errore: quantità non valida.");
					in.nextLine();
				}
				break;
			case 3:
				try {
					System.out.print("Codice articolo: ");
					String codice = in.nextLine().toUpperCase();
					magazzino.rimuoviArticolo(codice);
					System.out.println("Articolo rimosso.");
				} catch (ArticoloInesistenteException e) {
					System.out.println("Errore: " + e.getMessage());
				}
				break;
			case 4:
				magazzino.visualizza();
				break;
			case 0:
				System.out.println("Arrivederci.");
				break;
			default:
				System.out.println("Scelta non valida.");
			}
		} while (scelta != 0);
	}
}
