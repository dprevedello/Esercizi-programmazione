import java.util.Arrays;
import java.util.Scanner;

public class EsercizioStringhe {
	public static void main(String[] args) {
		mostraMenu();
	}

	public static void mostraMenu() {
	    String stringa1 = null, stringa2 = null;

		Scanner in = new Scanner(System.in);
		int scelta;

		do {
            System.out.println("Menu");
			System.out.println("1) Inserimento stringhe");
			System.out.println("2) Pettine");
			System.out.println("3) Caratteri diversi");
			System.out.println("4) Ordinamento stringa");
			System.out.println("5) Esci");
			System.out.print("Scelta: ");
			scelta = in.nextInt();
			in.nextLine();

			if(stringa1==null && stringa2==null && scelta!=1 && scelta!=5) {
			    System.out.println("Prima inserisci le stringhe\n");
			    continue;
			}

			switch (scelta) {
    			case 1:
    				String[] ins = inserimento();
    				stringa1 = ins[0];
    				stringa2 = ins[1];
    				break;
    			case 2:
    				System.out.println("La parola a pettine e': " + pettine(stringa1, stringa2));
    				break;
    			case 3:
    				System.out.println("I caratteri diversi sono: " + carDiversi(stringa1, stringa2));
    				break;
    			case 4:
    				System.out.println("I caratteri diversi ordinati sono: " + ordina(carDiversi(stringa1, stringa2)));
    				break;
    			case 5:
    				System.out.println("Arrivederci!");
    				break;
    			default:
    			    System.out.println("Scelta errata!");
    				break;
			}

			System.out.println();
		} while (scelta != 5);

	}

	public static String[] inserimento() {
		Scanner in = new Scanner(System.in);
		System.out.print("Inserisci la prima stringa: ");
		String stringa1 = in.nextLine();
		System.out.print("Inserisci la seconda stringa: ");
		String stringa2 = in.nextLine();

		return new String[] {stringa1, stringa2};
	}

	public static String pettine(String stringa1, String stringa2) {
		String pettine = "";
		int max = Math.max(stringa1.length(), stringa2.length());
		for (int i = 0; i < max; i++) {
			if (i < stringa1.length())
				pettine += stringa1.charAt(i);
			if (i < stringa2.length())
				pettine += stringa2.charAt(i);
		}
		return pettine;
	}

	public static String carDiversi(String stringa1, String stringa2) {
		String diverso = "";
		stringa1.toLowerCase();
		stringa2.toLowerCase();
		for (int i = 0; i < stringa1.length(); i++) {
			char c = stringa1.charAt(i);
			if (!diverso.contains("" + c))
				diverso += c;
		}
		for (int i = 0; i < stringa2.length(); i++) {
			char c = stringa2.charAt(i);
			if (!diverso.contains("" + c))
				diverso += c;
		}
		return diverso;
	}

	public static String ordina(String diversi) {
		char[] ordinato = diversi.toCharArray();
		Arrays.sort(ordinato);
		return new String(ordinato);
	}
}
