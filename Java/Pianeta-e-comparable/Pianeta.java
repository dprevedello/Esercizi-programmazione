import java.util.ArrayList;
import java.util.Collections;

public class Pianeta implements Comparable<Pianeta> {
	private String nome;
	private double distanza;
	private double diametro;

	public Pianeta(String nome, double distanza, double diametro) {
		this.nome = nome;
		this.distanza = distanza;
		this.diametro = diametro;
	}

	@Override
	public String toString() {
		return "Pianeta " + nome + " \u2014 distanza: " + distanza + " milioni km, diametro: " + diametro + " km";
	}

	@Override
	public int compareTo(Pianeta altro) {
		Double rThis  = this.distanza  / this.diametro;
		Double rAltro = altro.distanza / altro.diametro;
		return rThis.compareTo(rAltro);
	}

	public static void main(String[] args) {
		ArrayList<Pianeta> pianeti = new ArrayList<>();
		pianeti.add(new Pianeta("Mercurio", 57.9,  4879));
		pianeti.add(new Pianeta("Venere",  108.2, 12104));
		pianeti.add(new Pianeta("Terra",   149.6, 12756));
		pianeti.add(new Pianeta("Marte",   227.9,  6792));
		pianeti.add(new Pianeta("Giove",   778.5, 142984));

		System.out.println("Lista dei pianeti:");
		for (Pianeta p : pianeti)
			System.out.println(p);

		Collections.sort(pianeti);

		System.out.println("\nLista dei pianeti ordinati (distanza/diametro crescente):");
		for (Pianeta p : pianeti)
			System.out.println(p);
	}
}
