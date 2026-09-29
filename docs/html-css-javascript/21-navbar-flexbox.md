# Barra di navigazione

Scrivi il file `style.css` collegato al documento HTML già pronto (non modificarlo) in modo da ottenere una barra di navigazione scura, a tutta larghezza, con il logo a sinistra e le voci di menu allineate a destra, tutte sulla stessa riga e centrate verticalmente.

## Obiettivo

Allineare elementi su una riga usando Flexbox, invece di margini e `float` calcolati a mano.

## Anteprima

```
+--------------------------------------------------+
| CodeAcademy      Home  Corsi  Chi siamo  Contatti | <- .navbar (flex)
+--------------------------------------------------+
   (sfondo scuro, logo a sinistra, menu a destra,
    tutto centrato verticalmente sulla stessa riga)
```

## Descrizione

### Attivare Flexbox: `display: flex`

**`display: flex`** trasforma un elemento in un **contenitore flessibile** (*flex container*): tutti i suoi figli diretti diventano automaticamente **elementi flessibili** (*flex item*) e si dispongono, per impostazione predefinita, in riga, uno di fianco all'altro.

```css
.navbar {
  display: flex;
}
```

Da solo, `display: flex` già dispone `.logo` e `.menu` sulla stessa riga: prima di Flexbox, per ottenere lo stesso risultato si usavano tecniche più macchinose come i `float`.

### Distribuire lo spazio: `justify-content`

**`justify-content`** controlla come gli elementi flessibili si distribuiscono lungo l'**asse principale** (orizzontale, di default). **`space-between`** spinge il primo elemento a un estremo e l'ultimo all'altro, distribuendo lo spazio rimanente tra quelli in mezzo:

```css
.navbar {
  display: flex;
  justify-content: space-between;
}
```

Altri valori comuni: `center` (tutti al centro), `flex-start`/`flex-end` (tutti da un lato), `space-around` (spazio anche ai due estremi).

### Allineare sull'asse trasversale: `align-items`

**`align-items`** fa lo stesso lavoro di `justify-content`, ma sull'**asse trasversale** (verticale, quando l'asse principale è orizzontale). **`center`** centra verticalmente gli elementi, anche se hanno altezze diverse tra loro:

```css
.navbar {
  align-items: center;
}
```

Senza questa proprietà, `.logo` e le voci di `.menu` potrebbero risultare disallineati verticalmente se non hanno esattamente la stessa altezza.

### Spaziare gli elementi: `gap`

**`gap`** inserisce uno spazio fisso tra gli elementi flessibili, senza dover aggiungere margini manuali su ciascuno (che andrebbero tolti sul primo o sull'ultimo per non sbilanciare il contenitore):

```css
.menu {
  display: flex;
  gap: 24px;
}
```

## Suggerimenti

- `.menu` è sia un elemento flessibile di `.navbar` (per il posizionamento a destra) sia, a sua volta, un contenitore flessibile per i propri `<li>` (per la spaziatura interna con `gap`): un elemento può avere entrambi i ruoli contemporaneamente, in relazione a genitore e figli diversi.
- Se le voci del menu non si allineano come previsto, controlla di aver messo `list-style: none` e `margin`/`padding` a `0` su `.menu`: un `<ul>` porta con sé una spaziatura predefinita del browser che altrimenti si somma a quella di Flexbox.
- Estensione: prova a cambiare `justify-content` in `center` e osserva come logo e menu si compattano al centro della barra, invece di stare ai due estremi.

## Soluzione

=== "index.html"
    ```html
    --8<-- "HTML-CSS-Javascript/Navbar-flexbox/index.html"
    ```
=== "style.css"
    ```css
    --8<-- "HTML-CSS-Javascript/Navbar-flexbox/style.css"
    ```

<div class="oc-embed"
     data-path="HTML-CSS-Javascript/Navbar-flexbox/index.html;HTML-CSS-Javascript/Navbar-flexbox/style.css"
     data-lang="html"
     data-autorun="true">
</div>
