public class Automobile {
	private String marca;
	private String modello;
	private int anno;
	private double velocita;

	public Automobile(String marca, String modello) {
		this(marca, modello, 2024, 0);
	}

	public Automobile(String marca, String modello, int anno, double velocita) {
		this.marca = marca;
		this.modello = modello;
		this.anno = anno;
		this.velocita = Math.max(0, velocita);
	}

	public String getMarca() {
		return marca;
	}

	public void setMarca(String marca) {
		this.marca = marca;
	}

	public String getModello() {
		return modello;
	}

	public void setModello(String modello) {
		this.modello = modello;
	}

	public int getAnno() {
		return anno;
	}

	public void setAnno(int anno) {
		this.anno = anno;
	}

	public double getVelocita() {
		return velocita;
	}

	public void accelera(double incremento) {
		if (incremento > 0)
			velocita += incremento;
	}

	public void frena(double decremento) {
		if (decremento > 0)
			velocita = Math.max(0, velocita - decremento);
	}

	@Override
	public String toString() {
		return marca + " " + modello + " (" + anno + ") - Velocità: " + velocita + " km/h";
	}

	public static void main(String[] args) {
		Automobile a = new Automobile("Ford", "Fiesta", 2015, 0);
		System.out.println(a);
		a.accelera(50);
		System.out.println(a);
		a.frena(20);
		System.out.println(a);
	}
}
