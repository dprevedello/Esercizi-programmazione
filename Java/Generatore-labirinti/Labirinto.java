import java.util.ArrayList;
import java.util.Collections;
import java.util.Random;

/**
 * Gestisce la griglia di celle, la generazione con Recursive Backtracker
 * e la ricerca del percorso con DFS ricorsivo.
 */
public class Labirinto {

    private final int righe;
    private final int colonne;
    private final ArrayList<ArrayList<Cella>> griglia;
    private final Random random;

    public Labirinto(int righe, int colonne, long seed) {
        this.righe   = righe;
        this.colonne = colonne;
        this.random  = new Random(seed);
        this.griglia = new ArrayList<>();

        for (int r = 0; r < righe; r++) {
            ArrayList<Cella> riga = new ArrayList<>();
            for (int c = 0; c < colonne; c++)
                riga.add(new Cella());
            griglia.add(riga);
        }
    }

    // ---------------------------------------------------------------
    // Accesso alla griglia
    // ---------------------------------------------------------------

    private Cella cella(int r, int c) {
        return griglia.get(r).get(c);
    }

    private Cella cella(Coordinate coord) {
        return cella(coord.getRiga(), coord.getColonna());
    }

    private boolean dentroGriglia(int r, int c) {
        return r >= 0 && r < righe && c >= 0 && c < colonne;
    }

    // ---------------------------------------------------------------
    // Generazione — Recursive Backtracker
    // ---------------------------------------------------------------

    /**
     * Genera il labirinto con Recursive Backtracker a partire dalla cella (0,0).
     */
    public void genera() {
        generaRicorsivo(new Coordinate(0, 0));
    }

    private void generaRicorsivo(Coordinate attuale) {
        cella(attuale).setVisitata(true);

        ArrayList<Coordinate> vicini = viciniNonVisitati(attuale);
        Collections.shuffle(vicini, random);

        for (Coordinate vicino : vicini) {
            if (!cella(vicino).isVisitata()) {
                rimuoviMuro(attuale, vicino);
                generaRicorsivo(vicino);
            }
        }
    }

    private ArrayList<Coordinate> viciniNonVisitati(Coordinate c) {
        ArrayList<Coordinate> lista = new ArrayList<>();
        int r = c.getRiga(), col = c.getColonna();

        if (dentroGriglia(r - 1, col) && !cella(r - 1, col).isVisitata())
            lista.add(new Coordinate(r - 1, col));
        if (dentroGriglia(r + 1, col) && !cella(r + 1, col).isVisitata())
            lista.add(new Coordinate(r + 1, col));
        if (dentroGriglia(r, col - 1) && !cella(r, col - 1).isVisitata())
            lista.add(new Coordinate(r, col - 1));
        if (dentroGriglia(r, col + 1) && !cella(r, col + 1).isVisitata())
            lista.add(new Coordinate(r, col + 1));

        return lista;
    }

    private void rimuoviMuro(Coordinate da, Coordinate a) {
        int dr = a.getRiga()    - da.getRiga();
        int dc = a.getColonna() - da.getColonna();

        if (dr == -1) { cella(da).rimuoviMuroNord(); cella(a).rimuoviMuroSud(); }
        if (dr ==  1) { cella(da).rimuoviMuroSud();  cella(a).rimuoviMuroNord(); }
        if (dc == -1) { cella(da).rimuoviMuroOvest(); cella(a).rimuoviMuroEst(); }
        if (dc ==  1) { cella(da).rimuoviMuroEst();  cella(a).rimuoviMuroOvest(); }
    }

    // ---------------------------------------------------------------
    // Ricerca percorso — DFS ricorsivo
    // ---------------------------------------------------------------

    /**
     * Resetta le visite usate nella generazione e cerca il percorso
     * da (0,0) all'angolo in basso a destra con DFS ricorsivo.
     *
     * @return true se il percorso esiste (sempre vero in un labirinto perfetto)
     */
    public boolean trovaPercorso() {
        // Reimposta flag di visita
        for (ArrayList<Cella> riga : griglia)
            for (Cella c : riga)
                c.setVisitata(false);

        Coordinate inizio = new Coordinate(0, 0);
        Coordinate fine   = new Coordinate(righe - 1, colonne - 1);
        return dfs(inizio, fine);
    }

    private boolean dfs(Coordinate attuale, Coordinate fine) {
        cella(attuale).setVisitata(true);

        if (attuale.equals(fine)) {
            cella(attuale).setNelPercorso(true);
            return true;
        }

        for (Coordinate vicino : viciniRaggiungibili(attuale)) {
            if (!cella(vicino).isVisitata()) {
                if (dfs(vicino, fine)) {
                    cella(attuale).setNelPercorso(true);
                    return true;
                }
            }
        }

        cella(attuale).setVisitata(false); // backtrack
        return false;
    }

    private ArrayList<Coordinate> viciniRaggiungibili(Coordinate c) {
        ArrayList<Coordinate> lista = new ArrayList<>();
        int r = c.getRiga(), col = c.getColonna();
        Cella celle = cella(r, col);

        if (!celle.hasMuroNord() && dentroGriglia(r - 1, col))
            lista.add(new Coordinate(r - 1, col));
        if (!celle.hasMuroSud()  && dentroGriglia(r + 1, col))
            lista.add(new Coordinate(r + 1, col));
        if (!celle.hasMuroOvest() && dentroGriglia(r, col - 1))
            lista.add(new Coordinate(r, col - 1));
        if (!celle.hasMuroEst()  && dentroGriglia(r, col + 1))
            lista.add(new Coordinate(r, col + 1));

        return lista;
    }

    // ---------------------------------------------------------------
    // Stampa
    // ---------------------------------------------------------------

    /**
     * Restituisce la rappresentazione testuale del labirinto con il percorso.
     * Formato: angoli '+', muri orizzontali '---', muri verticali '|'.
     * Contenuto cella: ' . ' se nel percorso, '   ' altrimenti.
     */
    public String toString() {
        StringBuilder sb = new StringBuilder();

        for (int r = 0; r < righe; r++) {
            // Riga muri superiori
            StringBuilder top = new StringBuilder("+");
            for (int c = 0; c < colonne; c++)
                top.append(cella(r, c).hasMuroNord() ? "---+" : "   +");
            sb.append(top).append("\n");

            // Riga contenuto celle
            StringBuilder mid = new StringBuilder();
            for (int c = 0; c < colonne; c++) {
                mid.append(cella(r, c).hasMuroOvest() ? "|" : " ");
                mid.append(cella(r, c).isNelPercorso() ? " . " : "   ");
            }
            mid.append("|");
            sb.append(mid).append("\n");
        }

        // Riga inferiore finale
        StringBuilder bottom = new StringBuilder("+");
        for (int c = 0; c < colonne; c++)
            bottom.append(cella(righe - 1, c).hasMuroSud() ? "---+" : "   +");
        sb.append(bottom);

        return sb.toString();
    }
}
