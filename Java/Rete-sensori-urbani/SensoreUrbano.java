/**
 * Classe astratta che rappresenta un sensore urbano generico.
 *
 * <p>Implementa {@link Comparable} per consentire l'ordinamento
 * basato sull'affidabilità tramite {@code Collections.sort()}.</p>
 */
public abstract class SensoreUrbano implements Comparable<SensoreUrbano> {

	/** Identificativo univoco del sensore. */
	protected String id;

	/** Posizione geografica del sensore (es. "Viale Roma"). */
	protected String posizione;

	/** Affidabilità del sensore, valore tra 0.0 (inaffidabile) e 1.0 (perfetto). */
	protected double affidabilita;

	/**
	 * Costruisce un sensore con id, posizione e affidabilità.
	 *
	 * @param id           identificativo univoco
	 * @param posizione    posizione geografica
	 * @param affidabilita valore di affidabilità (0.0 – 1.0)
	 */
	public SensoreUrbano(String id, String posizione, double affidabilita) {
		this.id = id;
		this.posizione = posizione;
		this.affidabilita = affidabilita;
	}

	public String getId()           { return id; }
	public String getPosizione()    { return posizione; }
	public double getAffidabilita() { return affidabilita; }

	/**
	 * Esegue una rilevazione e restituisce il valore misurato.
	 *
	 * @return il valore rilevato dal sensore
	 */
	public abstract double rileva();

	/**
	 * Restituisce una descrizione leggibile del sensore e del suo ultimo valore.
	 *
	 * @return stringa descrittiva
	 */
	public abstract String descrizione();

	/**
	 * Ordina i sensori in base all'affidabilità (crescente).
	 */
	@Override
	public int compareTo(SensoreUrbano altro) {
		return Double.compare(this.affidabilita, altro.affidabilita);
	}

	@Override
	public String toString() {
		return "[" + id + " @ " + posizione + " | affidabilità: " + affidabilita + "]";
	}
}
