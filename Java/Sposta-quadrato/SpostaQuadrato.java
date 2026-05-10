import javax.swing.*;
import java.awt.*;

/**
 * {@code SpostaQuadrato} è una finestra grafica che consente all'utente di
 * controllare il movimento di un quadrato rosso disegnato su un
 * {@link PannelloQuadrato}.
 * <p>
 * L'interfaccia utente include:
 * </p>
 * <ul>
 * <li>Un'area centrale dove è disegnato il quadrato.</li>
 * <li>Un pannello inferiore con pulsanti per muovere il quadrato (su, giù,
 * sinistra, destra).</li>
 * </ul>
 * 
 * <p>
 * Il movimento può avvenire anche tramite le frecce della tastiera.
 * </p>
 * 
 * @see PannelloQuadrato
 * 
 * @author Prof. Daniele Prevedello
 */
public class SpostaQuadrato extends JFrame {
	private static final long serialVersionUID = 1L;

	/**
	 * Costruttore della finestra {@code SpostaQuadrato}.
	 * <p>
	 * Configura la finestra principale, crea e aggiunge il pannello di disegno e il
	 * pannello dei pulsanti di controllo.
	 * </p>
	 */
	public SpostaQuadrato() {
		setTitle("Sposta il Quadrato");
		setSize(400, 400);
		setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		setLayout(new BorderLayout());

		// Canvas per il disegno
		PannelloQuadrato pannello = new PannelloQuadrato();
		add(pannello, BorderLayout.CENTER);

		// Pulsanti di controllo
		JPanel pannelloPulsanti = makeButtons(pannello);
		add(pannelloPulsanti, BorderLayout.SOUTH);

		setVisible(true);
		pannello.center();
	}

	/**
	 * Crea il pannello dei pulsanti di controllo per spostare il quadrato.
	 * 
	 * @param pannello il {@link PannelloQuadrato} su cui agire.
	 * @return un {@link JPanel} contenente i pulsanti di controllo.
	 */
	private JPanel makeButtons(PannelloQuadrato pannello) {
		JPanel pannelloContenitore = new JPanel(new BorderLayout());

		JPanel pannelloPulsanti = new JPanel();
		pannelloPulsanti.setLayout(new GridLayout(2, 3, 5, 5)); // Griglia 2 righe x 3 colonne

		// Creazione dei pulsanti con azioni associate
		JButton btnSu = new JButton("Su");
		btnSu.addActionListener(e -> pannello.muoviSu());

		JButton btnGiu = new JButton("Giù");
		btnGiu.addActionListener(e -> pannello.muoviGiu());

		JButton btnSx = new JButton("Sx");
		btnSx.addActionListener(e -> pannello.muoviSx());

		JButton btnDx = new JButton("Dx");
		btnDx.addActionListener(e -> pannello.muoviDx());

		// Layout dei pulsanti con posizionamenti vuoti ai lati
		pannelloPulsanti.add(new JLabel()); // Vuoto
		pannelloPulsanti.add(btnSu);
		pannelloPulsanti.add(new JLabel()); // Vuoto
		pannelloPulsanti.add(btnSx);
		pannelloPulsanti.add(btnGiu);
		pannelloPulsanti.add(btnDx);

		// Bordi e spaziatura
		pannelloContenitore.setBorder(BorderFactory.createEmptyBorder(0, 80, 30, 80));
		pannelloContenitore.add(pannelloPulsanti, BorderLayout.CENTER);

		return pannelloContenitore;
	}

	/**
	 * Metodo principale per l'esecuzione dell'applicazione.
	 * <p>
	 * Avvia una nuova istanza di {@code SpostaQuadrato}.
	 * </p>
	 *
	 * @param args Argomenti della linea di comando (non usati).
	 */
	public static void main(String[] args) {
		new SpostaQuadrato();
	}
}
