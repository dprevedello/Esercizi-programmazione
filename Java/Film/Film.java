import java.util.ArrayList;

public class Film {
	private String titolo;
	private String genere;
	private int durata;
	private ArrayList<Double> valutazioni;

	public Film(String titolo, String genere) {
		this(titolo, genere, 0);
	}

	public Film(String titolo, String genere, int durata) {
		this.titolo = titolo;
		this.genere = genere;
		this.durata = durata;
		this.valutazioni = new ArrayList<>();
	}

	public String getTitolo() {
		return titolo;
	}

	public void setTitolo(String titolo) {
		this.titolo = titolo;
	}

	public String getGenere() {
		return genere;
	}

	public void setGenere(String genere) {
		this.genere = genere;
	}

	public int getDurata() {
		return durata;
	}

	public void setDurata(int durata) {
		this.durata = durata;
	}

	public void aggiungiValutazione(double voto) {
		if (voto >= 0 && voto <= 5)
			valutazioni.add(voto);
	}

	public double getValutazioneMedia() {
		if (valutazioni.isEmpty())
			return 0;
		double somma = 0;
		for (int i = 0; i < valutazioni.size(); i++)
			somma += valutazioni.get(i);
		return somma / valutazioni.size();
	}

	@Override
	public String toString() {
		return "\"" + titolo + "\" (" + genere + ", " + durata + " min) - Media: "
				+ String.format("%.2f", getValutazioneMedia());
	}

	public static void main(String[] args) {
		Film f1 = new Film("Inception", "Fantascienza", 148);
		f1.aggiungiValutazione(4);
		f1.aggiungiValutazione(3.5);
		f1.aggiungiValutazione(5);
		System.out.println(f1);

		Film f2 = new Film("The Dark Knight", "Azione", 152);
		f2.aggiungiValutazione(5);
		f2.aggiungiValutazione(4.5);
		System.out.println(f2);
	}
}
