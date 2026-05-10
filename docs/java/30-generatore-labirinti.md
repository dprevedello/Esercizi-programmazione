# Generatore e risolutore di labirinti

Progetto OOP avanzato: generazione casuale con Recursive Backtracker e risoluzione con DFS ricorsivo, usando esclusivamente collezioni Java e quattro classi dedicate.

## Obiettivo

Implementare un programma da riga di comando (`java MazeGen <righe> <colonne> [seed]`) che generi un labirinto perfetto, trovi il percorso da (0,0) all'angolo in basso a destra e lo stampi a video con il percorso marcato. Nessun array tradizionale, nessuna inferenza di tipo con `var`.

## Struttura delle classi

| Classe | Responsabilità |
|--------|---------------|
| `Coordinate` | Coppia (riga, colonna) immutabile con `equals` |
| `Cella` | Stato dei quattro muri + flag visita e percorso |
| `Labirinto` | Griglia, generazione Recursive Backtracker, DFS, stampa |
| `MazeGen` | Parsing argomenti da riga di comando, avvio |

## Descrizione

### Formato di stampa

Il labirinto usa questa convenzione:

```
+---+---+---+---+---+---+
| .   .   . |           |
+   +---+   +---+---+   +
|       | .   .   . |   |
+   +---+---+---+   +   +
|   |           | . |   |
+   +   +---+   +   +   +
|   |   |       | .   . |
+---+---+---+---+---+---+
```

- Angoli: `+`
- Muro orizzontale presente: `---`, assente: `   `
- Muro verticale presente: `|`, assente: ` `
- Contenuto cella nel percorso: ` . `, altrimenti: `   `

### Recursive Backtracker

L'algoritmo genera labirinti **perfetti** (un solo percorso tra qualsiasi coppia di celle, nessun ciclo):

```
generaRicorsivo(attuale):
  segna attuale come visitata
  mescola casualmente i vicini non visitati
  per ogni vicino non visitato:
    rimuovi il muro tra attuale e vicino
    generaRicorsivo(vicino)
```

Il numero di muri rimossi è sempre `righe × colonne − 1`: la struttura risultante è un albero ricoprente della griglia.

### DFS per la soluzione

Il percorso viene trovato con backtracking ricorsivo. Il flag `nelPercorso` viene attivato **solo** sulle celle che fanno parte del percorso soluzione, non su quelle esplorate e poi abbandonate:

```
dfs(attuale, fine):
  segna attuale come visitata
  se attuale == fine:
    attuale.nelPercorso = true
    return true
  per ogni vicino raggiungibile non visitato:
    se dfs(vicino, fine):
      attuale.nelPercorso = true
      return true
  deseleziona la visita (backtrack)
  return false
```

### Griglia senza array tradizionali

La griglia è un `ArrayList<ArrayList<Cella>>`: l'accesso alla cella (r, c) avviene con `griglia.get(r).get(c)`. La dimensione è fissata al momento della costruzione, ma la struttura dati è dinamica.

### Seed per riproducibilità

`new Random(seed)` con lo stesso seed produce sempre la stessa sequenza di numeri casuali, quindi lo stesso labirinto — utile per il testing:

```bash
java MazeGen 5 6 42   # sempre uguale
java MazeGen 5 6      # diverso ogni volta
```

## Compilazione ed esecuzione

```bash
javac *.java
java MazeGen 5 6
java MazeGen 4 8 42
```

## Suggerimenti

- `Collections.shuffle(lista, random)` mescola la lista usando lo stesso `Random` del labirinto: fondamentale per la riproducibilità con seed.
- Il metodo `equals` in `Coordinate` è necessario per confrontare la posizione attuale con la fine nel DFS: senza di esso Java confronterebbe i riferimenti, non i valori.
- `StringBuilder` in `toString()` è più efficiente della concatenazione con `+` in un ciclo lungo.
- Verificare `dentroGriglia(r, c)` prima di accedere a una cella evita `IndexOutOfBoundsException` sui bordi.

## Soluzione

=== "MazeGen.java"
    ```java
    --8<-- "Java/Generatore-labirinti/MazeGen.java"
    ```

=== "Labirinto.java"
    ```java
    --8<-- "Java/Generatore-labirinti/Labirinto.java"
    ```

=== "Cella.java"
    ```java
    --8<-- "Java/Generatore-labirinti/Cella.java"
    ```

=== "Coordinate.java"
    ```java
    --8<-- "Java/Generatore-labirinti/Coordinate.java"
    ```

<div class="oc-embed"
     data-path="Java/Generatore-labirinti/MazeGen.java; Java/Generatore-labirinti/Labirinto.java; Java/Generatore-labirinti/Cella.java; Java/Generatore-labirinti/Coordinate.java"
     data-lang="java">
</div>
