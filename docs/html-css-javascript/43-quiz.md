# Quiz a risposta multipla

Scrivi il file `script.js` per il quiz già pronto nel documento HTML (non modificarlo). Il quiz ha cinque domande, ciascuna con quattro risposte (pulsanti `r0`, `r1`, `r2`, `r3`, che chiamano `rispondi(0)` … `rispondi(3)`). Mostra una domanda alla volta nel paragrafo `domanda` nel formato «1. testo della domanda». Quando l'utente risponde, i quattro pulsanti si disattivano, la risposta corretta prende la classe `giusta`, l'eventuale risposta sbagliata scelta prende la classe `sbagliata`, il paragrafo `feedback` scrive «Esatto!» oppure «Sbagliato!» e compare il pulsante `avanti` (che chiama `avanti()`), con cui si passa alla domanda successiva. Il paragrafo `punteggio` mostra «Punteggio: N». Dopo l'ultima domanda i pulsanti delle risposte e `avanti` spariscono e `domanda` mostra «Quiz finito! Hai totalizzato N su 5.».

| # | Domanda | Risposte (✔ = risposta corretta) |
|---|---------|----------------------------------|
| 1 | Quale tag HTML crea un collegamento? | `<link>`, `<a>` ✔, `<href>`, `<url>` |
| 2 | Quale proprietà CSS cambia il colore del testo? | `color` ✔, `font-color`, `text-style`, `background` |
| 3 | Come si scrive un commento su una riga in JavaScript? | `<!-- commento -->`, `# commento`, `// commento` ✔, `** commento` |
| 4 | Quale parola chiave dichiara una variabile il cui valore non cambia? | `let`, `const` ✔, `var`, `fixed` |
| 5 | Quale funzione cerca un elemento tramite il suo id? | `findElement`, `selectById`, `getById`, `getElementById` ✔ |

## Obiettivo

Usare array di array per memorizzare i dati di un quiz, scorrerli con un ciclo e coordinare lo stato di un gioco a più passaggi (domanda corrente, punteggio, risposta già data).

## Anteprima

```
+---------------------------------+
| Quiz sul web                    |
|                                 |
| 3. Come si scrive un commento   |
|    su una riga in JavaScript?   |
|                                 |
| [ <!-- commento -->           ] |
| [ # commento                  ] |
| [ // commento                 ] |  <- verde: era la risposta giusta
| [ ** commento                 ] |
|                                 |
| Esatto!                         |
| [ Avanti ]                      |
| Punteggio: 2                    |
+---------------------------------+
```

## Descrizione

### I dati del quiz: array di array

Le cinque domande stanno in un array di testi. Le risposte sono quattro per ogni domanda: si possono tenere in un **array di array**, cioè una "tabella" in cui ogni riga è la lista delle risposte di una domanda. Il primo indice sceglie la riga (la domanda), il secondo la colonna (la risposta). Un terzo array contiene l'indice della risposta giusta di ciascuna domanda:

```js
const domande = ["Domanda A", "Domanda B"];
const opzioni = [
  ["A1", "A2", "A3", "A4"],   // risposte della domanda 0
  ["B1", "B2", "B3", "B4"]    // risposte della domanda 1
];
const giuste = [1, 3];        // domanda 0: giusta la 2ª; domanda 1: giusta la 4ª

opzioni[1][2];                // "B3"
```

### Aggiornare i quattro pulsanti con un ciclo

I pulsanti hanno id `r0`, `r1`, `r2`, `r3`: si ottengono con `"r" + k`, quindi un ciclo con `k` da 0 a 3 permette di trattarli tutti con le stesse righe di codice:

```js
for (let k = 0; k < 4; k++) {
  const bottone = document.getElementById("r" + k);
  bottone.textContent = opzioni[corrente][k];
}
```

### Mostrare e nascondere: `hidden`

Come `disabled`, anche **`hidden`** vale `true` o `false`: con `true` l'elemento sparisce dalla pagina, con `false` ricompare. Il pulsante «Avanti» parte nascosto e compare solo dopo che l'utente ha risposto.

### Lo stato del quiz

Tre variabili globali descrivono dove si è arrivati: `corrente` (l'indice della domanda mostrata), `punti` (le risposte esatte finora) e, se vuoi, il numero totale di domande, che è `domande.length`. Dopo `avanti()` si aumenta `corrente`: se è uguale a `domande.length` il quiz è finito, altrimenti si mostra la domanda successiva.

## Suggerimenti

- Scrivi prima la funzione `mostraDomanda()`: scrive il testo della domanda corrente, riempie i quattro pulsanti con un ciclo, li riattiva (`disabled = false`), toglie le classi (`className = ""`), svuota il feedback e nasconde `avanti`. Chiamala una volta in fondo al file.
- In `rispondi(scelta)`: confronta `scelta` con `giuste[corrente]`; se è giusta aumenta `punti`, altrimenti marca come `sbagliata` il pulsante scelto. In ogni caso marca come `giusta` il pulsante corretto, disattiva tutti i pulsanti e mostra `avanti`.
- Aggiorna il punteggio nella pagina ogni volta che cambia.
- Le risposte contengono simboli come `<` e `>`: usa `textContent` (non `innerHTML`), così vengono mostrate come testo e non interpretate come tag.
- Estensione: aggiungi una sesta domanda. Basta una voce in più in ciascuno dei tre array (`domande`, `opzioni`, `giuste`); il resto del programma deve funzionare senza altre modifiche, a patto di non aver scritto il numero 5 a mano nel codice.

## Soluzione

=== "index.html"
    ```html
    --8<-- "HTML-CSS-Javascript/Quiz/index.html"
    ```
=== "style.css"
    ```css
    --8<-- "HTML-CSS-Javascript/Quiz/style.css"
    ```
=== "script.js"
    ```js
    --8<-- "HTML-CSS-Javascript/Quiz/script.js"
    ```

<div class="oc-embed"
     data-path="HTML-CSS-Javascript/Quiz/index.html;HTML-CSS-Javascript/Quiz/style.css;HTML-CSS-Javascript/Quiz/script.js"
     data-lang="html"
     data-height="600"
     data-autorun="true">
</div>
