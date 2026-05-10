
public class OggettoAsta {
	private String nome;
	private int minimo_asta;
	private int offerta_max;
	private Partecipante vincitore;

	public OggettoAsta(String nome, int minimo) {
		this.nome = nome;
		minimo_asta = minimo;
		offerta_max = 0;
		vincitore = null;
	}

	public String getNome() {
		return nome;
	}

	public int getMinimoAsta() {
		return minimo_asta;
	}

	public int getOffertaMax() {
		return offerta_max;
	}

	public Partecipante getVincitore() {
		return vincitore;
	}

	public boolean faiOfferta(int offerta, Partecipante p) {
		if (offerta < offerta_max)
			return false;
		offerta_max = offerta;
		vincitore = p;
		return true;
	}

	@Override
	public String toString() {
		return "Oggetto " + nome + " [min: " + minimo_asta + 
				" offerta: " + offerta_max + " - Vincitore " + 
				vincitore + "]";
	}
}
