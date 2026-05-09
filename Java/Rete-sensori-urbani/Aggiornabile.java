import java.util.HashMap;

/**
 * Interfaccia per i sensori che possono aggiornare
 * la mappa dati centralizzata e la propria affidabilità.
 */
public interface Aggiornabile {

	/**
	 * Esegue una nuova rilevazione e aggiorna la mappa con il valore misurato,
	 * usando l'id del sensore come chiave.
	 *
	 * @param mappa la mappa dati centralizzata da aggiornare
	 */
	void aggiornaDato(HashMap<String, Double> mappa);

	/**
	 * Aggiorna l'affidabilità del sensore.
	 *
	 * @param nuovaAffidabilita valore compreso tra 0.0 e 1.0
	 */
	void aggiornaAffidabilita(double nuovaAffidabilita);
}
