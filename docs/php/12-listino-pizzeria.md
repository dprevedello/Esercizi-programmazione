# Listino della pizzeria

Crea una pagina `index.php` che memorizzi in un array cinque pizze (nome, ingredienti, prezzo, se è vegetariana) e le mostri in una tabella HTML con una riga per pizza, i prezzi scritti all'italiana («€ 6,50»), una piccola icona accanto alle pizze vegetariane e le righe pari colorate in modo diverso. Sotto la tabella mostra quante pizze ci sono in listino e il prezzo medio.

## Obiettivo

Generare le righe di una tabella HTML con un ciclo `foreach` su un array di array.

## Anteprima

```
+--------------------------------------------------------------+
| Pizzeria Da Mario – Listino                                  |
|                                                              |
| +------------------+----------------------------+----------+ |
| | Pizza            | Ingredienti                |   Prezzo | |
| +------------------+----------------------------+----------+ |
| | Margherita 🌱    | pomodoro, mozzarella, ...  |   € 6,50 | |
| | Marinara 🌱      | pomodoro, aglio, origano   |   € 5,00 | | <- riga colorata
| | Diavola          | pomodoro, mozzarella, ...  |   € 8,00 | |
| | ...                                                        |
| +------------------+----------------------------+----------+ |
|                                                              |
| 5 pizze in listino – prezzo medio € 7,60.                    |
+--------------------------------------------------------------+
```

## Descrizione

### Generare una tabella da un array

Invece di scrivere a mano ogni riga `<tr>`, si scrive **una sola riga** dentro un `foreach`: PHP la ripete per ogni elemento dell'array. Aggiungere una pizza al listino significa ora aggiungere un elemento all'array, senza toccare l'HTML.

```php
<?php foreach ($pizze as $p): ?>
    <tr>
        <td><?= $p["nome"] ?></td>
        <td><?= $p["prezzo"] ?></td>
    </tr>
<?php endforeach; ?>
```

### Righe alternate con l'operatore `%`

Per colorare le righe pari in modo diverso serve sapere se la posizione è pari o dispari: il **resto della divisione per 2** (`$i % 2`) vale 0 per i pari e 1 per i dispari. Si ottiene la posizione scrivendo `foreach ($pizze as $i => $p)` e si aggiunge l'attributo `class` solo quando serve, con l'operatore ternario.

```php
<tr<?= $i % 2 === 1 ? ' class="alterna"' : '' ?>>
```

### Calcoli prima dell'HTML

Totale e media si calcolano **prima** della parte HTML, in un blocco PHP in testa al file, con un `foreach` che somma i prezzi. Gli importi si formattano con `number_format($prezzo, 2, ",", ".")` (vedi l'esercizio *Date e numeri*).

## Suggerimenti

- Una pizza vegetariana ha il campo `"vegetariana" => true`: nell'HTML basta un `if` per aggiungere l'icona.
- Il simbolo `€` si scrive direttamente nell'HTML, il numero formattato con `number_format` subito dopo.
- Se vuoi evitare un doppio ciclo, calcola il totale nello stesso `foreach` che stampa le righe e visualizzalo dopo la tabella (ma dovrai spostare il calcolo prima dell'HTML della frase finale).
- Estensione: aggiungi il campo `"piccante"` e mostra un'icona diversa.

## Soluzione

```php
--8<-- "PHP/Listino-pizzeria/index.php"
```

!!! warning "Esegui in locale"
    Come tutte le pagine PHP richiede un **server web con PHP**: copia la cartella `PHP/` nella cartella pubblica del tuo server e apri la pagina dal browser (vedi [Eseguire PHP in locale](index.md#eseguire-php-in-locale)).
