import java.util.Scanner;

public class Menu {
	public static void main(String[] args) {
		visualizzaMenu();
	}

	public static void visualizzaMenu() {
		Scanner in = new Scanner(System.in);

		int scelta;
		do {
			System.out.println("\n--- MENU ---");
			System.out.println("1) Somma di due numeri");
			System.out.println("2) Conteggio vocali");
			System.out.println("3) Uscita");
			System.out.print("Scelta: ");
			scelta = in.nextInt();
			in.nextLine(); // per consumare il newline

			switch (scelta) {
			case 1:
				somma();
				break;
			case 2:
				contaVocali();
				break;
			case 3:
				System.out.println("Arrivederci.");
				break;
			default:
				System.out.println("Scelta non valida. Riprova.");
			}
		} while (scelta != 3);
	}

	public static void somma() {
		Scanner in = new Scanner(System.in);
		System.out.print("Inserisci il primo numero: ");
		int a = in.nextInt();
		System.out.print("Inserisci il secondo numero: ");
		int b = in.nextInt();
		System.out.println("La somma è: " + (a + b));
	}

	public static void contaVocali() {
		Scanner in = new Scanner(System.in);

		System.out.print("Inserisci una frase: ");
		String testo = in.nextLine();

		String vocali = "aeiouAEIOU";
		int cont = 0;
		for (int i = 0; i < testo.length(); i++)
			if (vocali.contains(testo.substring(i, i + 1)))
				cont++;
		System.out.println("Numero di vocali: " + cont);
	}
}
