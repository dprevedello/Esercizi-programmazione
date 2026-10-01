# Gioco a scelta

Realizza un gioco a tua scelta che funzioni in una pagina web, scrivendo tu tutti e tre i file: `index.html`, `style.css` e `script.js`. Non c'è un modello da seguire: decidi tu le regole, l'aspetto e il tema (qualche idea: impiccato, simon dice, memoria di una sequenza di numeri, un quiz su un argomento che ti piace, battaglia navale in miniatura, caccia al tesoro in una griglia).

Il gioco deve rispettare questi requisiti:

- si gioca con pulsanti o campi di testo della pagina;
- c'è almeno una funzione che riceve un **parametro**;
- si usano almeno un `if` e almeno un ciclo `for` oppure un array;
- c'è un elemento di casualità (`Math.random`) oppure di tempo (`setTimeout`/`setInterval`);
- sono mostrati un punteggio oppure un messaggio di vittoria e di sconfitta;
- un pulsante permette di ricominciare la partita;
- il codice è commentato e ordinato: nomi chiari per variabili e funzioni, una funzione per ogni compito.

## Obiettivo

Progettare e realizzare in autonomia un piccolo gioco, mettendo insieme tutto ciò che hai imparato: HTML per la struttura, CSS per l'aspetto, JavaScript per le regole.

## Anteprima

```
Anteprima della soluzione di riferimento (impiccato):

+---------------------------------+
| Impiccato                       |
|                                 |
| Vite: ❤️❤️❤️❤️                   |
|                                 |
| A L G _ R I T M _               |
|                                 |
| [A][B][C][D][E][F][G][H][I]     |
| [J][K][L][M][N][O][P][Q][R]     |
| [S][T][U][V][W][X][Y][Z]        |
|                                 |
| [ Nuova partita ]               |
+---------------------------------+
```

## Descrizione

### Come procedere

1. **Scrivi le regole** su un foglio, in poche righe: cosa vede il giocatore, cosa può fare, quando vince e quando perde.
2. **Disegna la pagina** a mano: quali elementi servono e con quali `id`.
3. **Scrivi l'HTML** e controlla che la pagina si veda; poi il CSS.
4. **Scrivi lo script a piccoli passi**: prima una funzione che mostra qualcosa, poi quella che reagisce a un clic, poi la logica del gioco. Dopo ogni passo prova la pagina.
5. **Rifinisci**: controlla i casi limite (clic ripetuti, partita già finita, campo vuoto) e aggiungi i commenti.

### La soluzione di riferimento: l'impiccato

Il programma sceglie a caso una parola da un array e la mostra con un trattino basso al posto di ogni lettera ancora da indovinare. Le lettere dell'alfabeto sono dei pulsanti **creati da JavaScript** con un ciclo, invece di essere scritti a mano nell'HTML uno per uno. A ogni lettera premuta si controlla con `includes` se la parola la contiene: in caso positivo la lettera viene scoperta, altrimenti si perde una vita. La partita finisce quando la parola è completa (vittoria) o le vite sono zero (sconfitta).

Tre novità rispetto agli esercizi precedenti:

- **Le stringhe come array**: `parola[i]` dà il carattere in posizione `i`, proprio come per un array, e `parola.length` dice quanti caratteri contiene.
- **`repeat`**: `"❤️".repeat(3)` ripete il testo tre volte e permette di disegnare le vite come una fila di cuori.
- **Template literal**: una stringa tra apici inversi (`` ` ``) può contenere `${nome}`, che viene sostituito dal valore della variabile `nome`. È un'alternativa più leggibile alla concatenazione con `+` quando il testo ha molte virgolette, come qui, dove si costruisce codice HTML:

```js
const lettera = "A";
const tasto = `<button id="tasto-${lettera}" onclick="prova('${lettera}')">${lettera}</button>`;
```

## Suggerimenti

- Parti da un gioco piccolo e fallo funzionare: è meglio un gioco semplice e completo che uno ambizioso e a metà.
- Se un elemento non risponde, controlla che l'`id` in HTML sia identico a quello usato in JavaScript e che lo script sia collegato **in fondo** al `<body>`.
- Quando scrivi codice HTML da JavaScript con `innerHTML`, usa solo testo deciso da te, mai testo scritto dall'utente.
- Per la consegna alla classe vanno bene i tre file nella stessa cartella: `index.html`, `style.css`, `script.js`.
- Estensione: tieni il miglior punteggio ottenuto dall'apertura della pagina e mostralo accanto a quello attuale.

## Soluzione

=== "index.html"
    ```html
    --8<-- "HTML-CSS-Javascript/Gioco-a-scelta/index.html"
    ```
=== "style.css"
    ```css
    --8<-- "HTML-CSS-Javascript/Gioco-a-scelta/style.css"
    ```
=== "script.js"
    ```js
    --8<-- "HTML-CSS-Javascript/Gioco-a-scelta/script.js"
    ```

<div class="oc-embed"
     data-path="HTML-CSS-Javascript/Gioco-a-scelta/index.html;HTML-CSS-Javascript/Gioco-a-scelta/style.css;HTML-CSS-Javascript/Gioco-a-scelta/script.js"
     data-lang="html"
     data-height="600"
     data-autorun="true">
</div>
