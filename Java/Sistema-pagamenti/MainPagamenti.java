public class MainPagamenti {

	public static void main(String[] args) {
		Pagamento p1 = new PagamentoCartaDiCredito("Mario Rossi", "1234567890123456");
		Pagamento p2 = new PagamentoPayPal("Maria Bianchi", "maria.bianchi@example.com");
		Pagamento p3 = new PagamentoBonifico("Luca Verdi", "IT60X0542811101000000123456", "EUR");

		Pagamento[] pagamenti = { p1, p2, p3 };

		System.out.println("=== ESECUZIONE PAGAMENTI ===");
		for (Pagamento pagamento : pagamenti)
			pagamento.effettuaPagamento(99.90);

		System.out.println("\n=== DETTAGLI DEI METODI DI PAGAMENTO ===");
		for (Pagamento pagamento : pagamenti)
			System.out.println(pagamento.ottieniDettagli());

		System.out.println("\n=== RAPPRESENTAZIONE DEGLI OGGETTI ===");
		for (Pagamento pagamento : pagamenti)
			System.out.println(pagamento);
	}
}
