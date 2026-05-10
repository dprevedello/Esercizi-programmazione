# Studente

Classe con array interno per la gestione dinamica dei voti e calcolo della media su richiesta.

## Obiettivo

Scrivere una classe `Studente` con attributi nome, cognome, matricola e un array di voti. Implementare il metodo `aggiornaMedia(double nuovoVoto)` per aggiungere un voto e `getMediaVoti()` che la calcola al volo. Nel `main` istanziare uno studente e simulare l'inserimento di alcuni voti.

## Descrizione

### Array come attributo di istanza

L'array `voti` viene allocato nel costruttore con dimensione fissa (es. 30) e un contatore `nVoti` tiene traccia di quanti elementi sono stati effettivamente inseriti:

```java
private double[] voti;
private int nVoti;

public Studente(String nome, String cognome, String matricola) {
    // ...
    voti  = new double[30];
    nVoti = 0;
}
```

Questo approccio è semplice ed efficace quando il numero massimo di voti è noto. In alternativa si potrebbe usare un `ArrayList<Double>`.

### Calcolo lazy della media

La media **non viene memorizzata** come attributo: viene ricalcolata ogni volta che si chiama `getMediaVoti()`. Questo evita di tenere un valore potenzialmente non aggiornato:

```java
public double getMediaVoti() {
    if (nVoti == 0) return -1;   // nessun voto: valore sentinella
    double somma = 0;
    for (int i = 0; i < nVoti; i++)
        somma += voti[i];
    return somma / nVoti;
}
```

### Validazione nell'aggiornamento

Il setter `aggiornaMedia` accetta solo voti strettamente positivi e al massimo 10, ignorando silenziosamente i valori non validi:

```java
public void aggiornaMedia(double nuovoVoto) {
    if (nuovoVoto > 0 && nuovoVoto <= 10)
        voti[nVoti++] = nuovoVoto;
}
```

## Suggerimenti

- `nVoti++` è un post-incremento: prima usa il valore corrente come indice, poi lo incrementa.
- Se `nVoti == 0`, `getMediaVoti()` restituisce `-1` come **valore sentinella** per segnalare l'assenza di voti: il chiamante può verificarlo con un semplice `if`.
- Il costruttore vuoto delega a quello parametrico con `this("", "", "")`, evitando duplicazioni.

## Soluzione

```java
--8<-- "Java/Studente/Studente.java"
```

<div class="oc-embed"
     data-path="Java/Studente/Studente.java"
     data-lang="java"
     data-autorun="true">
</div>
