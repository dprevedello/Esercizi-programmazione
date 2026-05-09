import java.util.HashMap;
import java.util.Random;

/**
 * Sensore che misura il livello di rumore ambientale (dB).
 */
public class SensoreRumore extends SensoreUrbano implements Aggiornabile {

	private double decibel;

	public SensoreRumore(String id, String posizione, double affidabilita) {
		super(id, posizione, affidabilita);
		this.decibel = 0;
	}

	@Override
	public double rileva() {
		decibel = 40 + new Random().nextInt(61); // 40 – 100 dB
		return decibel;
	}

	@Override
	public String descrizione() {
		return "Rumore    [" + id + "] " + posizione + ": " + String.format("%.1f", decibel) + " dB";
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
