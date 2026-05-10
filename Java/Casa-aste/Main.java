import java.time.LocalDateTime;
import java.util.ArrayList;

public class Main {
	public static void main(String[] args) {
		ArrayList<OggettoAsta> catalogo = new ArrayList<OggettoAsta>();
		catalogo.add(new OggettoAsta("Vaso Ming", 20000));
		catalogo.add(new OggettoAsta("Moble antico", 1000));
		
		CasaAste casa = new CasaAste("Aste Milano", 
				"Milano, Corso Zara, 57",
				LocalDateTime.of(2026, 10, 28, 10, 00),
				catalogo);
		
		Partecipante p1 = casa.iscrivi("Carlo");
		Partecipante p2 = casa.iscrivi("Luca");
		Partecipante p3 = casa.iscrivi("Anna");
		
		System.out.println(p1);
		System.out.println(p2);
		System.out.println(p3);
		
		System.out.println();
		System.out.println(casa);
		
		casa.apriAsta();
		catalogo = casa.getCatalogo();
		
		// Qui si faranno le offerte
		casa.offri(p1, catalogo.get(0), 37000);
		
		casa.terminaAsta();
		
		System.out.println();
		System.out.println(casa);
	}
}
