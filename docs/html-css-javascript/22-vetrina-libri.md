# Vetrina di libri

Scrivi il file `style.css` collegato al documento HTML già pronto (non modificarlo) in modo che le schede dei libri si dispongano su più righe quando non c'entrano tutte in larghezza, invece di restringersi all'infinito o uscire dallo schermo, e si allarghino per riempire lo spazio disponibile quando ce n'è di più.

## Obiettivo

Costruire una vetrina di elementi che si adatta allo spazio disponibile, usando `flex-wrap` e le proprietà di flessibilità (`flex-grow`, `flex-shrink`, `flex-basis`).

## Anteprima

```
Finestra larga:
+-----------------------------------------------+
| [Libro 1] [Libro 2] [Libro 3] [Libro 4] [Libro 5]  <- tutti sulla stessa riga,
+-----------------------------------------------+     leggermente allargati

Finestra stretta:
+------------------------+
| [Libro 1]   [Libro 2]  | <- va a capo su più righe,
| [Libro 3]   [Libro 4]  |    invece di restringersi
| [Libro 5]              |    troppo o uscire dai margini
+------------------------+
```

## Descrizione

### Andare a capo: `flex-wrap`

Per impostazione predefinita, Flexbox cerca di tenere tutti gli elementi flessibili su **una sola riga**, restringendoli quanto basta per farceli entrare — anche troppo, se sono molti. **`flex-wrap: wrap`** permette invece agli elementi di andare a capo su più righe quando non c'è più spazio orizzontale:

```css
.vetrina {
  display: flex;
  flex-wrap: wrap;
}
```

### La direzione dell'asse principale: `flex-direction`

**`flex-direction`** decide se l'asse principale di un contenitore flessibile è orizzontale (`row`, il valore predefinito) o verticale (`column`). Impostarlo esplicitamente a `row` non cambia nulla rispetto al comportamento predefinito, ma rende la scelta leggibile a chi rilegge il codice:

```css
.vetrina {
  flex-direction: row;
}
```

### Crescere e restringersi: `flex-grow` e `flex-shrink`

**`flex-grow`** stabilisce se e quanto un elemento flessibile può **allargarsi** per occupare lo spazio libero rimasto nella riga; un valore di `0` (il predefinito) impedisce all'elemento di crescere, un valore positivo gli permette di farlo. **`flex-shrink`** fa il lavoro opposto: stabilisce se l'elemento può **restringersi** quando lo spazio non basta per tutti.

```css
.libro {
  flex-grow: 1;   /* può allargarsi per riempire spazio libero */
  flex-shrink: 1; /* può restringersi se lo spazio scarseggia */
}
```

### La dimensione di partenza: `flex-basis`

**`flex-basis`** imposta la dimensione "di partenza" di un elemento flessibile, prima che `flex-grow`/`flex-shrink` la modifichino in base allo spazio disponibile: è come una `width` pensata apposta per il contesto flessibile.

```css
.libro {
  flex-basis: 180px; /* punto di partenza: 180px, poi si adatta */
}
```

## Suggerimenti

- Le tre proprietà `flex-grow`, `flex-shrink` e `flex-basis` si scrivono spesso insieme con l'abbreviazione `flex: <grow> <shrink> <basis>` (qui: `flex: 1 1 180px`): usa la forma che trovi più leggibile, il risultato è identico.
- Per vedere l'effetto di `flex-wrap: wrap`, prova a restringere la finestra del browser (o, nella sandbox, il riquadro dell'anteprima): le card devono ridisporsi su più righe senza mai comprimersi eccessivamente.
- Estensione: prova `flex-shrink: 0` su `.libro` e osserva come, con lo spazio ridotto, le card ora escono dai margini invece di restringersi — capirai perché `flex-shrink: 1` è la scelta giusta qui.

## Soluzione

=== "index.html"
    ```html
    --8<-- "HTML-CSS-Javascript/Vetrina-libri/index.html"
    ```
=== "style.css"
    ```css
    --8<-- "HTML-CSS-Javascript/Vetrina-libri/style.css"
    ```

<div class="oc-embed"
     data-path="HTML-CSS-Javascript/Vetrina-libri/index.html;HTML-CSS-Javascript/Vetrina-libri/style.css"
     data-lang="html"
     data-autorun="true">
</div>
