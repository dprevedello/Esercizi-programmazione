import java.util.Scanner;

public class ContaVocali {
	public static void main(String[] args) {
		Scanner in = new Scanner(System.in);

		System.out.print("Inserisci una frase: ");
		String testo = in.nextLine();

		System.out.println("Le vocali sono: " + contaVocali(testo));
	}

	public static int contaVocali(String str) {
		String vocali = "aeiouAEIOU";

		int cont = 0;
		for (int i = 0; i < str.length(); i++)
			if (vocali.contains(str.substring(i, i + 1)))
				cont++;
		return cont;
	}
}
