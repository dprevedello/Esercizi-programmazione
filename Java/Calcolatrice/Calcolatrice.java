import javax.swing.*;
import java.awt.*;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;

public class Calcolatrice extends JFrame implements ActionListener {
	private static final long serialVersionUID = 1L;
	
	private JTextField display;
	private double primoNumero = 0;
	private double secondoNumero = 0;
	private double risultato;
	private String operazione = "";

	public Calcolatrice() {
		setTitle("Calcolatrice");
		setSize(300, 400);
		setDefaultCloseOperation(EXIT_ON_CLOSE);
		ImageIcon icon = new ImageIcon(getClass().getResource("/icon.png"));
		setIconImage(icon.getImage());
		setLayout(new BorderLayout());

		display = new JTextField();
		display.setEditable(false);
		display.setFont(new Font(Font.SANS_SERIF, Font.BOLD, 30));
		display.setHorizontalAlignment(SwingConstants.RIGHT);
		Dimension prefSize = display.getPreferredSize();
		display.setPreferredSize(new Dimension(prefSize.width, 80));
		add(display, BorderLayout.NORTH);

		JPanel pannello = new JPanel();
		pannello.setBorder(BorderFactory.createEmptyBorder(5, 5, 5, 5));
		pannello.setLayout(new GridLayout(4, 4, 5, 5));
		String[] bottoni = { "7", "8", "9", "/",
				             "4", "5", "6", "*",
				             "1", "2", "3", "-",
				             "0", "C", "=", "+" };

		for (String testo : bottoni) {
			JButton bottone = new JButton(testo);
			bottone.setFont(new Font(Font.SANS_SERIF, Font.BOLD, 30));
			bottone.addActionListener(this);
			pannello.add(bottone);
		}

		add(pannello, BorderLayout.CENTER);
	}

	@Override
    public void actionPerformed(ActionEvent e) {
        String comando = e.getActionCommand();
        
        if (comando.matches("[0-9]") ) {
            display.setText(display.getText() + comando);
        } else if (comando.matches("[\\/\\*\\-\\+]") ) {
        	try {
        		primoNumero = Double.parseDouble(display.getText());
        	} catch(NumberFormatException exc) {
        		primoNumero = 0;
        	}
            operazione = comando;
            display.setText("");
        } else if (comando.equals("C")) {
            display.setText("");
            primoNumero = secondoNumero = risultato = 0;
        } else if (comando.equals("=")) {
        	try {
        		secondoNumero = Double.parseDouble(display.getText());
        	} catch(NumberFormatException exc) {
        		secondoNumero = 0;
        	}
            switch (operazione) {
                case "+":
                	risultato = primoNumero + secondoNumero;
                	break;
                case "-":
                	risultato = primoNumero - secondoNumero;
                	break;
                case "*":
                	risultato = primoNumero * secondoNumero;
                	break;
                case "/":
                	risultato = primoNumero / secondoNumero;
            }
            display.setText("" + risultato);
        }
    }

	public static void main(String[] args) {
		new Calcolatrice().setVisible(true);
	}
}
