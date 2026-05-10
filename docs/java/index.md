---
icon: material/language-java
---

# :material-language-java: Java

**Java** è un linguaggio orientato agli oggetti, multipiattaforma e tra i più
diffusi al mondo. È usato nello sviluppo di applicazioni enterprise, app Android,
sistemi distribuiti e molto altro.

Studiare Java dopo aver visto un linguaggio procedurale (come il C) permette di
capire a fondo i principi della **programmazione a oggetti**: classi, ereditarietà,
polimorfismo e interfacce.

---

## Cosa imparerai

- Struttura di un programma Java: classi, metodo `main`, package
- Tipi primitivi e oggetti (`String`, `ArrayList`, `HashMap`…)
- Input/output con `Scanner` e `System.out`
- Strutture di controllo: `if`, `switch`, cicli `for`, `while`, `for-each`
- Programmazione orientata agli oggetti (OOP):
    - Classi e oggetti
    - Costruttori e metodi
    - Incapsulamento (`private`, `public`, getter/setter)
    - Ereditarietà e `super`
    - Interfacce e classi astratte
    - Polimorfismo
- Eccezioni: `try-catch-finally`
- File: lettura e scrittura con `BufferedReader` / `BufferedWriter`

---

## Esercizi disponibili

### 1. Metodi statici :material-function-variant:

| # | Esercizio | Argomento | Difficoltà |
|---|-----------|-----------|------------|
| 01 | [Somma di due numeri](01-somma-di-due-numeri.md) | Metodo statico con parametri e valore di ritorno, `Scanner` | :material-circle-outline: Base |
| 02 | [Stampa di un array](02-stampa-di-un-array.md) | Array, passaggio per riferimento, ciclo `for` | :material-circle-outline: Base |
| 03 | [Conteggio vocali](03-conteggio-vocali.md) | `String`, `substring`, `contains`, metodo con `String` | :material-circle-outline: Base |
| 04 | [Gioco "Indovina il numero"](04-gioco-indovina-il-numero.md) | `Random`, `do-while`, contatore tentativi | :material-circle-slice-4: Intermedio |
| 05 | [Menù interattivo](05-menu-interattivo.md) | `switch`, menù con `do-while`, pulizia buffer input | :material-circle-slice-4: Intermedio |
| 06 | [Manipolazione stringhe](06-manipolazione-stringhe.md) | Interleaving, caratteri unici, `Arrays.sort` su `char[]` | :material-circle: Avanzato |

### 2. Javadoc :material-file-document-edit:

| # | Esercizio | Argomento | Difficoltà |
|---|-----------|-----------|------------|
| 07 | [Generatore Codice Fiscale](07-generatore-codice-fiscale.md) | Commenti Javadoc, `HashMap`, regex, `matches()` | :material-circle: Avanzato |

### 3. Creazione di oggetti basilari :material-cube-outline:

| # | Esercizio | Argomento | Difficoltà |
|---|-----------|-----------|------------|
| 08 | [Rettangolo](08-rettangolo.md) | Costruttori, getter/setter con validazione, `toString`, constructor chaining | :material-circle-outline: Base |
| 09 | [Studente](09-studente.md) | Array di voti, media calcolata lazy, valore sentinella | :material-circle-outline: Base |
| 10 | [ContoBancario](10-conto-bancario.md) | Overloading costruttori, logica di business in `versa`/`preleva` | :material-circle-outline: Base |
| 11 | [Prodotto](11-prodotto.md) | Metodi con controllo sui limiti, calcolo valore inventario | :material-circle-outline: Base |
| 12 | [Libro](12-libro.md) | Attributo booleano, `isDisponibile()`, operatore ternario | :material-circle-outline: Base |
| 13 | [Automobile](13-automobile.md) | `Math.max` come guard, costruttore ridotto con default | :material-circle-outline: Base |
| 14 | [Cerchio](14-cerchio.md) | `Math.PI`, `String.format`, validazione nel costruttore | :material-circle-outline: Base |
| 15 | [Temperatura](15-temperatura.md) | Conversioni Celsius/Fahrenheit/Kelvin, divisione `double` | :material-circle-outline: Base |

### 4. ArrayList :material-format-list-bulleted:

| # | Esercizio | Argomento | Difficoltà |
|---|-----------|-----------|------------|
| 16 | [Film](16-film.md) | `ArrayList<Double>`, autoboxing, `isEmpty`, media con guardia | :material-circle-slice-4: Intermedio |
| 17 | [LibroDiario](17-libro-diario.md) | `ArrayList<String>`, `add`, `get`, indice 1-based vs 0-based | :material-circle-slice-4: Intermedio |
| 18 | [Gestione Playlist](18-gestione-playlist.md) | `add`, `remove`, `set`, `contains`, `indexOf`, `size`, `isEmpty` | :material-circle-slice-4: Intermedio |

### 5. HashMap :material-table-key:

| # | Esercizio | Argomento | Difficoltà |
|---|-----------|-----------|------------|
| 19 | [Gestione Magazzino](19-gestione-magazzino.md) | `put`, `get`, `containsKey`, `remove`, `keySet`, `getOrDefault` | :material-circle-slice-4: Intermedio |

### 6. Ereditarietà :material-family-tree:

| # | Esercizio | Argomento | Difficoltà |
|---|-----------|-----------|------------|
| 20 | [Gestione batteria di quesiti](20-gestione-batteria-quesiti.md) | `extends`, `super`, `@Override`, polimorfismo, `protected`, array polimorfico | :material-circle: Avanzato |

### 7. Interfacce e classi astratte :material-shape-plus:

| # | Esercizio | Argomento | Difficoltà |
|---|-----------|-----------|------------|
| 21 | [Pianeta e Comparable](21-pianeta-e-comparable.md) | `Comparable<T>`, `compareTo`, `Collections.sort`, criterio derivato | :material-circle-slice-4: Intermedio |
| 22 | [Sistema di pagamenti](22-sistema-pagamenti.md) | Interfaccia + classe astratta, array polimorfico, `substring` | :material-circle: Avanzato |
| 23 | [Rete di sensori urbani](23-rete-sensori-urbani.md) | `protected`, Javadoc, cast a interfaccia, `HashMap` real-time | :material-circle: Avanzato |
| 24 | [MediaBox](24-mediabox.md) | `instanceof`, casting, `try-catch`, `BufferedWriter`, `try-with-resources` | :material-circle: Avanzato |

### 8. Eccezioni :material-alert-circle-outline:

| # | Esercizio | Argomento | Difficoltà |
|---|-----------|-----------|------------|
| 25 | [Calcolatore radici quadrate](25-calcolatore-radici-quadrate.md) | Eccezione personalizzata, `throws`, `throw`, `InputMismatchException`, ciclo con `try-catch` | :material-circle-slice-4: Intermedio |
| 26 | [Magazzino digitale](26-magazzino-digitale.md) | Due eccezioni controllate, `throws` multiplo, `catch` con `\|`, `HashMap<String, Articolo>` | :material-circle: Avanzato |

### 9. File di testo e serializzazione :material-file-code:

| # | Esercizio | Argomento | Difficoltà |
|---|-----------|-----------|------------|
| 27 | [Elaborazione dati open](27-elaborazione-dati-open.md) | `BufferedReader`, `split`, filtro e aggregazione su CSV reale | :material-circle-slice-4: Intermedio |
| 28 | [Analisi statistica CSV](28-analisi-statistica-csv.md) | POJO, `CsvReader`, `HashMap`, menù con 6 statistiche, `String.format` | :material-circle: Avanzato |
| 29 | [Aerodromo](29-aerodromo.md) | `Serializable`, `ObjectOutputStream`/`ObjectInputStream`, interfaccia `CMP`, `instanceof` | :material-circle: Avanzato |

### 10. Esercizi avanzati :material-rocket-launch:

| # | Esercizio | Argomento | Difficoltà |
|---|-----------|-----------|------------|
| 30 | [Generatore e risolutore di labirinti](30-generatore-labirinti.md) | Recursive Backtracker, DFS ricorsivo, `ArrayList<ArrayList<Cella>>`, seed | :material-circle: Avanzato |

### 11. GUI :material-monitor:

| # | Esercizio | Argomento | Difficoltà |
|---|-----------|-----------|------------|
| 31 | [Quiz Ambiente — Giornata della Terra](31-quiz-ambiente.md) | Swing, `JFrame`, `JRadioButton`, `ButtonGroup`, `JOptionPane`, `SwingUtilities` | :material-circle: Avanzato |

---

## Compilare ed eseguire

```bash
# Compila
javac NomeClasse.java

# Esegui
java NomeClasse
```

!!! note "Java Development Kit (JDK)"
    Per eseguire Java in locale devi installare il **JDK** (versione **17 LTS** o superiore).

    **Opzione consigliata — Oracle JDK**
    Scaricalo dal sito ufficiale Oracle: [oracle.com/java/technologies/downloads](https://www.oracle.com/java/technologies/downloads/).
    È la distribuzione di riferimento, sviluppata e mantenuta direttamente da Oracle.
    Gratuita per uso personale e didattico.

    **Alternativa gratuita e open source — Eclipse Temurin (Adoptium)**
    Disponibile su [adoptium.net](https://adoptium.net).
    È una build di OpenJDK certificata, completamente gratuita e senza restrizioni di licenza.
    Ideale se si preferisce una distribuzione 100% open source o si lavora in ambienti aziendali
    dove la licenza Oracle potrebbe essere un vincolo.

---

## Risorse utili

- [Oracle Java Tutorials](https://docs.oracle.com/javase/tutorial/) — documentazione ufficiale
- [W3Schools Java](https://www.w3schools.com/java/) — riferimento rapido con esempi
