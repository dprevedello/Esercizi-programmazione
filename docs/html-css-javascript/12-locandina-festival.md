# Locandina di un festival musicale

Scrivi il file `style.css` collegato al documento HTML già pronto (non modificarlo) in modo da ottenere una locandina: sfondo blu notte, testo bianco e centrato, titolo enorme in un font decorativo importato da Google Fonts, sottotitolo in grassetto, riga con data e luogo più piccola e con interlinea più ampia.

## Obiettivo

Curare l'aspetto tipografico di una pagina usando famiglie di font (incluso un web font esterno), dimensioni, peso, allineamento e interlinea del testo.

## Anteprima

```
+--------------------------------------------+
|            (sfondo blu notte)               |
|                                              |
|            SUONI D'ESTATE                   | <- h1, font Bebas Neue,
|                                              |    enorme, centrato
|       Festival musicale indipendente        | <- .sottotitolo, grassetto
|                                              |
|    12-14 luglio · Parco della Città ·      | <- .dettagli, più piccolo,
|          Ingresso gratuito                  |    interlinea ampia
+--------------------------------------------+
```

## Descrizione

### Importare un web font: Google Fonts

Oltre ai font già installati sul computer di chi visita la pagina, si può caricare un **web font** da un servizio esterno come **Google Fonts**: basta collegare il suo foglio di stile con un `<link>` nell'`<head>`, prima del proprio `style.css`, e poi richiamare il nome del font con `font-family`.

```html
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
```

```css
h1 {
  font-family: 'Bebas Neue', sans-serif;
}
```

Il secondo valore (`sans-serif`) è un **font di riserva**: se per qualche motivo il web font non si carica (rete assente, servizio non raggiungibile), il browser usa comunque un font simile invece di mostrare il testo con un aspetto casuale.

!!! info "Anteprima nella sandbox"
    Il riquadro qui sotto mostra il rendering della pagina all'interno di OneCompiler: se la sandbox non ha accesso a Google Fonts, il titolo comparirà con il font di riserva (`sans-serif`) invece di Bebas Neue. Per vedere il font decorativo vero e proprio, apri il file `index.html` in locale con un browser connesso a Internet.

### Dimensione del testo: `font-size`

**`font-size`** imposta la dimensione del testo. L'unità **`rem`** è relativa alla dimensione di base del documento (di solito 16px): `2rem` significa "il doppio della dimensione base", ed è preferibile a `px` per il testo perché si adatta se l'utente cambia le impostazioni di accessibilità del browser.

```css
h1 {
  font-size: 4rem; /* molto più grande del testo normale */
}
```

### Peso e allineamento: `font-weight`, `text-align`

**`font-weight`** controlla quanto è "spesso" il testo (`400` è il peso normale, `700` è grassetto — corrisponde a quello che fa `<strong>`, ma applicato via CSS a qualsiasi elemento). **`text-align`** controlla l'allineamento orizzontale del testo dentro il suo elemento (`center`, `left`, `right`, `justify`).

```css
.sottotitolo {
  font-weight: 700;
  text-align: center;
}
```

### Spaziatura tra le righe: `line-height`

**`line-height`** imposta la distanza tra una riga di testo e la successiva, quando il testo va a capo su più righe. Un valore senza unità (es. `1.5`) è un moltiplicatore della dimensione del font: `line-height: 1.5` significa "una riga e mezza di spazio".

```css
.dettagli {
  line-height: 1.5; /* righe più distanziate, testo più leggibile */
}
```

## Suggerimenti

- Il nome di un font con più parole (es. `Bebas Neue`) va racchiuso tra apici in `font-family`, esattamente come compare nel parametro `family=` dell'URL di Google Fonts (con `+` al posto degli spazi).
- Metti sempre un font di riserva generico (`sans-serif` o `serif`) dopo il nome del web font: senza, un font non caricato lascia la scelta del carattere al browser, con risultati imprevedibili.
- Prova a confrontare `line-height: 1` (usato sul titolo, per un blocco compatto) con `line-height: 1.5` (usato sui dettagli, per maggiore leggibilità su più righe).

## Soluzione

=== "index.html"
    ```html
    --8<-- "HTML-CSS-Javascript/Locandina-festival/index.html"
    ```
=== "style.css"
    ```css
    --8<-- "HTML-CSS-Javascript/Locandina-festival/style.css"
    ```

<div class="oc-embed"
     data-path="HTML-CSS-Javascript/Locandina-festival/index.html;HTML-CSS-Javascript/Locandina-festival/style.css"
     data-lang="html"
     data-autorun="true">
</div>
