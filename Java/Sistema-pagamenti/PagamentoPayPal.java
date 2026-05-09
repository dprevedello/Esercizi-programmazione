public class PagamentoPayPal extends MetodoDiPagamento {
	private String email;

	public PagamentoPayPal(String titolareCarta, String email) {
		super(titolareCarta);
		this.email = email;
	}

	@Override
	public void effettuaPagamento(double importo) {
		System.out.println("Pagamento di \u20ac" + importo + " effettuato tramite PayPal all'account: " + email + ".");
	}

	@Override
	public String ottieniDettagli() {
		return "PayPal intestato a " + titolareCarta + " | Email: " + email;
	}

	@Override
	public String toString() {
		return "PagamentoPayPal [email=" + email + ", titolare=" + titolareCarta + "]";
	}
}
