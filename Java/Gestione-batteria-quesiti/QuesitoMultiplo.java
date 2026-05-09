public class QuesitoMultiplo extends QuesitoNumerico {

	public QuesitoMultiplo(String domanda, String[] opzioni, int risposta, int punteggio) {
		super(domanda, risposta, punteggio);

		int n = 1;
		for (String opzione : opzioni)
			this.domanda += "\n" + n++ + ") " + opzione;
	}
}
