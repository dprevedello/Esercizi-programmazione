/** Rappresenta un podcast nella libreria MediaBox. Non supporta le valutazioni. */
public class Podcast extends Contenuto {

	private int numEpisodi;
	private int durataMedia; // minuti per episodio

	public Podcast(String titolo, String autore, int anno, int numEpisodi, int durataMedia) {
		super(titolo, autore, anno);
		this.numEpisodi  = numEpisodi;
		this.durataMedia = durataMedia;
	}

	@Override public String getTipo() { return "Podcast"; }

	@Override
	public void riproduci() {
		System.out.println("▶ Ascolto podcast: \"" + titolo + "\" - Ep. 1 (" + durataMedia + " min)");
	}

	@Override
	public String toString() {
		return super.toString() + " | " + numEpisodi + " episodi, ~" + durataMedia + " min/ep";
	}
}
