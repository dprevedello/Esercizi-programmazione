import java.util.ArrayList;

public class Torre {
	private ArrayList<Disco> torre;
	private int altezza;
	
	public Torre(int altezza, boolean piena) {
		torre = new ArrayList<Disco>(altezza);
		this.altezza = altezza;
		
		for(int i=altezza; piena && i>0; i--)
			torre.add(new Disco(i, altezza));
	}
	
	public Disco estraiDisco() {
		if(torre.size()==0)
			return null;
		return torre.remove(torre.size()-1);
	}
	
	public boolean inserisciDisco(Disco d) {
		if( d==null || torre.size()>0 && d.compareTo(torre.get(torre.size()-1)) > 0 )
			return false;
		torre.add(d);
		return true;
	}

	@Override
	public String toString() {
		String risultato = "";
		for(int i=altezza; i>torre.size(); i--)
			risultato += new Disco(0, altezza) + "\n";
		
		for(int i=torre.size()-1; i>=0; i--)
			risultato += torre.get(i) + "\n";
		
		for(int i=0; i<(altezza*2-1); i++)
			risultato += "=";
		return risultato;
	}
}
