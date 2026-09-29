# Galleria fotografica

Scrivi il file `style.css` collegato al documento HTML già pronto (non modificarlo) in modo da disporre le sei foto in una griglia regolare di 3 colonne per 2 righe, tutte della stessa dimensione, con un piccolo spazio uniforme tra una cella e l'altra.

## Obiettivo

Costruire una griglia regolare a righe e colonne con CSS Grid, senza calcolare percentuali o margini a mano come si farebbe con Flexbox.

## Anteprima

```
+----------+----------+----------+
| Dolomiti | Costiera | Cinque   |
|          | Amalfit. | Terre    |
+----------+----------+----------+
| Val      | Lago di  | Etna     |
| d'Orcia  | Como     |          |
+----------+----------+----------+
   (3 colonne uguali, 2 righe da 150px,
    spazio uniforme tra le celle)
```

## Descrizione

### Attivare Grid: `display: grid`

**`display: grid`** trasforma un elemento in un **contenitore a griglia**: i suoi figli diretti si posizionano automaticamente dentro le celle della griglia che definisci, invece che in riga come con Flexbox.

```css
.galleria {
  display: grid;
}
```

### Definire le colonne: `grid-template-columns`

**`grid-template-columns`** stabilisce quante colonne ha la griglia e quanto è larga ciascuna. La funzione **`repeat(3, 1fr)`** è un modo compatto per dire "3 colonne, ciascuna larga `1fr`":

```css
.galleria {
  grid-template-columns: repeat(3, 1fr);
}
```

**`fr`** (*fraction*) è un'unità di misura pensata apposta per Grid: rappresenta una "frazione" dello spazio disponibile. Con tre colonne a `1fr` ciascuna, lo spazio si divide in parti esattamente uguali, indipendentemente da quanto è largo il contenitore.

### Definire le righe: `grid-template-rows`

**`grid-template-rows`** fa lo stesso lavoro di `grid-template-columns`, ma per le righe. A differenza delle colonne (spesso più naturale renderle flessibili con `fr`), qui usiamo un'altezza fissa in pixel:

```css
.galleria {
  grid-template-rows: repeat(2, 150px);
}
```

### Spazio tra le celle: `gap`

Come già visto per Flexbox, **`gap`** funziona anche su Grid: inserisce uno spazio uniforme sia tra le colonne che tra le righe, senza doverlo impostare separatamente con `row-gap` e `column-gap`.

```css
.galleria {
  gap: 10px;
}
```

## Suggerimenti

- Con `display: grid` e un numero di elementi che corrisponde esattamente a righe × colonne (qui: 3 × 2 = 6), ogni elemento riempie automaticamente una cella, nell'ordine in cui compare nell'HTML — senza bisogno di indicare a mano la posizione di ciascuno (lo vedremo nel prossimo esercizio, con le aree nominate).
- Se avessi bisogno di colonne di larghezza diversa tra loro, `grid-template-columns: 2fr 1fr 1fr` creerebbe una prima colonna doppia rispetto alle altre due: `fr` distribuisce lo spazio in proporzione ai numeri, non necessariamente in parti uguali.
- Estensione: prova ad aggiungere una settima `.foto` all'HTML (solo per curiosità, senza salvarla) e osserva come Grid la sposti automaticamente su una terza riga, anche se `grid-template-rows` ne definisce solo due.

## Soluzione

=== "index.html"
    ```html
    --8<-- "HTML-CSS-Javascript/Galleria-fotografica/index.html"
    ```
=== "style.css"
    ```css
    --8<-- "HTML-CSS-Javascript/Galleria-fotografica/style.css"
    ```

<div class="oc-embed"
     data-path="HTML-CSS-Javascript/Galleria-fotografica/index.html;HTML-CSS-Javascript/Galleria-fotografica/style.css"
     data-lang="html"
     data-autorun="true">
</div>
