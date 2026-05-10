# Gestione di una Playlist

Applicazione a menù che esercita tutti i metodi principali di `ArrayList`: `add`, `add(index)`, `remove`, `set`, `get`, `contains`, `indexOf`, `size`, `isEmpty`.

## Obiettivo

Realizzare un programma con menù testuale che gestisca una playlist di brani musicali tramite un `ArrayList<String>`. Ogni voce del menù corrisponde a un'operazione diversa sulla lista, con gestione degli errori (posizione non valida, brano inesistente).

## Descrizione

### Panoramica dei metodi `ArrayList` usati

| Metodo | Uso nel programma |
|--------|-------------------|
| `add(e)` | Aggiunge un brano in coda |
| `add(i, e)` | Inserisce un brano a una posizione precisa |
| `remove(e)` | Rimuove il brano con quel titolo; restituisce `true` se trovato |
| `set(i, e)` | Sostituisce il brano all'indice `i` |
| `get(i)` | Legge il brano all'indice `i` |
| `contains(e)` | Verifica se il brano è nella lista |
| `indexOf(e)` | Restituisce l'indice del brano, o `-1` se assente |
| `size()` | Numero di brani presenti |
| `isEmpty()` | `true` se la lista è vuota |

### `remove` con oggetto vs con indice

`ArrayList` ha due versioni di `remove`:

```java
playlist.remove("IMAGINE");   // rimuove il primo elemento uguale alla stringa
playlist.remove(2);           // rimuove l'elemento all'indice 2
```

Per le liste di `String` è sicuro passare direttamente la stringa. Il metodo restituisce `boolean` (versione con oggetto) o l'elemento rimosso (versione con indice): si può usare il valore restituito per sapere se la rimozione ha avuto successo.

### Validazione dell'indice prima di `add(i, e)`

`add(i, e)` lancia `IndexOutOfBoundsException` se `i < 0` o `i > size()`. Il controllo preventivo evita l'eccezione:

```java
if (posizione >= 0 && posizione <= playlist.size()) {
    playlist.add(posizione, titolo);
} else
    System.out.println("Posizione non valida.");
```

Nota: `i == size()` è valido — equivale ad aggiungere in coda.

### Pulizia buffer dopo `nextInt()`

Il pattern `in.nextInt(); in.nextLine();` compare più volte: dopo aver letto un intero con `nextInt()`, il carattere di newline rimane nel buffer e verrebbe letto da una successiva `nextLine()` come stringa vuota. La chiamata a `nextLine()` di "pulizia" lo consuma.

## Suggerimenti

- Normalizzare i titoli in maiuscolo con `toUpperCase()` prima di inserirli e prima di cercarli evita problemi di case-sensitivity.
- `indexOf` restituisce `-1` se l'elemento non è presente: è utile come controllo prima di chiamare `set`.
- Il ciclo `for` con indice in "Visualizza playlist" permette di stampare il numero di posizione accanto al titolo, più leggibile di un semplice `for-each`.

## Soluzione

```java
--8<-- "Java/Gestione-playlist/PlaylistMusicale.java"
```

<div class="oc-embed"
     data-path="Java/Gestione-playlist/PlaylistMusicale.java"
     data-lang="java"
     data-stdin="1\nBohemian Rhapsody\n1\nHotel California\n1\nImagine\n7\n5\nImagine\n0\n"
     data-height="550"
     data-autorun="true">
</div>
