# Indovina il numero

Scrivi il file `script.js` per il gioco già pronto nel documento HTML (non modificarlo). All'apertura della pagina JavaScript sceglie un numero segreto da 1 a 100. Premendo `prova` il programma legge il tentativo dal campo `tentativo` e scrive nel paragrafo `suggerimento` «Troppo basso», «Troppo alto» oppure «Hai indovinato in N tentativi!»; lo span `tentativi` mostra quanti tentativi sono stati fatti. Dopo la vittoria il pulsante `prova` si disattiva. Il pulsante `nuova` inizia una nuova partita: nuovo numero segreto, contatore a zero, suggerimento e campo svuotati, pulsante `prova` di nuovo attivo. Collega i pulsanti alle tue funzioni con `addEventListener`.

## Obiettivo

Realizzare un primo gioco completo: lo **stato** della partita (numero segreto e tentativi) vive in variabili globali e ogni mossa lo aggiorna e lo mostra.

## Anteprima

```
+-------------------------------+
| Indovina il numero            |
| Ho pensato un numero da 1 a   |
| 100. Riesci a indovinarlo?    |
|                               |
| [ 50      ] [ Prova ]         |
|                               |
| Troppo basso                  |  <- suggerimento
| Tentativi: 3                  |
|                               |
| [ Nuova partita ]             |
+-------------------------------+
```

## Descrizione

### Lo stato del gioco

In un gioco ci sono dei dati che cambiano mossa dopo mossa: qui il **numero segreto** e il **numero di tentativi**. Questo insieme di dati si chiama **stato** del gioco e si tiene in variabili **globali** (fuori dalle funzioni), con `let`, così ogni funzione può leggerlo e modificarlo:

```js
let segreto = 0;
let tentativi = 0;
```

### Disattivare un pulsante: `disabled`

Ogni pulsante ha una proprietà `disabled`. Con `true` il pulsante si disattiva (non si può più cliccare e appare in grigio), con `false` si riattiva:

```js
document.getElementById("prova").disabled = true;
```

### Una funzione per ricominciare

Le istruzioni che preparano una partita (scegliere il numero, azzerare il contatore, pulire la pagina) servono sia all'apertura della pagina sia al pulsante «Nuova partita». Si scrivono **una sola volta** in una funzione `nuovaPartita()`, che poi si chiama in entrambi i casi: dal pulsante, tramite `addEventListener`, e direttamente in fondo al file, perché la prima partita parta da sola.

```js
nuovaPartita();   // chiamata diretta, in fondo al file
```

## Suggerimenti

- Numero segreto: `Math.floor(Math.random() * 100) + 1`, come nell'esercizio sui dadi ma con 100 valori.
- Leggi il tentativo con `Number(campo.value)` e confrontalo con `segreto` usando `if` / `else if` / `else`: uguale, minore o maggiore.
- Incrementa `tentativi` **prima** di scrivere il messaggio di vittoria, altrimenti il numero mostrato è sbagliato di uno.
- Se vuoi essere gentile con l'utente, dopo ogni tentativo svuota il campo e rimetti il cursore con `campo.focus()`.
- Estensione: se il campo è vuoto o il numero non è tra 1 e 100, scrivi «Inserisci un numero da 1 a 100» e non contare il tentativo.

## Soluzione

=== "index.html"
    ```html
    --8<-- "HTML-CSS-Javascript/Indovina-numero/index.html"
    ```
=== "style.css"
    ```css
    --8<-- "HTML-CSS-Javascript/Indovina-numero/style.css"
    ```
=== "script.js"
    ```js
    --8<-- "HTML-CSS-Javascript/Indovina-numero/script.js"
    ```

<div class="oc-embed"
     data-path="HTML-CSS-Javascript/Indovina-numero/index.html;HTML-CSS-Javascript/Indovina-numero/style.css;HTML-CSS-Javascript/Indovina-numero/script.js"
     data-lang="html"
     data-autorun="true">
</div>
