import java.awt.BorderLayout;
import java.awt.FlowLayout;
import java.awt.event.WindowAdapter;
import java.awt.event.WindowEvent;

import javax.swing.JButton;
import javax.swing.JFrame;
import javax.swing.JPanel;

public class ChronoGUI extends JFrame {
	public ChronoGUI() {
		super("Chrono");

		setLayout(new BorderLayout());
		setDefaultCloseOperation(EXIT_ON_CLOSE);

		Counter counter = new Counter();
		add(counter, BorderLayout.CENTER);

		JButton btn_start = new JButton("START");
		btn_start.addActionListener(e -> counter.start());

		JButton btn_stop = new JButton("STOP");
		btn_stop.addActionListener(e -> counter.stop());
		
		JPanel bottoni = new JPanel(new FlowLayout());
		bottoni.add(btn_start);
		bottoni.add(btn_stop);
		add(bottoni, BorderLayout.PAGE_END);
		
		
		addWindowListener(new WindowAdapter() {
		    @Override
		    public void windowClosing(WindowEvent e) {
		        counter.termina();
		    }
		});

		setSize(400, 150);
	}

	public static void main(String[] args) {
		ChronoGUI gui = new ChronoGUI();
		gui.setVisible(true);
	}
}
