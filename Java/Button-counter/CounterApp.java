import javax.swing.*;
import java.awt.*;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;

public class CounterApp {
    private int count = 0; // Contatore
    private JLabel label;

    public CounterApp() {
        // Creazione della finestra
        JFrame frame = new JFrame("Contatore");
        frame.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        frame.setSize(300, 200);
        frame.setLayout(new BoxLayout(frame.getContentPane(), BoxLayout.Y_AXIS));

        frame.add(Box.createVerticalGlue());
        
        // Creazione della label
        label = new JLabel("Contatore: " + count);
        label.setFont(new Font("Arial", Font.BOLD, 20)); // Imposta un font più grande
        label.setAlignmentX(JFrame.CENTER_ALIGNMENT);
        frame.add(label);

        // Creazione del bottone
        JButton button = new JButton("Incrementa");
        button.setAlignmentX(JFrame.CENTER_ALIGNMENT);
        frame.add(button);
        
        frame.add(Box.createVerticalGlue());

        // Aggiunta dell'ActionListener per gestire il click
        button.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                count++;
                label.setText("Contatore: " + count);
            }
        });

        // Mostra la finestra
        frame.setVisible(true);
    }

    public static void main(String[] args) {
    	CounterApp app = new CounterApp();
    }
}
