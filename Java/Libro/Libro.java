public class Libro {
	private String titolo;
	private String autore;
	private int numeroPagine;
	private boolean disponibile;

	public Libro() {
		this("", "", 0, true);
	}

	public Libro(String titolo, String autore, int numeroPagine, boolean disponibile) {
		this.titolo = titolo;
		this.autore = autore;
		this.numeroPagine = numeroPagine;
		this.disponibile = disponibile;
	}

	public String getTitolo() {
		return titolo;
	}

	public void setTitolo(String titolo) {
		this.titolo = titolo;
	}

	public String getAutore() {
		return autore;
	}

	public void setAutore(String autore) {
		this.autore = autore;
	}

	public int getNumeroPagine() {
		return numeroPagine;
	}

	public void setNumeroPagine(int numeroPagine) {
		this.numeroPagine = numeroPagine;
	}

	public boolean isDisponibile() {
		return disponibile;
	}

	public void presta() {
		if (disponibile)
			disponibile = false;
	}

	public void restituisci() {
		disponibile = true;
	}

	@Override
	public String toString() {
		return "\"" + titolo + "\" di " + autore + " (" + numeroPagine + " pagine) - "
				+ (disponibile ? "Disponibile" : "In prestito");
	}

	public static void main(String[] args) {
		Libro l = new Libro("Il nome della rosa", "Umberto Eco", 500, true);
		System.out.println(l);
		l.presta();
		System.out.println(l);
		l.restituisci();
		System.out.println(l);
	}
}
