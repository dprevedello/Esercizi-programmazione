# Semaforo

Scrivi il file `style.css` collegato al documento HTML già pronto (non modificarlo) in modo da ottenere un semaforo: una "custodia" nera che contiene tre cerchi impilati, colorati rispettivamente di rosso, giallo e verde, su uno sfondo grigio molto scuro.

## Obiettivo

Trasformare tre `<div>` in cerchi colorati usando dimensioni, colori e unità di misura diverse, dentro un contenitore comune.

## Anteprima

```
+--------------------+
|    (sfondo grigio  |
|     molto scuro)   |
|                    |
|    +----------+    |
|    |  ●●●●●●  | <- | rosso
|    |          |    |
|    |  ●●●●●●  | <- | giallo
|    |          |    |
|    |  ●●●●●●  | <- | verde
|    +----------+    |
|   (custodia nera)  |
+--------------------+
```

## Descrizione

### Colori: nomi, hex e `rgb()`

CSS accetta più formati per indicare un colore: un **nome** predefinito (`red`, `black`), un **codice hex** a 6 cifre che indica rosso/verde/blu in esadecimale (`#444444`), oppure la funzione **`rgb()`** con i tre valori (0-255) separati da virgola:

```css
background-color: red;           /* nome */
background-color: #444444;       /* hex: stesso valore per R, G e B → grigio */
background-color: rgb(255, 200, 0); /* rosso alto, verde medio, blu assente → giallo-arancio */
```

Sono tre modi equivalenti di descrivere un colore: il nome è comodo per i colori più comuni, hex e `rgb()` permettono qualunque tonalità intermedia.

### Unità di misura: `px` e `%`

Le dimensioni in CSS si esprimono con un'**unità di misura**. **`px`** (pixel) è un valore assoluto, sempre della stessa dimensione a schermo: `width: 120px` è sempre 120 pixel, indipendentemente dal contenitore. **`%`** invece è un valore **relativo** al contenitore in cui l'elemento si trova: `width: 80%` significa "80% della larghezza del genitore", quindi cambia se cambia il genitore.

```css
.custodia {
  width: 120px;   /* sempre 120 pixel */
}
.luce {
  width: 80%;     /* 80% della larghezza di .custodia, cioè si adatta */
}
```

### Rendere un quadrato un cerchio: `border-radius`

**`border-radius`** arrotonda gli angoli di un elemento. Impostato al 50% su un elemento con larghezza e altezza uguali, trasforma un quadrato in un cerchio perfetto:

```css
.luce {
  width: 80%;
  height: 80px;
  border-radius: 50%;
}
```

### Centrare un blocco: `margin: ... auto`

Su un elemento con una larghezza fissata (non al 100%), il valore **`auto`** per i margini laterali lo centra orizzontalmente nel genitore, dividendo lo spazio rimanente in parti uguali a destra e a sinistra:

```css
.custodia {
  width: 120px;
  margin: 40px auto; /* 40px sopra e sotto, auto (centrato) a destra e sinistra */
}
```

## Suggerimenti

- Le tre classi `.rosso`, `.giallo`, `.verde` si aggiungono a `.luce` sullo stesso elemento (`class="luce rosso"`): entrambe le regole si applicano, quella più specifica per il colore sovrascrive il grigio di base — ne parleremo meglio nell'esercizio sulla cascata.
- Se i cerchi non risultano perfettamente circolari, controlla che `width` e `height` producano lo stesso valore in pixel: `width: 80%` di 120px (meno il padding) deve corrispondere a `height: 80px`.
- Estensione: prova a cambiare `body { background-color }` e osserva come il nero della custodia resti sempre ben visibile per contrasto.

## Soluzione

=== "index.html"
    ```html
    --8<-- "HTML-CSS-Javascript/Semaforo/index.html"
    ```
=== "style.css"
    ```css
    --8<-- "HTML-CSS-Javascript/Semaforo/style.css"
    ```

<div class="oc-embed"
     data-path="HTML-CSS-Javascript/Semaforo/index.html;HTML-CSS-Javascript/Semaforo/style.css"
     data-lang="html"
     data-autorun="true">
</div>
