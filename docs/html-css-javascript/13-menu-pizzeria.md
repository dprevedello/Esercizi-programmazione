# Menu di una pizzeria

Scrivi il file `style.css` collegato al documento HTML già pronto (non modificarlo) in modo che: i titoli delle categorie e la voce "Informazioni sul servizio" abbiano lo stesso stile (font con grazie, rosso scuro); ogni categoria di piatti abbia spazio sotto di sé; le voci del menu non abbiano il puntino delle liste; i prezzi dentro il menu siano verdi e in grassetto, mentre il prezzo del coperto (fuori dal menu) resti grigio.

## Obiettivo

Selezionare elementi in base alla loro posizione nella struttura della pagina, usando selettori discendenti, di figlio diretto e raggruppati con la virgola.

## Anteprima

```
+---------------------------------------------+
|              Pizzeria Da Marco               | <- h1, centrato
|                                               |
|  Antipasti                                   | <- h2, rosso scuro,
|  Bruschette al pomodoro           €5         |    font Georgia
|  Tagliere di salumi               €8         | <- prezzi verdi,
|                                               |    grassetto, senza
|  Primi piatti                                |    puntini elenco
|  Risotto ai funghi                €9         |
|  Pasta al pomodoro                €7         |
|                                               |
|  Pizze                                       |
|  Margherita                       €6         |
|  Diavola                          €8         |
|                                               |
|  Informazioni sul servizio                   | <- h3, stesso stile di h2
|  Il coperto (€1,50) non è incluso...         | <- prezzo qui: grigio
+---------------------------------------------+
```

## Descrizione

### Selettore discendente

Un **selettore discendente** (due selettori separati da uno spazio) seleziona un elemento indipendentemente da *quanto* è annidato dentro l'altro, purché sia contenuto da qualche parte al suo interno:

```css
.menu li {
  list-style: none;
}
```

Questa regola raggiunge ogni `<li>` dentro `.menu`, anche se `<li>` è annidato dentro `<ul>` dentro `<section>` dentro `.menu` — tre livelli di profondità, ma il selettore discendente li attraversa tutti.

### Selettore di figlio diretto: `>`

Il combinatore **`>`** invece seleziona solo i **figli diretti**, cioè un livello esatto più in basso, non i discendenti più profondi:

```css
.menu > section {
  margin-bottom: 20px;
}
```

Le tre `<section>` sono figlie dirette di `.menu`, quindi la regola si applica. Se scrivessimo `.menu > li`, invece, non selezionerebbe nulla: i `<li>` sono nipoti di `.menu` (dentro `<ul>` dentro `<section>`), non figli diretti.

### Stessa specificità, contesto diverso

Nella pagina compaiono due `span.prezzo`: uno dentro `.menu`, uno dentro `.nota`. Combinando classe del contenitore e classe dell'elemento si applicano stili diversi allo stesso tipo di elemento, in base a *dove* si trova:

```css
.menu span.prezzo {
  color: darkgreen;
}
.nota span.prezzo {
  color: gray;
}
```

### Selettore raggruppato con la virgola

Quando più selettori diversi devono condividere le stesse regole, si può evitare di ripeterle scrivendo i selettori separati da virgola:

```css
h2, h3 {
  color: darkred;
  font-family: Georgia, serif;
}
```

Equivale a scrivere la stessa regola due volte, una per `h2` e una per `h3`, ma senza duplicare il codice.

## Suggerimenti

- Se un colore non compare dove ti aspetti, controlla se hai usato per errore uno spazio (discendente, "in tutta la profondità") dove serviva un `>` (solo figli diretti), o viceversa.
- `list-style: none` rimuove solo il pallino/numero, non altera la struttura della lista: `<ul>` e `<li>` restano elementi block, con la loro spaziatura predefinita (la vedremo meglio nell'esercizio sul box model).
- Estensione: prova ad aggiungere `.menu > section:first-of-type` (accenno di selettore avanzato) e osserva che colora solo la prima categoria.

## Soluzione

=== "index.html"
    ```html
    --8<-- "HTML-CSS-Javascript/Menu-pizzeria/index.html"
    ```
=== "style.css"
    ```css
    --8<-- "HTML-CSS-Javascript/Menu-pizzeria/style.css"
    ```

<div class="oc-embed"
     data-path="HTML-CSS-Javascript/Menu-pizzeria/index.html;HTML-CSS-Javascript/Menu-pizzeria/style.css"
     data-lang="html"
     data-autorun="true">
</div>
