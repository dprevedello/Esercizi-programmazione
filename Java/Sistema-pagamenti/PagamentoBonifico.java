public class PagamentoBonifico extends MetodoDiPagamento {
	private String iban;
	private String valuta;

	public PagamentoBonifico(String titolareCarta, String iban, String valuta) {
		super(titolareCarta);
		this.iban = iban;
		this.valuta = valuta;
	}

	@Override
	public void effettuaPagamento(double importo) {
		System.out.println("Bonifico di " + importo + " " + valuta + " inviato dal conto con IBAN: " + iban + ".");
	}

	@Override
	public String ottieniDettagli() {
		return "Bonifico intestato a " + titolareCarta + " | IBAN: " + iban + " | Valuta: " + valuta;
	}

	@Override
	public String toString() {
		return "PagamentoBonifico [iban=" + iban + ", valuta=" + valuta + ", titolare=" + titolareCarta + "]";
	}
}
