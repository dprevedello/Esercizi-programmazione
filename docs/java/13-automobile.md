# Automobile

Classe che modella un veicolo con simulazione di accelerazione e frenata, usando `Math.max` per i vincoli fisici.

## Obiettivo

Scrivere una classe `Automobile` con attributi marca, modello, anno e velocità. Implementare due costruttori, i metodi `accelera(double incremento)` e `frena(double decremento)` con controllo che la velocità non scenda sotto zero, e `toString()`. Nel `main` simulare un breve percorso.

## Descrizione

### Costruttore con valore iniziale vincolato

Anche il costruttore completo può applicare un vincolo sul parametro `velocita`, evitando di creare un'automobile con velocità negativa:

```java
public Automobile(String marca, String modello, int anno, double velocita) {
    this.marca    = marca;
    this.modello  = modello;
    this.anno     = anno;
    this.velocita = Math.max(0, velocita);   // non si parte da velocità negativa
}
```

`Math.max(a, b)` restituisce il maggiore tra `a` e `b`: passando `0` e il valore ricevuto si garantisce che la velocità iniziale non sia mai negativa.

### `Math.max` come guard nei metodi

Lo stesso idioma si usa in `frena()` per garantire che la velocità non scenda sotto zero, senza ricorrere a un `if`:

```java
public void frena(double decremento) {
    if (decremento > 0)
        velocita = Math.max(0, velocita - decremento);
}
```

Questo rende il codice più compatto e leggibile rispetto a un'alternativa con `if/else`.

### Costruttore ridotto con anno di default

Il costruttore con solo marca e modello delega a quello completo impostando un anno corrente di default e velocità zero:

```java
public Automobile(String marca, String modello) {
    this(marca, modello, 2024, 0);
}
```

## Suggerimenti

- Aggiungere un attributo `velocitaMax` e controllarlo in `accelera()` renderebbe la simulazione più realistica.
- `toString()` può mostrare la velocità con un decimale fisso usando `String.format("%.1f", velocita)`.
- Nel `main`, eseguire sequenze alternate di `accelera` e `frena`, incluso un tentativo di frenare oltre lo zero, verifica tutti i casi limite.

## Soluzione

```java
--8<-- "Java/Automobile/Automobile.java"
```

<div class="oc-embed"
     data-path="Java/Automobile/Automobile.java"
     data-lang="java">
</div>
