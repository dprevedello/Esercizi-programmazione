/** Rappresenta un audiolibro nella libreria MediaBox. Non supporta le valutazioni. */
public class Audiolibro extends Contenuto {

	private String narratore;
	private int durata; // minuti

	public Audiolibro(String titolo, String autore, int anno, String narratore, int durata) {
		super(titolo, autore, anno);
		this.narratore = narratore;
		this.durata    = durata;
	}

	@Override public String getTipo() { return "Audiolibro"; }

	@Override
	public void riproduci() {
		System.out.println("▶ Ascolto audiolibro: \"" + titolo + "\" - narrato da " + narratore
				+ " (" + durata + " min)");
	}

	@Override
	public String toString() {
		return super.toString() + " | Narratore: " + narratore + " | " + durata + " min";
	}
}
