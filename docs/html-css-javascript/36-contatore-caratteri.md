# Contatore di caratteri

Scrivi il file `script.js` per la pagina già pronta nel documento HTML (non modificarla). Mentre l'utente scrive nell'area di testo `testo`, la pagina deve aggiornarsi in tempo reale: lo span `numero` mostra quanti caratteri sono stati scritti e il paragrafo `maiuscolo` mostra lo stesso testo in lettere maiuscole. Quando i caratteri superano 100, il paragrafo `contatore` deve avere la classe `oltre` (testo rosso); altrimenti nessuna classe. Il collegamento all'evento va fatto con `addEventListener`.

## Obiettivo

Reagire all'evento `input` per aggiornare la pagina a ogni tasto premuto, misurando e trasformando il testo scritto dall'utente.

## Anteprima

```
+---------------------------------+
| Contatore di caratteri          |
|                                 |
| +-----------------------------+ |
| | Ciao a tutti!               | |  <- area di testo
| |                             | |
| +-----------------------------+ |
|                                 |
| Caratteri: 13 / 100             |  <- diventa rossa oltre 100
|                                 |
| In maiuscolo:                   |
| CIAO A TUTTI!                   |
+---------------------------------+
```

## Descrizione

### L'evento `input`

L'evento **`input`** si verifica ogni volta che il contenuto di un campo cambia: a ogni lettera scritta o cancellata, non solo quando l'utente esce dal campo. È l'evento giusto per aggiornare la pagina "in tempo reale". Si collega come tutti gli altri eventi:

```js
document.getElementById("testo").addEventListener("input", aggiorna);
```

### La lunghezza di un testo: `length`

Ogni stringa ha una proprietà **`length`** che indica quanti caratteri contiene (spazi compresi). Si scrive dopo un punto, senza parentesi:

```js
const parola = "Ciao";
parola.length;           // 4
```

Combinata con quanto già visto, `document.getElementById("testo").value.length` dà il numero di caratteri scritti nell'area di testo.

### Trasformare un testo: `toUpperCase`

Le stringhe hanno anche delle **funzioni proprie**, che si chiamano scrivendo un punto dopo la stringa. `toUpperCase()` restituisce il testo in maiuscolo, `toLowerCase()` in minuscolo; la stringa originale non viene modificata:

```js
"Ciao a tutti".toUpperCase();   // "CIAO A TUTTI"
```

## Suggerimenti

- Scrivi una sola funzione `aggiorna()` che fa tutte e tre le cose (numero, maiuscolo, classe) e collegala all'evento `input`.
- Per cambiare la classe usa `className`, come nell'esercizio sulla media dei voti: `"oltre"` oppure la stringa vuota.
- Le due scritte richiedono `textContent` su elementi diversi: lo `span` `numero` e il paragrafo `maiuscolo`. Non scrivere dentro `contatore`, altrimenti cancelli lo span.
- Prova a incollare nell'area di testo un testo lungo: il contatore deve aggiornarsi anche così.
- Estensione: mostra anche i caratteri rimasti per arrivare a 100 (e un numero negativo quando si supera il limite).

## Soluzione

=== "index.html"
    ```html
    --8<-- "HTML-CSS-Javascript/Contatore-caratteri/index.html"
    ```
=== "style.css"
    ```css
    --8<-- "HTML-CSS-Javascript/Contatore-caratteri/style.css"
    ```
=== "script.js"
    ```js
    --8<-- "HTML-CSS-Javascript/Contatore-caratteri/script.js"
    ```

<div class="oc-embed"
     data-path="HTML-CSS-Javascript/Contatore-caratteri/index.html;HTML-CSS-Javascript/Contatore-caratteri/style.css;HTML-CSS-Javascript/Contatore-caratteri/script.js"
     data-lang="html"
     data-autorun="true">
</div>
