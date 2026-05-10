# Zoo

Gerarchia di ereditarietà con `Animale` come classe base, `Mammifero` e `Pesce` come classi figlie. Gestione di uno zoo tramite `ArrayList<Animale>` con menù CRUD e uso di `LocalDate` e id auto-incrementato statico.

## Obiettivo

Realizzare `Animale` con attributi comuni (`id` statico auto-incrementato, `specie`, `data_nascita`, `vivo`), `Mammifero` che aggiunge `nome` e `luogo_nascita`, `Pesce` che aggiunge il numero di `vasca`. Il `Main` gestisce un `ArrayList<Animale>` polimorfico con operazioni di aggiunta, cancellazione (per id), modifica (segna come morto) e stampa.

## Struttura delle classi

```
Animale         (classe base: id statico, specie, data_nascita, vivo)
├── Mammifero   (+ nome, luogo_nascita)
└── Pesce       (+ vasca)
```

## Descrizione

### Contatore `nextId` statico

L'attributo `nextId` è `static`: appartiene alla classe, non all'istanza. Ogni nuovo `Animale` prende il valore corrente e lo incrementa, garantendo id univoci e crescenti in tutta l'applicazione:

```java
private static int nextId = 1;

public Animale(String specie, LocalDate nascita) {
    id = nextId++;   // assegna l'id corrente e incrementa
    // ...
}
```

### `LocalDate` per la data di nascita

`LocalDate` rappresenta solo una data (senza ora). Si crea con `LocalDate.of(anno, mese, giorno)` oppure con `LocalDate.parse("YYYY-MM-DD")`:

```java
import java.time.LocalDate;

LocalDate data = LocalDate.of(2000, 6, 13);
LocalDate data2 = LocalDate.parse("2008-02-18");
```

Nel `Main`, l'inserimento da tastiera usa `LocalDate.parse(in.next())` che accetta il formato ISO `YYYY-MM-DD`.

### `ArrayList<Animale>` polimorfico

La lista dichiara il tipo base `Animale` ma contiene oggetti di tipo `Mammifero` e `Pesce`. Il ciclo `for-each` in `stampa` chiama `toString()` di ciascuno: il polimorfismo garantisce che venga eseguita la versione corretta della sottoclasse:

```java
for (Animale a : animali)
    System.out.println(a.getID() + "- " + a);
```

### Cancellazione per id con indice

La cancellazione scorre la lista con un indice `for` invece di `for-each`, perché `remove(int index)` richiede la posizione:

```java
for (int i = 0; i < animali.size(); i++)
    if (animali.get(i).getID() == id_da_cancellare) {
        animali.remove(i);
        return;
    }
```

Rimuovere durante un `for-each` causerebbe `ConcurrentModificationException`.

### Attributi `protected` nella classe base

Gli attributi `id`, `data_nascita`, `vivo` e `specie` sono `protected`: visibili alle sottoclassi senza getter. `Mammifero` e `Pesce` li usano direttamente in `toString()`.

## Suggerimenti

- Il metodo `morto()` in `Animale` imposta `vivo = false`: la "modifica" nel menù è solo questa operazione, non un aggiornamento generico degli attributi.
- Aggiungere un terzo tipo (es. `Rettile`) richiede solo di estendere `Animale` e aggiungere un `case` nel metodo `aggiungi`.
- `LocalDate.parse` lancia `DateTimeParseException` se il formato non è valido: per robustezza si potrebbe avvolgere in un `try-catch`.

## Soluzione

=== "Main.java"
    ```java
    --8<-- "Java/Zoo/Main.java"
    ```

=== "Animale.java"
    ```java
    --8<-- "Java/Zoo/Animale.java"
    ```

=== "Mammifero.java"
    ```java
    --8<-- "Java/Zoo/Mammifero.java"
    ```

=== "Pesce.java"
    ```java
    --8<-- "Java/Zoo/Pesce.java"
    ```

<div class="oc-embed"
     data-lang="java"
     data-path="Java/Zoo/Main.java; Java/Zoo/Animale.java; Java/Zoo/Mammifero.java; Java/Zoo/Pesce.java"
     data-stdin="4\n1\n2\nBetta\n2026-04-12\n4\n4\n0\n"
	 data-height="650"
	 data-autorun="true">
</div>
