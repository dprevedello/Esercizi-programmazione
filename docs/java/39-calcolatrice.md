# Calcolatrice

Calcolatrice grafica con `JFrame` che implementa `ActionListener`. Layout con `GridLayout` 4×4 per i pulsanti, `JTextField` come display, gestione dell'operazione corrente con variabili di stato e icona personalizzata.

## Obiettivo

Realizzare una calcolatrice Swing con display (`JTextField` non editabile), pulsanti numerici e operatori (`+`, `-`, `*`, `/`), tasto `C` per reset e `=` per il calcolo. La classe `Calcolatrice` estende `JFrame` e implementa `ActionListener` per gestire tutti i click da un unico metodo `actionPerformed`.

## Descrizione

### La classe implementa `ActionListener`

Invece di aggiungere un `ActionListener` separato per ogni pulsante, `Calcolatrice` implementa direttamente l'interfaccia. `this` viene passato come listener a tutti i pulsanti:

```java
public class Calcolatrice extends JFrame implements ActionListener {

    @Override
    public void actionPerformed(ActionEvent e) {
        String comando = e.getActionCommand();   // testo del pulsante premuto
        // ...
    }
}
```

`getActionCommand()` restituisce di default il testo del pulsante (es. `"7"`, `"+"`, `"="`).

### Creazione dei pulsanti con array di stringhe

I 16 pulsanti vengono creati con un ciclo su un array di stringhe, aggiungendo `this` come listener a ciascuno:

```java
String[] bottoni = { "7","8","9","/", "4","5","6","*",
                     "1","2","3","-", "0","C","=","+" };
for (String testo : bottoni) {
    JButton bottone = new JButton(testo);
    bottone.addActionListener(this);
    pannello.add(bottone);
}
```

### Logica di `actionPerformed` con regex

Il metodo usa `matches` con espressioni regolari per distinguere i diversi tipi di pulsante:

```java
if (comando.matches("[0-9]"))          // cifra
    display.setText(display.getText() + comando);
else if (comando.matches("[\\/\\*\\-\\+]"))  // operatore
    // memorizza primo numero e operazione
else if (comando.equals("C"))          // reset
    // ...
else if (comando.equals("="))          // calcolo
    // ...
```

I caratteri speciali regex (`/`, `*`, `-`, `+`) vanno escapati con `\\` nelle stringhe Java.

### Variabili di stato per l'operazione

Tre variabili memorizzano lo stato tra il primo numero, l'operatore e il secondo numero:

```java
private double primoNumero = 0;
private double secondoNumero = 0;
private String operazione = "";
```

Quando si preme un operatore: si salva `primoNumero` dal display, si memorizza `operazione`, si azzera il display per il secondo numero. Quando si preme `=`: si legge `secondoNumero`, si calcola, si mostra il risultato.

### Icona personalizzata

L'icona della finestra viene caricata dalla risorsa interna con `getClass().getResource()`:

```java
ImageIcon icon = new ImageIcon(getClass().getResource("/icon.png"));
setIconImage(icon.getImage());
```

Il file `icon.png` si trova nella stessa cartella dei `.java`. Con `getResource("/icon.png")` il `/` iniziale indica il classpath root.

### `JTextField` come display non editabile

```java
display = new JTextField();
display.setEditable(false);                    // solo lettura
display.setHorizontalAlignment(SwingConstants.RIGHT);  // allineamento a destra
```

La dimensione preferita viene modificata solo in altezza per dare più spazio visivo al display:

```java
Dimension prefSize = display.getPreferredSize();
display.setPreferredSize(new Dimension(prefSize.width, 80));
```

## Compilazione ed esecuzione

Il file `icon.png` deve trovarsi nella stessa cartella.

## Suggerimenti

- La divisione per zero (`"/", secondoNumero == 0`) produce `Infinity` in Java per i `double`: il display mostrerà `Infinity`. Aggiungere un controllo esplicito migliora la robustezza.
- Il `try-catch` attorno a `Double.parseDouble` gestisce il caso in cui il display sia vuoto al momento della pressione di un operatore o di `=`.
- Estensione: aggiungere il pulsante `±` per cambiare segno e il pulsante `%` per la percentuale.

## Soluzione

```java
--8<-- "Java/Calcolatrice/Calcolatrice.java"
```

!!! warning "OneCompiler e Swing"
    OneCompiler non supporta applicazioni con interfaccia grafica Swing.
    Compilare ed eseguire il programma in locale con JDK installato.
