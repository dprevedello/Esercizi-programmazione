/**
 * Interfaccia per i contenuti che possono ricevere voti degli utenti.
 */
public interface Valutabile {

	/**
	 * Aggiunge un voto alla valutazione del contenuto.
	 *
	 * @param voto intero compreso tra 1 e 10
	 * @throws IllegalArgumentException se il voto è fuori range
	 */
	void aggiungiVoto(int voto);

	/**
	 * Restituisce la media dei voti ricevuti.
	 *
	 * @return media come double, oppure 0 se non ci sono voti
	 */
	double getMediaVoti();
}
