/**
 * Eccezione lanciata quando si tenta di calcolare
 * la radice quadrata di un numero negativo.
 */
public class NumeroNegativoException extends Exception {

	/**
	 * Costruisce l'eccezione con un messaggio descrittivo.
	 *
	 * @param messaggio descrizione dell'errore
	 */
	public NumeroNegativoException(String messaggio) {
		super(messaggio);
	}
}
