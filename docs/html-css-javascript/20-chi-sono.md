# Pagina personale "Chi sono"

Scrivi il file `style.css` collegato al documento HTML già pronto (non modificarlo) integrando tutti i concetti visti nella sezione: variabili CSS per il colore "brand" e il raggio degli angoli; un'intestazione centrata con avatar circolare; tre sezioni-card con bordo, sfondo e angoli arrotondati; una citazione con virgolette decorative generate via CSS; un elenco di competenze senza puntini, con righe alternate e la prima voce in evidenza; una lista di link con i quattro stati (`:link`, `:visited`, `:hover`, `:active`) colorati in modo diverso.

## Obiettivo

Mettere insieme, in un'unica pagina, selettori di base e combinati, colori e unità di misura, tipografia, box model, pseudo-classi, pseudo-elementi e variabili CSS: tutto ciò che hai imparato in questa sezione.

## Anteprima

```
+------------------------------------------+
|                  (DP)                    | <- avatar, colore brand
|          Sono un programmatore           | <- h1, colore brand
|   Studente di Informatica e Telecom.     | <- .tagline
+------------------------------------------+

+------------------------------------------+
| Chi sono                                 | <- h2, colore brand
|                                           |
| “Imparare a programmare significa       | <- .motto, con virgolette
|  imparare a pensare in modo diverso.”   |    generate da ::before/::after
|                                           |
| Frequento l'indirizzo Informatica...    |
+------------------------------------------+   (card con bordo e angoli
                                                 arrotondati)
+------------------------------------------+
| Competenze                               |
| Java                <- prima voce, in    |
| C                       evidenza         |
| Bash                 <- righe alternate  |
| HTML e CSS              sfondo grigio    |
| JavaScript (in corso)                    |
+------------------------------------------+

+------------------------------------------+
| Link utili                               |
| Il mio GitHub        <- :link/:visited/  |
| MDN Web Docs             :hover/:active  |
+------------------------------------------+
```

## Descrizione

Non ci sono concetti nuovi in questo esercizio: è un riepilogo di tutta la sezione, applicato insieme su un'unica pagina realistica.

### Un unico tema di colori con le variabili

Definendo `--colore-brand` e `--raggio-bordo` una sola volta in `:root`, li ritrovi identici su avatar, bordi delle card, titoli e link — esattamente come nell'esercizio sul profilo social, ma qui applicati a più elementi contemporaneamente.

### Selettori raggruppati per i titoli

```css
h1, h2 {
  color: var(--colore-brand);
}
```

Una sola regola, come nell'esercizio sul menu della pizzeria, evita di ripetere lo stesso colore su ogni titolo della pagina.

### Card ripetute con lo stesso selettore raggruppato

```css
.chi-sono, .competenze, .contatti {
  border: 1px solid var(--colore-brand);
  border-radius: var(--raggio-bordo);
}
```

Le tre sezioni condividono lo stesso "stile di card" visto nell'esercizio sulla scheda prodotto, applicato qui a tre `<section>` diverse in un colpo solo.

## Suggerimenti

- Prova a costruire la pagina un pezzo alla volta: prima le variabili e i colori dei titoli, poi le card, poi la citazione, poi la lista di competenze, infine gli stati dei link — è più facile individuare un errore isolando un concetto per volta.
- Se un colore non cambia come previsto, ripensa alla specificità (esercizio sul biglietto da visita): un selettore più generico scritto dopo non batte automaticamente uno più specifico scritto prima.
- Questa stessa pagina tornerà come punto di partenza nella prossima sezione, per trasformarla con un vero layout a più colonne (Flexbox/Grid) e renderla responsive.

## Soluzione

=== "index.html"
    ```html
    --8<-- "HTML-CSS-Javascript/Chi-sono/index.html"
    ```
=== "style.css"
    ```css
    --8<-- "HTML-CSS-Javascript/Chi-sono/style.css"
    ```

<div class="oc-embed"
     data-path="HTML-CSS-Javascript/Chi-sono/index.html;HTML-CSS-Javascript/Chi-sono/style.css"
     data-lang="html"
     data-autorun="true">
</div>
