import java.io.*;
import java.util.ArrayList;
import java.util.Scanner;

/**
 * Programma principale per la gestione dell'aerodromo.
 *
 * <p>All'avvio carica la lista degli aeromobili da file (se esiste).
 * Presenta un menù per aggiungere alianti o aereomotori e stampare
 * la lista. Al termine salva la lista su file tramite serializzazione.</p>
 */
public class MainAerodromo {

	private static final String FILE_LISTA = "aerodromo.ser";

	@SuppressWarnings("unchecked")
	public static void main(String[] args) {
		ArrayList<Aeromobile> lista = caricaDaFile();
		Scanner in = new Scanner(System.in);
		int scelta;

		do {
			System.out.println("\n=== AERODROMO ===");
			System.out.println("1. Aggiungi Aliante");
			System.out.println("2. Aggiungi Aereomotore");
			System.out.println("3. Stampa lista");
			System.out.println("4. Trova il migliore per tipo");
			System.out.println("0. Esci (salva e chiudi)");
			System.out.print("Scelta: ");

			try {
				scelta = in.nextInt();
				in.nextLine();
			} catch (java.util.InputMismatchException e) {
				System.out.println("Input non valido.");
				in.nextLine();
				scelta = -1;
				continue;
			}

			switch (scelta) {
			case 1:
				System.out.print("Sigla: ");
				String siglaA = in.nextLine().toUpperCase();
				System.out.print("Efficienza aerodinamica: ");
				try {
					int eff = in.nextInt(); in.nextLine();
					lista.add(new Aliante(siglaA, eff));
					System.out.println("Aliante aggiunto.");
				} catch (java.util.InputMismatchException e) {
					System.out.println("Valore non valido."); in.nextLine();
				}
				break;
			case 2:
				System.out.print("Sigla: ");
				String siglaM = in.nextLine().toUpperCase();
				System.out.print("Potenza (CV): ");
				try {
					double pot = in.nextDouble(); in.nextLine();
					lista.add(new Aereomotore(siglaM, pot));
					System.out.println("Aereomotore aggiunto.");
				} catch (java.util.InputMismatchException e) {
					System.out.println("Valore non valido."); in.nextLine();
				}
				break;
			case 3:
				if (lista.isEmpty())
					System.out.println("La lista è vuota.");
				else {
					System.out.println("--- LISTA AEROMOBILI ---");
					for (Aeromobile a : lista)
						System.out.println(a);
				}
				break;
			case 4:
				trovaMigliori(lista);
				break;
			case 0:
				salvaSuFile(lista);
				System.out.println("Lista salvata. Arrivederci.");
				break;
			default:
				System.out.println("Scelta non valida.");
			}
		} while (scelta != 0);
	}

	/** Trova e stampa l'aliante e l'aereomotore con prestazioni migliori. */
	private static void trovaMigliori(ArrayList<Aeromobile> lista) {
		Aliante      miglioreAliante     = null;
		Aereomotore  miglioreAereomotore = null;

		for (Aeromobile a : lista) {
			if (a instanceof Aliante) {
				Aliante al = (Aliante) a;
				if (miglioreAliante == null || al.superiore(miglioreAliante))
					miglioreAliante = al;
			} else if (a instanceof Aereomotore) {
				Aereomotore am = (Aereomotore) a;
				if (miglioreAereomotore == null || am.superiore(miglioreAereomotore))
					miglioreAereomotore = am;
			}
		}

		if (miglioreAliante != null)
			System.out.println("Miglior aliante      : " + miglioreAliante);
		else
			System.out.println("Nessun aliante in lista.");

		if (miglioreAereomotore != null)
			System.out.println("Miglior aereomotore  : " + miglioreAereomotore);
		else
			System.out.println("Nessun aereomotore in lista.");
	}

	/** Carica la lista da file tramite deserializzazione. */
	@SuppressWarnings("unchecked")
	private static ArrayList<Aeromobile> caricaDaFile() {
		File f = new File(FILE_LISTA);
		if (!f.exists()) {
			System.out.println("Nessun file di dati trovato. Lista vuota.");
			return new ArrayList<>();
		}
		try (ObjectInputStream ois = new ObjectInputStream(new FileInputStream(f))) {
			ArrayList<Aeromobile> lista = (ArrayList<Aeromobile>) ois.readObject();
			System.out.println("Lista caricata: " + lista.size() + " aeromobili.");
			return lista;
		} catch (IOException | ClassNotFoundException e) {
			System.out.println("Errore nel caricamento: " + e.getMessage() + ". Lista vuota.");
			return new ArrayList<>();
		}
	}

	/** Salva la lista su file tramite serializzazione. */
	private static void salvaSuFile(ArrayList<Aeromobile> lista) {
		try (ObjectOutputStream oos = new ObjectOutputStream(new FileOutputStream(FILE_LISTA))) {
			oos.writeObject(lista);
		} catch (IOException e) {
			System.out.println("Errore nel salvataggio: " + e.getMessage());
		}
	}
}
