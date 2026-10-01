# Lancio dei dadi

Scrivi il file `script.js` per la pagina già pronta nel documento HTML (non modificarla). Premendo il pulsante `lancia`, i due elementi `dado1` e `dado2` mostrano ciascuno una faccia scelta a caso tra ⚀ ⚁ ⚂ ⚃ ⚄ ⚅, e il paragrafo `totale` mostra «Totale: N», dove N è la somma dei due dadi. Se i due dadi sono uguali aggiungi in fondo « – Doppio!». Collega il pulsante alla tua funzione con `addEventListener`.

## Obiettivo

Generare numeri casuali, usarli come indici di un array e scrivere una funzione che **restituisce** un valore.

## Anteprima

```
+-------------------------------+
| Lancio dei dadi               |
|                               |
|     ⚃          ⚅              |  <- due facce casuali
|                               |
| Totale: 10                    |
|                               |
| [ Lancia i dadi ]             |
+-------------------------------+
```

## Descrizione

### Numeri casuali: `Math.random` e `Math.floor`

`Math.random()` restituisce un numero decimale casuale tra 0 (incluso) e 1 (escluso), per esempio `0.7312`. Per ottenere un numero intero in un intervallo si moltiplica per la quantità di valori possibili e si toglie la parte decimale con `Math.floor`, che arrotonda per difetto:

```js
Math.floor(Math.random() * 6);       // un intero da 0 a 5
Math.floor(Math.random() * 6) + 1;   // un intero da 1 a 6 (come un dado)
```

### Funzioni che restituiscono un valore: `return`

Finora le funzioni hanno scritto qualcosa nella pagina. Una funzione può anche **restituire un valore** a chi la chiama, con la parola `return`: è la risposta della funzione. Il valore restituito si può mettere in una variabile:

```js
function dadoCasuale() {
  return Math.floor(Math.random() * 6) + 1;
}

const lancio = dadoCasuale();    // lancio vale un numero tra 1 e 6
```

Scrivere la funzione una volta sola evita di ripetere la stessa formula per ogni dado.

### Dall'indice al simbolo: un array di facce

Le sei facce si possono tenere in un array: la faccia numero 1 è in posizione 0, la 2 in posizione 1, e così via. Per passare dal risultato del dado alla faccia giusta basta sottrarre 1:

```js
const facce = ["⚀", "⚁", "⚂", "⚃", "⚄", "⚅"];
const lancio = 4;
facce[lancio - 1];       // "⚃"
```

## Suggerimenti

- Scrivi la funzione `dadoCasuale()` che restituisce un numero da 1 a 6 e chiamala due volte (una per dado), salvando i risultati in due variabili.
- Un buon test: premi il pulsante molte volte. Devono comparire tutte le sei facce e mai un valore fuori dall'intervallo (se vedi `undefined` hai sbagliato l'indice).
- Per il totale usa i **numeri** dei lanci (non le facce) e confrontali con `===` per controllare il doppio.
- Le sei facce sono caratteri Unicode e si scrivono direttamente tra virgolette; puoi copiarle da questa pagina.
- Estensione: tieni il conto di quante volte è uscito il doppio dall'apertura della pagina e mostralo in un nuovo paragrafo.

## Soluzione

=== "index.html"
    ```html
    --8<-- "HTML-CSS-Javascript/Lancio-dadi/index.html"
    ```
=== "style.css"
    ```css
    --8<-- "HTML-CSS-Javascript/Lancio-dadi/style.css"
    ```
=== "script.js"
    ```js
    --8<-- "HTML-CSS-Javascript/Lancio-dadi/script.js"
    ```

<div class="oc-embed"
     data-path="HTML-CSS-Javascript/Lancio-dadi/index.html;HTML-CSS-Javascript/Lancio-dadi/style.css;HTML-CSS-Javascript/Lancio-dadi/script.js"
     data-lang="html"
     data-autorun="true">
</div>
