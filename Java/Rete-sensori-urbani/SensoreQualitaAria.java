import java.util.HashMap;
import java.util.Random;

/**
 * Sensore che misura la concentrazione di PM2.5 nell'aria (µg/m³).
 */
public class SensoreQualitaAria extends SensoreUrbano implements Aggiornabile {

	private double pm25;

	public SensoreQualitaAria(String id, String posizione, double affidabilita) {
		super(id, posizione, affidabilita);
		this.pm25 = 0;
	}

	@Override
	public double rileva() {
		pm25 = 5 + new Random().nextInt(96); // 5 – 100 µg/m³
		return pm25;
	}

	@Override
	public String descrizione() {
		return "Aria      [" + id + "] " + posizione + ": PM2.5 = " + String.format("%.1f", pm25) + " µg/m³";
	}

	@Override
	public void aggiornaDato(HashMap<String, Double> mappa) {
		mappa.put(id, rileva());
	}

	@Override
	public void aggiornaAffidabilita(double nuovaAffidabilita) {
		if (nuovaAffidabilita >= 0 && nuovaAffidabilita <= 1)
			affidabilita = nuovaAffidabilita;
	}
}
