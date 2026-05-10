# Gestione di un Magazzino

Applicazione a menù che esercita tutti i metodi principali di `HashMap`: `put`, `get`, `containsKey`, `remove`, `keySet`, `size`, `isEmpty`.

## Obiettivo

Realizzare un programma con menù testuale che gestisca un magazzino prodotti tramite una `HashMap<String, Integer>`, dove la chiave è il codice del prodotto e il valore è la quantità disponibile. Gestire aggiunta/aggiornamento, rimozione, modifica, ricerca e visualizzazione con controllo degli errori.

## Descrizione

### `HashMap` come struttura chiave-valore

`HashMap` memorizza coppie **chiave → valore**. A differenza di `ArrayList` (accesso per indice), qui si accede agli elementi tramite una chiave univoca:

```java
import java.util.HashMap;

HashMap<String, Integer> magazzino = new HashMap<>();
magazzino.put("TV123", 10);     // inserisce o sovrascrive
int qta = magazzino.get("TV123"); // legge il valore
```

I tipi tra `<>` sono entrambi oggetti: `String` per la chiave, `Integer` (wrapper di `int`) per il valore. L'autoboxing converte automaticamente tra `int` e `Integer`.

### Panoramica dei metodi usati

| Metodo | Comportamento |
|--------|--------------|
| `put(k, v)` | Inserisce o sovrascrive la coppia chiave-valore |
| `get(k)` | Restituisce il valore associato a `k`, o `null` se assente |
| `containsKey(k)` | `true` se la chiave esiste |
| `remove(k)` | Rimuove la coppia con chiave `k` |
| `keySet()` | Restituisce l'insieme di tutte le chiavi |
| `size()` | Numero di coppie presenti |
| `isEmpty()` | `true` se la mappa è vuota |

### Aggiornamento incrementale con `get` + `put`

Quando si aggiunge un prodotto già presente si sommano le quantità anziché sovrascrivere:

```java
if (magazzino.containsKey(codice))
    magazzino.put(codice, magazzino.get(codice) + qta);
else
    magazzino.put(codice, qta);
```

Il controllo con `containsKey` prima di `get` è essenziale: chiamare `get` su una chiave assente restituisce `null`, e sommarlo a un `int` causerebbe una `NullPointerException`.

### Iterazione con `keySet()`

Per stampare tutti i prodotti si itera sull'insieme delle chiavi con un `for-each`:

```java
for (String cod : magazzino.keySet())
    System.out.println(cod + " -> " + magazzino.get(cod) + " unità");
```

L'ordine di iterazione di `HashMap` non è garantito: se serve un ordine alfabetico si può usare `TreeMap` al posto di `HashMap`.

## Suggerimenti

- Normalizzare le chiavi in maiuscolo con `toUpperCase()` prima di `put`, `get` e `containsKey` evita problemi di case-sensitivity (es. "tv123" e "TV123" sarebbero chiavi diverse).
- Il pattern `containsKey` → `get`/`put`/`remove` è ricorrente: strutturarlo come blocco `if/else` separato per ogni operazione rende il codice più leggibile.
- Il metodo `getOrDefault(k, default)` è un'alternativa compatta a `containsKey` + `get` quando si vuole solo leggere: `magazzino.getOrDefault("TV123", 0)` restituisce `0` se la chiave non c'è.

## Soluzione

```java
--8<-- "Java/Gestione-magazzino/Magazzino.java"
```

<div class="oc-embed"
     data-path="Java/Gestione-magazzino/Magazzino.java"
     data-lang="java"
     data-stdin="1\nTV123\n10\n1\nPC456\n5\n6\n7\n0\n"
     data-height="550"
     data-autorun="true">
</div>
