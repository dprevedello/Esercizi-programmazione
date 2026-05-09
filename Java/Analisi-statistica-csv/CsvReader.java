import java.io.BufferedReader;
import java.io.FileReader;
import java.io.IOException;
import java.util.ArrayList;

/**
 * Lettura del CSV SERD e conversione in lista di oggetti {@link RecordSerd}.
 */
public class CsvReader {

    /**
     * Legge il file CSV e restituisce la lista dei record.
     * Salta la riga di intestazione e le righe con campi mancanti o utenti vuoti.
     *
     * @param percorso percorso del file CSV
     * @return lista di {@link RecordSerd}
     * @throws IOException se il file non è leggibile
     */
    public static ArrayList<RecordSerd> leggi(String percorso) throws IOException {
        ArrayList<RecordSerd> lista = new ArrayList<>();

        try (BufferedReader br = new BufferedReader(new FileReader(percorso))) {
            br.readLine(); // intestazione

            String riga;
            while ((riga = br.readLine()) != null) {
                riga = riga.trim();
                if (riga.isEmpty())
                    continue;

                String[] campi = riga.split(";");
                if (campi.length < 8)
                    continue;

                String utentiStr = campi[7].trim();
                if (utentiStr.isEmpty())
                    continue;

                String sostanza = campi[6].trim();
                String regione  = campi[2].trim();
                String asl      = campi[4].trim();
                int    utenti   = Integer.parseInt(utentiStr);

                lista.add(new RecordSerd(sostanza, utenti, regione, asl));
            }
        }
        return lista;
    }
}
