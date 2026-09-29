# Mini-sito di una città italiana

Scegli una città italiana che ti piace e costruisci un mini-sito che la descriva, di **almeno due pagine** collegate tra loro da una barra di navigazione comune (puoi aggiungerne altre, se vuoi approfondire ulteriori aspetti): una **Home** con una presentazione generale, dati rapidi in una tabella e una griglia di luoghi da vedere; una seconda pagina di **Storia e cultura** con un testo diviso in sezioni, una tabella cronologica, una galleria di immagini, una lista di curiosità e link a risorse esterne. Usa tutto quello che hai imparato finora — selettori, box model, Flexbox/Grid, media query, componenti Bootstrap — per un risultato completo e ben curato, con molto testo, non solo qualche riga segnaposto. La soluzione qui sotto usa Napoli come esempio.

## Obiettivo

Costruire, da solo, un mini-sito completo di più pagine su un argomento reale, mettendo insieme tutti i concetti HTML e CSS visti fino a questo punto del percorso, senza indicazioni passo-passo su cosa scrivere.

## Struttura

| File | Ruolo |
|---|---|
| `index.html` | Home: presentazione, dati rapidi, luoghi da vedere |
| `storia.html` | Storia e cultura: testo, tabella cronologica, galleria, curiosità, link |
| `style.css` | Stile condiviso dalle due pagine (sopra Bootstrap) |

## Anteprima

```
Home (index.html):                     Storia e cultura (storia.html):
+--------------------------+           +---------------------------+
| Napoli   Home  Storia... | <- navbar | Napoli   Home  Storia...  |
+--------------------------+           +---------------------------+
|      NAPOLI (hero con    |           | Storia e cultura          |
|   immagine di sfondo)    |           | Le origini greche...      |
+--------------------------+           | Napoli romana...          |
| Panoramica               |           | ...                       |
| Napoli è il capoluogo... |           +---------------------------+
+--------------------------+           | Tappe principali          |
| Dati rapidi              |           | (tabella cronologica)     |
| Regione | Campania       |           +---------------------------+
| ...                      |           | Galleria (2 immagini)     |
+--------------------------+           +---------------------------+
| Cosa vedere              |           | Curiosità (elenco)        |
| [Castello] [Spacc.] [S.M]|           | Per saperne di più (link) |
+--------------------------+           +---------------------------+
```

## Descrizione

Non ci sono concetti nuovi in questo esercizio: è il momento di mettere insieme, in un progetto reale e più grande dei precedenti, tutto ciò che hai imparato in questa sezione e nella precedente.

### Una navbar condivisa tra pagine diverse

Le due pagine collegano lo stesso `style.css` e ripetono lo stesso blocco `<nav>`, con gli stessi link — solo l'attributo `href` cambia da pagina a pagina (nella navbar di `storia.html`, ad esempio, il link "Storia e cultura" punta al file in cui ti trovi già). Duplicare la navbar in ogni pagina è normale in un sito fatto solo di HTML e CSS: eviterai questa ripetizione più avanti, quando JavaScript permetterà di generare parti di pagina dinamicamente.

### Combinare Bootstrap e CSS personalizzato

Le tabelle e le card usano le classi già pronte di Bootstrap (`table table-striped`, `card`, `row`/`col-*`), viste negli esercizi sull'introduzione a Bootstrap e sui suoi componenti. Lo `style.css` proprio del progetto aggiunge solo i dettagli che Bootstrap non prevede: l'immagine di sfondo dell'hero, l'altezza uniforme delle immagini nelle card (`object-fit: cover`), i colori del footer. Le due cose convivono senza conflitti perché il `<link>` a Bootstrap va sempre **prima** di quello a `style.css`: se una stessa proprietà viene dichiarata in entrambi, per la cascata (vista nell'esercizio sul biglietto da visita) vince il file collegato più in basso.

### Immagini reali da Wikimedia Commons

Come già visto per gli esercizi HTML della prima sottosezione, le immagini della soluzione usano URL diretti da Wikimedia Commons (formato `Special:FilePath`), che permettono di usarle come sorgente `<img>` senza doverne conoscere il percorso con hash.

## Suggerimenti

- Parti dalla struttura prima del contenuto: crea prima i due file HTML vuoti con la navbar e le sezioni `<h2>` senza testo, poi riempi una sezione alla volta — è più facile che scrivere tutto il testo e poi aggiungere l'HTML intorno.
- Se scegli una città diversa da Napoli, cerca le immagini su [Wikimedia Commons](https://commons.wikimedia.org) prima di scrivere il resto della pagina: sapere già quali immagini userai ti aiuta a decidere quante card servono nella griglia "Cosa vedere".
- Rileggi la tua pagina chiedendoti: "userei davvero questo sito per farmi un'idea sulla città?" — se la risposta è no, probabilmente manca ancora del testo, o le sezioni sono troppo scarne.

## Soluzione

=== "index.html"
    ```html
    --8<-- "HTML-CSS-Javascript/Citta-italiana/index.html"
    ```
=== "storia.html"
    ```html
    --8<-- "HTML-CSS-Javascript/Citta-italiana/storia.html"
    ```
=== "style.css"
    ```css
    --8<-- "HTML-CSS-Javascript/Citta-italiana/style.css"
    ```

<div class="oc-embed"
     data-path="HTML-CSS-Javascript/Citta-italiana/index.html;HTML-CSS-Javascript/Citta-italiana/storia.html;HTML-CSS-Javascript/Citta-italiana/style.css"
     data-lang="html"
     data-autorun="true">
</div>
