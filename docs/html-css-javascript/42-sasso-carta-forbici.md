# Sasso, carta, forbici

Scrivi il file `script.js` per il gioco già pronto nel documento HTML (non modificarlo). I tre pulsanti chiamano la funzione `gioca` con un numero: `gioca(0)` per sasso, `gioca(1)` per carta, `gioca(2)` per forbici. Il computer sceglie a caso. A ogni mano, nel paragrafo `scelte` compare «Tu: ✊ – Computer: ✌️» (con i simboli giusti), nel paragrafo `esito` «Hai vinto!», «Hai perso!» o «Pareggio!», e nel paragrafo `punteggio` «Tu N – M Computer», aggiornato a ogni mano.

## Obiettivo

Rappresentare le scelte con dei numeri, decidere chi vince con condizioni composte e tenere un punteggio che cresce di mano in mano.

## Anteprima

```
+-------------------------------+
| Sasso, carta, forbici         |
|                               |
|  [ ✊ ]    [ ✋ ]    [ ✌️ ]     |
|                               |
| Tu: ✋ – Computer: ✊          |
| Hai vinto!                    |
|                               |
| Tu 3 – 2 Computer             |
+-------------------------------+
```

## Descrizione

### Le scelte come numeri

Per un programma è più comodo confrontare numeri che parole. Si associa a ogni mossa un numero e si tiene in un array il simbolo corrispondente, usando il numero come indice:

```js
// 0 = sasso, 1 = carta, 2 = forbici
const simboli = ["✊", "✋", "✌️"];

simboli[1];     // "✋"
```

La scelta del computer è un numero casuale tra 0 e 2: `Math.floor(Math.random() * 3)`.

### Chi vince?

Le regole sono tre: il sasso batte le forbici, la carta batte il sasso, le forbici battono la carta. Con i numeri scelti sopra:

- `0` (sasso) batte `2` (forbici)
- `1` (carta) batte `0` (sasso)
- `2` (forbici) batte `1` (carta)

Per scrivere "o questo caso, o quest'altro" si combinano le condizioni con `&&` e `||`, mettendo le parentesi per raggruppare:

```js
if ((tu === 0 && pc === 2) || (tu === 1 && pc === 0) || (tu === 2 && pc === 1)) {
  // hai vinto
}
```

Si controlla prima il pareggio (`tu === pc`), poi la vittoria; tutto ciò che resta è una sconfitta, cioè il ramo `else`.

### Il punteggio

Due variabili globali, una per te e una per il computer, partono da 0 e aumentano di 1 quando qualcuno vince. A ogni mano si riscrive il punteggio nella pagina.

## Suggerimenti

- Dichiara fuori dalla funzione le variabili `punteggioUtente` e `punteggioComputer` (con `let`) e l'array `simboli`.
- Nella funzione `gioca(scelta)`: calcola la scelta del computer, decidi l'esito con `if` / `else if` / `else`, aggiorna il punteggio di chi vince e infine scrivi i tre paragrafi.
- Per scrivere «Tu: ✋ – Computer: ✊» usa `simboli[scelta]` e `simboli[computer]`.
- Controlla a mano le nove combinazioni possibili (3 tue × 3 del computer): tre pareggi, tre vittorie, tre sconfitte.
- Estensione: aggiungi un pulsante «Azzera punteggio».

## Soluzione

=== "index.html"
    ```html
    --8<-- "HTML-CSS-Javascript/Sasso-carta-forbici/index.html"
    ```
=== "style.css"
    ```css
    --8<-- "HTML-CSS-Javascript/Sasso-carta-forbici/style.css"
    ```
=== "script.js"
    ```js
    --8<-- "HTML-CSS-Javascript/Sasso-carta-forbici/script.js"
    ```

<div class="oc-embed"
     data-path="HTML-CSS-Javascript/Sasso-carta-forbici/index.html;HTML-CSS-Javascript/Sasso-carta-forbici/style.css;HTML-CSS-Javascript/Sasso-carta-forbici/script.js"
     data-lang="html"
     data-autorun="true">
</div>
