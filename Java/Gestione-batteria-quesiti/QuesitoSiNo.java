import java.util.Scanner;

public class QuesitoSiNo extends Quesito {

	public QuesitoSiNo(String domanda, boolean risp, int punteggio) {
		super(domanda, risp ? "si" : "no", punteggio);
	}

	@Override
	public int ask() {
		System.out.println(domanda);

		Scanner in = new Scanner(System.in);
		String risp;
		do {
			System.out.print("Risposta (si/no): ");
			risp = in.nextLine();
		} while (!risp.equalsIgnoreCase("si") && !risp.equalsIgnoreCase("no"));

		if (risp.equalsIgnoreCase(risposta))
			return punteggio;
		return 0;
	}
}
