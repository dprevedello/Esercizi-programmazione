import java.util.ArrayList;

public class LibroDiario {
	private String titolo;
	private String autore;
	private ArrayList<String> pagine;

	public LibroDiario(String titolo, String autore) {
		this.titolo = titolo;
		this.autore = autore;
		this.pagine = new ArrayList<>();
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

	public void aggiungiPagina(String testo) {
		pagine.add(testo);
	}

	public void mostraPagina(int numero) {
		if (numero >= 1 && numero <= pagine.size())
			System.out.println("Pagina " + numero + ": " + pagine.get(numero - 1));
		else
			System.out.println("Pagina non trovata.");
	}

	@Override
	public String toString() {
		return "Diario \"" + titolo + "\" di " + autore + " - Pagine totali: " + pagine.size();
	}

	public static void main(String[] args) {
		LibroDiario diario = new LibroDiario("Pensieri sparsi", "Giovanni Rossi");
		diario.aggiungiPagina("Oggi è stata una giornata fantastica.");
		diario.aggiungiPagina("Ho imparato a fare la pizza!");
		diario.aggiungiPagina("Riflessioni sul futuro...");
		System.out.println(diario);
		diario.mostraPagina(2);
		diario.mostraPagina(5);
	}
}
