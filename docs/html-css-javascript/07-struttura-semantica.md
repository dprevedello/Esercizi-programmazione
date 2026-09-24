# Struttura semantica HTML5

Crea una pagina in stile sito di news con **esattamente** questa struttura: `header` con il titolo del sito "TechNews Scuola"; `nav` con tre link "Home", "Articoli", "Chi siamo"; `main` con una `section` che contiene l'articolo "L'intelligenza artificiale nella scuola" (scrivi un breve testo introduttivo di 2-3 frasi, con parole tue); `aside` con il titolo "Articoli correlati" e due link di esempio; `footer` con il testo "© 2026 TechNews Scuola".

## Obiettivo

Sostituire i generici `div` con gli elementi semantici di HTML5, dando un significato preciso a ogni parte della pagina.

## Anteprima

```
+---------------------------------------------+
| TechNews Scuola                             | <- header
+---------------------------------------------+
| Home | Articoli | Chi siamo                 | <- nav
+---------------------------------------------+
| L'intelligenza artificiale      | Articoli  | <- main > section   aside
| nella scuola                    | correlati |
|                                  |          |
| Testo introduttivo di 2-3       | - Link 1  |
| frasi scritto con parole tue... | - Link 2  |
+---------------------------------------------+
| (c) 2026 TechNews Scuola                    | <- footer
+---------------------------------------------+
```

## Descrizione

### Perché non bastano i `div`

Fino a questo esercizio abbiamo raggruppato contenuti con `<div>`, un contenitore che non dice nulla sul suo significato. HTML5 introduce elementi che invece descrivono **cosa rappresenta** quel blocco di pagina: aiutano sia chi legge il codice sia i motori di ricerca e i software di lettura per non vedenti a capire la struttura della pagina senza dover indovinare dai nomi delle classi.

### `header`, `nav`, `main`, `footer`

**`header`** racchiude l'intestazione di una pagina (o di una sezione): tipicamente logo e titolo. **`nav`** racchiude i collegamenti di navigazione principali del sito. **`main`** contiene il contenuto principale, unico per ogni pagina (non va ripetuto, ad esempio, in ogni pagina del sito come invece accade per header/footer). **`footer`** racchiude le informazioni di chiusura, come il copyright.

```html
<header>...</header>
<nav>...</nav>
<main>...</main>
<footer>...</footer>
```

### `section` e `aside`

**`section`** raggruppa una sezione tematica di contenuto, di solito introdotta da un titolo. **`aside`** contiene contenuto correlato ma secondario rispetto al contenuto principale, come una barra laterale con link ad articoli simili.

```html
<main>
  <section>
    <h2>Titolo dell'articolo</h2>
    <p>Testo dell'articolo...</p>
  </section>
</main>
<aside>
  <h2>Articoli correlati</h2>
  ...
</aside>
```

## Suggerimenti

- `header`, `nav`, `main`, `aside` e `footer` possono comparire una sola volta a livello di pagina (tranne `header`/`footer`, che si possono anche ripetere dentro una `section`); `section` invece se ne possono usare quante servono.
- Non serve alcun `<div>` in questo esercizio: ogni blocco della pagina ha già un elemento semantico corrispondente.
- Il testo dell'articolo va scritto con parole tue: basta un'idea plausibile, non serve che sia un articolo vero.

## Soluzione

```html
--8<-- "HTML-CSS-Javascript/Struttura-semantica/index.html"
```

<div class="oc-embed"
     data-path="HTML-CSS-Javascript/Struttura-semantica/index.html"
     data-lang="html"
     data-autorun="true">
</div>
