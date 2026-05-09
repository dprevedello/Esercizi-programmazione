import java.util.HashMap;
import java.util.Random;

/**
 * Sensore che misura il flusso di traffico veicolare (veicoli/minuto).
 */
public class SensoreTraffico extends SensoreUrbano implements Aggiornabile {

	private double veicoli;

	public SensoreTraffico(String id, String posizione, double affidabilita) {
		super(id, posizione, affidabilita);
		this.veicoli = 0;
	}

	@Override
	public double rileva() {
		veicoli = 10 + new Random().nextInt(91); // 10 – 100 veicoli/min
		return veicoli;
	}

	@Override
	public String descrizione() {
		return "Traffico  [" + id + "] " + posizione + ": " + (int) veicoli + " veicoli/min";
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
