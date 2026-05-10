# Quiz Ambiente — Giornata della Terra

Applicazione Swing a quattro classi: lettura CSV con parsing manuale, POJO `Domanda`, finestra `QuizFrame` con feedback visivo animato e opzione di riavvio. Dieci domande casuali, risposta multipla con `JRadioButton`, risultato finale con `JOptionPane`.

## Obiettivo

Leggere 100 domande da `quiz_ambiente.csv`, selezionarne 10 casualmente, mostrarle una alla volta in una finestra Swing con quattro opzioni selezionabili. Dopo la conferma di ogni risposta il programma dà un feedback visivo (verde/rosso sui radio button) tramite un `Timer`, poi avanza. Al termine visualizza punteggio e messaggio motivazionale e offre la possibilità di rigiocare.

## File CSV richiesto

!!! warning "File fornito dal docente"
    Il file `quiz_ambiente.csv` viene fornito separatamente.
    Va copiato nella stessa cartella da cui si esegue il programma.

**Struttura (separatore `,`, prima riga = intestazione):**

| Colonna | Contenuto |
|---------|-----------|
| `domanda` | Testo della domanda |
| `risposta_0` | Opzione A |
| `risposta_1` | Opzione B |
| `risposta_2` | Opzione C |
| `risposta_3` | Opzione D |
| `corretta` | Indice della risposta corretta (0–3) |

## Descrizione

### Struttura del progetto

| Classe | Responsabilità |
|--------|---------------|
| `Domanda` | POJO: testo, array 4 risposte, indice risposta corretta |
| `CsvReader` | Metodo statico `carica(path)` → `List<Domanda>` con parsing manuale |
| `QuizFrame` | `JFrame` completo: UI, logica, feedback visivo, riavvio |
| `Main` | Look and feel, carica CSV, seleziona 10 domande, avvia `QuizFrame` |

### Parsing CSV manuale carattere per carattere

Invece di `split(",")` o regex, `CsvReader` usa `splitCsv()` che scorre la stringa carattere per carattere e gestisce correttamente i campi racchiusi tra virgolette doppie (che possono contenere virgole):

```java
for (int i = 0; i < riga.length(); i++) {
    char c = riga.charAt(i);
    if (c == '"') {
        inVirgolette = !inVirgolette;
    } else if (c == ',' && !inVirgolette) {
        campi.add(campo.toString());
        campo.setLength(0);
    } else {
        campo.append(c);
    }
}
```

Il file viene letto con `InputStreamReader` in UTF-8 per gestire correttamente gli accenti:

```java
new BufferedReader(new InputStreamReader(new FileInputStream(percorso), "UTF-8"))
```

### Look and feel nativo

`Main` imposta il look and feel del sistema operativo prima di creare qualsiasi finestra, così l'applicazione assume l'aspetto nativo di Windows/macOS/Linux:

```java
UIManager.setLookAndFeel(UIManager.getSystemLookAndFeelClassName());
```

L'eccezione viene ignorata con `catch (Exception ignored)`: se il look and feel non è disponibile, Swing usa il default senza interrompere l'applicazione.

### Selezione casuale con helper privato

`Main` estrae 10 domande tramite un metodo privato dedicato: copia la lista, mescola, prende i primi `n` elementi con `subList`:

```java
private static List<Domanda> selezionaCasuali(List<Domanda> sorgente, int n) {
    List<Domanda> copia = new ArrayList<>(sorgente);
    Collections.shuffle(copia);
    return copia.subList(0, n);
}
```

### Struttura della UI in `QuizFrame`

La finestra è divisa in tre aree:

```
+-----------------------------------------+  <- NORTH: header blu (titolo + progresso)
| Quiz Ambiente            Domanda 3 di 10|
+-----------------------------------------+
|   +---------------------------------+   |  <- CENTER: card bianca con ombra
|   | Testo della domanda...          |   |
|   | o A) risposta uno               |   |
|   | o B) risposta due               |   |
|   | o C) risposta tre               |   |
|   | o D) risposta quattro           |   |
|   +---------------------------------+   |
+-----------------------------------------+
|                   [ Conferma risposta ] |  <- SOUTH: pulsante verde
+-----------------------------------------+
```

I colori sono definiti come costanti di classe per coerenza e facilità di modifica:

```java
private static final Color VERDE_SCURO = new Color(27, 94, 32);
private static final Color BLU_SCURO   = new Color(13, 71, 161);
private static final Color SFONDO      = new Color(245, 248, 250);
```

### Feedback visivo con `Timer`

Dopo la conferma, i radio button vengono colorati (verde = corretto, rosso = errato) e l'interfaccia si blocca per 700 ms tramite un `javax.swing.Timer`. Il `Timer` con `setRepeats(false)` esegue l'azione una sola volta, poi si ferma:

```java
radioRisposte[scelta].setForeground(corretta
    ? new Color(27, 94, 32)    // verde
    : new Color(183, 28, 28)); // rosso
radioRisposte[d.getIndiceCorretta()].setForeground(new Color(27, 94, 32));

for (JRadioButton rb : radioRisposte) rb.setEnabled(false);

Timer timer = new Timer(700, e -> avanza());
timer.setRepeats(false);
timer.start();
```

`javax.swing.Timer` è diverso da `java.util.Timer`: esegue l'azione sull'EDT, quindi è sicuro modificare i componenti Swing direttamente nell'`ActionListener`.

### Effetto hover sul pulsante

Un `MouseAdapter` cambia il colore del pulsante quando il mouse ci passa sopra, a patto che sia abilitato:

```java
btnConferma.addMouseListener(new MouseAdapter() {
    @Override public void mouseEntered(MouseEvent e) {
        if (btnConferma.isEnabled())
            btnConferma.setBackground(new Color(46, 125, 50));
    }
    @Override public void mouseExited(MouseEvent e) {
        if (btnConferma.isEnabled())
            btnConferma.setBackground(VERDE_SCURO);
    }
});
```

### Riavvio del quiz

Al termine viene chiesto se rigiocare con `showConfirmDialog`. In caso affermativo, `riavvia()` azzera i contatori e richiama `mostraDomanda()` sulla stessa lista già selezionata — le 10 domande restano le stesse dell'ultima partita:

```java
int scelta = JOptionPane.showConfirmDialog(this,
    "Vuoi fare un altro quiz con 10 nuove domande?",
    "Nuovo quiz", JOptionPane.YES_NO_OPTION);

if (scelta == JOptionPane.YES_OPTION) riavvia();
else dispose();
```

### Escaping HTML con `testoSicuro()`

Le domande vengono inserite in una `JLabel` con HTML. Per evitare che caratteri come `<`, `>` o `&` nel testo rompano il markup, il metodo `testoSicuro()` li sostituisce con le entità HTML corrispondenti:

```java
private static String testoSicuro(String s) {
    return s.replace("&", "&amp;")
            .replace("<", "&lt;")
            .replace(">", "&gt;");
}
```

## Compilazione ed esecuzione

```bash
javac *.java
java Main
```

Il file `quiz_ambiente.csv` deve trovarsi nella stessa directory di esecuzione.

## Suggerimenti

- `GridBagLayout` con `weightx=1` e `weighty=1` e `fill=BOTH` centra la card occupando tutto lo spazio disponibile nella finestra, adattandosi al ridimensionamento.
- `BorderFactory.createCompoundBorder` combina due bordi: uno esterno (`LineBorder`) per il contorno arrotondato della card e uno interno (`EmptyBorder`) per il padding interno.
- `setMinimumSize(new Dimension(560, 420))` impedisce all'utente di ridurre la finestra a dimensioni inutilizzabili.
- `SwingUtilities.invokeLater` garantisce che la creazione della finestra avvenga sull'EDT: regola fondamentale in Swing per la thread safety.

## Soluzione

=== "Main.java"
    ```java
    --8<-- "Java/Quiz-ambiente/Main.java"
    ```

=== "QuizFrame.java"
    ```java
    --8<-- "Java/Quiz-ambiente/QuizFrame.java"
    ```

=== "CsvReader.java"
    ```java
    --8<-- "Java/Quiz-ambiente/CsvReader.java"
    ```

=== "Domanda.java"
    ```java
    --8<-- "Java/Quiz-ambiente/Domanda.java"
    ```

!!! warning "OneCompiler e Swing"
    OneCompiler non supporta applicazioni con interfaccia grafica Swing.
    Compilare ed eseguire il programma in locale con JDK installato.
