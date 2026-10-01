# Lista della spesa

Scrivi il file `script.js` per la pagina già pronta nel documento HTML (non modificarla). Premendo il pulsante `aggiungi`, il prodotto scritto nel campo `prodotto` viene aggiunto alla lista `lista` (una riga per prodotto, nell'ordine di inserimento) e il paragrafo `totale` mostra «Prodotti: N». Un campo vuoto (o con soli spazi) non va aggiunto. Dopo ogni inserimento il campo si svuota e il cursore ci ritorna. Il pulsante `svuota` cancella tutta la lista. Collega i pulsanti alle tue funzioni con `addEventListener`.

## Obiettivo

Memorizzare più valori in un **array**, scorrerlo con un ciclo e ridisegnare la pagina a partire dai dati.

## Anteprima

```
+-------------------------------+
| Lista della spesa             |
|                               |
| [ latte        ] [Aggiungi]   |
|                               |
|  - pane                       |
|  - latte                      |
|  - mele                       |
|                               |
| Prodotti: 3                   |
| [ Svuota la lista ]           |
+-------------------------------+
```

## Descrizione

### Gli array: una lista di valori

Un **array** è una variabile che contiene più valori in fila, scritti tra parentesi quadre e separati da virgole. Ogni valore ha una posizione, detta **indice**, che parte da **0**:

```js
const frutti = ["mela", "pera", "kiwi"];
frutti[0];          // "mela"  (il primo elemento ha indice 0)
frutti[2];          // "kiwi"
frutti.length;      // 3       (quanti elementi contiene)
```

Per aggiungere un elemento in fondo si usa `push`; un array vuoto si scrive `[]`:

```js
let carrello = [];
carrello.push("latte");    // ora carrello vale ["latte"]
```

### Scorrere un array con `for`

Per fare qualcosa con tutti gli elementi si usa un ciclo `for` in cui il contatore percorre gli indici, da `0` fino a `length - 1`:

```js
for (let i = 0; i < frutti.length; i++) {
  // frutti[i] è l'elemento in posizione i
}
```

Si usa `<` (e non `<=`) perché l'ultimo indice valido è `length - 1`.

### I dati e la pagina

Il vero "elenco della spesa" è l'array: ciò che si vede nella pagina è solo la sua rappresentazione. Per questo, dopo ogni modifica dell'array, conviene **ridisegnare tutta la lista** dalla prima all'ultima riga con una funzione `mostraLista()`, invece di cercare di modificare la riga giusta nella pagina.

### Pulire il testo: `trim`

L'utente può scrivere solo spazi. La funzione `trim()` toglie gli spazi all'inizio e alla fine di un testo: se dopo il `trim` la stringa è vuota (`""`) non c'è niente da aggiungere.

```js
"   pane  ".trim();    // "pane"
```

## Suggerimenti

- Servono: un array globale `prodotti` (con `let`, perché «svuota» gli assegnerà `[]`), una funzione `mostraLista()`, una funzione `aggiungi()` e una `svuota()`.
- Dopo aver svuotato il campo con `campo.value = ""`, usa `campo.focus()` per rimettere il cursore dentro il campo.
- `mostraLista()` deve fare due cose: ricostruire le righe `<li>` con un ciclo `for` (come nelle tabelline) e aggiornare il paragrafo `totale` con `prodotti.length`.
- Chiama `mostraLista()` anche dopo `svuota()`, altrimenti la pagina continuerebbe a mostrare i vecchi prodotti.
- Estensione: impedisci di inserire due volte lo stesso prodotto (l'array ha la funzione `includes`).

## Soluzione

=== "index.html"
    ```html
    --8<-- "HTML-CSS-Javascript/Lista-spesa/index.html"
    ```
=== "style.css"
    ```css
    --8<-- "HTML-CSS-Javascript/Lista-spesa/style.css"
    ```
=== "script.js"
    ```js
    --8<-- "HTML-CSS-Javascript/Lista-spesa/script.js"
    ```

<div class="oc-embed"
     data-path="HTML-CSS-Javascript/Lista-spesa/index.html;HTML-CSS-Javascript/Lista-spesa/style.css;HTML-CSS-Javascript/Lista-spesa/script.js"
     data-lang="html"
     data-autorun="true">
</div>

!!! info "Perché `innerHTML` va usato con cautela"
    Con `innerHTML` il testo scritto dall'utente viene interpretato come HTML: se nel campo scrivi `<b>latte</b>`, nella lista comparirà «latte» in grassetto. Qui è un effetto curioso, ma in un sito vero con dati di altri utenti è una grave falla di sicurezza (**XSS**). La regola è: per mostrare un testo scritto dall'utente si usa `textContent`; `innerHTML` solo per HTML scritto da te.
