# Somma di due numeri

Scrivi il file `script.js` collegato al documento HTML già pronto (non modificarlo) in modo che, premendo il pulsante «Calcola», nel paragrafo con id `risultato` compaia la scritta «La somma è X», dove X è la somma dei due numeri scritti nei campi `num1` e `num2`. Il pulsante chiama la funzione `somma()`.

## Obiettivo

Leggere due valori inseriti dall'utente in un modulo, convertirli in numeri, calcolarne la somma e mostrare il risultato nella pagina.

## Anteprima

```
+-------------------------------+
| Somma di due numeri           |
|                               |
| Primo numero                  |
| [ 12            ]             |
| Secondo numero                |
| [ 30            ]             |
|                               |
| [ Calcola ]                   |
|                               |
| La somma è 42                 |  <- scritto da JavaScript
+-------------------------------+
```

## Descrizione

### Le variabili: `const`

Una **variabile** è un contenitore con un nome, in cui si conserva un valore per usarlo più avanti. Con la parola `const` si crea una variabile il cui valore, una volta assegnato, non cambia più:

```js
const eta = 15;
const nome = "Giulia";
```

Il nome si sceglie liberamente, ma deve descrivere ciò che contiene (`primoNumero` è meglio di `x`). Per convenzione, se è composto da più parole si scrive in **camelCase**: la prima parola minuscola, le altre con l'iniziale maiuscola.

### Leggere un campo: `value`

Per sapere cosa ha scritto l'utente in un campo si cerca l'elemento con `getElementById` e si legge il suo `value`:

```js
const testo = document.getElementById("num1").value;
```

Attenzione: `value` restituisce **sempre una stringa**, anche quando nel campo c'è un numero. Per JavaScript `"12"` (testo) e `12` (numero) sono cose diverse.

### Da testo a numero: `Number()`

La funzione `Number()` converte una stringa in un numero. Senza questa conversione, l'operatore `+` si comporta in modo sorprendente: unisce i testi invece di sommarli.

```js
"12" + "30"                 // "1230"  (due stringhe vengono incollate)
Number("12") + Number("30") // 42      (due numeri vengono sommati)
```

### Costruire il messaggio: la concatenazione

Anche con le stringhe l'operatore `+` ha un significato: **concatena**, cioè incolla un testo dopo l'altro. Si può unire una stringa e un numero:

```js
const messaggio = "La somma è " + 42;   // "La somma è 42"
```

Gli altri operatori aritmetici sono `-`, `*` (per) e `/` (diviso).

## Suggerimenti

- Ti servono tre variabili: il primo numero, il secondo numero e il totale. Dai loro nomi chiari.
- Prova a togliere `Number(...)` e a calcolare `12 + 30`: vedrai comparire `1230`. È l'errore più comune di chi inizia, ed è utile averlo visto almeno una volta.
- Se lasci un campo vuoto, `Number("")` vale `0`: per ora va bene così, nell'esercizio successivo vedrai come gestire i casi particolari.
- Estensione: scrivi anche, in un secondo paragrafo (aggiungilo in locale), il prodotto dei due numeri.

## Soluzione

=== "index.html"
    ```html
    --8<-- "HTML-CSS-Javascript/Somma-due-numeri/index.html"
    ```
=== "style.css"
    ```css
    --8<-- "HTML-CSS-Javascript/Somma-due-numeri/style.css"
    ```
=== "script.js"
    ```js
    --8<-- "HTML-CSS-Javascript/Somma-due-numeri/script.js"
    ```

<div class="oc-embed"
     data-path="HTML-CSS-Javascript/Somma-due-numeri/index.html;HTML-CSS-Javascript/Somma-due-numeri/style.css;HTML-CSS-Javascript/Somma-due-numeri/script.js"
     data-lang="html"
     data-autorun="true">
</div>
