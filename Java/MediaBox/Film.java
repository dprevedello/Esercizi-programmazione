import java.util.ArrayList;

/** Rappresenta un film nella libreria MediaBox. Supporta le valutazioni. */
public class Film extends Contenuto implements Valutabile {

	private int durata; // minuti
	private ArrayList<Integer> voti;

	public Film(String titolo, String autore, int anno, int durata) {
		super(titolo, autore, anno);
		this.durata = durata;
		this.voti   = new ArrayList<>();
	}

	@Override public String getTipo() { return "Film"; }

	@Override
	public void riproduci() {
		System.out.println("▶ Riproduzione film: \"" + titolo + "\" (" + durata + " min)");
	}

	@Override
	public void aggiungiVoto(int voto) {
		if (voto < 1 || voto > 10)
			throw new IllegalArgumentException("Il voto deve essere tra 1 e 10.");
		voti.add(voto);
	}

	@Override
	public double getMediaVoti() {
		if (voti.isEmpty()) return 0;
		int somma = 0;
		for (int v : voti) somma += v;
		return (double) somma / voti.size();
	}

	@Override
	public String toString() {
		return super.toString() + " | " + durata + " min"
				+ (voti.isEmpty() ? "" : " | Media voti: " + String.format("%.1f", getMediaVoti()));
	}
}
