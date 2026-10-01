# Tris

Scrivi il file `script.js` per il gioco già pronto nel documento HTML (non modificarlo). La tavola ha nove celle (pulsanti con classe `cella`) che chiamano `gioca(0)` … `gioca(8)`, numerate da sinistra a destra e dall'alto in basso. Due giocatori, sulla stessa pagina, giocano a turno: a ogni clic su una cella libera compare X o O (inizia X). Il paragrafo `stato` mostra «Tocca a X» o «Tocca a O»; quando un giocatore completa una riga, una colonna o una diagonale mostra «Ha vinto X!» (o «Ha vinto O!»); se la tavola è piena senza vincitore mostra «Pareggio!». Una cella occupata non si può più cambiare e a partita finita non si può più giocare. Il pulsante `nuova` svuota la tavola e ricomincia, con X per primo.

## Obiettivo

Rappresentare una tavola da gioco con un array, controllare le condizioni di vittoria con un ciclo e gestire i turni alternati di due giocatori.

## Anteprima

```
+---------------------------------+
| Tris                            |
|                                 |
|     +-----+-----+-----+         |
|     |  X  |  O  |     |         |
|     +-----+-----+-----+         |
|     |     |  X  |  O  |         |
|     +-----+-----+-----+         |
|     |     |     |  X  |         |
|     +-----+-----+-----+         |
|                                 |
| Ha vinto X!                     |
| [ Nuova partita ]               |
+---------------------------------+
```

## Descrizione

### La tavola come array

Le nove celle si memorizzano in un array di nove elementi. L'indice è la posizione della cella, numerata da 0 a 8 a righe; ogni elemento contiene `""` (cella libera), `"X"` oppure `"O"`:

```
  0 | 1 | 2
 ---+---+---
  3 | 4 | 5
 ---+---+---
  6 | 7 | 8
```

```js
let tavola = ["", "", "", "", "", "", "", "", ""];
tavola[4] = "X";      // X ha giocato al centro
```

### I turni

Una variabile `turno` contiene `"X"` oppure `"O"`. Dopo ogni mossa valida si passa all'altro giocatore:

```js
if (turno === "X") {
  turno = "O";
} else {
  turno = "X";
}
```

### Le combinazioni vincenti

Un giocatore vince se occupa tutte e tre le celle di una delle **otto combinazioni** (3 righe, 3 colonne, 2 diagonali). Si può tenere l'elenco in un array di array e controllarlo con un ciclo `for`: per ogni combinazione si verifica che la prima cella non sia vuota e che le tre celle contengano lo stesso simbolo.

```js
const combinazioni = [
  [0, 1, 2], [3, 4, 5], [6, 7, 8],   // righe
  [0, 3, 6], [1, 4, 7], [2, 5, 8],   // colonne
  [0, 4, 8], [2, 4, 6]               // diagonali
];

const c = combinazioni[0];           // [0, 1, 2]
tavola[c[0]];                        // contenuto della cella 0
```

### Fine della partita

Una variabile `finito` (all'inizio `false`) diventa `true` quando c'è un vincitore o la tavola è piena. All'inizio di `gioca` si usa `return` per scartare i clic su una cella già occupata o a partita finita. Il pareggio si riconosce contando le mosse: se sono nove e nessuno ha vinto, la tavola è piena.

## Suggerimenti

- Se all'inizio ti sembra difficile il ciclo, scrivi prima il controllo della sola prima riga con un `if` lungo (`tavola[0] !== "" && tavola[0] === tavola[1] && tavola[0] === tavola[2]`). Poi capirai come generalizzarlo con le otto combinazioni.
- Controlla la vittoria **dopo** aver scritto la mossa nella tavola, e solo se non c'è vittoria controlla il pareggio.
- Quando la partita finisce non cambiare più `turno`: così, a vittoria avvenuta, il messaggio può usare il simbolo di chi ha appena giocato.
- In `nuovaPartita()` svuota sia l'array `tavola` sia il testo dei nove pulsanti (`celle[i].textContent = ""`), e riporta `turno`, `finito` e `mosse` ai valori iniziali.
- Estensione: evidenzia in verde le tre celle della combinazione vincente (assegna una classe `vincente` che definisci in `style.css`).

## Soluzione

=== "index.html"
    ```html
    --8<-- "HTML-CSS-Javascript/Tris/index.html"
    ```
=== "style.css"
    ```css
    --8<-- "HTML-CSS-Javascript/Tris/style.css"
    ```
=== "script.js"
    ```js
    --8<-- "HTML-CSS-Javascript/Tris/script.js"
    ```

<div class="oc-embed"
     data-path="HTML-CSS-Javascript/Tris/index.html;HTML-CSS-Javascript/Tris/style.css;HTML-CSS-Javascript/Tris/script.js"
     data-lang="html"
     data-height="600"
     data-autorun="true">
</div>
