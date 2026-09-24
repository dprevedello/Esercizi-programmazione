# Elementi block e inline

Riproduci **esattamente** questo testo in pagina, in due paragrafi separati (elementi block), evidenziando con `<strong>` le parole in **grassetto** e con `<em>` le parole in *corsivo* indicate qui sotto, e racchiudendo in uno `<span>` con classe `termine-tecnico` le parole sottolineate:

Paragrafo 1: "Negli ultimi anni l'**intelligenza artificiale** è entrata sempre più nelle scuole italiane. Molti istituti tecnici hanno introdotto corsi dedicati al <u>machine learning</u> e alla programmazione."

Paragrafo 2: "Gli studenti imparano a usare strumenti come i <u>chatbot</u> non solo per studiare, ma anche per *capire come funzionano davvero* dietro le quinte."

## Obiettivo

Osservare la differenza di comportamento tra elementi di tipo block (che occupano una riga intera) ed elementi di tipo inline (che restano nel flusso del testo).

## Anteprima

```
+------------------------------------------+
| Negli ultimi anni l'intelligenza         | <- p (block) - "intelligenza
| artificiale è entrata sempre più nelle   | <- artificiale" in grassetto,
| scuole italiane. Molti istituti tecnici  | <- "machine learning" dentro
| hanno introdotto corsi dedicati al       | <- uno span
| machine learning e alla programmazione.  |
|                                          |
| Gli studenti imparano a usare strumenti  | <- p (block) - "chatbot" dentro
| come i chatbot non solo per studiare, ma | <- uno span, "capire come...
| anche per capire come funzionano davvero | <- davvero" in corsivo
| dietro le quinte.                        |
+------------------------------------------+
```

## Descrizione

### Elementi block

Un elemento **block** occupa sempre tutta la larghezza disponibile e forza un "a capo" prima e dopo di sé: `<p>`, `<div>`, `<h1>`-`<h6>` sono tutti elementi block. Per questo, due paragrafi consecutivi appaiono sempre su righe separate, anche se nel codice sorgente non c'è nessuna riga vuota tra loro.

### Elementi inline

Un elemento **inline** invece resta nel flusso del testo, senza andare a capo: `<span>`, `<strong>`, `<em>`, `<a>` sono inline. Più elementi inline consecutivi restano sulla stessa riga, uno di seguito all'altro, esattamente come farebbero singole parole.

### Enfasi del testo: `strong` ed `em`

**`strong`** indica testo di forte importanza (il browser lo mostra in grassetto). **`em`** indica testo con enfasi (il browser lo mostra in corsivo). A differenza di `span`, questi tag comunicano anche un significato, non solo uno stile.

```html
<p>Il termine <strong>importante</strong> e il termine <em>enfatizzato</em>.</p>
```

## Suggerimenti

- Prova a contare quante righe occupano i due paragrafi nell'anteprima: nessun elemento inline al loro interno li farà mai "spezzare" in blocchi separati.
- `span` da solo non cambia l'aspetto del testo: la classe `termine-tecnico` non avrà ancora nessun effetto finché non introdurremo il CSS, ma è già una buona abitudine prepararla in anticipo.
- Non usare `<strong>`/`<em>` solo per "fare grassetto/corsivo": servono per dare importanza reale a una parola, non come scorciatoia di formattazione.

## Soluzione

```html
--8<-- "HTML-CSS-Javascript/Block-vs-inline/index.html"
```

<div class="oc-embed"
     data-path="HTML-CSS-Javascript/Block-vs-inline/index.html"
     data-lang="html"
     data-autorun="true">
</div>
