
public class Main {
	public static void main(String[] args) {
		Portafoglio p = new Portafoglio(0, 3, 5, 1, 2, 0);
		p.denaropertipo();
		p.banconote();
		
		p.inserisci(20);
		p.inserisci(1, 2);
		p.inserisci(10);
		p.inserisci(5);
		p.inserisci(0.5);
		
		p.denaropertipo();
		p.banconote();
		System.out.println("Totale: " + p.denaro());
	}
}
