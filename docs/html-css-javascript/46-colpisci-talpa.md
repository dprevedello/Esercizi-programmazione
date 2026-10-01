# Colpisci la talpa

Scrivi il file `script.js` per il gioco già pronto nel documento HTML (non modificarlo). La pagina ha nove buche (pulsanti con classe `buca`, che chiamano `colpisci(0)` … `colpisci(8)`). Premendo `inizia` parte una partita di 30 secondi: ogni 0,7 secondi una talpa 🐹 compare in una buca scelta a caso (e sparisce da quella precedente). Cliccando la buca in cui si trova la talpa si guadagna un punto e la talpa sparisce. Lo span `punti` mostra i punti e lo span `tempo` i secondi rimasti (parte da 30 e scende di 1 al secondo). Quando il tempo arriva a 0 la talpa sparisce, il gioco si ferma e il paragrafo `esito` mostra «Tempo scaduto! Hai fatto N punti.». Premere `inizia` durante una partita non deve avere effetto.

## Obiettivo

Usare i timer per far muovere il gioco da solo: un timer per far apparire la talpa e un altro per il conto alla rovescia.

## Anteprima

```
+---------------------------------+
| Colpisci la talpa               |
|                                 |
| Punti: 7        Tempo: 18       |
|                                 |
|      [    ] [ 🐹 ] [    ]       |
|      [    ] [    ] [    ]       |
|      [    ] [    ] [    ]       |
|                                 |
| [ Inizia ]                      |
+---------------------------------+
```

## Descrizione

### Eseguire qualcosa a intervalli: `setInterval`

`setInterval` chiama una funzione **ripetutamente**, a intervalli regolari espressi in millisecondi. Restituisce un numero che identifica il timer, da conservare in una variabile, perché serve per fermarlo:

```js
let idTimer = setInterval(scorriTempo, 1000);   // ogni secondo chiama scorriTempo()
```

### Fermare un timer: `clearInterval`

Un timer creato con `setInterval` va avanti all'infinito, finché non lo si ferma con **`clearInterval`**, indicando il suo identificativo:

```js
clearInterval(idTimer);
```

### Due timer per due compiti

In questo gioco servono **due** timer indipendenti, con ritmi diversi: uno ogni 1000 ms per il conto alla rovescia e uno ogni 700 ms per spostare la talpa. Ciascuno ha la sua funzione e il suo identificativo, e quando il tempo finisce vanno fermati entrambi.

### La partita in corso

Una variabile `giocando`, che vale `true` solo mentre la partita è in corso, permette di ignorare i clic e la pressione di «Inizia» nei momenti sbagliati. Un'altra variabile, `posizione`, ricorda in quale buca si trova la talpa (`-1` se non c'è):

```js
function colpisci(i) {
  if (giocando && i === posizione) {
    // colpita!
  }
}
```

## Suggerimenti

- Prepara le funzioni: `inizia()`, `scorriTempo()`, `muoviTalpa()`, `colpisci(i)` e `fineGioco()`. Collega solo `inizia` con `addEventListener`.
- In `muoviTalpa()`: se c'è già una talpa (`posizione !== -1`), togli il suo disegno con `buche[posizione].textContent = ""`; poi scegli una nuova buca con `Math.floor(Math.random() * 9)` e scrivici «🐹».
- Quando colpisci la talpa, toglila subito dalla buca e metti `posizione = -1`, altrimenti potresti segnare più punti con un solo clic.
- In `fineGioco()`: ferma entrambi i timer con `clearInterval`, metti `giocando = false`, togli la talpa rimasta e scrivi il messaggio finale.
- Estensione: dopo ogni 10 punti, riduci l'intervallo con cui compare la talpa (dovrai fermare e ricreare il timer).

## Soluzione

=== "index.html"
    ```html
    --8<-- "HTML-CSS-Javascript/Colpisci-talpa/index.html"
    ```
=== "style.css"
    ```css
    --8<-- "HTML-CSS-Javascript/Colpisci-talpa/style.css"
    ```
=== "script.js"
    ```js
    --8<-- "HTML-CSS-Javascript/Colpisci-talpa/script.js"
    ```

<div class="oc-embed"
     data-path="HTML-CSS-Javascript/Colpisci-talpa/index.html;HTML-CSS-Javascript/Colpisci-talpa/style.css;HTML-CSS-Javascript/Colpisci-talpa/script.js"
     data-lang="html"
     data-height="600"
     data-autorun="true">
</div>
