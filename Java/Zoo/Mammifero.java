import java.time.LocalDate;

public class Mammifero extends Animale {
	protected String nome;
	protected String luogo_nascita;

	public Mammifero(String specie, LocalDate nascita, 
			String nome, String luogo_nascita) {
		super(specie, nascita);
		this.nome = nome;
		this.luogo_nascita = luogo_nascita;
	}

	@Override
	public String toString() {
		return "Mammifero [nome=" + nome + ", luogo_nascita=" 
	            + luogo_nascita + ", id=" + id + ", data_nascita="
				+ data_nascita + ", vivo=" + vivo + ", specie=" + specie + "]";
	}
}
