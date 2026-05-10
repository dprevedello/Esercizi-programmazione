public class MiaClasseRunnable implements Runnable{

	@Override
	public void run() {
		System.out.println("Io sono la classe runnable - " + MioSingleton.getInstance());
	}
}
