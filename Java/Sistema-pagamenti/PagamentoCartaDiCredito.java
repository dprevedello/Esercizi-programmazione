public class PagamentoCartaDiCredito extends MetodoDiPagamento {
	private String numeroCarta;

	public PagamentoCartaDiCredito(String titolareCarta, String numeroCarta) {
		super(titolareCarta);
		this.numeroCarta = numeroCarta;
	}

	@Override
	public void effettuaPagamento(double importo) {
		System.out.println("Pagamento di \u20ac" + importo + " effettuato con carta di credito numero ****"
				+ numeroCarta.substring(numeroCarta.length() - 4) + ".");
	}

	@Override
	public String ottieniDettagli() {
		return "Carta di credito intestata a " + titolareCarta + " | Ultime cifre: ****"
				+ numeroCarta.substring(numeroCarta.length() - 4);
	}

	@Override
	public String toString() {
		return "PagamentoCartaDiCredito [numeroCarta=****" + numeroCarta.substring(numeroCarta.length() - 4)
				+ ", titolare=" + titolareCarta + "]";
	}
}
