import java.util.Scanner;

public class StampaArray {
	public static void main(String[] args) {
		Scanner in = new Scanner(System.in);
		int[] numeri = new int[5];

		System.out.println("Inserisci 5 numeri interi:");
		for (int i = 0; i < numeri.length; i++)
			numeri[i] = in.nextInt();

		System.out.print("Gli elementi dell'array sono: ");
		stampaArray(numeri);
	}

	public static void stampaArray(int[] array) {
		for (int i = 0; i < array.length; i++)
			System.out.print(array[i] + " ");
		System.out.println();
	}
}
