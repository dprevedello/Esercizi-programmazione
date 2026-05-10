# Button Counter

Prima applicazione Swing: una finestra con un'etichetta e un pulsante. Ogni click incrementa un contatore e aggiorna la label. Introduce `JFrame`, `JLabel`, `JButton` e `ActionListener`.

## Obiettivo

Creare una finestra Swing con un `JLabel` che mostra un contatore e un `JButton` "Incrementa". Ogni click sul pulsante incrementa il valore e aggiorna il testo della label.

## Descrizione

### Struttura base di una finestra Swing

Una finestra Swing si costruisce con `JFrame`. I componenti vengono aggiunti al content pane, e la finestra viene resa visibile con `setVisible(true)`:

```java
JFrame frame = new JFrame("Titolo");
frame.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
frame.setSize(300, 200);
frame.setLayout(new BoxLayout(frame.getContentPane(), BoxLayout.Y_AXIS));
// aggiunta componenti...
frame.setVisible(true);
```

`EXIT_ON_CLOSE` fa terminare il programma quando si chiude la finestra.

### `BoxLayout` verticale

`BoxLayout.Y_AXIS` dispone i componenti dall'alto verso il basso. `Box.createVerticalGlue()` aggiunge spazio elastico che si distribuisce uniformemente, centrando verticalmente i componenti tra i due glue:

```java
frame.add(Box.createVerticalGlue());
frame.add(label);
frame.add(button);
frame.add(Box.createVerticalGlue());
```

### `ActionListener` con classe anonima

Il click sul pulsante viene gestito con un `ActionListener` implementato come classe anonima inline. La variabile `count` è un campo dell'oggetto `CounterApp`, quindi è accessibile dall'interno della classe anonima:

```java
button.addActionListener(new ActionListener() {
    @Override
    public void actionPerformed(ActionEvent e) {
        count++;
        label.setText("Contatore: " + count);
    }
});
```

`label.setText(...)` aggiorna il testo della label in tempo reale: Swing ridisegna automaticamente il componente.

### `AlignmentX` per centrare orizzontalmente

`setAlignmentX(JFrame.CENTER_ALIGNMENT)` centra il componente orizzontalmente all'interno del `BoxLayout`:

```java
label.setAlignmentX(JFrame.CENTER_ALIGNMENT);
button.setAlignmentX(JFrame.CENTER_ALIGNMENT);
```

## Suggerimenti

- La stessa logica dell'`ActionListener` con classe anonima si può scrivere come lambda: `button.addActionListener(e -> { count++; label.setText("Contatore: " + count); });`
- Aggiungere un secondo pulsante "Reset" che riporta `count` a 0 è un'estensione semplice e didattica.
- Il campo `count` è una variabile di istanza: ogni `CounterApp` ha il proprio contatore indipendente.

## Soluzione

```java
--8<-- "Java/Button-counter/CounterApp.java"
```

!!! warning "OneCompiler e Swing"
    OneCompiler non supporta applicazioni con interfaccia grafica Swing.
    Compilare ed eseguire il programma in locale con JDK installato.
