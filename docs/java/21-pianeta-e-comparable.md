# Pianeta e interfaccia Comparable

Classe che implementa `Comparable<T>` per definire un criterio di ordinamento personalizzato, poi ordinata con `Collections.sort()`.

## Obiettivo

Realizzare una classe `Pianeta` con nome, distanza dal Sole e diametro. Implementare `Comparable<Pianeta>` con un `compareTo` basato sul rapporto distanza/diametro. Nel `main` creare 5 pianeti, stamparli prima e dopo `Collections.sort()`.

## Descrizione

### L'interfaccia `Comparable<T>`

`Comparable<T>` è un'interfaccia di `java.lang` (nessun import necessario) che richiede un unico metodo:

```java
public int compareTo(T altro);
```

La convenzione prevede che il metodo restituisca:

| Valore | Significato |
|--------|-------------|
| negativo | `this` viene prima di `altro` |
| zero | `this` e `altro` sono equivalenti |
| positivo | `this` viene dopo di `altro` |

### Ordinamento con un criterio derivato

Il confronto non si basa direttamente su un singolo attributo, ma su un **valore derivato** — il rapporto distanza/diametro — che Java non conosce a priori:

```java
@Override
public int compareTo(Pianeta altro) {
    Double rThis  = this.distanza  / this.diametro;
    Double rAltro = altro.distanza / altro.diametro;
    return rThis.compareTo(rAltro);
}
```

Usare `Double.compareTo` (del wrapper) delega il confronto corretto tra `double` evitando errori di arrotondamento che si avrebbero sottraendo i due `double` e restituendo il segno.

### `Collections.sort()`

`Collections.sort(lista)` richiede che gli elementi implementino `Comparable`. Ordina **in-place** la lista in ordine crescente secondo `compareTo`:

```java
Collections.sort(pianeti);   // usa il compareTo di Pianeta
```

## Suggerimenti

- `Collections` va importato da `java.util.Collections`; `ArrayList` da `java.util.ArrayList`.
- Il for-each `for (Pianeta p : pianeti)` è più idiomatico del for con indice per stampare la lista.
- Se si volesse un ordinamento decrescente basterebbe invertire `rThis` e `rAltro` nel `compareTo`, oppure usare `Collections.sort(lista, Collections.reverseOrder())`.

## Soluzione

```java
--8<-- "Java/Pianeta-e-comparable/Pianeta.java"
```

<div class="oc-embed"
     data-path="Java/Pianeta-e-comparable/Pianeta.java"
     data-lang="java">
</div>
