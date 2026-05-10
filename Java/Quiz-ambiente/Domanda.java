/**
 * Rappresenta una singola domanda del quiz con quattro risposte
 * e l'indice della risposta corretta (0-3).
 */
public class Domanda {

    private final String testo;
    private final String[] risposte;
    private final int corretta;

    public Domanda(String testo, String[] risposte, int corretta) {
        this.testo = testo;
        this.risposte = risposte;
        this.corretta = corretta;
    }

    public String getTesto() {
        return testo;
    }

    /** Restituisce la risposta all'indice i (0-3). */
    public String getRisposta(int i) {
        return risposte[i];
    }

    public int getIndiceCorretta() {
        return corretta;
    }
}
