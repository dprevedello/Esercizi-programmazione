# Contatore

Scrivi il file `script.js` per il contatore già pronto nel documento HTML (non modificarlo). Il paragrafo `valore` parte da 0; il pulsante `piu` lo aumenta di 1, il pulsante `meno` lo diminuisce di 1 e il pulsante `azzera` lo riporta a 0. Questa volta nell'HTML i pulsanti non hanno `onclick`: il collegamento tra i pulsanti e le tue funzioni va fatto dal file JavaScript con `addEventListener`.

## Obiettivo

Collegare le funzioni agli eventi direttamente dal codice JavaScript e usare una variabile che mantiene il suo valore da un clic al successivo.

## Anteprima

```
+-------------------------------+
| Contatore                     |
|                               |
|              3                |  <- cresce o cala ad ogni clic
|                               |
| [ - ]    [ Azzera ]    [ + ]  |
+-------------------------------+
```

## Descrizione

### Gli eventi

Un **evento** è qualcosa che succede nella pagina: un clic, la pressione di un tasto, il passaggio del mouse. JavaScript può "ascoltare" un evento e, quando si verifica, eseguire una funzione. Negli esercizi precedenti il collegamento era scritto nell'HTML con `onclick`; il modo più ordinato è farlo dal file JavaScript.

### Collegare una funzione: `addEventListener`

`addEventListener` ("aggiungi un ascoltatore di eventi") collega una funzione a un evento di un elemento. Vuole due valori: il nome dell'evento tra virgolette e la funzione da chiamare. Attenzione: la funzione si scrive **senza parentesi tonde**, perché non va eseguita subito, ma solo quando l'evento si verifica:

```js
function saluta() {
  document.getElementById("messaggio").textContent = "Ciao!";
}

document.getElementById("pulsante").addEventListener("click", saluta);
```

### Una variabile che "ricorda"

Se una variabile è dichiarata **dentro** una funzione, nasce e muore a ogni chiamata e perde il suo valore. Per ricordare un valore tra un clic e l'altro la variabile va dichiarata **fuori** da tutte le funzioni (variabile **globale**), con `let` perché il suo valore cambia:

```js
let conteggio = 0;            // fuori dalle funzioni: resta in memoria

function aumenta() {
  conteggio = conteggio + 1;  // "il nuovo conteggio è il vecchio più 1"
}
```

### Tenere allineati dato e pagina

Cambiare la variabile non cambia da solo ciò che si vede: dopo ogni modifica bisogna **riscrivere il valore nella pagina**. Conviene mettere questa operazione in una funzione `mostra()` e chiamarla alla fine di `aumenta`, `diminuisci` e `azzera`, invece di ripetere la riga tre volte.

## Suggerimenti

- La struttura consigliata è: una variabile globale `conteggio`, una funzione `mostra()` che scrive `conteggio` nel paragrafo, tre funzioni (`aumenta`, `diminuisci`, `azzera`) e, in fondo al file, tre chiamate ad `addEventListener`.
- Ricorda: `addEventListener("click", aumenta)` senza parentesi dopo `aumenta`. Con `aumenta()` la funzione verrebbe eseguita subito, una sola volta, all'apertura della pagina.
- Scorciatoia: `conteggio = conteggio + 1` si può scrivere anche `conteggio++`, e `conteggio = conteggio - 1` anche `conteggio--`.
- Estensione: in `style.css` esiste già la classe `negativo` (testo rosso). Fai in modo che il paragrafo `valore` abbia quella classe quando il conteggio è minore di zero.

## Soluzione

=== "index.html"
    ```html
    --8<-- "HTML-CSS-Javascript/Contatore/index.html"
    ```
=== "style.css"
    ```css
    --8<-- "HTML-CSS-Javascript/Contatore/style.css"
    ```
=== "script.js"
    ```js
    --8<-- "HTML-CSS-Javascript/Contatore/script.js"
    ```

<div class="oc-embed"
     data-path="HTML-CSS-Javascript/Contatore/index.html;HTML-CSS-Javascript/Contatore/style.css;HTML-CSS-Javascript/Contatore/script.js"
     data-lang="html"
     data-autorun="true">
</div>
