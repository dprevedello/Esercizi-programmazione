# Sposta Quadrato

Applicazione Swing con disegno 2D personalizzato: un quadrato rosso spostabile tramite pulsanti o frecce della tastiera. Introduce `JPanel` con `paintComponent`, `Graphics`, `KeyAdapter` e `GridLayout`.

## Obiettivo

Realizzare una finestra con un'area di disegno (`PannelloQuadrato` estende `JPanel`) che mostra un quadrato rosso, e un pannello di controllo con quattro pulsanti direzionali. Il quadrato si muove con i pulsanti o con i tasti freccia, rimanendo sempre nei bordi del pannello.

## Struttura delle classi

| Classe | Responsabilità |
|--------|---------------|
| `PannelloQuadrato` | Disegno, gestione tastiera, logica di movimento con controllo bordi |
| `SpostaQuadrato` | `JFrame` principale, costruzione UI, pulsanti di controllo |

## Descrizione

### Disegno personalizzato con `paintComponent`

Per disegnare elementi personalizzati in Swing si estende `JPanel` e si sovrascrive `paintComponent(Graphics g)`. È fondamentale chiamare `super.paintComponent(g)` per primo: pulisce lo sfondo prima di ridisegnare:

```java
@Override
protected void paintComponent(Graphics g) {
    super.paintComponent(g);       // cancella il vecchio disegno
    g.setColor(Color.RED);
    g.fillRect(x, y, DIMENSIONE, DIMENSIONE);
}
```

`repaint()` schedula una chiamata a `paintComponent` sull'EDT: non va chiamato direttamente.

### Controllo dei bordi con `Math.max` e `Math.min`

Il metodo `muovi` applica lo spostamento e poi clamp la posizione tra 0 e il bordo del pannello:

```java
x += dx;
x = Math.max(0, Math.min(x, this.getWidth() - DIMENSIONE));
y += dy;
y = Math.max(0, Math.min(y, this.getHeight() - DIMENSIONE));
```

`Math.max(0, valore)` impedisce di uscire a sinistra/alto, `Math.min(valore, max)` impedisce di uscire a destra/basso.

### `KeyAdapter` per la tastiera

`KeyAdapter` è una classe astratta che implementa `KeyListener` con metodi vuoti: si sovrascrive solo `keyPressed` senza dover implementare anche `keyReleased` e `keyTyped`:

```java
addKeyListener(new KeyAdapter() {
    @Override
    public void keyPressed(KeyEvent e) {
        switch (e.getKeyCode()) {
            case KeyEvent.VK_UP:    muoviSu();  break;
            case KeyEvent.VK_DOWN:  muoviGiu(); break;
            case KeyEvent.VK_LEFT:  muoviSx();  break;
            case KeyEvent.VK_RIGHT: muoviDx();  break;
        }
    }
});
```

Per ricevere eventi da tastiera il pannello deve avere il focus: `setFocusable(true)` e `requestFocusInWindow()` lo garantiscono. `requestFocusInWindow()` è chiamato anche dopo ogni movimento con pulsante per riportare il focus sul pannello.

### `GridLayout` per i pulsanti

I quattro pulsanti sono disposti in una griglia 2×3 con spazio tra le celle. Le posizioni vuote vengono occupate da `JLabel` vuote:

```java
pannelloPulsanti.setLayout(new GridLayout(2, 3, 5, 5));
pannelloPulsanti.add(new JLabel());  // vuoto
pannelloPulsanti.add(btnSu);
pannelloPulsanti.add(new JLabel());  // vuoto
pannelloPulsanti.add(btnSx);
pannelloPulsanti.add(btnGiu);
pannelloPulsanti.add(btnDx);
```

### `center()` post-visualizzazione

Il metodo `center()` centra il quadrato nel pannello. Va chiamato **dopo** `setVisible(true)` perché prima le dimensioni del pannello sono 0:

```java
setVisible(true);
pannello.center();   // ora getWidth() e getHeight() hanno valori reali
```

## Compilazione ed esecuzione

```bash
javac *.java
java SpostaQuadrato
```

## Suggerimenti

- Prova a cambiare `DIMENSIONE` e `STEP` per vedere l'effetto sul comportamento.
- Aggiungere un secondo quadrato di colore diverso che risponde a tasti WASD è un'estensione naturale.
- `BorderFactory.createEmptyBorder(top, left, bottom, right)` aggiunge padding attorno al pannello dei pulsanti senza layout manager aggiuntivi.

## Soluzione

=== "SpostaQuadrato.java"
    ```java
    --8<-- "Java/Sposta-quadrato/SpostaQuadrato.java"
    ```

=== "PannelloQuadrato.java"
    ```java
    --8<-- "Java/Sposta-quadrato/PannelloQuadrato.java"
    ```

!!! warning "OneCompiler e Swing"
    OneCompiler non supporta applicazioni con interfaccia grafica Swing.
    Compilare ed eseguire il programma in locale con JDK installato.
