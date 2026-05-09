public class ContoBancario {
	private String numeroConto;
	private String intestatario;
	private double saldo;

	public ContoBancario(String numeroConto, String intestatario) {
		this(numeroConto, intestatario, 0);
	}

	public ContoBancario(String numeroConto, String intestatario, double saldo) {
		this.numeroConto = numeroConto;
		this.intestatario = intestatario;
		this.saldo = saldo;
	}

	public String getNumeroConto() {
		return numeroConto;
	}

	public String getIntestatario() {
		return intestatario;
	}

	public double getSaldo() {
		return saldo;
	}

	public void versa(double importo) {
		if (importo > 0)
			saldo += importo;
	}

	public void preleva(double importo) {
		if (importo > 0 && importo <= saldo)
			saldo -= importo;
	}

	@Override
	public String toString() {
		return "Conto #" + numeroConto + " - " + intestatario + ", saldo: " + saldo + "€";
	}

	public static void main(String[] args) {
		ContoBancario c1 = new ContoBancario("101", "Mario Rossi", 500);
		ContoBancario c2 = new ContoBancario("102", "Giulia Bianchi");

		c1.versa(200);
		c1.preleva(100);

		c2.versa(300);

		System.out.println(c1);
		System.out.println(c2);
	}
}
