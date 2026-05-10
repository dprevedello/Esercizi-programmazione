public class Disco implements Comparable<Disco> {
	private int dimensione;
	private int tot_dischi;
	
	public Disco(int dim, int tot_dischi) {
		this.dimensione = dim;
		this.tot_dischi = tot_dischi;
	}

	@Override
	public int compareTo(Disco altro) {
		return dimensione - altro.dimensione;
	}

	@Override
	public String toString() {
		String s = dimensione > 0 ? repeat("#", dimensione*2-1) : "|";
		int n_spazi = tot_dischi - dimensione;
		if( dimensione == 0 )
			n_spazi -= 1;
		return repeat(" ", n_spazi) + s + repeat(" ", n_spazi);
	}
	
	private static String repeat(String s, int times) {
		String result = "";
		for(int i=0; i<times; i++)
			result += s;
		return result;
	}
}
