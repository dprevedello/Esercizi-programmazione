/**
 * Classe astratta che rappresenta un generico contenuto multimediale.
 */
public abstract class Contenuto {

	protected String titolo;
	protected String autore;
	protected int anno;

	public Contenuto(String titolo, String autore, int anno) {
		this.titolo = titolo;
		this.autore = autore;
		this.anno   = anno;
	}

	public String getTitolo() { return titolo; }
	public String getAutore() { return autore; }
	public int    getAnno()   { return anno; }

	/** Restituisce il tipo del contenuto (es. "Film", "Podcast"). */
	public abstract String getTipo();

	/** Simula la riproduzione del contenuto. */
	public abstract void riproduci();

	@Override
	public String toString() {
		return "[" + getTipo() + "] \"" + titolo + "\" - " + autore + " (" + anno + ")";
	}
}
