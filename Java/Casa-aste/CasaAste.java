import java.time.LocalDateTime;
import java.time.format.DateTimeFormatter;
import java.util.ArrayList;

public class CasaAste {
	private String nome;
	private String luogo;
	private LocalDateTime data_ora;
	private ArrayList<Partecipante> partecipanti;
	private ArrayList<OggettoAsta> oggetti;
	
	private boolean astaAperta = false;
	private boolean astaTerminata = false;
	private int next_code = 1;
	
	public CasaAste(String nome, String indirizzo, LocalDateTime data) {
		this.nome = nome;
		luogo = indirizzo;
		data_ora = data;
		partecipanti = new ArrayList<Partecipante>();
		oggetti = new ArrayList<OggettoAsta>();
	}
	
	public CasaAste(String nome, String indirizzo, 
			LocalDateTime data, ArrayList<OggettoAsta> oggetti) {
		this(nome, indirizzo, data); // Richiamo il costruttore base
		
		// Se mi hanno passato degli oggetti da vendere, li aggiungo tutti
		if(oggetti!=null && !oggetti.isEmpty())
			this.oggetti.addAll(oggetti);
	}
	
	public Partecipante iscrivi(String nome) {
		// Se l'asta è aperta o se è già terminata,
		// non possiamo iscrivere nuovi partecipanti
		if(astaAperta || astaTerminata)
			return null;
		
		Partecipante p = new Partecipante(next_code++, nome);
		partecipanti.add(p);
		return p;
	}
	
	public boolean aggiungiAlCatalogo(OggettoAsta ogg) {
		// Se l'asta è aperta o se è già terminata,
		// non possiamo aggiungere oggetti al catalogo
		if(astaAperta || astaTerminata)
			return false;
		
		oggetti.add(ogg);
		return true;
	}
	
	public boolean offri(Partecipante p, OggettoAsta ogg, int offerta) {
		// Non posso offerire se l'asta non è ancora aperta
		// o se è già terminata
		if(!astaAperta || astaTerminata)
			return false;
		return ogg.faiOfferta(offerta, p);
	}
	
	public boolean offri(int partecipante, OggettoAsta ogg, int offerta) {
		// Cerco il partecipante che ha fatto l'offerta tramite
		// il suo codice
		Partecipante p = null;
		for(Partecipante part : partecipanti)
			if(part.getCodice() == partecipante)
				p = part;
		if( p==null )
			return false;
		
		return this.offri(p, ogg, offerta);
	}
	
	public ArrayList<OggettoAsta> getCatalogo(){
		return oggetti;
	}
	
	public boolean apriAsta() {
		if(astaTerminata)
			return false;
		astaAperta = true;
		return true;
	}
	
	public boolean terminaAsta() {
		if(!astaAperta)
			return false;
		astaTerminata = true;
		return true;
	}
	
	@Override
	public String toString() {
		String result = nome + " (" + luogo + ") - ";
		DateTimeFormatter fmt = DateTimeFormatter.ofPattern("dd/MM/yyyy HH:mm");
		result += data_ora.format(fmt) + "\n== OGGETTI ==\n";
		for(OggettoAsta o : oggetti)
			result += o.toString() + "\n";
		return result;
	}
}
