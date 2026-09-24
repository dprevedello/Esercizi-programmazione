# Immagini e tabelle

Crea una pagina "Commodore 64 vs Apple II" con un'immagine per ciascun computer (cercale su Wikimedia Commons, cerca "Commodore 64" e "Apple II") e una tabella con **esattamente questi dati**:

| Caratteristica | Commodore 64 | Apple II |
|---|---|---|
| Anno di uscita | 1982 | 1977 |
| CPU | MOS 6510 | MOS 6502 |
| RAM | 64 KB | 4-48 KB |
| Prezzo di lancio | 595 $ | 1298 $ |

## Obiettivo

Inserire immagini con testo alternativo corretto e presentare dati strutturati in una tabella con intestazione.

## Anteprima

```
+--------------------------------------------+
| Commodore 64 vs Apple II                   | <- h1
|                                            |
| [immagine C64]      [immagine Apple II]    | <- img (con alt)
|                                            |
| +--------------+-------------+-----------+ |
| |Caratteristica|Commodore 64 | Apple II  | | <- intestazione tabella
| +--------------+-------------+-----------+ |
| |Anno di uscita|    1982     |   1977    | |
| |CPU           |  MOS 6510   | MOS 6502  | |
| |RAM           |   64 KB     |  4-48 KB  | |
| |Prezzo lancio |   595 $     |  1298 $   | |
| +--------------+-------------+-----------+ |
+--------------------------------------------+
```

## Descrizione

### Immagini: il tag `img`

L'elemento **`img`** inserisce un'immagine nella pagina. Non ha un tag di chiusura (è un elemento "vuoto"): tutte le informazioni stanno negli attributi. L'attributo **`src`** indica l'indirizzo dell'immagine, mentre **`alt`** fornisce un testo alternativo, mostrato se l'immagine non si carica e letto dai software per non vedenti: descrivere bene l'immagine con `alt` non è opzionale, è buona pratica.

```html
<img src="indirizzo-immagine.jpg" alt="Descrizione dell'immagine" width="300">
```

L'attributo `width` (in pixel) permette di controllare la larghezza con cui l'immagine viene mostrata.

### Tabelle: `table`, `tr`, `th`, `td`

Una tabella si costruisce con l'elemento **`table`**, che contiene una riga **`tr`** (*table row*) per ogni riga della tabella. Dentro ogni riga, le celle sono **`td`** (*table data*, celle normali) oppure **`th`** (*table header*, celle di intestazione, mostrate in grassetto dal browser).

```html
<table>
  <tr>
    <th>Intestazione 1</th>
    <th>Intestazione 2</th>
  </tr>
  <tr>
    <td>Dato 1</td>
    <td>Dato 2</td>
  </tr>
</table>
```

### Raggruppare l'intestazione: `thead` e `tbody`

Per rendere più chiara la struttura, la riga di intestazione può essere racchiusa in **`thead`** e le righe di dati in **`tbody`**: non cambia nulla nell'aspetto della tabella, ma rende il codice più leggibile e corretto.

## Suggerimenti

- Scrivi sempre un `alt` descrittivo: non "immagine1.jpg" ma una frase che spieghi cosa si vede.
- Ricontrolla che il numero di `<td>` in ogni riga corrisponda al numero di colonne dell'intestazione.
- Se usi immagini da Wikimedia Commons per un tuo progetto, è buona norma citare la fonte in un piccolo testo sotto l'immagine.

## Soluzione

```html
--8<-- "HTML-CSS-Javascript/Commodore-vs-apple/index.html"
```

<div class="oc-embed"
     data-path="HTML-CSS-Javascript/Commodore-vs-apple/index.html"
     data-lang="html"
     data-autorun="true">
</div>
