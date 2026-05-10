import javax.swing.*;
import javax.swing.border.*;
import java.awt.*;
import java.awt.event.*;
import java.util.List;

/**
 * Finestra principale del quiz.
 * Gestisce la visualizzazione delle domande, la selezione delle risposte
 * e il calcolo del punteggio finale.
 */
public class QuizFrame extends JFrame {

    // ---- Costanti ----
    private static final int TOTALE_DOMANDE = 10;
    private static final Color VERDE_SCURO  = new Color(27, 94, 32);
    private static final Color BLU_SCURO    = new Color(13, 71, 161);
    private static final Color SFONDO       = new Color(245, 248, 250);
    private static final Color SFONDO_CARD  = Color.WHITE;

    // ---- Dati del quiz ----
    private final List<Domanda> domande;
    private int indiceDomanda = 0;
    private int punteggio = 0;

    // ---- Componenti Swing ----
    private JLabel labelProgresso;
    private JLabel labelDomanda;
    private JRadioButton[] radioRisposte;
    private ButtonGroup gruppo;
    private JButton btnConferma;
    private JPanel panelRisposte;

    public QuizFrame(List<Domanda> domande) {
        this.domande = domande;
        costruisciUI();
        mostraDomanda();
    }

    // ------------------------------------------------------------------
    //  Costruzione dell'interfaccia
    // ------------------------------------------------------------------

    private void costruisciUI() {
        setTitle("Quiz Ambiente - Giornata della Terra");
        setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        setSize(680, 520);
        setMinimumSize(new Dimension(560, 420));
        setLocationRelativeTo(null);
        getContentPane().setBackground(SFONDO);
        setLayout(new BorderLayout(0, 0));

        add(creaHeader(), BorderLayout.NORTH);
        add(creaCenter(), BorderLayout.CENTER);
        add(creaSud(), BorderLayout.SOUTH);
    }

    /** Banda colorata in cima con titolo e progresso. */
    private JPanel creaHeader() {
        JPanel header = new JPanel(new BorderLayout());
        header.setBackground(BLU_SCURO);
        header.setBorder(new EmptyBorder(14, 20, 14, 20));

        JLabel titolo = new JLabel("Quiz Ambiente");
        titolo.setFont(new Font("SansSerif", Font.BOLD, 20));
        titolo.setForeground(Color.WHITE);

        labelProgresso = new JLabel("Domanda 1 di " + TOTALE_DOMANDE);
        labelProgresso.setFont(new Font("SansSerif", Font.PLAIN, 13));
        labelProgresso.setForeground(new Color(200, 220, 255));
        labelProgresso.setHorizontalAlignment(SwingConstants.RIGHT);

        header.add(titolo, BorderLayout.WEST);
        header.add(labelProgresso, BorderLayout.EAST);
        return header;
    }

    /** Area centrale: card bianca con domanda e risposte. */
    private JPanel creaCenter() {
        JPanel wrapper = new JPanel(new GridBagLayout());
        wrapper.setBackground(SFONDO);
        wrapper.setBorder(new EmptyBorder(20, 24, 10, 24));

        JPanel card = new JPanel();
        card.setLayout(new BoxLayout(card, BoxLayout.Y_AXIS));
        card.setBackground(SFONDO_CARD);
        card.setBorder(BorderFactory.createCompoundBorder(
            new LineBorder(new Color(210, 220, 230), 1, true),
            new EmptyBorder(20, 24, 20, 24)
        ));

        // Testo della domanda
        labelDomanda = new JLabel("<html><body style='width:500px'></body></html>");
        labelDomanda.setFont(new Font("SansSerif", Font.BOLD, 15));
        labelDomanda.setForeground(new Color(30, 30, 30));
        labelDomanda.setAlignmentX(Component.LEFT_ALIGNMENT);
        card.add(labelDomanda);
        card.add(Box.createVerticalStrut(18));

        // Radio button delle risposte
        panelRisposte = new JPanel();
        panelRisposte.setLayout(new BoxLayout(panelRisposte, BoxLayout.Y_AXIS));
        panelRisposte.setBackground(SFONDO_CARD);
        panelRisposte.setAlignmentX(Component.LEFT_ALIGNMENT);

        gruppo = new ButtonGroup();
        radioRisposte = new JRadioButton[4];
        char[] etichette = {'A', 'B', 'C', 'D'};
        for (int i = 0; i < 4; i++) {
            radioRisposte[i] = new JRadioButton();
            radioRisposte[i].setFont(new Font("SansSerif", Font.PLAIN, 13));
            radioRisposte[i].setBackground(SFONDO_CARD);
            radioRisposte[i].setFocusPainted(false);
            radioRisposte[i].setBorder(new EmptyBorder(5, 0, 5, 0));
            radioRisposte[i].addActionListener(e -> btnConferma.setEnabled(true));
            gruppo.add(radioRisposte[i]);
            panelRisposte.add(radioRisposte[i]);
        }

        card.add(panelRisposte);

        GridBagConstraints gbc = new GridBagConstraints();
        gbc.fill = GridBagConstraints.BOTH;
        gbc.weightx = 1;
        gbc.weighty = 1;
        wrapper.add(card, gbc);
        return wrapper;
    }

    /** Barra in basso con il pulsante Conferma. */
    private JPanel creaSud() {
        JPanel sud = new JPanel(new FlowLayout(FlowLayout.RIGHT));
        sud.setBackground(SFONDO);
        sud.setBorder(new EmptyBorder(0, 24, 16, 24));

        btnConferma = new JButton("Conferma risposta");
        btnConferma.setFont(new Font("SansSerif", Font.BOLD, 13));
        btnConferma.setBackground(VERDE_SCURO);
        btnConferma.setForeground(Color.WHITE);
        btnConferma.setFocusPainted(false);
        btnConferma.setBorder(new EmptyBorder(10, 22, 10, 22));
        btnConferma.setCursor(Cursor.getPredefinedCursor(Cursor.HAND_CURSOR));
        btnConferma.setEnabled(false);
        btnConferma.addActionListener(e -> confermaRisposta());

        // Effetto hover
        btnConferma.addMouseListener(new MouseAdapter() {
            @Override public void mouseEntered(MouseEvent e) {
                if (btnConferma.isEnabled())
                    btnConferma.setBackground(new Color(46, 125, 50));
            }
            @Override public void mouseExited(MouseEvent e) {
                if (btnConferma.isEnabled())
                    btnConferma.setBackground(VERDE_SCURO);
            }
        });

        sud.add(btnConferma);
        return sud;
    }

    // ------------------------------------------------------------------
    //  Logica del quiz
    // ------------------------------------------------------------------

    /** Carica la domanda corrente nell'interfaccia. */
    private void mostraDomanda() {
        Domanda d = domande.get(indiceDomanda);

        labelProgresso.setText("Domanda " + (indiceDomanda + 1) + " di " + TOTALE_DOMANDE);
        labelDomanda.setText("<html><body style='width:500px'>"
            + testoSicuro(d.getTesto()) + "</body></html>");

        char[] etichette = {'A', 'B', 'C', 'D'};
        for (int i = 0; i < 4; i++) {
            radioRisposte[i].setText(etichette[i] + ")  " + testoSicuro(d.getRisposta(i)));
            radioRisposte[i].setForeground(new Color(30, 30, 30));
            radioRisposte[i].setEnabled(true);
        }

        gruppo.clearSelection();
        btnConferma.setEnabled(false);
    }

    /** Chiamato al click su "Conferma risposta". */
    private void confermaRisposta() {
        // Trova quale radio è selezionato
        int scelta = -1;
        for (int i = 0; i < 4; i++) {
            if (radioRisposte[i].isSelected()) {
                scelta = i;
                break;
            }
        }
        if (scelta == -1) return; // non dovrebbe accadere (pulsante disabilitato)

        Domanda d = domande.get(indiceDomanda);
        boolean corretta = (scelta == d.getIndiceCorretta());

        // Feedback visivo: verde per corretta, rosso per errata
        radioRisposte[scelta].setForeground(corretta
            ? new Color(27, 94, 32)
            : new Color(183, 28, 28));
        radioRisposte[d.getIndiceCorretta()].setForeground(new Color(27, 94, 32));

        // Disabilita i radio durante il breve feedback
        for (JRadioButton rb : radioRisposte) rb.setEnabled(false);
        btnConferma.setEnabled(false);

        if (corretta) punteggio++;

        // Breve pausa per far vedere il feedback, poi avanza
        Timer timer = new Timer(700, e -> avanza());
        timer.setRepeats(false);
        timer.start();
    }

    /** Avanza alla prossima domanda oppure mostra il risultato finale. */
    private void avanza() {
        indiceDomanda++;
        if (indiceDomanda < TOTALE_DOMANDE) {
            mostraDomanda();
        } else {
            mostraRisultato();
        }
    }

    /** Mostra la dialog finale con punteggio e messaggio motivazionale. */
    private void mostraRisultato() {
        String titolo;
        String messaggio;
        int tipo;

        if (punteggio <= 3) {
            titolo   = "Continua a impegnarti!";
            messaggio = "Hai risposto correttamente a " + punteggio + " domande su " + TOTALE_DOMANDE + ".\n\n"
                + "Hai ancora molto da scoprire sul nostro pianeta.\n"
                + "Informati, leggi e riprova: ogni piccolo passo conta!";
            tipo = JOptionPane.WARNING_MESSAGE;
        } else if (punteggio <= 7) {
            titolo   = "Buona conoscenza ambientale!";
            messaggio = "Hai risposto correttamente a " + punteggio + " domande su " + TOTALE_DOMANDE + ".\n\n"
                + "Conosci bene molti temi legati all'ambiente.\n"
                + "Continua a informarti: c'e ancora qualcosa da scoprire!";
            tipo = JOptionPane.INFORMATION_MESSAGE;
        } else {
            titolo   = "Ottimo risultato!";
            messaggio = "Hai risposto correttamente a " + punteggio + " domande su " + TOTALE_DOMANDE + ".\n\n"
                + "Sei un vero ambasciatore della Terra!\n"
                + "Grazie per il tuo impegno per il pianeta.";
            tipo = JOptionPane.PLAIN_MESSAGE;
        }

        JOptionPane.showMessageDialog(this, messaggio, titolo, tipo);

        // Chiedi se giocare ancora
        int scelta = JOptionPane.showConfirmDialog(this,
            "Vuoi fare un altro quiz con 10 nuove domande?",
            "Nuovo quiz", JOptionPane.YES_NO_OPTION);

        if (scelta == JOptionPane.YES_OPTION) {
            riavvia();
        } else {
            dispose();
        }
    }

    /** Riavvia il quiz rimescolando e scegliendo 10 nuove domande. */
    private void riavvia() {
        indiceDomanda = 0;
        punteggio = 0;
        mostraDomanda();
    }

    // ------------------------------------------------------------------
    //  Utilità
    // ------------------------------------------------------------------

    /** Rimuove caratteri HTML pericolosi per evitare problemi nella label. */
    private static String testoSicuro(String s) {
        return s.replace("&", "&amp;")
                .replace("<", "&lt;")
                .replace(">", "&gt;");
    }
}
