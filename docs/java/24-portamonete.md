# Portamonete e Portafoglio

Ereditarietà con estensione di funzionalità: `Portamonete` gestisce le monete (50 cent, 1€, 2€), `Portafoglio` estende `Portamonete` aggiungendo le banconote (5€, 10€, 20€) e sovrascrive i metodi con `@Override` chiamando `super`.

## Obiettivo

Creare `Portamonete` con metodi `inserisci(double)`, `inserisci(double, int)`, `denaro()` e `denaropertipo()`. Estenderla con `Portafoglio` che aggiunge banconote, sovrascrive `inserisci` e `denaro` chiamando `super`, e aggiunge `banconote()`. Il `Main` usa un `Portafoglio` dimostrando tutti i metodi.

## Descrizione

### Gerarchia e responsabilità

```
Portamonete    (monete: 50¢, 1€, 2€)
    inserisci(double)
    inserisci(double, int)
    denaro()              → totale monete
    denaropertipo()       → stampa monete
        ↑ extends
Portafoglio    (+ banconote: 5€, 10€, 20€)
    inserisci(double)     → @Override: chiama super + gestisce banconote
    inserisci(double, int)→ @Override: chiama super + gestisce banconote
    denaro()              → @Override: super.denaro() + banconote
    banconote()           → stampa banconote
```

### `@Override` con `super`

`Portafoglio` sovrascrive `inserisci` ma non vuole duplicare la logica per le monete: chiama `super.inserisci(valore)` per delegare alla classe padre, poi gestisce le banconote:

```java
@Override
public void inserisci(double valore) {
    super.inserisci(valore);   // gestisce 0.5, 1, 2
    if (valore == 5)  b5euro++;
    if (valore == 10) b10euro++;
    if (valore == 20) b20euro++;
}
```

Stessa logica per `denaro()`:

```java
@Override
public double denaro() {
    return super.denaro() + 5 * b5euro + 10 * b10euro + 20 * b20euro;
}
```

### Overloading di `inserisci`

Entrambe le classi definiscono due versioni di `inserisci`: una per inserire una moneta singola, una per inserirne `n` dello stesso taglio. L'overloading si basa sulla firma del metodo (numero e tipo di parametri):

```java
void inserisci(double valore)        // una moneta
void inserisci(double valore, int n) // n monete dello stesso taglio
```

### Confronto con `==` su `double`

Il codice usa `valore == 0.5`, `valore == 1`, ecc. Questo funziona per i valori esatti passati nel `Main` (letterali come `0.5`, `1`, `2`), ma in generale confrontare `double` con `==` può dare risultati imprevisti per via degli errori di arrotondamento in virgola mobile. In un contesto didattico è accettabile; in produzione si userebbero costanti intere (centesimi) o `BigDecimal`.

## Compilazione ed esecuzione

```bash
javac *.java
java Main
```

## Suggerimenti

- Il costruttore di `Portafoglio` con sei parametri chiama `super(m50cent, m1euro, m2euro)` per inizializzare le monete tramite il costruttore di `Portamonete`.
- Aggiungere tagli maggiori (50€, 100€, 200€) richiede solo di estendere `Portafoglio` con la stessa tecnica.
- Prova a scrivere un metodo `spezza(double importo)` che, dato un importo, restituisce il minor numero di banconote e monete necessario (problema del resto).

## Soluzione

=== "Main.java"
    ```java
    --8<-- "Java/Portamonete/Main.java"
    ```

=== "Portamonete.java"
    ```java
    --8<-- "Java/Portamonete/Portamonete.java"
    ```

=== "Portafoglio.java"
    ```java
    --8<-- "Java/Portamonete/Portafoglio.java"
    ```

<div class="oc-embed"
     data-lang="java"
     data-path="Java/Portamonete/Main.java; Java/Portamonete/Portamonete.java; Java/Portamonete/Portafoglio.java">
</div>
