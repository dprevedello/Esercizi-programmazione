import java.util.ArrayList;

/** Rappresenta una serie TV nella libreria MediaBox. Supporta le valutazioni. */
public class SerieTV extends Contenuto implements Valutabile {

	private int stagioni;
	private int episodi;
	private ArrayList<Integer> voti;

	public SerieTV(String titolo, String autore, int anno, int stagioni, int episodi) {
		super(titolo, autore, anno);
		this.stagioni = stagioni;
		this.episodi  = episodi;
		this.voti     = new ArrayList<>();
	}

	@Override public String getTipo() { return "Serie TV"; }

	@Override
	public void riproduci() {
		System.out.println("▶ Riproduzione serie: \"" + titolo + "\" - S01E01");
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
		return super.toString() + " | " + stagioni + " stagioni, " + episodi + " episodi"
				+ (voti.isEmpty() ? "" : " | Media voti: " + String.format("%.1f", getMediaVoti()));
	}
}
