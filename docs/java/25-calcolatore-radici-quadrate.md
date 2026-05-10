# Calcolatore di Radici Quadrate

Esercizio introduttivo alle eccezioni: creare un'eccezione personalizzata, lanciarla in un metodo e gestirla nel `main` insieme a un'eccezione di libreria, ripetendo la richiesta finché l'input è valido.

## Obiettivo

Definire `NumeroNegativoException` (estende `Exception`), implementare `calcolaRadice(int n)` che la lancia se `n < 0`, e nel `main` gestire sia `InputMismatchException` (input non numerico) sia `NumeroNegativoException` in un ciclo che si ripete fino all'inserimento di un valore valido.

## Descrizione

### Eccezioni controllate vs non controllate

In Java le eccezioni si dividono in due famiglie:

| Tipo | Superclasse | Obbligo di gestione |
|------|-------------|---------------------|
| **Controllate** (checked) | `Exception` | Sì — `throws` o `try-catch` obbligatori |
| **Non controllate** (unchecked) | `RuntimeException` | No — opzionale |

`NumeroNegativoException` estende `Exception` → è controllata: il compilatore impone di dichiararla con `throws` nella firma del metodo e di gestirla nel chiamante.

`InputMismatchException` estende `RuntimeException` → non controllata: non serve `throws`, ma conviene comunque catturarla per evitare crash.

### Creare un'eccezione personalizzata

Basta estendere `Exception` e definire un costruttore che passa il messaggio alla superclasse:

```java
public class NumeroNegativoException extends Exception {
    public NumeroNegativoException(String messaggio) {
        super(messaggio);   // il messaggio è recuperabile con getMessage()
    }
}
```

### Lanciare un'eccezione con `throw`

```java
public static double calcolaRadice(int n) throws NumeroNegativoException {
    if (n < 0)
        throw new NumeroNegativoException("Numero negativo: " + n);
    return Math.sqrt(n);
}
```

`throw` interrompe immediatamente l'esecuzione del metodo e risale nello stack fino al primo `catch` compatibile.

### Ciclo di ripetizione con `try-catch`

Il ciclo `while (!valido)` permette di ripetere la richiesta finché non arriva un input corretto. Ogni `catch` stampa il messaggio di errore senza interrompere il ciclo:

```java
while (!valido) {
    try {
        int n = in.nextInt();
        double r = calcolaRadice(n);
        System.out.println("√" + n + " = " + r);
        valido = true;          // esce dal ciclo solo qui
    } catch (InputMismatchException e) {
        System.out.println("Inserisci un intero.");
        in.nextLine();          // svuota il buffer dopo un errore di parsing
    } catch (NumeroNegativoException e) {
        System.out.println(e.getMessage());
    }
}
```

Il `in.nextLine()` nel `catch` di `InputMismatchException` è essenziale: quando `nextInt()` fallisce lascia il token non letto nel buffer, che verrebbe riletto immediatamente al giro successivo generando un ciclo infinito.

## Suggerimenti

- Il metodo `getMessage()` ereditato da `Exception` restituisce la stringa passata al costruttore con `super(messaggio)`.
- Più `catch` si possono concatenare sullo stesso `try`: Java esegue il primo la cui eccezione è compatibile con quella lanciata.
- `Math.sqrt(n)` restituisce `Double.NaN` se `n` è negativo senza lanciare eccezioni: l'eccezione personalizzata serve proprio a rendere esplicito questo caso d'errore a livello applicativo.

## Soluzione

=== "CalcolatoreRadici.java"
    ```java
    --8<-- "Java/Calcolatore-radici-quadrate/CalcolatoreRadici.java"
    ```

=== "NumeroNegativoException.java"
    ```java
    --8<-- "Java/Calcolatore-radici-quadrate/NumeroNegativoException.java"
    ```

<div class="oc-embed"
     data-path="Java/Calcolatore-radici-quadrate/CalcolatoreRadici.java; Java/Calcolatore-radici-quadrate/NumeroNegativoException.java"
     data-lang="java"
     data-stdin="25"
     data-height="550"
     data-autorun="true">
</div>
