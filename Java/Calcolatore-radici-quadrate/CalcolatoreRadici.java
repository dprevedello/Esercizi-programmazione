import java.util.InputMismatchException;
import java.util.Scanner;

/**
 * Calcola la radice quadrata di un numero intero inserito dall'utente.
 * Gestisce separatamente l'input non numerico e i numeri negativi
 * tramite eccezioni, e ripete la richiesta finché l'input è valido.
 */
public class CalcolatoreRadici {

	/**
	 * Calcola la radice quadrata di un numero non negativo.
	 *
	 * @param n il numero di cui calcolare la radice
	 * @return la radice quadrata di n
	 * @throws NumeroNegativoException se n è negativo
	 */
	public static double calcolaRadice(int n) throws NumeroNegativoException {
		if (n < 0)
			throw new NumeroNegativoException("Non è possibile calcolare la radice quadrata di " + n + ".");
		return Math.sqrt(n);
	}

	public static void main(String[] args) {
		Scanner in = new Scanner(System.in);
		boolean valido = false;

		while (!valido) {
			try {
				System.out.print("Inserisci un numero intero non negativo: ");
				int n = in.nextInt();
				double risultato = calcolaRadice(n);
				System.out.println("√" + n + " = " + risultato);
				valido = true;
			} catch (InputMismatchException e) {
				System.out.println("Errore: devi inserire un numero intero.");
				in.nextLine(); // pulisce il buffer
			} catch (NumeroNegativoException e) {
				System.out.println("Errore: " + e.getMessage());
			}
		}
	}
}
