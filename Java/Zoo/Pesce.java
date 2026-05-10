import java.time.LocalDate;

public class Pesce extends Animale {
	private int vasca;

	public Pesce(String specie, LocalDate nascita, int vasca) {
		super(specie, nascita);
		this.vasca = vasca;
	}

	@Override
	public String toString() {
		return "Pesce [vasca=" + vasca + ", id=" + id + ", data_nascita=" 
	            + data_nascita + ", vivo=" + vivo + ", specie=" + specie + "]";
	}
}
