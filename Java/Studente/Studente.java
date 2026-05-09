public class Studente {
	private String nome;
	private String cognome;
	private String matricola;
	private double[] voti;
	private int nVoti;

	public Studente() {
		this("", "", "");
	}

	public Studente(String nome, String cognome, String matricola) {
		this.nome = nome;
		this.cognome = cognome;
		this.matricola = matricola;
		voti = new double[30];
		nVoti = 0;
	}

	public String getNome() {
		return nome;
	}

	public String getCognome() {
		return cognome;
	}

	public String getMatricola() {
		return matricola;
	}

	public double getMediaVoti() {
		if (nVoti == 0)
			return -1;

		double media = 0;
		for (int i = 0; i < nVoti; i++)
			media += voti[i];
		return media / nVoti;
	}

	public void aggiornaMedia(double nuovoVoto) {
		if (nuovoVoto > 0 && nuovoVoto <= 10)
			voti[nVoti++] = nuovoVoto;
	}

	@Override
	public String toString() {
		return nome + " " + cognome + " (" + matricola + ") - Media: " + getMediaVoti();
	}

	public static void main(String[] args) {
		Studente s = new Studente("Luca", "Rossi", "A123");
		System.out.println(s);
		s.aggiornaMedia(9);
		s.aggiornaMedia(5);
		s.aggiornaMedia(7);
		System.out.println("Dopo nuovi voti: " + s);
	}
}
