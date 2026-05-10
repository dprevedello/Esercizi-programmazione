# Razzo

Simulazione di una gara tra razzi con thread concorrenti. `Razzo` estende `Thread`, avanza a distanza casuale con pause casuali, stampa una barra di avanzamento e usa `join()` per attendere tutti i razzi prima di terminare.

## Obiettivo

Creare la classe `Razzo` che estende `Thread`. Ogni razzo avanza di una distanza casuale (10–50 km) ogni 100–500 ms fino a raggiungere 1000 km, stampando una barra di avanzamento. Il `main` crea tre razzi, li avvia con `start()` e attende il completamento di tutti con `join()`.

## Descrizione

### Costruttore con nome del thread

`Thread` ha un costruttore che accetta il nome: `super(nome)`. Il nome è accessibile con `getName()` e viene usato per identificare il razzo nell'output:

```java
public Razzo(String nome) {
    super(nome);    // imposta il nome del thread
}
// Avvio:
Razzo apollo = new Razzo("Apollo");
apollo.start();
System.out.println(apollo.getName());   // → "Apollo"
```

### `Thread.sleep` per simulare il tempo di volo

`Thread.sleep(ms)` mette in pausa il thread corrente per un numero di millisecondi. La versione con due argomenti `nextInt(min, max)` (Java 17+) genera un intero in `[min, max)`:

```java
Thread.sleep(new Random().nextInt(100, 500));
```

`sleep` lancia `InterruptedException`: il pattern `; // TMCH` (To Make Compiler Happy) nel catch è un placeholder didattico per un'eccezione che in questo contesto non può verificarsi.

### `join()` per attendere i thread

`join()` blocca il thread chiamante finché il thread su cui è chiamato non termina. Senza `join`, il `main` terminerebbe prima che i razzi completino la gara:

```java
apollo.start();
falcon.start();
soyuz.start();

apollo.join();   // attende Apollo
falcon.join();   // attende Falcon
soyuz.join();    // attende Soyuz
// qui tutti i razzi hanno raggiunto 1000 km
```

### Barra di avanzamento testuale

La barra viene costruita contando quante `#` inserire (una ogni 100 km percorsi) e completando con `-`:

```java
int barre = 0;
for (int i = 0; i < (distanza / 100.0); i++) {
    System.out.print("#");
    barre++;
}
for (int i = barre; i <= 10; i++)
    System.out.print("-");
System.out.println("] " + (distanza / 10.0) + " %");
```

### Output concorrente (interleaving)

Poiché tre thread stampano contemporaneamente, le righe di output si mescolano in modo non deterministico: è visibile l'esecuzione parallela. Non esiste garanzia sull'ordine.

## Compilazione ed esecuzione

```bash
javac Razzo.java
java Razzo
```

## Suggerimenti

- Aggiungere un quarto razzo e osservare come cambia la competizione.
- Prova a rimuovere i `join()` e osserva cosa succede all'output del `main`.
- Estensione: usare `synchronized` su un oggetto condiviso per stampare il vincitore solo una volta, dal primo razzo che raggiunge 1000.

## Soluzione

```java
--8<-- "Java/Razzo/Razzo.java"
```

<div class="oc-embed"
     data-lang="java"
     data-path="Java/Razzo/Razzo.java">
</div>
