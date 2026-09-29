# Scheda di un linguaggio di programmazione

Scrivi il file `style.css` collegato al documento HTML già pronto (non modificarlo) in modo che: tutta la pagina usi un font senza grazie e uno sfondo grigio chiarissimo, il titolo `<h1>` sia blu scuro, tutti i paragrafi `<p>` siano grigio scuro, il paragrafo con classe `info` sia verde scuro e in grassetto, il paragrafo con id `nota` sia arancione.

## Obiettivo

Applicare uno stile diverso a elementi diversi usando i tre selettori CSS di base: elemento, classe e id.

## Anteprima

```
+--------------------------------------------------+
| Python                                           | <- h1, blu scuro
|                                                  |
| Python è un linguaggio di programmazione ad alto | <- p, grigio scuro
| livello, creato da Guido van Rossum e rilasciato |
| per la prima volta nel 1991.                     |
|                                                  |
| Paradigma: linguaggio multi-paradigma...         | <- p.info, verde
|                                                  |    scuro e grassetto
| Uno dei linguaggi più usati al mondo per...      | <- p#nota, arancione
+--------------------------------------------------+
   (sfondo grigio chiarissimo su tutta la pagina)
```

## Descrizione

### Collegare un foglio di stile: `<link>`

Un file CSS esterno viene collegato a una pagina HTML con un tag `<link>` dentro l'`<head>`, senza bisogno di `</link>` di chiusura:

```html
<link rel="stylesheet" href="style.css">
```

Da questo momento tutte le regole scritte in `style.css` si applicano alla pagina.

### Selettore di elemento

Un **selettore di elemento** applica uno stile a *tutti* i tag di quel tipo nella pagina, scrivendo semplicemente il nome del tag prima delle parentesi graffe:

```css
p {
  color: dimgray;
}
```

Questa regola colora di grigio scuro ogni `<p>` della pagina, senza eccezioni.

### Selettore di classe

Una **classe** (attributo `class` nell'HTML) permette di selezionare solo alcuni elementi, anche di tipo diverso tra loro, usando un punto seguito dal nome della classe:

```css
.info {
  font-weight: bold;
}
```

Nell'HTML, la classe si applica così: `<p class="info">...</p>`. A differenza dell'id, la stessa classe può essere riusata su più elementi della pagina.

### Selettore di id

Un **id** (attributo `id`) identifica un *singolo* elemento univoco nella pagina, e si seleziona con un cancelletto:

```css
#nota {
  color: darkorange;
}
```

Ogni `id` deve comparire una sola volta per pagina: se serve applicare lo stesso stile a più elementi, è la classe lo strumento giusto, non l'id.

## Suggerimenti

- Il selettore `body {}` è utile per regole "globali" come font e sfondo, che poi si propagano (per **eredità**) anche agli elementi al suo interno — ne parleremo meglio nell'esercizio sulla cascata.
- Controlla i nomi esatti: `class="info"` nell'HTML richiede `.info` nel CSS (col punto), `id="nota"` richiede `#nota` (col cancelletto) — punto e cancelletto non sono intercambiabili.
- Il selettore `p {}` colora *tutti* i paragrafi: se poi aggiungi anche `.info {}`, quel paragrafo specifico riceve entrambe le regole (torneremo su come si combinano nell'esercizio sulla cascata).

## Soluzione

=== "index.html"
    ```html
    --8<-- "HTML-CSS-Javascript/Scheda-linguaggio/index.html"
    ```
=== "style.css"
    ```css
    --8<-- "HTML-CSS-Javascript/Scheda-linguaggio/style.css"
    ```

<div class="oc-embed"
     data-path="HTML-CSS-Javascript/Scheda-linguaggio/index.html;HTML-CSS-Javascript/Scheda-linguaggio/style.css"
     data-lang="html"
     data-autorun="true">
</div>
