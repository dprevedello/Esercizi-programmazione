import java.util.HashMap;
import java.util.Scanner;

/**
 * Generatore semplificato di codice fiscale italiano.
 *
 * <p>Calcola il codice fiscale a partire da nome, cognome,
 * data di nascita, sesso e comune di nascita, applicando
 * le principali regole di composizione ufficiali.</p>
 *
 * @author Prof. Prevedello
 * @version 1.0
 */
public class CodiceFiscale {

    /**
     * Lettere che codificano i mesi dell'anno (gennaio = 'A', …, dicembre = 'T').
     */
    private static final char[] MESI = {
        'A', 'B', 'C', 'D', 'E', 'H', 'L', 'M', 'P', 'R', 'S', 'T'
    };

    /**
     * Valori per i caratteri in posizione dispari (1ª, 3ª, 5ª, …)
     * usati nel calcolo del carattere di controllo.
     * Indici 0–25 → lettere A–Z; indici 26–35 → cifre 0–9.
     */
    private static final int[] VALORI_DISPARI_LETTERE = {
        1, 0, 5, 7, 9, 13, 15, 17, 19, 21, 2, 4, 18, 20, 11, 3, 6, 8, 12, 14, 16, 10, 22, 25, 24, 23
    };

    /**
     * Valori per le cifre in posizione dispari nel calcolo del carattere di controllo.
     */
    private static final int[] VALORI_DISPARI_CIFRE = {
        1, 0, 5, 7, 9, 13, 15, 17, 19, 21
    };

    /**
     * Mappa comune di nascita → codice catastale.
     * Se il comune non è presente viene usato "XXXX".
     */
    private static final HashMap<String, String> COMUNI = new HashMap<>();

    static {
        COMUNI.put("ROMA",       "H501");
        COMUNI.put("MILANO",     "F205");
        COMUNI.put("VARESE",     "L682");
        COMUNI.put("GALLARATE",  "D869");
        COMUNI.put("TORINO",     "L219");
        COMUNI.put("NAPOLI",     "F839");
        COMUNI.put("FIRENZE",    "D612");
        COMUNI.put("BOLOGNA",    "A944");
        COMUNI.put("GENOVA",     "D969");
        COMUNI.put("VENEZIA",    "L736");
        COMUNI.put("PALERMO",    "G273");
        COMUNI.put("BERGAMO",    "A794");
        COMUNI.put("BRESCIA",    "B157");
        COMUNI.put("COMO",       "C933");
        COMUNI.put("BUSTO ARSIZIO", "B300");
    }

    // ---------------------------------------------------------------
    // Metodi di estrazione caratteri
    // ---------------------------------------------------------------

    /**
     * Estrae le consonanti presenti in una stringa, in ordine di apparizione.
     *
     * @param s la stringa da analizzare (spazi e caratteri non alfabetici ignorati)
     * @return stringa contenente solo le consonanti, in maiuscolo
     */
    public static String estraiConsonanti(String s) {
        s = s.toUpperCase().replaceAll("[^A-Z]", "");
        String vocali = "AEIOU";
        String risultato = "";
        for (int i = 0; i < s.length(); i++)
            if (!vocali.contains("" + s.charAt(i)))
                risultato += s.charAt(i);
        return risultato;
    }

    /**
     * Estrae le vocali presenti in una stringa, in ordine di apparizione.
     *
     * @param s la stringa da analizzare (spazi e caratteri non alfabetici ignorati)
     * @return stringa contenente solo le vocali, in maiuscolo
     */
    public static String estraiVocali(String s) {
        s = s.toUpperCase().replaceAll("[^A-Z]", "");
        String vocali = "AEIOU";
        String risultato = "";
        for (int i = 0; i < s.length(); i++)
            if (vocali.contains("" + s.charAt(i)))
                risultato += s.charAt(i);
        return risultato;
    }

    // ---------------------------------------------------------------
    // Metodi di codifica delle singole parti
    // ---------------------------------------------------------------

    /**
     * Genera il codice a 3 lettere per un nome o un cognome.
     *
     * <p>L'algoritmo prende prima le consonanti, poi le vocali;
     * se il totale è ancora inferiore a 3 aggiunge 'X' come riempitivo.</p>
     *
     * @param s il nome o il cognome da codificare
     * @return stringa di esattamente 3 caratteri maiuscoli
     */
    public static String codiceNome(String s) {
        String codice = estraiConsonanti(s) + estraiVocali(s) + "XXX";
        return codice.substring(0, 3);
    }

    /**
     * Genera i 5 caratteri relativi a data di nascita e sesso.
     *
     * <ul>
     *   <li>2 cifre dell'anno (ultime due)</li>
     *   <li>1 lettera per il mese (A=gen, B=feb, C=mar, D=apr, E=mag,
     *       H=giu, L=lug, M=ago, P=set, R=ott, S=nov, T=dic)</li>
     *   <li>2 cifre del giorno; per le donne viene aggiunto 40</li>
     * </ul>
     *
     * @param data  data di nascita nel formato {@code gg/mm/aaaa}
     * @param sesso {@code 'M'} per maschio, {@code 'F'} per femmina (case-insensitive)
     * @return stringa di 5 caratteri
     */
    public static String codiceDataSesso(String data, char sesso) {
        String[] parti   = data.split("/");
        int giorno       = Integer.parseInt(parti[0]);
        int mese         = Integer.parseInt(parti[1]);
        int anno         = Integer.parseInt(parti[2]);

        String codiceAnno   = String.format("%02d", anno % 100);
        char   codiceMese   = MESI[mese - 1];
        if (Character.toUpperCase(sesso) == 'F')
            giorno += 40;
        String codiceGiorno = String.format("%02d", giorno);

        return codiceAnno + codiceMese + codiceGiorno;
    }

    /**
     * Restituisce il codice catastale del comune di nascita.
     *
     * <p>La ricerca è case-insensitive. Se il comune non è presente
     * nella mappa interna viene restituito {@code "XXXX"}.</p>
     *
     * @param comune nome del comune di nascita
     * @return codice catastale di 4 caratteri
     */
    public static String codiceComune(String comune) {
        String chiave = comune.toUpperCase().trim();
        return COMUNI.getOrDefault(chiave, "XXXX");
    }

    /**
     * Calcola il carattere di controllo (16° carattere del codice fiscale).
     *
     * <p>L'algoritmo ufficiale prevede:</p>
     * <ol>
     *   <li>Assegnare a ciascuno dei 15 caratteri un valore numerico secondo
     *       tabelle diverse per posizioni pari e dispari (1-indexed).</li>
     *   <li>Sommare tutti i valori.</li>
     *   <li>Prendere il resto della divisione per 26.</li>
     *   <li>Convertire il risultato in lettera ({@code 0→'A', 1→'B', …}).</li>
     * </ol>
     *
     * @param codiceParziale i primi 15 caratteri del codice fiscale
     * @return carattere di controllo (lettera da {@code 'A'} a {@code 'Z'})
     */
    public static char calcolaCarattereControllo(String codiceParziale) {
        int somma = 0;
        codiceParziale = codiceParziale.toUpperCase();

        for (int i = 0; i < 15; i++) {
            char c = codiceParziale.charAt(i);

            if (i % 2 == 0) {
                // Posizione dispari (1-indexed): valori non standard
                if (Character.isLetter(c))
                    somma += VALORI_DISPARI_LETTERE[c - 'A'];
                else
                    somma += VALORI_DISPARI_CIFRE[c - '0'];
            } else {
                // Posizione pari (1-indexed): valore = indice nell'alfabeto o cifra
                if (Character.isLetter(c))
                    somma += c - 'A';
                else
                    somma += c - '0';
            }
        }
        return (char) ('A' + somma % 26);
    }

    // ---------------------------------------------------------------
    // Input con validazione
    // ---------------------------------------------------------------

    /**
     * Legge una data da tastiera e la valida con un'espressione regolare.
     * Ripete la richiesta finché il formato {@code gg/mm/aaaa} non è rispettato.
     *
     * @param in lo Scanner da cui leggere l'input
     * @return stringa data nel formato {@code gg/mm/aaaa}
     */
    public static String leggiData(Scanner in) {
        String data;
        do {
            System.out.print("Data di nascita (gg/mm/aaaa): ");
            data = in.nextLine().trim();
            if (!data.matches("\\d{2}/\\d{2}/\\d{4}"))
                System.out.println("  Formato non valido. Usa gg/mm/aaaa (es. 20/04/1985).");
        } while (!data.matches("\\d{2}/\\d{2}/\\d{4}"));
        return data;
    }

    /**
     * Legge il sesso da tastiera (M o F), ripetendo la richiesta se il valore
     * non è valido. Accetta sia maiuscolo sia minuscolo.
     *
     * @param in lo Scanner da cui leggere l'input
     * @return {@code 'M'} o {@code 'F'} in maiuscolo
     */
    public static char leggiSesso(Scanner in) {
        char sesso;
        do {
            System.out.print("Sesso (M/F): ");
            String input = in.nextLine().trim().toUpperCase();
            sesso = input.isEmpty() ? ' ' : input.charAt(0);
            if (sesso != 'M' && sesso != 'F')
                System.out.println("  Inserisci M oppure F.");
        } while (sesso != 'M' && sesso != 'F');
        return sesso;
    }

    // ---------------------------------------------------------------
    // Main
    // ---------------------------------------------------------------

    /**
     * Punto di ingresso del programma.
     *
     * <p>Raccoglie i dati anagrafici dell'utente, calcola le singole parti
     * del codice fiscale e stampa il risultato completo.</p>
     *
     * @param args argomenti da riga di comando (non utilizzati)
     */
    public static void main(String[] args) {
        Scanner in = new Scanner(System.in);

        System.out.println("=== GENERATORE CODICE FISCALE ===\n");

        System.out.print("Cognome: ");
        String cognome = in.nextLine().trim();

        System.out.print("Nome: ");
        String nome = in.nextLine().trim();

        String data  = leggiData(in);
        char   sesso = leggiSesso(in);

        System.out.print("Comune di nascita: ");
        String comune = in.nextLine().trim();

        // Assemblaggio del codice fiscale
        String codiceCognome = codiceNome(cognome);
        String codiceNomeP   = codiceNome(nome);
        String codiceData    = codiceDataSesso(data, sesso);
        String codiceCom     = codiceComune(comune);

        String codiceParziale = codiceCognome + codiceNomeP + codiceData + codiceCom;
        char   controllo      = calcolaCarattereControllo(codiceParziale);
        String cf             = codiceParziale + controllo;

        System.out.println("\nCF: " + cf);

        // Dettaglio (utile per il debug)
        System.out.println("\n--- Dettaglio ---");
        System.out.println("Cognome   : " + codiceCognome);
        System.out.println("Nome      : " + codiceNomeP);
        System.out.println("Data/Sesso: " + codiceData);
        System.out.println("Comune    : " + codiceCom);
        System.out.println("Controllo : " + controllo);
    }
}
