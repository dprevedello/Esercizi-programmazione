import java.io.BufferedReader;
import java.io.FileReader;
import java.io.IOException;

/**
 * Legge il CSV degli utenti SERD 2024 e calcola la percentuale
 * di utenti lombardi con Cannabinoidi come sostanza primaria
 * rispetto al totale italiano.
 *
 * Struttura del CSV (separatore ;):
 *   [0] Anno  [1] Codice regione  [2] Regione
 *   [3] Codice ASL  [4] ASL  [5] SERD
 *   [6] Categoria Sostanza  [7] Utenti
 */
public class ElaborazioneDatiOpen {

    private static final String FILE_CSV =
        "Utenti_in_carico_presso_i_SERD_secondo_la_sostanza_d_abuso_primaria_2024.csv";

    public static void main(String[] args) {
        int totaleItalia    = 0;
        int totaleLombardia = 0;

        try (BufferedReader br = new BufferedReader(new FileReader(FILE_CSV))) {
            br.readLine(); // salta la riga di intestazione

            String riga;
            while ((riga = br.readLine()) != null) {
                riga = riga.trim();
                if (riga.isEmpty())
                    continue;

                String[] campi = riga.split(";");
                if (campi.length < 8)
                    continue;

                String sostanza = campi[6].trim();
                String regione  = campi[2].trim();
                String utentiStr = campi[7].trim();

                if (!sostanza.equalsIgnoreCase("CANNABINOIDI"))
                    continue;

                if (utentiStr.isEmpty())
                    continue;

                int utenti = Integer.parseInt(utentiStr);
                totaleItalia += utenti;

                if (regione.equalsIgnoreCase("LOMBARDIA"))
                    totaleLombardia += utenti;
            }

            if (totaleItalia == 0) {
                System.out.println("Nessun dato trovato per CANNABINOIDI.");
                return;
            }

            double percentuale = (double) totaleLombardia / totaleItalia * 100;

            System.out.println("=== CANNABINOIDI — QUOTA LOMBARDA 2024 ===");
            System.out.println("Utenti Lombardia : " + totaleLombardia);
            System.out.println("Totale Italia    : " + totaleItalia);
            System.out.printf( "Percentuale      : %.2f%%%n", percentuale);

        } catch (IOException e) {
            System.out.println("Errore nella lettura del file: " + e.getMessage());
        }
    }
}
