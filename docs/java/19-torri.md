# Torri di Hanoi

Simulazione delle Torri di Hanoi con quattro classi OOP: `Disco` (con `Comparable`), `Torre` (con `ArrayList`), `Base` (tre torri affiancate) e `Main`. L'output è una rappresentazione testuale grafica del gioco.

## Obiettivo

Modellare il classico puzzle delle Torri di Hanoi con classi separate. `Disco` implementa `Comparable<Disco>` per confrontare le dimensioni. `Torre` usa un `ArrayList<Disco>` e impone la regola del gioco (`inserisciDisco` rifiuta un disco più grande di quello in cima). `Base` contiene tre `Torre` e le stampa affiancate. Il `main` crea una base con difficoltà 6 e la stampa.

## Struttura delle classi

| Classe | Responsabilità |
|--------|---------------|
| `Disco` | Dimensione, confronto con `compareTo`, rendering testuale centrato |
| `Torre` | `ArrayList<Disco>`, estrazione, inserimento con controllo regola |
| `Base` | Array di tre `Torre`, stampa affiancata riga per riga |
| `Main` | Crea la base e stampa lo stato iniziale |

## Descrizione

### `Disco` e `Comparable<Disco>`

`Disco` implementa `Comparable<Disco>` per poter confrontare due dischi per dimensione. Il metodo `compareTo` restituisce la differenza tra le dimensioni: negativo se il disco corrente è più piccolo, positivo se è più grande:

```java
@Override
public int compareTo(Disco altro) {
    return dimensione - altro.dimensione;
}
```

Questo viene usato in `Torre.inserisciDisco` per verificare che il disco da inserire non sia più grande di quello in cima.

### Rendering testuale del disco

`toString()` costruisce la rappresentazione grafica centrando il disco rispetto alla dimensione totale della torre. Il disco vuoto (dimensione 0) rappresenta uno spazio libero con solo il palo `|`:

```java
String s = dimensione > 0 ? repeat("#", dimensione*2-1) : "|";
int n_spazi = tot_dischi - dimensione;
return repeat(" ", n_spazi) + s + repeat(" ", n_spazi);
```

Il metodo `repeat(String s, int times)` è un helper privato che costruisce la stringa ripetuta (equivalente a `String.repeat()` di Java 11+).

### `Torre` con `ArrayList<Disco>`

La torre usa la cima come ultimo elemento della lista. `estraiDisco()` rimuove e restituisce l'ultimo elemento con `remove(size-1)`. `inserisciDisco` controlla la regola con `compareTo`:

```java
public boolean inserisciDisco(Disco d) {
    if (d == null || torre.size() > 0 && d.compareTo(torre.get(torre.size()-1)) > 0)
        return false;
    torre.add(d);
    return true;
}
```

### Stampa affiancata in `Base`

`toString()` converte ciascuna torre in un array di righe con `split("\n")`, poi assembla le tre colonne riga per riga:

```java
String[] t1 = torri[0].toString().split("\n");
for (int i = 0; i < t1.length; i++)
    result += t1[i] + t2[i] + t3[i] + "\n";
```

Questo funziona perché tutte e tre le torri producono esattamente lo stesso numero di righe (altezza + 1 per la base).

## Suggerimenti

- Prova a modificare `Main` per implementare la soluzione ricorsiva delle Torri di Hanoi: `spostaDischi(n, origine, destinazione, ausiliaria)`.
- Il parametro `difficolta` nel costruttore di `Base` determina il numero di dischi: prova con 3, 4, 6.
- `Torre.toString()` stampa prima i posti vuoti (ciclo decrescente da `altezza` a `size`), poi i dischi presenti (ciclo decrescente sull'`ArrayList`).

## Soluzione

=== "Main.java"
    ```java
    --8<-- "Java/Torri/Main.java"
    ```

=== "Base.java"
    ```java
    --8<-- "Java/Torri/Base.java"
    ```

=== "Torre.java"
    ```java
    --8<-- "Java/Torri/Torre.java"
    ```

=== "Disco.java"
    ```java
    --8<-- "Java/Torri/Disco.java"
    ```

<div class="oc-embed"
     data-lang="java"
     data-path="Java/Torri/Main.java; Java/Torri/Base.java; Java/Torri/Torre.java; Java/Torri/Disco.java"
	 data-height="600"
	 data-autorun="true">
</div>
