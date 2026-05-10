# Casa d'aste

Modello OOP di una casa d'aste con quattro classi: `Partecipante`, `OggettoAsta`, `CasaAste` e `Main`. Gestisce iscrizioni, catalogo, offerte e ciclo di vita dell'asta tramite stati booleani.

## Obiettivo

Realizzare quattro classi che modellino il funzionamento di una casa d'aste. `CasaAste` usa due `ArrayList` (partecipanti e oggetti), gestisce lo stato dell'asta con flag booleani (`astaAperta`, `astaTerminata`) e offre metodi per iscrivere partecipanti, aggiungere oggetti al catalogo, fare offerte e aprire/chiudere l'asta. Usare `LocalDateTime` per la data dell'asta.

## Struttura delle classi

| Classe | Responsabilità |
|--------|---------------|
| `Partecipante` | id auto-incrementato, nome |
| `OggettoAsta` | nome, prezzo minimo, offerta massima corrente, vincitore |
| `CasaAste` | due `ArrayList`, stati asta, costruttori con overloading, `LocalDateTime` |
| `Main` | Dimostra il ciclo completo dell'asta |

## Descrizione

### `LocalDateTime` per la data dell'asta

`LocalDateTime` rappresenta data e ora senza fuso orario. Si crea con il factory method `LocalDateTime.of(anno, mese, giorno, ora, minuti)` e si formatta con `DateTimeFormatter`:

```java
import java.time.LocalDateTime;
import java.time.format.DateTimeFormatter;

LocalDateTime data = LocalDateTime.of(2026, 10, 28, 10, 0);
DateTimeFormatter fmt = DateTimeFormatter.ofPattern("dd/MM/yyyy HH:mm");
System.out.println(data.format(fmt));   // → 28/10/2026 10:00
```

### Costruttori con overloading e `this(...)`

`CasaAste` ha due costruttori: quello base inizializza le liste vuote, quello esteso accetta un catalogo iniziale e delega al base con `this(...)`:

```java
public CasaAste(String nome, String indirizzo, LocalDateTime data) {
    // costruttore base
}

public CasaAste(String nome, String indirizzo, LocalDateTime data,
                ArrayList<OggettoAsta> oggetti) {
    this(nome, indirizzo, data);          // delega al base
    if (oggetti != null && !oggetti.isEmpty())
        this.oggetti.addAll(oggetti);     // aggiunge tutti gli oggetti
}
```

`addAll(collection)` aggiunge tutti gli elementi di una collezione in un'unica operazione.

### Gestione degli stati con flag booleani

L'asta ha tre stati possibili codificati con due booleani:

| `astaAperta` | `astaTerminata` | Stato |
|---|---|---|
| `false` | `false` | In preparazione |
| `true` | `false` | Aperta |
| `false` | `true` | Terminata |

Ogni metodo verifica i flag prima di operare:

```java
public Partecipante iscrivi(String nome) {
    if (astaAperta || astaTerminata) return null;  // non si può iscrivere
    // ...
}
```

### Codice auto-incrementato con `next_code`

Il campo `next_code` è un contatore di istanza (non statico) che assegna un codice univoco a ogni partecipante:

```java
private int next_code = 1;

public Partecipante iscrivi(String nome) {
    Partecipante p = new Partecipante(next_code++, nome);
    partecipanti.add(p);
    return p;
}
```

### Overloading di `offri`

`CasaAste.offri` è definito in due versioni: una riceve un oggetto `Partecipante`, l'altra cerca il partecipante per codice intero:

```java
public boolean offri(Partecipante p, OggettoAsta ogg, int offerta) { ... }

public boolean offri(int codicePartecipante, OggettoAsta ogg, int offerta) {
    Partecipante p = null;
    for (Partecipante part : partecipanti)
        if (part.getCodice() == codicePartecipante) p = part;
    if (p == null) return false;
    return this.offri(p, ogg, offerta);
}
```

## Compilazione ed esecuzione

```bash
javac *.java
java Main
```

## Suggerimenti

- `OggettoAsta.faiOfferta` accetta un'offerta solo se è strettamente superiore all'attuale `offerta_max` (non `>=`): due partecipanti con la stessa offerta, il primo vince.
- Il `Main` dimostra il ciclo completo: creazione → iscrizioni → apertura → offerte → chiusura → stampa risultato.
- Estensione naturale: aggiungere un metodo `getVincitori()` in `CasaAste` che restituisce una mappa `OggettoAsta → Partecipante` con tutti gli aggiudicatari.

## Soluzione

=== "Main.java"
    ```java
    --8<-- "Java/Casa-aste/Main.java"
    ```

=== "CasaAste.java"
    ```java
    --8<-- "Java/Casa-aste/CasaAste.java"
    ```

=== "OggettoAsta.java"
    ```java
    --8<-- "Java/Casa-aste/OggettoAsta.java"
    ```

=== "Partecipante.java"
    ```java
    --8<-- "Java/Casa-aste/Partecipante.java"
    ```

<div class="oc-embed"
     data-lang="java"
     data-path="Java/Casa-aste/Main.java; Java/Casa-aste/CasaAste.java; Java/Casa-aste/OggettoAsta.java; Java/Casa-aste/Partecipante.java">
</div>
