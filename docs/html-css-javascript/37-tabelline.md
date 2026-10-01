# Tabelline

Scrivi il file `script.js` per la pagina già pronta nel documento HTML (non modificarla). Premendo il pulsante `mostra`, la pagina legge il numero scritto nel campo `numero` e riempie la lista `elenco` con la tabellina di quel numero, da ×1 a ×10: una riga per ogni moltiplicazione, nel formato «7 × 3 = 21». Collega il pulsante alla tua funzione con `addEventListener`.

## Obiettivo

Usare un ciclo `for` per ripetere la stessa operazione dieci volte e costruire dal codice una parte della pagina.

## Anteprima

```
+-------------------------------+
| Tabelline                     |
|                               |
| Numero  [ 7    ]  [ Mostra ]  |
|                               |
|  - 7 × 1 = 7                  |
|  - 7 × 2 = 14                 |
|  - 7 × 3 = 21                 |
|    ...                        |
|  - 7 × 10 = 70                |
+-------------------------------+
```

## Descrizione

### Ripetere con il ciclo `for`

Un **ciclo** ripete un blocco di istruzioni più volte. Il ciclo **`for`** si usa quando si sa quante volte ripetere: tra le parentesi ci sono tre parti separate da `;` — da dove si parte, fino a quando si continua, come si cambia a ogni giro:

```js
for (let i = 1; i <= 10; i++) {
  // questo blocco viene eseguito 10 volte, con i = 1, 2, 3, ..., 10
}
```

`let i = 1` crea il contatore `i` e lo fa partire da 1; `i <= 10` è la condizione per continuare; `i++` aumenta `i` di 1 alla fine di ogni giro.

### Costruire un testo pezzo per pezzo

Dentro il ciclo si può **accumulare** del testo in una variabile, aggiungendo a ogni giro un pezzo nuovo con `+`. Alla fine, una volta sola, il risultato viene messo nella pagina:

```js
let testo = "";                           // si parte da una stringa vuota
for (let i = 1; i <= 3; i++) {
  testo = testo + "giro " + i + " - ";    // si aggiunge un pezzo a ogni giro
}
// testo vale "giro 1 - giro 2 - giro 3 - "
```

### Scrivere HTML: `innerHTML`

Mentre `textContent` scrive testo semplice, **`innerHTML`** interpreta ciò che riceve come **codice HTML**. È quello che serve per riempire una lista con tanti elementi `<li>`, ciascuno tra i suoi tag:

```js
document.getElementById("elenco").innerHTML = "<li>uno</li><li>due</li>";
```

## Suggerimenti

- Costruisci una stringa `righe` che a ogni giro del ciclo riceve un pezzo del tipo `"<li>" + numero + " × " + i + " = " + (numero * i) + "</li>"`. Alla fine assegnala a `innerHTML` dell'elenco.
- Le parentesi intorno a `(numero * i)` sono importanti: senza, l'operatore `+` dei testi si mescolerebbe con la moltiplicazione e il risultato sarebbe sbagliato.
- Il simbolo `×` si può scrivere direttamente dentro la stringa (è un normale carattere).
- Se ripremi il pulsante con un altro numero, la lista deve cambiare e non allungarsi: assegna `innerHTML` **una volta sola**, alla fine, con `=` (non con `+=`).
- Estensione: aggiungi in locale un secondo campo per decidere fino a quale moltiplicatore arrivare (non per forza 10).

## Soluzione

=== "index.html"
    ```html
    --8<-- "HTML-CSS-Javascript/Tabelline/index.html"
    ```
=== "style.css"
    ```css
    --8<-- "HTML-CSS-Javascript/Tabelline/style.css"
    ```
=== "script.js"
    ```js
    --8<-- "HTML-CSS-Javascript/Tabelline/script.js"
    ```

<div class="oc-embed"
     data-path="HTML-CSS-Javascript/Tabelline/index.html;HTML-CSS-Javascript/Tabelline/style.css;HTML-CSS-Javascript/Tabelline/script.js"
     data-lang="html"
     data-autorun="true">
</div>
