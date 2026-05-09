/**
 * Aliante: aeromobile senza motore caratterizzato dall'efficienza aerodinamica.
 */
public class Aliante extends Aeromobile {

	private static final long serialVersionUID = 2L;

	private int efficienza;

	/**
	 * Costruisce un aliante con sigla ed efficienza aerodinamica.
	 *
	 * @param sigla       sigla identificativa
	 * @param efficienza  rapporto di planata (efficienza aerodinamica)
	 */
	public Aliante(String sigla, int efficienza) {
		super(sigla);
		this.efficienza = efficienza;
	}

	public int getEfficienza() {
		return efficienza;
	}

	/**
	 * Un aliante è superiore a un altro se ha efficienza maggiore.
	 * Restituisce {@code false} se {@code x} è null o non è un {@link Aliante}.
	 */
	@Override
	public boolean superiore(CMP x) {
		if (x == null || !(x instanceof Aliante)) return false;
		return this.efficienza > ((Aliante) x).efficienza;
	}

	@Override
	public boolean equals(Object obj) {
		if (!super.equals(obj)) return false;
		return efficienza == ((Aliante) obj).efficienza;
	}

	@Override
	public String toString() {
		return "[Aliante | sigla: " + sigla + " | efficienza: " + efficienza + "]";
	}
}
