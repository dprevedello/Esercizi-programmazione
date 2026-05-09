import java.util.Scanner;

public class Quesito {
	protected String domanda;
	protected String risposta;
	protected int punteggio;

	public Quesito(String domanda, String risposta, int punteggio) {
		this.domanda = domanda;
		this.risposta = risposta;
		this.punteggio = punteggio;
	}

	public int ask() {
		System.out.println(domanda);

		Scanner in = new Scanner(System.in);
		System.out.print("Risposta: ");
		String risp = in.nextLine();

		if (risp.equalsIgnoreCase(risposta))
			return punteggio;
		return 0;
	}
}
