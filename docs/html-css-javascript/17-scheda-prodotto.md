# Scheda prodotto e-commerce

Scrivi il file `style.css` collegato al documento HTML già pronto (non modificarlo) in modo da ottenere una card prodotto: riquadro bianco centrato con bordo grigio chiaro e spazio interno, un'immagine segnaposto tratteggiata sopra il titolo, prezzo verde e in grassetto, pulsante arancione a piena larghezza.

## Obiettivo

Costruire una card ben distanziata usando le quattro componenti del box model: contenuto, padding, bordo e margine.

## Anteprima

```
+------------------------------------+
|   +----------------------------+   |
|   |     (bordo tratteggiato)   |   |
|   |          CUFFIE            |   | <- immagine segnaposto
|   +----------------------------+   |
|                                    |
|   Cuffie wireless SoundMax        | <- h2
|   Cancellazione attiva del        | <- .descrizione
|   rumore, autonomia 30 ore...     |
|                                    |
|   €79,90                          | <- .prezzo, verde, grassetto
|                                    |
|   [   Aggiungi al carrello    ]   | <- button, arancione
+------------------------------------+
   (bordo grigio chiaro attorno a
    tutta la card, sfondo bianco)
```

## Descrizione

### Le quattro componenti del box model

Ogni elemento HTML è, per il browser, una **scatola rettangolare** composta da quattro livelli concentrici, dal contenuto verso l'esterno:

1. **`content`** — il contenuto vero e proprio (testo, immagine...), dimensionato con `width`/`height`.
2. **`padding`** — lo spazio *interno*, tra il contenuto e il bordo: fa parte dello sfondo dell'elemento.
3. **`border`** — il bordo vero e proprio, una linea attorno al padding.
4. **`margin`** — lo spazio *esterno*, tra il bordo dell'elemento e gli elementi vicini: è sempre trasparente.

```css
.scheda {
  padding: 16px;              /* spazio interno, dentro il bordo */
  border: 1px solid #cccccc;  /* il bordo stesso */
  margin: 30px auto;          /* spazio esterno, centra la card */
}
```

### Bordo: spessore, stile e colore

La proprietà abbreviata **`border`** accetta tre valori in un colpo solo: spessore, stile della linea (`solid`, `dashed`, `dotted`...) e colore.

```css
.immagine-segnaposto {
  border: 2px dashed #aaaaaa; /* tratteggiato, per un segnaposto */
}
.scheda {
  border: 1px solid #cccccc;  /* continuo, per il contorno della card */
}
```

### Sfondo: `background-color`

**`background-color`** colora lo sfondo di un elemento, che si estende sotto contenuto *e* padding (ma non sotto il margine, sempre trasparente):

```css
.scheda {
  background-color: white;
}
```

### Margini asimmetrici con quattro valori

La proprietà abbreviata `margin` (o `padding`) può ricevere fino a quattro valori, nell'ordine **sopra, destra, sotto, sinistra** (in senso orario, partendo dall'alto):

```css
.scheda h2 {
  margin: 0 0 8px 0; /* solo margine sotto, per staccare il titolo dal testo successivo */
}
```

## Suggerimenti

- Se la card sembra più larga di quanto ti aspetti, ricorda che per impostazione predefinita `width` riguarda solo il contenuto: padding e bordo si *aggiungono* a quella larghezza (lo vedremo meglio con `box-sizing` nella sezione sul layout).
- `line-height` uguale all'altezza dell'elemento (come su `.immagine-segnaposto`) è un trucco semplice per centrare verticalmente una singola riga di testo, utile prima di vedere strumenti di layout più potenti.
- Il pulsante non ha margine: per staccarlo dal prezzo sopra, verifica che `.prezzo` (o un altro elemento) abbia già un margine sotto sufficiente, oppure aggiungine uno tu su `button`.

## Soluzione

=== "index.html"
    ```html
    --8<-- "HTML-CSS-Javascript/Scheda-prodotto/index.html"
    ```
=== "style.css"
    ```css
    --8<-- "HTML-CSS-Javascript/Scheda-prodotto/style.css"
    ```

<div class="oc-embed"
     data-path="HTML-CSS-Javascript/Scheda-prodotto/index.html;HTML-CSS-Javascript/Scheda-prodotto/style.css"
     data-lang="html"
     data-autorun="true">
</div>
