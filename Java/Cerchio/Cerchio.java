public class Cerchio {
	private double raggio;

	public Cerchio() {
		this(1);
	}

	public Cerchio(double raggio) {
		if (raggio > 0)
			this.raggio = raggio;
		else
			this.raggio = 1;
	}

	public double getRaggio() {
		return raggio;
	}

	public void setRaggio(double raggio) {
		if (raggio > 0)
			this.raggio = raggio;
	}

	public double calcolaArea() {
		return Math.PI * raggio * raggio;
	}

	public double calcolaCirconferenza() {
		return 2 * Math.PI * raggio;
	}

	@Override
	public String toString() {
		return "Cerchio (r=" + raggio + ") area: " + String.format("%.2f", calcolaArea())
				+ " - circonferenza: " + String.format("%.2f", calcolaCirconferenza());
	}

	public static void main(String[] args) {
		Cerchio c1 = new Cerchio(3);
		Cerchio c2 = new Cerchio(5);
		System.out.println(c1);
		System.out.println(c2);
	}
}
