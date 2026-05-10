import java.awt.Color;
import java.awt.Graphics;
import java.awt.event.KeyAdapter;
import java.awt.event.KeyEvent;

import javax.swing.JPanel;

/**
 * {@code PannelloQuadrato} è una sottoclasse di {@link JPanel} che gestisce
 * il disegno e il movimento di un quadrato rosso all'interno del pannello.
 * <p>
 * Il quadrato può essere spostato utilizzando i tasti freccia della tastiera.
 * Le collisioni con i bordi del pannello sono gestite automaticamente.
 * </p>
 * 
 * <p>Caratteristiche principali:</p>
 * <ul>
 *   <li>Dimensione fissa del quadrato (50x50 pixel).</li>
 *   <li>Movimento a passi costanti (10 pixel per pressione di tasto).</li>
 *   <li>Gestione autonoma del focus per ricevere gli eventi da tastiera.</li>
 * </ul>
 * 
 * @author  Prof. Daniele Prevedello
 */
public class PannelloQuadrato extends JPanel {
    private static final long serialVersionUID = 1L;
    
    /** Coordinata X del quadrato. */
    private int x;
    
    /** Coordinata Y del quadrato. */
    private int y;
    
    /** Dimensione del quadrato in pixel (larghezza e altezza). */
    private final int DIMENSIONE = 50;
    
    /** Quantità di pixel da spostare ad ogni pressione di tasto. */
    private final int STEP = 10;

    /**
     * Costruttore predefinito.
     * <p>Inizializza il quadrato nella posizione (0,0).</p>
     */
    public PannelloQuadrato() {
        this(0, 0);
    }

    /**
     * Costruttore che permette di specificare la posizione iniziale del quadrato.
     * 
     * @param x Coordinata X iniziale del quadrato.
     * @param y Coordinata Y iniziale del quadrato.
     */
    public PannelloQuadrato(int x, int y) {
        this.x = x;
        this.y = y;

        setFocusable(true);      // Per poter ricevere gli eventi da tastiera
        requestFocusInWindow();  // Richiede il focus immediato
        
        addKeyListener(new KeyAdapter() {
            @Override
            public void keyPressed(KeyEvent e) {
                switch (e.getKeyCode()) {
                    case KeyEvent.VK_UP:
                        muoviSu();
                        break;
                    case KeyEvent.VK_DOWN:
                        muoviGiu();
                        break;
                    case KeyEvent.VK_LEFT:
                        muoviSx();
                        break;
                    case KeyEvent.VK_RIGHT:
                        muoviDx();
                        break;
                }
            }
        });
    }

    /**
     * Ridisegna il componente dipingendo il quadrato nella posizione corrente.
     *
     * @param g Oggetto {@link Graphics} usato per disegnare.
     */
    @Override
    protected void paintComponent(Graphics g) {
        super.paintComponent(g);
        g.setColor(Color.RED);
        g.fillRect(x, y, DIMENSIONE, DIMENSIONE);
    }

    /**
     * Muove il quadrato di un certo delta in X e Y, garantendo che resti dentro i limiti del pannello.
     * 
     * @param dx Spostamento orizzontale (positivo verso destra, negativo verso sinistra).
     * @param dy Spostamento verticale (positivo verso il basso, negativo verso l'alto).
     */
    private void muovi(int dx, int dy) {
        x += dx;
        x = Math.max(0, Math.min(x, this.getWidth() - DIMENSIONE));
        y += dy;
        y = Math.max(0, Math.min(y, this.getHeight() - DIMENSIONE));
        
        requestFocusInWindow();
        repaint();
    }

    /**
     * Sposta il quadrato verso l'alto di {@code STEP} pixel.
     */
    public void muoviSu() {
        muovi(0, -STEP);
    }

    /**
     * Sposta il quadrato verso il basso di {@code STEP} pixel.
     */
    public void muoviGiu() {
        muovi(0, STEP);
    }

    /**
     * Sposta il quadrato verso sinistra di {@code STEP} pixel.
     */
    public void muoviSx() {
        muovi(-STEP, 0);
    }

    /**
     * Sposta il quadrato verso destra di {@code STEP} pixel.
     */
    public void muoviDx() {
        muovi(STEP, 0);
    }

    /**
     * Centra il quadrato all'interno del pannello.
     */
    public void center() {
        this.x = (this.getWidth() - DIMENSIONE) / 2;
        this.y = (this.getHeight() - DIMENSIONE) / 2;
    }
}
