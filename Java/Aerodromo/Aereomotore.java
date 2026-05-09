/**
 * Aereomotore: aeromobile a motore caratterizzato dalla potenza in CV.
 */
public class Aereomotore extends Aeromobile {

	private static final long serialVersionUID = 3L;

	private double potenzaCV;

	/**
	 * Costruisce un aereomotore con sigla e potenza del motopropulsore.
	 *
	 * @param sigla     sigla identificativa
	 * @param potenzaCV potenza del motore in cavalli vapore
	 */
	public Aereomotore(String sigla, double potenzaCV) {
		super(sigla);
		this.potenzaCV = potenzaCV;
	}

	public double getPotenzaCV() {
		return potenzaCV;
	}

	/**
	 * Un aereomotore è superiore a un altro se ha potenza maggiore.
	 * Restituisce {@code false} se {@code x} è null o non è un {@link Aereomotore}.
	 */
	@Override
	public boolean superiore(CMP x) {
		if (x == null || !(x instanceof Aereomotore)) return false;
		return this.potenzaCV > ((Aereomotore) x).potenzaCV;
	}

	@Override
	public boolean equals(Object obj) {
		if (!super.equals(obj)) return false;
		return Double.compare(potenzaCV, ((Aereomotore) obj).potenzaCV) == 0;
	}

	@Override
	public String toString() {
		return "[Aereomotore | sigla: " + sigla + " | potenza: " + potenzaCV + " CV]";
	}
}
