---
icon: material/language-html5
---

# :material-language-html5::material-language-css3::material-language-javascript: HTML / CSS / JavaScript

**HTML**, **CSS** e **JavaScript** sono le tre tecnologie fondamentali del web.
Insieme permettono di creare pagine e applicazioni web interattive: HTML definisce
la struttura, CSS si occupa dell'aspetto visivo, JavaScript aggiunge il comportamento
dinamico.

È il punto di partenza ideale per chiunque voglia avvicinarsi allo sviluppo web,
perché i risultati sono visibili immediatamente nel browser senza alcuna configurazione.

---

## Cosa imparerai

- Strutturare una pagina con i tag HTML: titoli, paragrafi, liste, tabelle, form
- Selettori CSS e il modello a cascata: classi, ID, specificità
- Layout moderni con **Flexbox** e **CSS Grid**
- Responsive design e media query
- Le basi di **Bootstrap**, il framework CSS più diffuso
- Manipolare il DOM con JavaScript: selezionare elementi, modificarli, reagire agli eventi
- Variabili, funzioni, cicli, condizioni e array in JavaScript, sempre applicati a una pagina web
- Gestione degli eventi: `click`, `input`, `submit`…
- Costruire piccole applicazioni e **giochi nel browser**: dadi, quiz, memory, tris…

---

## Aprire i file nel browser

!!! note "Nessuna installazione necessaria"
    Per iniziare basta un editor di testo e un browser. Crea un file `index.html`,
    aprilo con il browser trascinandolo nella finestra e il gioco è fatto.
    Per progetti più strutturati puoi usare l'estensione **Live Server** su VS Code.

---

## Esercizi disponibili

Il percorso procede per **concetti isolati**: prima solo HTML, poi solo CSS (stile di base e
layout moderno con Bootstrap), poi JavaScript, che qui si impara **dentro la pagina web**
(leggere i campi di un modulo, reagire ai clic, scrivere il risultato nella pagina) e si mette
alla prova con piccoli giochi. Negli esercizi CSS e JavaScript il file HTML è già pronto e non
va modificato: lo studente scrive solo `style.css` oppure `script.js`.

### 1. HTML — Fondamentali :material-language-html5:

| # | Esercizio | Argomento | Difficoltà |
|---|-----------|-----------|------------|
| 01 | [Prima pagina HTML](01-prima-pagina.md) | `!DOCTYPE`, `html`, `head`, `title`, `body`, `h1`, `p` | :material-circle-outline: Base |
| 02 | [Titoli e paragrafi di testo](02-alan-turing.md) | Gerarchia `h1`-`h6`, `a`, `target="_blank"` | :material-circle-outline: Base |
| 03 | [Liste e link](03-risorse-per-programmare.md) | `ul`, `ol`, `li`, link dentro le liste | :material-circle-outline: Base |
| 04 | [Immagini e tabelle](04-commodore-vs-apple.md) | `img`, `alt`, `table`, `tr`, `th`, `td`, `thead`/`tbody` | :material-circle-slice-4: Intermedio |
| 05 | [Div, span, class e id](05-film-preferiti.md) | `div`, `span`, `class`, `id` | :material-circle-slice-4: Intermedio |
| 06 | [Elementi block e inline](06-block-vs-inline.md) | Block vs inline, `strong`, `em` | :material-circle-slice-4: Intermedio |
| 07 | [Struttura semantica HTML5](07-struttura-semantica.md) | `header`, `nav`, `main`, `section`, `aside`, `footer` | :material-circle-slice-4: Intermedio |
| 08 | [Form: campi di base](08-form-contatti.md) | `form`, `input`, `label`, `button` | :material-circle-slice-4: Intermedio |
| 09 | [Form avanzato](09-form-iscrizione.md) | `select`, `textarea`, `checkbox`, `radio`, `fieldset`/`legend` | :material-circle: Avanzato |

### 2. CSS — Selettori e stile di base :material-language-css3:

| # | Esercizio | Argomento | Difficoltà |
|---|-----------|-----------|------------|
| 10 | [Scheda di un linguaggio di programmazione](10-scheda-linguaggio.md) | Selettori di elemento, classe e id, `<link>` | :material-circle-outline: Base |
| 11 | [Semaforo](11-semaforo.md) | Colori (nome/hex/`rgb()`), unità `px`/`%`, `border-radius` | :material-circle-outline: Base |
| 12 | [Locandina di un festival musicale](12-locandina-festival.md) | `font-family`, Google Fonts, `font-size`, `font-weight`, `text-align`, `line-height` | :material-circle-slice-4: Intermedio |
| 13 | [Menu di una pizzeria](13-menu-pizzeria.md) | Selettore discendente, figlio diretto (`>`), gruppo con virgola | :material-circle-slice-4: Intermedio |
| 14 | [Classifica di un torneo eSport](14-classifica-torneo.md) | `list-style`, `:first-child`, `:last-child`, `:nth-child()` | :material-circle-slice-4: Intermedio |
| 15 | [Sitografia dei linguaggi studiati](15-webliografia.md) | `:link`, `:visited`, `:hover`, `:active` | :material-circle-slice-4: Intermedio |
| 16 | [Biglietto da visita digitale](16-biglietto-da-visita.md) | Cascata, ereditarietà, specificità | :material-circle-slice-4: Intermedio |
| 17 | [Scheda prodotto e-commerce](17-scheda-prodotto.md) | Box model: `margin`, `padding`, `border`, `background-color` | :material-circle-slice-4: Intermedio |
| 18 | [Profilo social](18-profilo-social.md) | Variabili CSS: `:root`, `var()` | :material-circle: Avanzato |
| 19 | [Blocco citazioni](19-blocco-citazioni.md) | `::before`, `::after`, `content` | :material-circle: Avanzato |
| 20 | [Pagina personale "Chi sono"](20-chi-sono.md) | Mini-progetto: tutti i concetti della sezione | :material-circle: Avanzato |

### 3. CSS — Layout moderno :material-view-grid-outline:

| # | Esercizio | Argomento | Difficoltà |
|---|-----------|-----------|------------|
| 21 | [Barra di navigazione](21-navbar-flexbox.md) | Flexbox: `display: flex`, `justify-content`, `align-items`, `gap` | :material-circle-outline: Base |
| 22 | [Vetrina di libri](22-vetrina-libri.md) | Flexbox: `flex-direction`, `flex-wrap`, `flex-grow`/`shrink`/`basis` | :material-circle-slice-4: Intermedio |
| 23 | [Galleria fotografica](23-galleria-fotografica.md) | Grid: `grid-template-columns`/`rows`, `gap` | :material-circle-slice-4: Intermedio |
| 24 | [Layout di un blog](24-layout-blog.md) | Grid: `grid-template-areas`, `grid-area` | :material-circle-slice-4: Intermedio |
| 25 | [Badge di notifica e "torna su"](25-badge-notifica.md) | `position: relative`/`absolute`/`fixed`, `z-index` | :material-circle-slice-4: Intermedio |
| 26 | [Card responsive](26-card-responsive.md) | Media query, approccio mobile-first | :material-circle-slice-4: Intermedio |
| 27 | [Pagina "Chi sono" v2](27-chi-sono-v2.md) | Mini-progetto: Grid + Flexbox + media query | :material-circle: Avanzato |
| 28 | [Introduzione a Bootstrap](28-bootstrap-grid.md) | `container`, `row`, `col-*` | :material-circle-outline: Base |
| 29 | [Componenti Bootstrap](29-catalogo-eventi.md) | `navbar`, `card`, `btn`, classi di utilità | :material-circle-slice-4: Intermedio |
| 30 | [Mini-sito di una città italiana](30-citta-italiana.md) | Mini-progetto finale: sito multi-pagina con Bootstrap | :material-circle: Avanzato |

### 4. JavaScript — La pagina diventa interattiva :material-language-javascript:

| # | Esercizio | Argomento | Difficoltà |
|---|-----------|-----------|------------|
| 31 | [Primo script](31-primo-script.md) | `<script>`, funzioni, `getElementById`, `textContent`, `onclick` | :material-circle-outline: Base |
| 32 | [Somma di due numeri](32-somma-due-numeri.md) | Variabili `const`, `value`, `Number()`, concatenazione | :material-circle-outline: Base |
| 33 | [Calcolatrice](33-calcolatrice.md) | Funzioni con parametri, `if`/`else if`/`else`, `===` | :material-circle-outline: Base |
| 34 | [Media dei voti](34-media-voti.md) | Operatori logici (and/or), `className`, `toFixed()` | :material-circle-slice-4: Intermedio |
| 35 | [Contatore](35-contatore.md) | Eventi, `addEventListener`, variabili globali | :material-circle-outline: Base |
| 36 | [Contatore di caratteri](36-contatore-caratteri.md) | Evento `input`, `length`, `toUpperCase()` | :material-circle-slice-4: Intermedio |
| 37 | [Tabelline](37-tabelline.md) | Ciclo `for`, `innerHTML` | :material-circle-slice-4: Intermedio |
| 38 | [Lista della spesa](38-lista-spesa.md) | Array, `push`, `trim()`, ridisegnare la pagina dai dati | :material-circle-slice-4: Intermedio |
| 39 | [Registrazione con controllo dei dati](39-registrazione.md) | Mini-progetto: `submit`, `preventDefault`, `includes`, `checked` | :material-circle: Avanzato |

### 5. JavaScript — Giochi nel browser :material-gamepad-variant-outline:

| # | Esercizio | Argomento | Difficoltà |
|---|-----------|-----------|------------|
| 40 | [Lancio dei dadi](40-lancio-dadi.md) | `Math.random`, `Math.floor`, `return`, array e indici | :material-circle-outline: Base |
| 41 | [Indovina il numero](41-indovina-numero.md) | Stato del gioco, `disabled`, funzione di avvio | :material-circle-slice-4: Intermedio |
| 42 | [Sasso, carta, forbici](42-sasso-carta-forbici.md) | Scelte come numeri, condizioni composte, punteggio | :material-circle-slice-4: Intermedio |
| 43 | [Quiz a risposta multipla](43-quiz.md) | Array di array, cicli, `hidden` | :material-circle-slice-4: Intermedio |
| 44 | [Memory](44-memory.md) | Mescolare un array, `setTimeout`, `return` anticipato | :material-circle: Avanzato |
| 45 | [Tris](45-tris.md) | Array come tavola, turni, combinazioni vincenti | :material-circle: Avanzato |
| 46 | [Colpisci la talpa](46-colpisci-talpa.md) | `setInterval`, `clearInterval`, due timer | :material-circle: Avanzato |
| 47 | [Gioco a scelta](47-gioco-a-scelta.md) | Mini-progetto finale: gioco libero (riferimento: impiccato) | :material-circle: Avanzato |

---

## Risorse utili

- [MDN Web Docs](https://developer.mozilla.org/it/) — la documentazione di riferimento per il web
- [W3Schools](https://www.w3schools.com) — tutorial interattivi con editor integrato
- [CSS-Tricks](https://css-tricks.com) — guide pratiche su layout e animazioni CSS
- [javascript.info](https://javascript.info) — corso completo e moderno su JavaScript
- [Bootstrap](https://getbootstrap.com) — documentazione ufficiale del framework
