/**
 * Coppia di coordinate (riga, colonna) che identifica una cella nel labirinto.
 */
public class Coordinate {

    private final int riga;
    private final int colonna;

    public Coordinate(int riga, int colonna) {
        this.riga    = riga;
        this.colonna = colonna;
    }

    public int getRiga()    { return riga; }
    public int getColonna() { return colonna; }

    @Override
    public boolean equals(Object obj) {
        if (!(obj instanceof Coordinate)) return false;
        Coordinate altra = (Coordinate) obj;
        return riga == altra.riga && colonna == altra.colonna;
    }

    @Override
    public String toString() {
        return "(" + riga + ", " + colonna + ")";
    }
}
