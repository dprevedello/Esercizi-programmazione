/**
 * Eccezione controllata lanciata quando la quantità richiesta
 * per una vendita supera quella disponibile in magazzino.
 */
public class StockInsufficienteException extends Exception {

	public StockInsufficienteException(String messaggio) {
		super(messaggio);
	}
}
