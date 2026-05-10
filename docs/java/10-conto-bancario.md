# ContoBancario

Classe che simula un conto corrente con operazioni di versamento e prelievo, con controllo sul saldo disponibile.

## Obiettivo

Scrivere una classe `ContoBancario` con attributi `numeroConto`, `intestatario` e `saldo`. Implementare due costruttori (con e senza saldo iniziale), i metodi `versa()` e `preleva()` con validazione, e `toString()`. Nel `main` creare due conti e simulare alcune operazioni.

## Descrizione

### Overloading dei costruttori

Java permette di definire più costruttori con firme diverse (**overloading**). Il costruttore "breve" può delegare a quello "completo" passando un valore di default:

```java
public ContoBancario(String numeroConto, String intestatario) {
    this(numeroConto, intestatario, 0);   // saldo iniziale zero
}

public ContoBancario(String numeroConto, String intestatario, double saldo) {
    this.numeroConto  = numeroConto;
    this.intestatario = intestatario;
    this.saldo        = saldo;
}
```

### Logica di business nei metodi

I metodi `versa` e `preleva` non si limitano ad assegnare un valore: applicano **regole di dominio** prima di modificare lo stato dell'oggetto.

```java
public void versa(double importo) {
    if (importo > 0)       // si accettano solo importi positivi
        saldo += importo;
}

public void preleva(double importo) {
    if (importo > 0 && importo <= saldo)   // non si va in rosso
        saldo -= importo;
}
```

Questo è il vantaggio dell'incapsulamento: le regole vivono nella classe e non possono essere aggirate dall'esterno.

## Suggerimenti

- Non esporre un setter per `saldo`: modificarlo direttamente dall'esterno aggirate tutta la logica di controllo. Solo `versa` e `preleva` devono poterlo modificare.
- `toString()` può usare concatenazione di stringhe con `+`; per formattare il saldo con due decimali si può usare `String.format("%.2f", saldo)`.
- Nel `main`, stampare lo stato del conto prima e dopo le operazioni aiuta a verificare la correttezza del comportamento.

## Soluzione

```java
--8<-- "Java/ContoBancario/ContoBancario.java"
```

<div class="oc-embed"
     data-path="Java/ContoBancario/ContoBancario.java"
     data-lang="java"
     data-autorun="true">
</div>
