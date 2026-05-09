import java.util.Scanner;

public class SommaNumeri {
	public static void main(String[] args) {
		Scanner in = new Scanner(System.in);

		System.out.print("Inserisci il primo numero: ");
		int a = in.nextInt();

		System.out.print("Inserisci il secondo numero: ");
		int b = in.nextInt();

		System.out.println("La somma è: " + somma(a, b));
	}

	public static int somma(int a, int b) {
		return a + b;
	}
}
