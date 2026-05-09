/**
 * Eccezione controllata lanciata quando si tenta di operare
 * su un articolo non presente nel magazzino.
 */
public class ArticoloInesistenteException extends Exception {

	public ArticoloInesistenteException(String messaggio) {
		super(messaggio);
	}
}
