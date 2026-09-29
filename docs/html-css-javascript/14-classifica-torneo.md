# Classifica di un torneo eSport

Scrivi il file `style.css` collegato al documento HTML già pronto (non modificarlo) in modo che: la classifica sia numerata con i numeri dentro il riquadro di ogni riga (non a fianco), le righe pari abbiano uno sfondo grigio chiarissimo per alternanza, il primo classificato abbia sfondo oro e testo in grassetto, l'ultimo classificato sia grigio e in corsivo.

## Obiettivo

Evidenziare automaticamente posizioni particolari di una lista (prima, ultima, righe alterne) usando le pseudo-classi strutturali, senza aggiungere classi extra nell'HTML.

## Anteprima

```
+--------------------------------+
| Torneo Regionale — Classifica  |
|                                |
| 1. NovaStrike — 42 punti       | <- :first-child, oro, grassetto
| 2. PixelHawk — 37 punti        | <- :nth-child(even), sfondo grigio chiaro
| 3. ByteRunner — 33 punti       |
| 4. ShadowQueen — 29 punti      | <- :nth-child(even), sfondo grigio chiaro
| 5. CyberWolf — 24 punti        |
| 6. LagMaster — 12 punti        | <- :last-child, grigio, corsivo
+--------------------------------+
```

## Descrizione

### Stile delle liste: `list-style-type` e `list-style-position`

**`list-style-type`** sceglie il simbolo davanti a ogni voce (`decimal` per i numeri, `disc`/`circle`/`square` per i pallini, `none` per nessun simbolo). **`list-style-position`** decide se quel simbolo sta fuori dal blocco della voce (`outside`, il comportamento predefinito) o dentro, allineato col testo (`inside`):

```css
.classifica {
  list-style-type: decimal;
  list-style-position: inside;
}
```

Con `inside`, lo sfondo colorato di ogni `<li>` (che vedremo tra poco) racchiude anche il numero, non solo il testo.

### Pseudo-classi `:first-child` e `:last-child`

Una **pseudo-classe** seleziona un elemento in base a uno stato o una posizione, senza bisogno di aggiungere una classe nell'HTML. **`:first-child`** seleziona un elemento solo se è il primo figlio del suo genitore; **`:last-child`** solo se è l'ultimo:

```css
.classifica li:first-child {
  background-color: gold;
}
.classifica li:last-child {
  color: gray;
}
```

Se in futuro si aggiunge o toglie un giocatore dalla lista, queste regole continuano a puntare automaticamente al primo e all'ultimo, senza bisogno di spostare classi a mano.

### Pseudo-classe `:nth-child()`

**`:nth-child(n)`** seleziona elementi in base alla loro posizione numerica, e accetta anche formule: **`even`** seleziona le posizioni pari (2ª, 4ª, 6ª...), **`odd`** le dispari, mentre `:nth-child(3)` selezionerebbe solo la terza:

```css
.classifica li:nth-child(even) {
  background-color: #f0f0f0;
}
```

## Suggerimenti

- L'ordine delle regole nel file non decide quale "vince" tra `:first-child` e `:nth-child(even)`: sulla prima riga, `:first-child` si applica perché è più specifica per quella posizione (dettagli sulla specificità nell'esercizio sulla cascata).
- `:first-child`/`:last-child` guardano la posizione **tra i figli dello stesso genitore**, non "il primo elemento della pagina": funzionano correttamente qui perché ogni `<li>` ha come genitore lo stesso `<ol class="classifica">`.
- Estensione: prova `:nth-child(odd)` al posto di `even` e osserva come si invertono le righe colorate.

## Soluzione

=== "index.html"
    ```html
    --8<-- "HTML-CSS-Javascript/Classifica-torneo/index.html"
    ```
=== "style.css"
    ```css
    --8<-- "HTML-CSS-Javascript/Classifica-torneo/style.css"
    ```

<div class="oc-embed"
     data-path="HTML-CSS-Javascript/Classifica-torneo/index.html;HTML-CSS-Javascript/Classifica-torneo/style.css"
     data-lang="html"
     data-autorun="true">
</div>
