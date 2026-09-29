# Componenti Bootstrap

Crea da zero una pagina `index.html` (Bootstrap via CDN, nessun `style.css`) con una barra di navigazione scura in alto (nome del sito a sinistra, tre link a destra) e, sotto, tre schede evento affiancate — ciascuna con titolo, data, breve descrizione e un pulsante "Dettagli" — che si impilano sugli schermi stretti.

## Obiettivo

Usare i componenti pronti di Bootstrap (barra di navigazione e card) insieme alla griglia già vista nell'esercizio precedente, per costruire una pagina completa senza scrivere CSS personalizzato.

## Anteprima

```
+-------------------------------------------+
| Eventi in Città       Musica Sport Cultura| <- navbar (bg-dark)
+---------------+---------------+-----------+
| Concerto in   | Maratona      | Mostra    |
| piazza        | cittadina     | fotogr.   | <- card, in una row
| 12 ottobre    | 25 ottobre    | 2 nov.    |
| [ Dettagli ]  | [ Dettagli ]  | [Dett.]   |
+---------------+---------------+-----------+
```

## Descrizione

### La barra di navigazione: `navbar`

La classe **`navbar`** crea una barra di navigazione già pronta; combinata con **`navbar-dark`** e una classe di colore come **`bg-dark`**, applica automaticamente uno sfondo scuro con testo chiaro leggibile:

```html
<nav class="navbar navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="#">Eventi in Città</a>
    ...
  </div>
</nav>
```

**`navbar-brand`** è pensata per il nome o il logo del sito, con uno stile già distinto dal resto dei link.

### Allineare gli elementi con le classi di utilità Flexbox

Anche Flexbox ha le sue classi di utilità in Bootstrap: **`d-flex`** equivale a scrivere `display: flex` a mano, e **`gap-3`** equivale a un `gap` di una certa dimensione predefinita — la stessa proprietà vista nell'esercizio sulla barra di navigazione con CSS puro, qui applicata senza scrivere una riga di CSS:

```html
<div class="d-flex gap-3">
  <a class="nav-link text-white" href="#">Musica</a>
  ...
</div>
```

### Il componente `card`

Una **`card`** è un riquadro con bordo e angoli arrotondati già pronto, pensato per contenere un blocco di contenuto autonomo (esattamente il ruolo della "Scheda prodotto" costruita a mano in un esercizio precedente). Al suo interno, **`card-body`** aggiunge lo spazio interno (il *padding*), e classi come **`card-title`**/**`card-subtitle`**/**`card-text`** danno agli elementi tipografici lo stile coerente previsto dal componente:

```html
<div class="card h-100">
  <div class="card-body">
    <h5 class="card-title">Concerto in piazza</h5>
    <p class="card-subtitle text-muted mb-2">12 ottobre 2026</p>
    <p class="card-text">Una serata di musica dal vivo...</p>
    <a href="#" class="btn btn-primary">Dettagli</a>
  </div>
</div>
```

**`h-100`** (altezza 100%) fa in modo che tutte le card di una stessa riga abbiano la stessa altezza, anche se il testo al loro interno ha lunghezze diverse — senza, la card con meno testo risulterebbe più corta delle altre.

### Il componente `btn`

**`btn`** trasforma un elemento (qui, un link `<a>`) in un pulsante con stile predefinito; **`btn-primary`** applica il colore "principale" del tema Bootstrap (blu, per impostazione predefinita).

## Suggerimenti

- Le tre card sono ciascuna dentro un `col-md-4` (visto nell'esercizio precedente): è la combinazione di `row`/`col-*` con il componente `card` che permette di affiancarle e farle impilare responsivamente, senza scrivere altro codice.
- Questa `navbar` non ha il pulsante "hamburger" per collassare i link su schermi piccoli (quella funzione richiede il modulo JavaScript di Bootstrap, che non useremo in questa sezione): qui i link restano sempre visibili, andando eventualmente a capo con `flex-wrap` se lo spazio non basta.
- Estensione: prova a cambiare `btn-primary` in `btn-outline-primary` (bottone col solo contorno colorato) o `btn-success` (verde) e osserva come Bootstrap applica automaticamente una palette di colori coerente in tutto il sito.

## Soluzione

```html
--8<-- "HTML-CSS-Javascript/Catalogo-eventi/index.html"
```

<div class="oc-embed"
     data-path="HTML-CSS-Javascript/Catalogo-eventi/index.html"
     data-lang="html"
     data-autorun="true">
</div>
