import java.io.IOException;
import java.util.ArrayList;
import java.util.HashMap;
import java.util.Scanner;

/**
 * Applicazione principale: carica il CSV SERD, costruisce le strutture dati
 * e offre un menù statistico interattivo.
 */
public class AnalisiStatistica {

    private static final String FILE_CSV =
        "Utenti_in_carico_presso_i_SERD_secondo_la_sostanza_d_abuso_primaria_2024.csv";

    public static void main(String[] args) {
        ArrayList<RecordSerd> dati;
        try {
            dati = CsvReader.leggi(FILE_CSV);
        } catch (IOException e) {
            System.out.println("Errore nella lettura del file: " + e.getMessage());
            return;
        }

        // Mappa sostanza → totale utenti a livello nazionale
        HashMap<String, Integer> totaliPerSostanza = new HashMap<>();
        for (RecordSerd r : dati)
            totaliPerSostanza.put(r.getSostanza(),
                totaliPerSostanza.getOrDefault(r.getSostanza(), 0) + r.getTotale());

        Scanner in = new Scanner(System.in);
        int scelta;

        do {
            System.out.println("\n==============================");
            System.out.println(" MENU STATISTICHE SERD 2024");
            System.out.println("==============================");
            System.out.println("1 - Numero totale di record");
            System.out.println("2 - Totale utenti per sostanza");
            System.out.println("3 - Percentuale per sostanza");
            System.out.println("4 - Sostanza con più utenti");
            System.out.println("5 - Classifica decrescente");
            System.out.println("6 - Ricerca per sostanza");
            System.out.println("0 - Esci");
            System.out.println("==============================");
            System.out.print("Scelta: ");

            try {
                scelta = Integer.parseInt(in.nextLine().trim());
            } catch (NumberFormatException e) {
                System.out.println("Input non valido.");
                scelta = -1;
                continue;
            }

            switch (scelta) {
            case 1:
                System.out.println("Record totali: " + dati.size());
                break;

            case 2:
                System.out.println("\n--- Utenti per sostanza ---");
                for (String s : totaliPerSostanza.keySet())
                    System.out.printf("%-30s : %6d%n", s, totaliPerSostanza.get(s));
                break;

            case 3:
                int grandeTotale = 0;
                for (int v : totaliPerSostanza.values()) grandeTotale += v;
                System.out.println("\n--- Percentuale per sostanza ---");
                for (String s : totaliPerSostanza.keySet()) {
                    double perc = (double) totaliPerSostanza.get(s) / grandeTotale * 100;
                    System.out.printf("%-30s : %5.2f%%%n", s, perc);
                }
                break;

            case 4:
                String maxSostanza = null;
                int maxVal = 0;
                for (String s : totaliPerSostanza.keySet())
                    if (totaliPerSostanza.get(s) > maxVal) {
                        maxVal = totaliPerSostanza.get(s);
                        maxSostanza = s;
                    }
                System.out.println("Sostanza con più utenti: " + maxSostanza + " (" + maxVal + ")");
                break;

            case 5:
                // Bubble sort decrescente sulle chiavi per valore
                ArrayList<String> chiavi = new ArrayList<>(totaliPerSostanza.keySet());
                for (int i = 0; i < chiavi.size() - 1; i++)
                    for (int j = 0; j < chiavi.size() - 1 - i; j++)
                        if (totaliPerSostanza.get(chiavi.get(j)) < totaliPerSostanza.get(chiavi.get(j + 1))) {
                            String tmp = chiavi.get(j);
                            chiavi.set(j, chiavi.get(j + 1));
                            chiavi.set(j + 1, tmp);
                        }
                System.out.println("\n--- Classifica decrescente ---");
                int pos = 1;
                for (String s : chiavi)
                    System.out.printf("%2d. %-30s : %6d%n", pos++, s, totaliPerSostanza.get(s));
                break;

            case 6:
                System.out.print("Sostanza da cercare: ");
                String cerca = in.nextLine().trim().toUpperCase();
                boolean trovato = false;
                int somma = 0;
                for (RecordSerd r : dati)
                    if (r.getSostanza().equalsIgnoreCase(cerca)) {
                        trovato = true;
                        somma += r.getTotale();
                    }
                if (trovato)
                    System.out.printf("%-30s → totale: %d utenti%n", cerca, somma);
                else
                    System.out.println("Sostanza non trovata.");
                break;

            case 0:
                System.out.println("Arrivederci.");
                break;

            default:
                System.out.println("Scelta non valida.");
            }
        } while (scelta != 0);
    }
}
