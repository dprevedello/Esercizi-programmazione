public class Rettangolo {
	private double base;
	private double altezza;

	public Rettangolo() {
		this(1, 1);
	}

	public Rettangolo(double base, double altezza) {
		setBase(base);
		setAltezza(altezza);
	}

	public double getBase() {
		return base;
	}

	public void setBase(double base) {
		if (base > 0)
			this.base = base;
		else
			this.base = 1;
	}

	public double getAltezza() {
		return altezza;
	}

	public void setAltezza(double altezza) {
		if (altezza > 0)
			this.altezza = altezza;
		else
			this.altezza = 1;
	}

	public double calcolaArea() {
		return base * altezza;
	}

	public double calcolaPerimetro() {
		return 2 * (base + altezza);
	}

	@Override
	public String toString() {
		return "Rettangolo [base=" + base + ", altezza=" + altezza + "]";
	}

	public static void main(String[] args) {
		Rettangolo r1 = new Rettangolo(7, 4);
		Rettangolo r2 = new Rettangolo();

		System.out.println(r1);
		System.out.println("area: " + r1.calcolaArea() + ", perimetro: " + r1.calcolaPerimetro());
		System.out.println();
		System.out.println(r2);
		System.out.println("area: " + r2.calcolaArea() + ", perimetro: " + r2.calcolaPerimetro());
	}
}
