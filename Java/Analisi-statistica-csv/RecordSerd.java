/**
 * POJO che rappresenta un singolo record del CSV SERD 2024.
 *
 * Colonne CSV (separatore ;):
 *   [0] Anno  [1] Codice regione  [2] Regione
 *   [3] Codice ASL  [4] ASL  [5] SERD
 *   [6] Categoria Sostanza  [7] Utenti
 */
public class RecordSerd {

    private final String sostanza;
    private final int    totale;
    private final String regione;
    private final String asl;

    public RecordSerd(String sostanza, int totale, String regione, String asl) {
        this.sostanza = sostanza;
        this.totale   = totale;
        this.regione  = regione;
        this.asl      = asl;
    }

    public String getSostanza() { return sostanza; }
    public int    getTotale()   { return totale; }
    public String getRegione()  { return regione; }
    public String getAsl()      { return asl; }

    @Override
    public String toString() {
        return String.format("%-25s | %-20s | %-10s | %d utenti",
                sostanza, regione, asl, totale);
    }
}
