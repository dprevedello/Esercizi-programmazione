import java.io.PrintWriter;
import java.net.Socket;
import java.util.ArrayList;
import java.util.Random;

public class SensoreVarco extends Thread {
	
	public SensoreVarco(String nome) {
		super(nome);
		start();
	}
	
	@Override
	public void run() {
		System.out.println("Avviato varco " + getName());
		
		while(true) {
			try {
				Thread.sleep(new Random().nextInt(500, 3000));
			} catch (InterruptedException e) {
				Thread.currentThread().interrupt();
			}
            
			try (Socket server = new Socket("localhost", 1234);
		         PrintWriter out = new PrintWriter(server.getOutputStream(), true)) {
				
				out.println(getName());
				out.println(new Random().nextInt(1, 5));
			} catch (Exception e) {
				System.out.println("Varco " + getName() + " terminato");
				return;
			}
		}
	}

    public static void main(String[] args) {
    	ArrayList<Thread> threads = new ArrayList<Thread>(10);
    	
    	threads.add(new SensoreVarco("Telepass 1"));
    	threads.add(new SensoreVarco("Telepass 2"));
    	threads.add(new SensoreVarco("Telepass 3"));
    	threads.add(new SensoreVarco("Telepass 4"));
    	threads.add(new SensoreVarco("Telepass 5"));
    	threads.add(new SensoreVarco("Viacard 1"));
    	threads.add(new SensoreVarco("Viacard 2"));
    	threads.add(new SensoreVarco("Cash 1"));
    	threads.add(new SensoreVarco("Cash 2"));
    	threads.add(new SensoreVarco("Cash 3"));
    	
    	for(Thread thread : threads)
			try {
				thread.join();
			} catch (InterruptedException e) {
				; // TMCH
			}
    }
}