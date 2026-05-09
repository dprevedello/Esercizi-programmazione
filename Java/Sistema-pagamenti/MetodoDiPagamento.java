public abstract class MetodoDiPagamento implements Pagamento {
	protected String titolareCarta;

	public MetodoDiPagamento(String titolareCarta) {
		this.titolareCarta = titolareCarta;
	}

	public String getTitolareCarta() {
		return titolareCarta;
	}

	@Override
	public abstract void effettuaPagamento(double importo);

	@Override
	public abstract String ottieniDettagli();

	@Override
	public String toString() {
		return "Titolare: " + titolareCarta;
	}
}
