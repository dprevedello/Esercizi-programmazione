/**
 * Punto di ingresso del generatore di labirinti.
 *
 * Utilizzo:
 *   java MazeGen &lt;righe&gt; &lt;colonne&gt; [seed]
 *
 * Se il seed non viene fornito, viene usato un valore casuale basato
 * sul tempo corrente, producendo un labirinto diverso a ogni esecuzione.
 */
public class MazeGen {

    public static void main(String[] args) {
        if (args.length < 2) {
            System.out.println("Utilizzo: java MazeGen <righe> <colonne> [seed]");
            return;
        }

        int righe, colonne;
        long seed;

        try {
            righe   = Integer.parseInt(args[0]);
            colonne = Integer.parseInt(args[1]);
        } catch (NumberFormatException e) {
            System.out.println("Errore: righe e colonne devono essere numeri interi.");
            return;
        }

        if (righe < 2 || colonne < 2) {
            System.out.println("Errore: dimensioni minime 2x2.");
            return;
        }

        if (args.length >= 3) {
            try {
                seed = Long.parseLong(args[2]);
            } catch (NumberFormatException e) {
                System.out.println("Errore: il seed deve essere un numero intero.");
                return;
            }
        } else {
            seed = System.currentTimeMillis();
        }

        Labirinto labirinto = new Labirinto(righe, colonne, seed);
        labirinto.genera();
        labirinto.trovaPercorso();

        System.out.println(labirinto);
    }
}
