/*
Creare poi una classe Portafoglio che estende la classe Portamonete e che permette 
di memorizzare anche banconote da 5, 10 e 20 euro.
La classe ha gli stessi metodi della classe Portamonete opportunamente rivisti: 
permettono di inserire anche banconote e le conteggiano tra il denaro memorizzato.
Inoltre ha un metodo banconote() che dice il valore delle banconote inserite.
 */

public class Portafoglio extends Portamonete {
	private int b5euro;
	private int b10euro;
	private int b20euro;

	public Portafoglio() {
		// Invoca il costruttore senza parametri del padre
		super();
		b5euro = 0;
		b10euro = 0;
		b20euro = 0;
	}

	public Portafoglio(int m50cent, int m1euro, int m2euro, int b5euro, int b10euro, int b20euro) {
		// Invoca il costruttore con tre parametri del padre
		super(m50cent, m1euro, m2euro);
		this.b5euro = b5euro;
		this.b10euro = b10euro;
		this.b20euro = b20euro;
	}

	@Override
	public void inserisci(double valore) {
		super.inserisci(valore); // Gestisco le monete
		if (valore == 5)
			b5euro++;
		if (valore == 10)
			b10euro++;
		if (valore == 20)
			b20euro++;
	}

	@Override
	public void inserisci(double valore, int n) {
		if (n <= 0)
			return;
		super.inserisci(valore, n); // Gestisco le monete
		if (valore == 5)
			b5euro += n;
		if (valore == 10)
			b10euro += n;
		if (valore == 20)
			b20euro += n;
	}

	@Override
	public double denaro() {
		return super.denaro() + 5 * b5euro + 10 * b10euro + 20 * b20euro;
	}

	public void banconote() {
		System.out.println(" - BANCONOTE PRESENTI - ");
		System.out.println("5 euro: " + b5euro);
		System.out.println("10 euro: " + b10euro);
		System.out.println("20 euro: " + b20euro);
	}
}
