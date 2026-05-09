import java.util.Scanner;

public class QuesitoNumerico extends Quesito {

	public QuesitoNumerico(String domanda, int risposta, int punteggio) {
		super(domanda, "" + risposta, punteggio);
	}

	@Override
	public int ask() {
		System.out.println(domanda);

		Scanner in = new Scanner(System.in);
		System.out.print("Risposta: ");
		int risp = in.nextInt();

		if (risp == Integer.parseInt(risposta))
			return punteggio;
		return 0;
	}
}
