# Memory

Scrivi il file `script.js` per il gioco già pronto nel documento HTML (non modificarlo). Nella pagina ci sono 12 carte (pulsanti con classe `carta`, che chiamano `giraCarta(0)` … `giraCarta(11)`) che mostrano «?». Dietro le carte ci sono sei coppie di simboli: 🐶 🐱 🦊 🐼 🐸 🦁, mescolate a caso all'apertura della pagina. Cliccando una carta si scopre il suo simbolo. Dopo la seconda carta scoperta: se i simboli sono uguali, le due carte restano scoperte e non si possono più cliccare; se sono diversi, dopo 0,8 secondi tornano coperte («?»). Il paragrafo `info` mostra «Mosse: N» (una mossa = due carte scoperte) e, quando tutte le coppie sono state trovate, «Hai vinto in N mosse!». Il pulsante `nuova` mescola le carte e ricomincia la partita.

## Obiettivo

Mescolare un array, usare un timer per ritardare un'azione e gestire uno stato di gioco con più "momenti" (prima carta scoperta, seconda carta scoperta, attesa).

## Anteprima

```
+---------------------------------+
| Memory                          |
|                                 |
| [ 🐱 ] [ ?  ] [ 🦊 ] [ ?  ]     |
| [ ?  ] [ 🐶 ] [ ?  ] [ 🐶 ]     |
| [ ?  ] [ ?  ] [ 🦊 ] [ ?  ]     |
|                                 |
| Mosse: 5                        |
| [ Nuova partita ]               |
+---------------------------------+
```

## Descrizione

### Mescolare un array

Il metodo più semplice per mescolare è: partire dall'ultima posizione, scegliere a caso una posizione tra la prima e quella corrente e **scambiare** i due valori. Per scambiare due valori serve una variabile temporanea, altrimenti uno dei due andrebbe perso:

```js
for (let i = valori.length - 1; i > 0; i--) {
  const j = Math.floor(Math.random() * (i + 1));   // posizione casuale da 0 a i
  const temp = valori[i];
  valori[i] = valori[j];
  valori[j] = temp;
}
```

### Aspettare un po': `setTimeout`

`setTimeout` esegue una funzione **una volta sola**, dopo un ritardo espresso in millisecondi (1000 ms = 1 secondo). Come con `addEventListener`, la funzione si scrive senza parentesi:

```js
setTimeout(copriCarte, 800);   // tra 0,8 secondi esegue copriCarte()
```

Nel frattempo il resto del programma continua: per questo, nel gioco, bisogna impedire di scoprire una terza carta mentre due carte diverse stanno aspettando di essere ricoperte.

### Uscire subito da una funzione: `return`

Con `return` scritto da solo la funzione termina immediatamente. È comodo per scartare in anticipo i casi in cui "non si deve fare nulla":

```js
function giraCarta(i) {
  if (bloccato) {
    return;      // clic ignorato: si sta aspettando
  }
  // ...il resto della funzione
}
```

### Le carte della pagina

`document.getElementsByClassName("carta")` restituisce l'elenco di tutti gli elementi con quella classe, nell'ordine in cui compaiono nell'HTML: si usa come un array (`carte[0]`, `carte[1]`, ..., `carte.length`).

### Lo stato: tre variabili

- `valori`: l'array con i 12 simboli mescolati;
- `prima`: l'indice della prima carta scoperta, oppure `-1` se non ce n'è nessuna;
- `bloccato`: `true` mentre due carte diverse aspettano di essere ricoperte.

## Suggerimenti

- Una carta già scoperta va **disattivata** (`carte[i].disabled = true`): così non puoi cliccare due volte la stessa carta né una coppia già trovata. Se due carte sono diverse, riattivale quando le ricopri.
- La funzione chiamata da `setTimeout` non può ricevere parametri: tieni quindi in due variabili globali (`prima` e `seconda`) gli indici delle due carte da ricoprire.
- Ricorda di azzerare tutto in `nuovaPartita()`: mosse, coppie trovate, `prima = -1`, `bloccato = false`, testo `?` e `disabled = false` su tutte le carte, poi mescola.
- Per sapere quando hai vinto, conta le coppie trovate: sono 6 quando il gioco è finito.
- Estensione: aggiungi un cronometro (`setInterval`, vedi l'esercizio 46) e mostra il tempo impiegato.

## Soluzione

=== "index.html"
    ```html
    --8<-- "HTML-CSS-Javascript/Memory/index.html"
    ```
=== "style.css"
    ```css
    --8<-- "HTML-CSS-Javascript/Memory/style.css"
    ```
=== "script.js"
    ```js
    --8<-- "HTML-CSS-Javascript/Memory/script.js"
    ```

<div class="oc-embed"
     data-path="HTML-CSS-Javascript/Memory/index.html;HTML-CSS-Javascript/Memory/style.css;HTML-CSS-Javascript/Memory/script.js"
     data-lang="html"
     data-height="600"
     data-autorun="true">
</div>
