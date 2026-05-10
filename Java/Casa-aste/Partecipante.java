
public class Partecipante {
	private String nome;
	private int codice;
	
	public Partecipante(int id, String nome) {
		codice = id;
		this.nome = nome;
	}
	
	public String getNome() {
		return nome;
	}
	
	public int getCodice() {
		return codice;
	}
	
	@Override
	public String toString() {
		return "Partecipante [" + codice + " - " + nome + "]";
	}
}
