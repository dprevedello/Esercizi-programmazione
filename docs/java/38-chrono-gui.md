# Chrono GUI

Cronometro con interfaccia grafica che combina Swing e Thread. `Counter` estende `JLabel` e implementa `Runnable`: il thread di conteggio usa `wait(100)` per tick da 100 ms e `synchronized` per la sincronizzazione con START/STOP.

## Obiettivo

Realizzare un cronometro grafico con `ChronoGUI` (`JFrame`) e `Counter` (`JLabel` + `Runnable`). Il thread interno conta in decimi di secondo e aggiorna la label. I pulsanti START e STOP controllano il conteggio. La chiusura della finestra termina il thread ordinatamente.

## Struttura delle classi

| Classe | Responsabilità |
|--------|---------------|
| `Counter` | `JLabel` + `Runnable`: thread di conteggio, stati `conta`/`termina`, `wait`/`notifyAll` |
| `ChronoGUI` | `JFrame`: layout, pulsanti START/STOP, `WindowListener` per chiusura pulita |

## Descrizione

### `Counter` estende `JLabel` e implementa `Runnable`

Una classe può estendere una classe e implementare un'interfaccia contemporaneamente. `Counter` è sia un componente Swing (visualizza il valore) sia un thread (lo aggiorna):

```java
public class Counter extends JLabel implements Runnable {
    // ...
    public Counter() {
        super("0", CENTER);
        new Thread(this).start();   // avvia il thread passando this come Runnable
    }
}
```

`new Thread(this).start()` crea un thread che chiamerà `this.run()` — cioè il metodo `run` di `Counter`.

### Ciclo con `wait(100)` e blocco `synchronized`

Il metodo `run` è interamente dentro un blocco `synchronized(this)`: garantisce che `wait`, `start` e `stop` non possano intervenire contemporaneamente:

```java
@Override
public void run() {
    synchronized (this) {
        while (!termina) {
            if (conta) {
                count++;
                setText("" + count / 10);   // mostra decimi di secondo
            }
            try {
                wait(100);   // aspetta 100 ms, poi riprende
            } catch (InterruptedException e) { ; }
        }
    }
}
```

`wait(100)` rilascia il lock e fa dormire il thread per al massimo 100 ms: è svegliabile prima tramite `notifyAll()`.

### Controllo dello stato con `synchronized`

`start()`, `stop()` e `termina()` sono `synchronized` per garantire la visibilità delle modifiche ai flag dal thread principale all'EDT e viceversa:

```java
public synchronized void start()   { conta = true;  notifyAll(); }
public synchronized void stop()    { conta = false; }
public synchronized void termina() { termina = true; }
```

`notifyAll()` in `start()` sveglia il thread se è in `wait`.

### `WindowAdapter` per la chiusura pulita

Senza fermare il thread, la JVM non termina anche dopo la chiusura della finestra. `WindowAdapter` intercetta l'evento di chiusura e chiama `counter.termina()`:

```java
addWindowListener(new WindowAdapter() {
    @Override
    public void windowClosing(WindowEvent e) {
        counter.termina();
    }
});
```

!!! note "Thread e Swing"
    `setText` viene chiamato dal thread di conteggio, non dall'EDT. In Swing i componenti dovrebbero essere modificati solo sull'EDT. Per semplicità didattica qui si accetta questa semplificazione; in produzione si userebbe `SwingUtilities.invokeLater`.

## Suggerimenti

- `count / 10` usa la divisione intera: con `count` che incrementa ogni 100 ms, il valore mostrato cambia ogni secondo.
- Aggiungere un pulsante RESET che azzera `count` richiede un metodo `synchronized void reset()` che imposta `count = 0` e `setText("0")`.
- Prova a modificare l'intervallo di `wait` a 10 ms e dividere per 100: otterrai un cronometro al centesimo di secondo.

## Soluzione

=== "ChronoGUI.java"
    ```java
    --8<-- "Java/Chrono-gui/ChronoGUI.java"
    ```

=== "Counter.java"
    ```java
    --8<-- "Java/Chrono-gui/Counter.java"
    ```

!!! warning "OneCompiler e Swing"
    OneCompiler non supporta applicazioni con interfaccia grafica Swing.
    Compilare ed eseguire il programma in locale con JDK installato.
