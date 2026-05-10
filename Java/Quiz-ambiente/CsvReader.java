import java.io.*;
import java.util.*;

/**
 * Legge il file CSV delle domande e restituisce una lista di oggetti Domanda.
 *
 * Formato atteso del CSV (con intestazione):
 *   domanda,risposta_0,risposta_1,risposta_2,risposta_3,corretta
 */
public class CsvReader {

    /**
     * Carica tutte le domande dal file indicato.
     *
     * @param percorso path del file CSV
     * @return lista di Domanda (mai null, eventualmente vuota)
     * @throws IOException se il file non esiste o non è leggibile
     */
    public static List<Domanda> carica(String percorso) throws IOException {
        List<Domanda> lista = new ArrayList<>();

        try (BufferedReader br = new BufferedReader(
                new InputStreamReader(new FileInputStream(percorso), "UTF-8"))) {

            String riga = br.readLine(); // salta l'intestazione
            if (riga == null) return lista;

            while ((riga = br.readLine()) != null) {
                riga = riga.trim();
                if (riga.isEmpty()) continue;

                String[] campi = splitCsv(riga);
                if (campi.length < 6) continue;

                String testo = campi[0];
                String[] risposte = { campi[1], campi[2], campi[3], campi[4] };
                int corretta;
                try {
                    corretta = Integer.parseInt(campi[5].trim());
                } catch (NumberFormatException e) {
                    continue; // riga malformata, la saltiamo
                }

                lista.add(new Domanda(testo, risposte, corretta));
            }
        }
        return lista;
    }

    /**
     * Divide una riga CSV rispettando i campi tra virgolette
     * (ad es. "testo con, virgola").
     */
    private static String[] splitCsv(String riga) {
        List<String> campi = new ArrayList<>();
        boolean inVirgolette = false;
        StringBuilder campo = new StringBuilder();

        for (int i = 0; i < riga.length(); i++) {
            char c = riga.charAt(i);
            if (c == '"') {
                inVirgolette = !inVirgolette;
            } else if (c == ',' && !inVirgolette) {
                campi.add(campo.toString());
                campo.setLength(0);
            } else {
                campo.append(c);
            }
        }
        campi.add(campo.toString());
        return campi.toArray(new String[0]);
    }
}
