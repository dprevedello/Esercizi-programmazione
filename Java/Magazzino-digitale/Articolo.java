/**
 * Rappresenta un articolo presente nel magazzino digitale.
 */
public class Articolo {

	private String codice;
	private String descrizione;
	private int quantita;
	private double prezzoUnitario;

	public Articolo(String codice, String descrizione, int quantita, double prezzoUnitario) {
		this.codice         = codice;
		this.descrizione    = descrizione;
		this.quantita       = quantita;
		this.prezzoUnitario = prezzoUnitario;
	}

	public String getCodice()        { return codice; }
	public String getDescrizione()   { return descrizione; }
	public int    getQuantita()      { return quantita; }
	public double getPrezzoUnitario(){ return prezzoUnitario; }

	public void setQuantita(int quantita) { this.quantita = quantita; }

	@Override
	public String toString() {
		return String.format("%-10s %-25s  qta: %4d  prezzo: %.2f€",
				codice, descrizione, quantita, prezzoUnitario);
	}
}
