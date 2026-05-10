# Gestione di una batteria di quesiti

Gerarchia di classi che sfrutta ereditarietà e polimorfismo per simulare un'interrogazione con domande di tipo diverso.

## Obiettivo

Realizzare una gerarchia composta da `Quesito` (classe base), `QuesitoSiNo` e `QuesitoNumerico` (figli diretti) e `QuesitoMultiplo` (nipote di `Quesito`, figlio di `QuesitoNumerico`). Ogni classe sovrascrive il metodo `ask()` con il comportamento specifico. La classe `Test` popola un array con quesiti misti ed estrae 3 domande casuali per simulare un'interrogazione.

## Descrizione

### Gerarchia di classi

```
Quesito
├── QuesitoSiNo        (estende Quesito)
└── QuesitoNumerico    (estende Quesito)
    └── QuesitoMultiplo (estende QuesitoNumerico)
```

Ogni livello **aggiunge o specializza** il comportamento della classe padre. `QuesitoMultiplo` arricchisce la domanda con le opzioni di scelta, ma delega la logica di lettura e verifica a `QuesitoNumerico`.

### `extends` e `super`

La parola chiave `extends` dichiara la relazione di ereditarietà. Il costruttore del figlio deve chiamare quello del padre con `super(...)` come prima istruzione:

```java
public QuesitoSiNo(String domanda, boolean risp, int punteggio) {
    super(domanda, risp ? "si" : "no", punteggio);
}
```

Con `super(...)` si inizializzano gli attributi della classe padre (`domanda`, `risposta`, `punteggio`) senza duplicare il codice.

### `@Override` e polimorfismo

`@Override` segnala al compilatore che il metodo sovrascrive quello della classe padre. Il polimorfismo permette di chiamare `ask()` su qualsiasi riferimento di tipo `Quesito`, e Java eseguirà automaticamente la versione corretta in base al tipo reale dell'oggetto a runtime:

```java
Quesito[] quesiti = {
    new Quesito(...),
    new QuesitoSiNo(...),
    new QuesitoMultiplo(...)
};

// Java chiama la versione giusta per ciascun oggetto
int risultato = quesiti[i].ask();
```

Questo è il **polimorfismo**: stesso messaggio (`ask()`), comportamento diverso a seconda del tipo reale.

### Attributi `protected`

Gli attributi della classe base sono dichiarati `protected` anziché `private`: questo li rende accessibili alle sottoclassi (ma non a classi esterne), permettendo a `QuesitoMultiplo` di modificare `this.domanda` per aggiungere le opzioni:

```java
public QuesitoMultiplo(String domanda, String[] opzioni, int risposta, int punteggio) {
    super(domanda, risposta, punteggio);
    int n = 1;
    for (String opzione : opzioni)
        this.domanda += "\n" + n++ + ") " + opzione;
}
```

### Estrazione casuale con `Random`

`new Random().nextInt(n)` restituisce un intero in `[0, n-1]`, usato come indice nell'array dei quesiti per selezionarne uno casuale a ogni turno.

## Compilazione ed esecuzione

Poiché l'esercizio è composto da **più file `.java`**, è necessario compilarli tutti insieme:

```bash
javac Quesito.java QuesitoSiNo.java QuesitoNumerico.java QuesitoMultiplo.java Test.java
java Test
```

In alternativa, con il wildcard:

```bash
javac *.java
java Test
```

## Suggerimenti

- `equalsIgnoreCase` in `Quesito.ask()` rende il confronto case-insensitive: "extends", "Extends" ed "EXTENDS" sono tutte risposte corrette.
- Il ciclo `do-while` in `QuesitoSiNo.ask()` garantisce che l'utente inserisca esattamente "si" o "no" prima di procedere.
- `Integer.parseInt(risposta)` in `QuesitoNumerico.ask()` converte la stringa memorizzata nel costruttore (es. `"15"`) nel corrispondente intero per il confronto.
- Per evitare di estrarre lo stesso quesito due volte si potrebbe tenere un array di booleani `estratto[]` o usare una `ArrayList` con `remove` dopo ogni estrazione.

## Soluzione

I file da compilare insieme sono cinque:

=== "Quesito.java"
    ```java
    --8<-- "Java/Gestione-batteria-quesiti/Quesito.java"
    ```

=== "QuesitoSiNo.java"
    ```java
    --8<-- "Java/Gestione-batteria-quesiti/QuesitoSiNo.java"
    ```

=== "QuesitoNumerico.java"
    ```java
    --8<-- "Java/Gestione-batteria-quesiti/QuesitoNumerico.java"
    ```

=== "QuesitoMultiplo.java"
    ```java
    --8<-- "Java/Gestione-batteria-quesiti/QuesitoMultiplo.java"
    ```

=== "Test.java"
    ```java
    --8<-- "Java/Gestione-batteria-quesiti/Test.java"
    ```

<div class="oc-embed"
     data-path="Java/Gestione-batteria-quesiti/Test.java;Java/Gestione-batteria-quesiti/Quesito.java; Java/Gestione-batteria-quesiti/QuesitoSiNo.java; Java/Gestione-batteria-quesiti/QuesitoNumerico.java; Java/Gestione-batteria-quesiti/QuesitoMultiplo.java"
     data-lang="java"
     data-height="600">
</div>
