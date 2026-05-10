import java.awt.Font;

import javax.swing.JLabel;

public class Counter extends JLabel implements Runnable {
	private long count = 0;
	private boolean conta = false;
	private boolean termina = false;

	public Counter() {
		super("0", CENTER);
		setFont(new Font("TimesRoman", Font.BOLD, 48));
		new Thread(this).start();
	}

	@Override
	public void run() {
		synchronized (this) {
			while (!termina) {
				if (conta && !termina) {
					count++;
					setText("" + count / 10);
				}
				try {
					wait(100);
				} catch (InterruptedException e) {
					; // TMCH
				}
			}
		}
	}

	public synchronized void termina() {
		termina = true;
	}

	public synchronized void stop() {
		conta = false;
	}

	public synchronized void start() {
		conta = true;
		notifyAll();
	}
}
