# Calcolatrice

Scrivi il file `script.js` per la calcolatrice già pronta nel documento HTML (non modificarlo). Ognuno dei quattro pulsanti (+, −, ×, ÷) chiama la funzione `calcola` passandole un simbolo diverso (`"+"`, `"-"`, `"*"`, `"/"`). La funzione deve leggere i numeri dai campi `num1` e `num2` e scrivere nel paragrafo `risultato` la scritta «Risultato: X». Se si prova a dividere per zero deve comparire invece «Errore: non si può dividere per zero».

## Obiettivo

Scrivere una funzione che riceve un **parametro** e, con una sequenza di condizioni, sceglie quale operazione eseguire.

## Anteprima

```
+-------------------------------+
| Calcolatrice                  |
|                               |
| Primo numero                  |
| [ 20            ]             |
| Secondo numero                |
| [ 4             ]             |
|                               |
| [ + ] [ - ] [ x ] [ / ]       |
|                               |
| Risultato: 5                  |  <- dopo aver premuto "/"
+-------------------------------+
```

## Descrizione

### Funzioni con parametri

Una funzione può ricevere dei valori dall'esterno, detti **parametri**, scritti tra le parentesi tonde. Chi chiama la funzione passa un valore, che dentro la funzione si usa come una variabile:

```js
function saluta(nome) {
  document.getElementById("messaggio").textContent = "Ciao, " + nome;
}

saluta("Giulia");   // chiamata: nome vale "Giulia"
```

Nell'HTML di questo esercizio ogni pulsante chiama la stessa funzione con un valore diverso: `onclick="calcola('+')"`, `onclick="calcola('-')"` e così via. Dentro `calcola` il parametro conterrà il simbolo dell'operazione.

### Prendere decisioni: `if`, `else if`, `else`

L'istruzione **`if`** esegue un blocco di codice solo se una condizione è vera. Si possono concatenare più condizioni con **`else if`**, e chiudere con **`else`**, che raccoglie tutti i casi rimasti. Il browser valuta le condizioni dall'alto verso il basso e si ferma alla prima vera:

```js
let giudizio;
if (voto >= 6) {
  giudizio = "sufficiente";
} else if (voto >= 4) {
  giudizio = "insufficiente";
} else {
  giudizio = "gravemente insufficiente";
}
```

`let` crea una variabile come `const`, ma il suo valore **può essere cambiato** in seguito: qui serve perché `giudizio` riceve un valore diverso a seconda del ramo scelto.

### Confrontare i valori: `===`

Per sapere se due valori sono uguali si usa **`===`** (tre uguali). Non confonderlo con `=`, che *assegna* un valore. Gli altri confronti sono `!==` (diverso), `<`, `>`, `<=` e `>=`:

```js
if (operazione === "+") {
  // eseguito solo se il parametro vale "+"
}
```

## Suggerimenti

- Un'impostazione possibile: prepara una variabile `messaggio` con `let`, riempila nei vari rami `if`/`else if`/`else` e scrivila nel paragrafo una volta sola alla fine.
- Metti il controllo della divisione per zero **prima** della divisione vera e propria: `else if (secondo === 0) { ... }`.
- Controlla ogni operazione con numeri facili: `20 + 4`, `20 - 4`, `20 * 4`, `20 / 4`, e poi `20 / 0`.
- Estensione: aggiungi in locale un quinto pulsante per il resto della divisione (operatore `%`).

## Soluzione

=== "index.html"
    ```html
    --8<-- "HTML-CSS-Javascript/Calcolatrice/index.html"
    ```
=== "style.css"
    ```css
    --8<-- "HTML-CSS-Javascript/Calcolatrice/style.css"
    ```
=== "script.js"
    ```js
    --8<-- "HTML-CSS-Javascript/Calcolatrice/script.js"
    ```

<div class="oc-embed"
     data-path="HTML-CSS-Javascript/Calcolatrice/index.html;HTML-CSS-Javascript/Calcolatrice/style.css;HTML-CSS-Javascript/Calcolatrice/script.js"
     data-lang="html"
     data-autorun="true">
</div>
