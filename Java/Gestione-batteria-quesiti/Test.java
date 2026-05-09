import java.util.Random;

public class Test {

	public static void main(String[] args) {
		Quesito[] quesiti = {
			new Quesito("Che parola si usa per estendere una classe?", "extends", 5),
			new QuesitoSiNo("Ti piace Java?", true, 3),
			new QuesitoNumerico("Quanto fa 3 * 5?", 15, 5),
			new QuesitoMultiplo("Quale fra queste non è un tipo wrapper?",
					new String[] { "Double", "Int", "Float", "Boolean" }, 2, 9),
			new Quesito("Qual è il metodo principale eseguito all'avvio di un programma Java?", "main", 5),
			new QuesitoSiNo("La parola chiave 'static' permette di creare membri di classe?", true, 3),
			new QuesitoNumerico("Quanti byte occupa un tipo 'int' in Java?", 4, 5),
			new QuesitoMultiplo("Quale tra queste collezioni non permette elementi duplicati?",
					new String[] { "ArrayList", "HashMap", "LinkedList", "HashSet" }, 4, 6),
			new Quesito("Come si chiama il metodo usato per stampare in console?", "println", 4),
			new QuesitoMultiplo("Quale delle seguenti non è una parola chiave di Java?",
					new String[] { "finally", "delete", "package", "switch" }, 2, 7)
		};

		int punteggio = 0;
		for (int i = 0; i < 3; i++) {
			System.out.println();
			int indice = new Random().nextInt(quesiti.length);
			int risultato = quesiti[indice].ask();
			punteggio += risultato;
			if (risultato == 0)
				System.out.println("SBAGLIATO!");
			else
				System.out.println("CORRETTO (" + risultato + " punti)!");
		}

		System.out.println("\nPunteggio totale: " + punteggio);
	}
}
