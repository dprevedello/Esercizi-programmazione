# Card responsive

Scrivi il file `style.css` collegato al documento HTML già pronto (non modificarlo) in modo che la card sia impilata verticalmente (immagine sopra, testo sotto) sugli schermi stretti, e diventi orizzontale (immagine a sinistra, testo a destra) sugli schermi larghi almeno 600px.

## Obiettivo

Cambiare il layout di un componente in base alla larghezza dello schermo, con l'approccio **mobile-first**: si parte dallo stile per schermi piccoli, poi si aggiungono eccezioni per quelli più larghi.

## Anteprima

```
Schermo stretto (< 600px):        Schermo largo (>= 600px):
+----------------------+          +------------+-----------------+
|      ARTICOLO        |          |            | Il futuro del   |
|                       |          | ARTICOLO   | web è responsive|
+----------------------+          |            |                 |
| Il futuro del web è  |          |            | Sempre più...   |
| responsive           |          +------------+-----------------+
|                       |
| Sempre più persone.. |
+----------------------+
   (impilata verticalmente)          (immagine e testo affiancati)
```

## Descrizione

### Cos'è una media query

Una **media query** applica delle regole CSS solo quando una condizione sull'ambiente in cui la pagina viene visualizzata è vera — più spesso, la larghezza della finestra. Si scrive con `@media` seguito dalla condizione tra parentesi, e contiene al suo interno normali regole CSS:

```css
@media (min-width: 600px) {
  .card {
    flex-direction: row;
  }
}
```

Questo blocco si attiva solo quando la finestra è larga **almeno** 600px; sotto quella soglia, le regole al suo interno vengono semplicemente ignorate.

### L'approccio mobile-first

Scrivere prima lo stile "base" (pensato per schermi piccoli, senza media query) e poi usare `min-width` per **aggiungere** adattamenti man mano che lo schermo cresce si chiama approccio **mobile-first**. È preferibile al contrario (partire dal desktop e usare `max-width` per "correggere" verso il basso) perché il caso più semplice — una singola colonna — è anche quello di base, e ogni media query aggiunge complessità solo quando serve davvero:

```css
.card {
  flex-direction: column; /* stile di base: impilata, per schermi piccoli */
}

@media (min-width: 600px) {
  .card {
    flex-direction: row; /* eccezione: affiancata, da 600px in su */
  }
}
```

### Il viewport meta tag

Il tag `<meta name="viewport" content="width=device-width, initial-scale=1">` nell'`<head>` dice al browser mobile di usare la larghezza reale dello schermo del dispositivo, invece di simulare una finestra desktop rimpicciolita. Senza questo tag, le media query basate sulla larghezza non funzionerebbero correttamente su smartphone reali.

### Adattare anche i figli: `flex: 0 0 200px`

Dentro la media query, anche l'immagine segnaposto cambia comportamento: da larghezza piena (impilata) a una larghezza fissa quando è affiancata al testo, usando l'abbreviazione di Flexbox vista nell'esercizio sulla vetrina di libri (`flex-grow: 0`, `flex-shrink: 0`, `flex-basis: 200px`).

## Suggerimenti

- Nella sandbox qui sotto, il riquadro di anteprima potrebbe essere già più largo di 600px: se non vedi la versione impilata, prova a restringere la finestra del browser aprendo il file in locale, oppure fidati della lettura del codice.
- L'ordine delle proprietà non conta, ma l'ordine dei **blocchi** sì quando si combinano più media query: se ne scrivi altre in futuro (es. `min-width: 900px`), vanno aggiunte dopo quella già esistente, così le regole più recenti nel file possono correggere quelle precedenti a parità di specificità.
- Estensione: prova ad aggiungere una seconda media query con `min-width: 900px` che ingrandisca ulteriormente il testo, e osserva come le due soglie si attivano in sequenza allargando la finestra.

## Soluzione

=== "index.html"
    ```html
    --8<-- "HTML-CSS-Javascript/Card-responsive/index.html"
    ```
=== "style.css"
    ```css
    --8<-- "HTML-CSS-Javascript/Card-responsive/style.css"
    ```

<div class="oc-embed"
     data-path="HTML-CSS-Javascript/Card-responsive/index.html;HTML-CSS-Javascript/Card-responsive/style.css"
     data-lang="html"
     data-autorun="true">
</div>
