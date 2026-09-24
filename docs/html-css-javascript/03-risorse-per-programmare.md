# Liste e link

Crea una pagina "Risorse per imparare a programmare" con una lista puntata contenente **esattamente questi cinque link**, ciascuno con il nome del sito come testo del link:

- MDN Web Docs → `https://developer.mozilla.org`
- W3Schools → `https://www.w3schools.com`
- freeCodeCamp → `https://www.freecodecamp.org`
- javascript.info → `https://javascript.info`
- GitHub → `https://github.com`

Sotto la lista, aggiungi un titolo "Linguaggi più diffusi" e una lista numerata con i primi 5 linguaggi dell'indice TIOBE più recente che riesci a trovare (vai su tiobe.com/tiobe-index, controlla la classifica attuale e riportala).

## Obiettivo

Presentare un elenco di elementi usando liste puntate e numerate, e collegare ciascun elemento a una risorsa esterna reale.

## Anteprima

```
+------------------------------------+
| Risorse per imparare a programmare | <- h1
|                                    |
| - MDN Web Docs                     | <- lista puntata (link)
| - W3Schools                        |
| - freeCodeCamp                     |
| - javascript.info                  |
| - GitHub                           |
|                                    |
| Linguaggi più diffusi              | <- h2
| 1. ...                             | <- lista numerata
| 2. ...                             |
| 3. ...                             |
| 4. ...                             |
| 5. ...                             |
+------------------------------------+
```

## Descrizione

### Liste non ordinate: `ul` e `li`

Una **lista puntata** si crea con l'elemento **`ul`** (*unordered list*), che contiene una o più voci **`li`** (*list item*). Il browser mostra automaticamente un pallino davanti a ogni voce.

```html
<ul>
  <li>Prima voce</li>
  <li>Seconda voce</li>
</ul>
```

### Liste ordinate: `ol`

Una **lista numerata** funziona allo stesso modo ma usa l'elemento **`ol`** (*ordered list*): il browser numera automaticamente le voci, quindi non serve scrivere "1.", "2." a mano.

```html
<ol>
  <li>Prima voce</li>
  <li>Seconda voce</li>
</ol>
```

### Link dentro una lista

Un elemento `<a>` può stare tranquillamente dentro un `<li>`: la voce della lista diventa così cliccabile, come nell'esempio della sitografia.

```html
<li><a href="https://developer.mozilla.org">MDN Web Docs</a></li>
```

## Suggerimenti

- Non confondere `ul`/`ol` (la lista) con `li` (la singola voce): ogni voce deve stare dentro un `<li>`, mai fuori.
- La classifica TIOBE cambia nel tempo: quello che conta in questo esercizio è che i dati inseriti corrispondano a quello che hai trovato controllando la fonte, non un valore "giusto" a priori.
- Verifica che tutti e cinque i link siano scritti correttamente (con `https://`), altrimenti il browser non li aprirà.

## Soluzione

```html
--8<-- "HTML-CSS-Javascript/Risorse-per-programmare/index.html"
```

<div class="oc-embed"
     data-path="HTML-CSS-Javascript/Risorse-per-programmare/index.html"
     data-lang="html"
     data-autorun="true">
</div>

!!! info "Classifica linguaggi"
    La lista numerata della soluzione riporta una classifica indicativa (Python, C++, Java, C, C#), stabile negli ultimi anni ma non necessariamente identica a quella che trovi oggi su TIOBE: controlla sempre la fonte aggiornata.
