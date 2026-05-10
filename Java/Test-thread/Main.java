public class Main {

	public static void main(String[] args) {
		// Uso la classe che estende Thread
		new MioThread().start();
		
		
		// Uso la classe che estende Runnable
		MiaClasseRunnable cls = new MiaClasseRunnable();
		new Thread(cls).start();
		
		
		// Posso anche assegnarla a un oggetto di tipo Runnable
		Runnable run = new MiaClasseRunnable();
		new Thread(run).start();
		
		
		// Posso anche non assegnare l'istanza, ma semplicemente eseguirla
		new Thread(new MiaClasseRunnable()).start();
		
		
		// Posso creare una classe anonima che implementa "al volo" Runnable
		Runnable run2 = new Runnable() {
			@Override
			public void run() {
				System.out.println("Sono il runnable anonimo - " + MioSingleton.getInstance());
			}
		};
		new Thread(run2).start();

		
		// Posso usare le lambda functions
		new Thread(() -> {
			System.out.println("Sono la lambda function - " + MioSingleton.getInstance());
		}).start();
	}
}
