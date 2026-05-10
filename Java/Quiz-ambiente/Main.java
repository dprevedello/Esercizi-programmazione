import javax.swing.*;
import java.io.IOException;
import java.util.*;

/**
 * Punto di ingresso dell'applicazione.
 * Carica il CSV, seleziona 10 domande casuali e avvia la finestra del quiz.
 */
public class Main {

    private static final int DOMANDE_PER_QUIZ = 10;
    private static final String NOME_FILE_CSV = "quiz_ambiente.csv";

    public static void main(String[] args) {

        // Imposta il look and feel di sistema per un aspetto nativo
        try {
            UIManager.setLookAndFeel(UIManager.getSystemLookAndFeelClassName());
        } catch (Exception ignored) {}

        // Caricamento del CSV sul thread corrente (prima della GUI)
        List<Domanda> tutteLeDomande;
        try {
            tutteLeDomande = CsvReader.carica(NOME_FILE_CSV);
        } catch (IOException e) {
            JOptionPane.showMessageDialog(null,
                "Impossibile leggere il file \"" + NOME_FILE_CSV + "\".\n"
                + "Assicurati che si trovi nella stessa cartella da cui esegui il programma.\n\n"
                + "Dettaglio: " + e.getMessage(),
                "Errore di avvio", JOptionPane.ERROR_MESSAGE);
            return;
        }

        if (tutteLeDomande.size() < DOMANDE_PER_QUIZ) {
            JOptionPane.showMessageDialog(null,
                "Il file CSV contiene solo " + tutteLeDomande.size() + " domande.\n"
                + "Sono necessarie almeno " + DOMANDE_PER_QUIZ + ".",
                "Errore", JOptionPane.ERROR_MESSAGE);
            return;
        }

        // Selezione casuale di 10 domande senza ripetizioni
        List<Domanda> selezione = selezionaCasuali(tutteLeDomande, DOMANDE_PER_QUIZ);

        // Avvio della GUI sul thread di Swing (Event Dispatch Thread)
        SwingUtilities.invokeLater(() -> {
            QuizFrame frame = new QuizFrame(selezione);
            frame.setVisible(true);
        });
    }

    /**
     * Restituisce una lista di {@code n} elementi scelti casualmente
     * da {@code sorgente}, senza ripetizioni.
     */
    private static List<Domanda> selezionaCasuali(List<Domanda> sorgente, int n) {
        List<Domanda> copia = new ArrayList<>(sorgente);
        Collections.shuffle(copia);
        return copia.subList(0, n);
    }
}
