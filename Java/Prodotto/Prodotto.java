public class Prodotto {
	private String codice;
	private String descrizione;
	private double prezzo;
	private int quantità;

	public Prodotto(String codice, String descrizione) {
		this(codice, descrizione, 0, 0);
	}

	public Prodotto(String codice, String descrizione, double prezzo, int quantità) {
		this.codice = codice;
		this.descrizione = descrizione;
		this.prezzo = prezzo;
		this.quantità = quantità;
	}

	public String getCodice() {
		return codice;
	}

	public void setCodice(String codice) {
		this.codice = codice;
	}

	public String getDescrizione() {
		return descrizione;
	}

	public void setDescrizione(String descrizione) {
		this.descrizione = descrizione;
	}

	public double getPrezzo() {
		return prezzo;
	}

	public void setPrezzo(double prezzo) {
		this.prezzo = prezzo;
	}

	public int getQuantità() {
		return quantità;
	}

	public void incrementaQuantita(int n) {
		if (n > 0)
			quantità += n;
	}

	public void decrementaQuantita(int n) {
		if (n > 0 && quantità - n >= 0)
			quantità -= n;
	}

	public double calcolaValoreTotale() {
		return prezzo * quantità;
	}

	@Override
	public String toString() {
		return codice + " - " + descrizione + "\t" + quantità + " pezzi, " + prezzo + "€";
	}

	public static void main(String[] args) {
		Prodotto p1 = new Prodotto("P001", "Pasta", 2.5, 30);
		Prodotto p2 = new Prodotto("P002", "Biscotti", 4.99, 10);

		double valoreTotale = p1.calcolaValoreTotale() + p2.calcolaValoreTotale();

		System.out.println(p1);
		System.out.println(p2);
		System.out.println("Valore totale inventario: " + valoreTotale + "€");
	}
}
