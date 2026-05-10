import java.time.LocalDate;
import java.util.ArrayList;
import java.util.Scanner;

public class Main {
	private static Scanner in = new Scanner(System.in);

	public static void main(String[] args) {
		ArrayList <Animale> animali = new ArrayList<Animale>();
		animali.add(new Mammifero("Leone", LocalDate.of(2000, 6, 13), 
				    "Simba", "Africa"));
		animali.add(new Mammifero("Gazzella", LocalDate.of(2008, 2, 18), 
			        "Gina", "Tanzania"));
		animali.add(new Pesce("Pagliaccio", LocalDate.of(2022, 11, 3), 1));
		animali.add(new Pesce("Squalo", LocalDate.of(2020, 12, 6), 8));
		
		int scelta;
		do {
			System.out.println("Menu");
			System.out.println("1- Aggiungi");
			System.out.println("2- Cancella");
			System.out.println("3- Modifica");
			System.out.println("4- Stampa");
			System.out.println("0- Esci");
			System.out.print("Scelta: ");
			scelta = in.nextInt();
			in.nextLine();
			System.out.println();
			
			switch(scelta) {
			case 1:
				aggiungi(animali);
				break;
			case 2:
				cancella(animali);
				break;
			case 3:
				modifica(animali);
				break;
			case 4:
				stampa(animali);
				break;
			};
			System.out.println();
		} while(scelta!=0);
	}

	private static void aggiungi(ArrayList<Animale> animali) {
		System.out.println("1. Mammifero");
		System.out.println("2. Pesce");
		System.out.print("Scelta: ");
		int scelta = in.nextInt();
		in.nextLine();
		
		System.out.print("Specie: ");
		String specie = in.next();
		System.out.print("Data nascita (YYYY-MM-DD): ");
		LocalDate data = LocalDate.parse(in.next());
		
		if(scelta == 1) {
			System.out.print("Nome: ");
			String nome = in.next();
			System.out.print("Luogo nascita: ");
			String luogo = in.next();
			animali.add(new Mammifero(specie, data, nome, luogo));
		} else if(scelta == 2) {
			System.out.print("Numero della vasca: ");
			int vasca = in.nextInt();
			in.nextLine();
			animali.add(new Pesce(specie, data, vasca));
		}
	}
	
	private static void cancella(ArrayList<Animale> animali) {
		System.out.print("Inserire l'id da cancellare: ");
		int id_da_cancellare = in.nextInt();
		in.nextLine();
		
		for(int i=0; i<animali.size(); i++)
			if(animali.get(i).getID()==id_da_cancellare){
				animali.remove(i);
				return;
			}
	}

	private static void modifica(ArrayList<Animale> animali) {
		System.out.print("Inserire l'id da modificare: ");
		int id_da_modificare = in.nextInt();
		in.nextLine();
		
		for(int i=0; i<animali.size(); i++)
			if(animali.get(i).getID()==id_da_modificare){
				animali.get(i).morto();
				return;
			}
	}
	
	private static void stampa(ArrayList<Animale> animali) {
		for(Animale a : animali)
			System.out.println(a.getID()+"- " + a);
	}
}
