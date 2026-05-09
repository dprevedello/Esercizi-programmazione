import java.io.Serializable;

/**
 * Classe astratta che rappresenta un generico aeromobile.
 *
 * <p>Implementa {@link CMP} e {@link Serializable} per consentire
 * il confronto tra aeromobili e la serializzazione su file.</p>
 */
public abstract class Aeromobile implements CMP, Serializable {

	private static final long serialVersionUID = 1L;

	/** Sigla identificativa dell'aeromobile (es. "I-ABCD"). */
	protected String sigla;

	/**
	 * Costruisce un aeromobile con la sigla fornita.
	 *
	 * @param sigla sigla identificativa
	 */
	public Aeromobile(String sigla) {
		this.sigla = sigla;
	}

	public String getSigla() {
		return sigla;
	}

	@Override
	public boolean equals(Object obj) {
		if (this == obj) return true;
		if (!(obj instanceof Aeromobile)) return false;
		return sigla.equals(((Aeromobile) obj).sigla);
	}

	@Override
	public String toString() {
		return "[" + getClass().getSimpleName() + " | sigla: " + sigla + "]";
	}
}
