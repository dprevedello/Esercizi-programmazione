import java.util.HashMap;

/**
 * Gestisce un insieme di articoli tramite una HashMap.
 * Ogni operazione che può fallire lancia un'eccezione controllata.
 */
public class Magazzino {

	private HashMap<String, Articolo> articoli;

	public Magazzino() {
		articoli = new HashMap<>();
	}

	/**
	 * Aggiunge un articolo al magazzino.
	 * Se il codice è già presente, somma la quantità a quella esistente.
	 *
	 * @param a l'articolo da aggiungere
	 */
	public void aggiungiArticolo(Articolo a) {
		if (articoli.containsKey(a.getCodice())) {
			Articolo esistente = articoli.get(a.getCodice());
			esistente.setQuantita(esistente.getQuantita() + a.getQuantita());
		} else {
			articoli.put(a.getCodice(), a);
		}
	}

	/**
	 * Registra la vendita di una quantità di un articolo.
	 *
	 * @param codice il codice dell'articolo
	 * @param qta    la quantità da vendere
	 * @throws ArticoloInesistenteException  se il codice non è presente
	 * @throws StockInsufficienteException   se la quantità disponibile è insufficiente
	 */
	public void vendita(String codice, int qta)
			throws ArticoloInesistenteException, StockInsufficienteException {
		if (!articoli.containsKey(codice))
			throw new ArticoloInesistenteException("Articolo '" + codice + "' non presente nel magazzino.");
		Articolo a = articoli.get(codice);
		if (qta > a.getQuantita())
			throw new StockInsufficienteException("Stock insufficiente per '" + codice
					+ "': richiesti " + qta + ", disponibili " + a.getQuantita() + ".");
		a.setQuantita(a.getQuantita() - qta);
	}

	/**
	 * Rimuove un articolo dal magazzino.
	 *
	 * @param codice il codice dell'articolo da rimuovere
	 * @throws ArticoloInesistenteException se il codice non è presente
	 */
	public void rimuoviArticolo(String codice) throws ArticoloInesistenteException {
		if (!articoli.containsKey(codice))
			throw new ArticoloInesistenteException("Articolo '" + codice + "' non presente nel magazzino.");
		articoli.remove(codice);
	}

	/** Stampa tutti gli articoli presenti nel magazzino. */
	public void visualizza() {
		if (articoli.isEmpty()) {
			System.out.println("Il magazzino è vuoto.");
			return;
		}
		System.out.println("--- MAGAZZINO ---");
		for (Articolo a : articoli.values())
			System.out.println(a);
	}
}
