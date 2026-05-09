import java.util.ArrayList;
import java.util.Collections;
import java.util.HashMap;

/**
 * Programma dimostrativo della rete di sensori urbani.
 *
 * <p>Crea una lista di sensori di diverso tipo, stampa le descrizioni,
 * esegue una prima rilevazione aggiornando la mappa dati, ordina i sensori
 * per affidabilità e simula una seconda rilevazione con aggiornamento
 * dell'affidabilità di un sensore.</p>
 */
public class MainSensori {

	public static void main(String[] args) {
		ArrayList<SensoreUrbano> sensori = new ArrayList<>();
		sensori.add(new SensoreTraffico("T01",  "Viale Roma",    0.95));
		sensori.add(new SensoreQualitaAria("A01", "Piazza Duomo", 0.88));
		sensori.add(new SensoreRumore("R01",    "Via Milano",    0.72));
		sensori.add(new SensoreTraffico("T02",  "Corso Europa",  0.60));
		sensori.add(new SensoreQualitaAria("A02", "Parco Nord",  0.91));

		HashMap<String, Double> mappa = new HashMap<>();

		System.out.println("=== DESCRIZIONI SENSORI ===");
		for (SensoreUrbano s : sensori)
			System.out.println(s.descrizione());

		System.out.println("\n=== PRIMA RILEVAZIONE ===");
		for (SensoreUrbano s : sensori)
			((Aggiornabile) s).aggiornaDato(mappa);
		for (String id : mappa.keySet())
			System.out.println(id + " -> " + String.format("%.2f", mappa.get(id)));

		System.out.println("\n=== SENSORI ORDINATI PER AFFIDABILITÀ (crescente) ===");
		Collections.sort(sensori);
		for (SensoreUrbano s : sensori)
			System.out.println(s);

		System.out.println("\n=== AGGIORNAMENTO AFFIDABILITÀ ===");
		// Il sensore con affidabilità più bassa viene declassato ulteriormente
		Aggiornabile primo = (Aggiornabile) sensori.get(0);
		primo.aggiornaAffidabilita(0.45);
		System.out.println("Affidabilità aggiornata per: " + sensori.get(0));

		System.out.println("\n=== SECONDA RILEVAZIONE ===");
		for (SensoreUrbano s : sensori)
			((Aggiornabile) s).aggiornaDato(mappa);
		for (SensoreUrbano s : sensori)
			System.out.println(s.descrizione());
	}
}
