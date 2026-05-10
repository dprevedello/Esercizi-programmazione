/**
 * Singola cella del labirinto.
 *
 * Mantiene lo stato dei quattro muri (nord, sud, est, ovest),
 * un flag di visita usato durante la generazione e la ricerca del percorso,
 * e un flag che indica se la cella fa parte del percorso soluzione.
 */
public class Cella {

    private boolean muroNord;
    private boolean muroSud;
    private boolean muroEst;
    private boolean muroOvest;

    private boolean visitata;
    private boolean nelPercorso;

    public Cella() {
        muroNord   = true;
        muroSud    = true;
        muroEst    = true;
        muroOvest  = true;
        visitata   = false;
        nelPercorso = false;
    }

    public boolean hasMuroNord()  { return muroNord; }
    public boolean hasMuroSud()   { return muroSud; }
    public boolean hasMuroEst()   { return muroEst; }
    public boolean hasMuroOvest() { return muroOvest; }

    public void rimuoviMuroNord()  { muroNord  = false; }
    public void rimuoviMuroSud()   { muroSud   = false; }
    public void rimuoviMuroEst()   { muroEst   = false; }
    public void rimuoviMuroOvest() { muroOvest = false; }

    public boolean isVisitata()    { return visitata; }
    public void setVisitata(boolean v) { visitata = v; }

    public boolean isNelPercorso()     { return nelPercorso; }
    public void setNelPercorso(boolean p) { nelPercorso = p; }
}
