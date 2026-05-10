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
- Thread: `Runnable`, `synchronized`, `wait`/`notifyAll`
- Socket: TCP, HTTP, HTTPS

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
| 19 | [Torri di Hanoi](19-torri.md) | `Comparable`, `ArrayList<Disco>`, rendering testuale, stampa affiancata | :material-circle-slice-4: Intermedio |
| 20 | [Casa d'aste](20-casa-aste.md) | `LocalDateTime`, `addAll`, flag booleani di stato, overloading `offri` | :material-circle: Avanzato |

### 5. HashMap :material-table-key:

| # | Esercizio | Argomento | Difficoltà |
|---|-----------|-----------|------------|
| 21 | [Gestione Magazzino](21-gestione-magazzino.md) | `put`, `get`, `containsKey`, `remove`, `keySet`, `getOrDefault` | :material-circle-slice-4: Intermedio |

### 6. Ereditarietà :material-family-tree:

| # | Esercizio | Argomento | Difficoltà |
|---|-----------|-----------|------------|
| 22 | [Gestione batteria di quesiti](22-gestione-batteria-quesiti.md) | `extends`, `super`, `@Override`, polimorfismo, `protected`, array polimorfico | :material-circle: Avanzato |
| 23 | [Zoo](23-zoo.md) | `LocalDate`, id statico auto-incrementato, `ArrayList<Animale>` polimorfico, CRUD | :material-circle-slice-4: Intermedio |
| 24 | [Portamonete e Portafoglio](24-portamonete.md) | `@Override` con `super`, overloading `inserisci`, gerarchia a due livelli | :material-circle-outline: Base |

### 7. Interfacce e classi astratte :material-shape-plus:

| # | Esercizio | Argomento | Difficoltà |
|---|-----------|-----------|------------|
| 25 | [Pianeta e Comparable](25-pianeta-e-comparable.md) | `Comparable<T>`, `compareTo`, `Collections.sort`, criterio derivato | :material-circle-slice-4: Intermedio |
| 26 | [Sistema di pagamenti](26-sistema-pagamenti.md) | Interfaccia + classe astratta, array polimorfico, `substring` | :material-circle: Avanzato |
| 27 | [Rete di sensori urbani](27-rete-sensori-urbani.md) | `protected`, Javadoc, cast a interfaccia, `HashMap` real-time | :material-circle: Avanzato |
| 28 | [MediaBox](28-mediabox.md) | `instanceof`, casting, `try-catch`, `BufferedWriter`, `try-with-resources` | :material-circle: Avanzato |

### 8. Eccezioni :material-alert-circle-outline:

| # | Esercizio | Argomento | Difficoltà |
|---|-----------|-----------|------------|
| 29 | [Calcolatore radici quadrate](29-calcolatore-radici-quadrate.md) | Eccezione personalizzata, `throws`, `throw`, `InputMismatchException`, ciclo con `try-catch` | :material-circle-slice-4: Intermedio |
| 30 | [Magazzino digitale](30-magazzino-digitale.md) | Due eccezioni controllate, `throws` multiplo, `catch` con `\|`, `HashMap<String, Articolo>` | :material-circle: Avanzato |

### 9. File di testo e serializzazione :material-file-code:

| # | Esercizio | Argomento | Difficoltà |
|---|-----------|-----------|------------|
| 31 | [Elaborazione dati open](31-elaborazione-dati-open.md) | `BufferedReader`, `split`, filtro e aggregazione su CSV reale | :material-circle-slice-4: Intermedio |
| 32 | [Analisi statistica CSV](32-analisi-statistica-csv.md) | POJO, `CsvReader`, `HashMap`, menù con 6 statistiche, `String.format` | :material-circle: Avanzato |
| 33 | [Aerodromo](33-aerodromo.md) | `Serializable`, `ObjectOutputStream`/`ObjectInputStream`, interfaccia `CMP`, `instanceof` | :material-circle: Avanzato |

### 10. Esercizi avanzati :material-rocket-launch:

| # | Esercizio | Argomento | Difficoltà |
|---|-----------|-----------|------------|
| 34 | [Generatore e risolutore di labirinti](34-generatore-labirinti.md) | Recursive Backtracker, DFS ricorsivo, `ArrayList<ArrayList<Cella>>`, seed | :material-circle: Avanzato |

### 11. GUI :material-monitor:

| # | Esercizio | Argomento | Difficoltà |
|---|-----------|-----------|------------|
| 35 | [Quiz Ambiente — Giornata della Terra](35-quiz-ambiente.md) | Swing, `JFrame`, `JRadioButton`, `ButtonGroup`, `JOptionPane`, `SwingUtilities` | :material-circle: Avanzato |
| 36 | [Button Counter](36-button-counter.md) | `JFrame`, `JLabel`, `JButton`, `ActionListener`, `BoxLayout` | :material-circle-outline: Base |
| 37 | [Sposta Quadrato](37-sposta-quadrato.md) | `paintComponent`, `Graphics`, `KeyAdapter`, `GridLayout`, `repaint` | :material-circle-slice-4: Intermedio |
| 38 | [Chrono GUI](38-chrono-gui.md) | `JLabel` + `Runnable`, `synchronized`, `wait`/`notifyAll`, `WindowAdapter` | :material-circle: Avanzato |
| 39 | [Calcolatrice](39-calcolatrice.md) | `JFrame` implementa `ActionListener`, `GridLayout`, regex in `actionPerformed` | :material-circle-slice-4: Intermedio |

### 12. Thread :material-cog-clockwise:

| # | Esercizio | Argomento | Difficoltà |
|---|-----------|-----------|------------|
| 40 | [Test Thread](40-test-thread.md) | `extends Thread`, `implements Runnable`, classe anonima, lambda, Singleton `synchronized` | :material-circle-slice-4: Intermedio |
| 41 | [Razzo](41-razzo.md) | `Thread.sleep`, `join()`, barra di avanzamento, output concorrente | :material-circle-slice-4: Intermedio |

### 13. Socket :material-lan-connect:

| # | Esercizio | Argomento | Difficoltà |
|---|-----------|-----------|------------|
| 42 | [Echo Socket](42-echo-socket.md) | `ServerSocket`, `Socket`, `BufferedReader`, `PrintWriter`, protocollo testuale | :material-circle-outline: Base |
| 43 | [HTTP Client](43-http-client.md) | `URI`, socket su porta 80, richiesta HTTP/1.1 manuale | :material-circle-slice-4: Intermedio |
| 44 | [HTTPS Client](44-https-client.md) | `SSLSocket`, `SSLSocketFactory`, TLS 1.2/1.3, porta 443 | :material-circle-slice-4: Intermedio |
| 45 | [Quiz Capitali](45-capitali.md) | Server multi-client con thread, `HashMap` capitali, protocollo con aiuto | :material-circle: Avanzato |
| 46 | [Casello Autostradale](46-casello-autostradale.md) | `volatile`, thread daemon, `synchronized`, timer auto-terminazione, report ASCII | :material-circle: Avanzato |

---

## Compilare ed eseguire

```bash
# Compila
javac NomeClasse.java

# Esegui
java NomeClasse
```

!!! note "Java Development Kit (JDK)"
    Per eseguire Java in locale devi installare il **JDK**.
    Scaricalo da [adoptium.net](https://adoptium.net) (versione 17 LTS o superiore).

---

## Risorse utili

- [Oracle Java Tutorials](https://docs.oracle.com/javase/tutorial/) — documentazione ufficiale
- [W3Schools Java](https://www.w3schools.com/java/) — riferimento rapido con esempi
