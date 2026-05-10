import java.util.Random;

public class Razzo extends Thread {
	private int distanza = 0;
	
	public Razzo(String nome) {
		super(nome);
	}

	public static void main(String[] args) {
		Razzo apollo = new Razzo("Apollo");
		Razzo falcon = new Razzo("Falcon");
		Razzo soyuz = new Razzo("Soyuz");
		
		apollo.start();
		falcon.start();
		soyuz.start();
		
		try {
			apollo.join();
			falcon.join();
			soyuz.join();
		} catch (InterruptedException e) {
			; // TMCH
		}
	}
	
	@Override
	public void run() {
		while(distanza < 1000) {
			distanza += new Random().nextInt(10, 50);
			if(distanza > 1000)
				distanza = 1000;
			try {
				Thread.sleep(new Random().nextInt(100, 500));
			} catch (InterruptedException e) {
				; // TMCH to make compiler happy :)
			}
			
			//Falcon   [########--] 80%
			System.out.print(getName() + "\t [");
			int barre = 0;
			for(int i=0; i<(distanza/100.0); i++) {
				System.out.print("#");
				barre++;
			}
			for(int i = barre; i<=10; i++) {
				System.out.print("-");
			}
			System.out.println("] " + (distanza/10.0) + " %");
		}
		System.out.println(getName() + " ha raggiunto lo spazio!");
	}
}
