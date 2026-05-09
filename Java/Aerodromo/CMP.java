/**
 * Interfaccia per il confronto tra aeromobili dello stesso tipo.
 */
public interface CMP {

	/**
	 * Verifica se questo aeromobile è superiore ad {@code x} come prestazioni.
	 *
	 * <p>Restituisce sempre {@code false} se {@code x} è {@code null}
	 * o se i due oggetti non sono dello stesso tipo ({@code instanceof}).</p>
	 *
	 * @param x l'aeromobile con cui confrontarsi
	 * @return {@code true} se {@code this} ha prestazioni superiori
	 */
	boolean superiore(CMP x);
}
