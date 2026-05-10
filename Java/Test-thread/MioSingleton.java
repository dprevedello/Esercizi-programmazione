import java.util.Random;

public class MioSingleton {
	private static MioSingleton instance = null;
	
	private int segreto;
	
	private MioSingleton() {
		segreto = new Random().nextInt(100);
	}
	
	public static synchronized MioSingleton getInstance() {
		if( instance == null )
			instance = new MioSingleton();
		return instance;
	}
	
	@Override
	public String toString() {
		return "Segreto (" + segreto + ")";
	}
}
