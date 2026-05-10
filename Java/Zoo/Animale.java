import java.time.LocalDate;

public class Animale {
	protected int id;
	protected LocalDate data_nascita;
	protected boolean vivo;
	protected String specie;
	
	private static int nextId = 1;
	
	public Animale(String specie, LocalDate nascita) {
		this.specie = specie;
		data_nascita = nascita;
		vivo = true;
		id = nextId++;
	}
	
	public void morto() {
		vivo = false;
	}

	public int getID() {
		return id;
	}
	
	@Override
	public String toString() {
		return "Animale [id=" + id + ", data_nascita=" + data_nascita + ", vivo=" + vivo + ", specie=" + specie + "]";
	}
}
