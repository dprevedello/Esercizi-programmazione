/*
Creare una classe Portamonete in cui memorizzare quante monete da 50 cent 
1 euro o 2 euro si hanno.
Creare il metodo inserisci(double valore) che riceve il valore di una 
moneta e se è un valore ammissibile aumenta il numero di monete di quel 
tipo, creare un altro metodo inserisci(double valore,int n) che permette 
di inserire più monete di uno stesso tipo (n) in una volta sola.
Creare un metodo denaro() che restituisce quanto denaro in totale si ha 
nel portamonete.
creare un metodo denaropertipo() che scrive a schermo quante monete di 
ogni taglio sono presenti.
Creare un costruttore standard che porta tutte le monete a zero, creare 
un altro costruttore che riceve il numero di monete da 50 cent, 
da 1 euro e da 2 euro.
 */
public class Portamonete {
	private int m50cent;
	private int m1euro;
	private int m2euro;

	public Portamonete() {
		m50cent = 0;
		m1euro = 0;
		m2euro = 0;
	}

	public Portamonete(int m50cent, int m1euro, int m2euro) {
		this.m50cent = m50cent;
		this.m1euro = m1euro;
		this.m2euro = m2euro;
	}

	public void inserisci(double valore) {
		if (valore == 0.5)
			m50cent++;
		if (valore == 1)
			m1euro++;
		if (valore == 2)
			m2euro++;
	}

	public void inserisci(double valore, int n) {
		if (n <= 0)
			return;
		if (valore == 0.5)
			m50cent += n;
		if (valore == 1)
			m1euro += n;
		if (valore == 2)
			m2euro += n;
	}
	
	public double denaro() {
		return 0.5 * m50cent + m1euro + 2 * m2euro;
	}
	
	public void denaropertipo() {
		System.out.println(" - MONETE PRESENTI - ");
		System.out.println("50cent: " + m50cent);
		System.out.println("1 euro: " + m1euro);
		System.out.println("2 euro: " + m2euro);
	}
}
