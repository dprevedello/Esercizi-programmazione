public class Temperatura {
	private double valoreCelsius;

	public Temperatura() {
		this(0);
	}

	public Temperatura(double valoreCelsius) {
		setValoreCelsius(valoreCelsius);
	}

	public double getValoreCelsius() {
		return valoreCelsius;
	}

	public void setValoreCelsius(double valoreCelsius) {
		if (valoreCelsius >= -273.15)
			this.valoreCelsius = valoreCelsius;
	}

	public double inFahrenheit() {
		return valoreCelsius * 9.0 / 5.0 + 32;
	}

	public double inKelvin() {
		return valoreCelsius + 273.15;
	}

	@Override
	public String toString() {
		return valoreCelsius + " °C = " + inFahrenheit() + " °F = " + inKelvin() + " K";
	}

	public static void main(String[] args) {
		Temperatura t1 = new Temperatura(25);
		Temperatura t2 = new Temperatura(0);
		Temperatura t3 = new Temperatura(100);

		System.out.println(t1);
		System.out.println(t2);
		System.out.println(t3);
	}
}
