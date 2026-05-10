public class MioThread extends Thread {

	@Override
	public void run() {
		System.out.println("Io sono il thread MioThread - " + MioSingleton.getInstance());
	}
}
