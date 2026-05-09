import java.util.Random;
import java.util.Scanner;

public class IndovinaNumero {
    public static void main(String[] args) {
        giocoIndovina();
    }

    public static void giocoIndovina() {
        Scanner in = new Scanner(System.in);
        int nSegreto = new Random().nextInt(100) + 1;
        int tentativi = 0, numero;

        System.out.println("Indovina il numero tra 1 e 100!");
        do {
            System.out.print("Inserisci un numero: ");
            numero = in.nextInt();
            tentativi++;

            if (numero > nSegreto)
                System.out.println("Troppo alto!");
            else if (numero < nSegreto)
                System.out.println("Troppo basso!");
        } while (numero != nSegreto);

        System.out.println("Hai indovinato in " + tentativi + " tentativi.");
    }
}
