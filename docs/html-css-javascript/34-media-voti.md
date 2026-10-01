# Media dei voti

Scrivi il file `script.js` per la pagella già pronta nel documento HTML (non modificarlo). Premendo «Calcola la media» (il pulsante chiama la funzione `calcolaMedia()`), il programma legge i tre voti dai campi `voto1`, `voto2`, `voto3`, calcola la media e scrive nel paragrafo `risultato` «Media: X – giudizio», con X arrotondata a un decimale. Il giudizio è: sotto il 4 «gravemente insufficiente», da 4 a meno di 6 «insufficiente», da 6 a meno di 7 «sufficiente», da 7 a meno di 8,5 «buono», da 8,5 in su «ottimo». Assegna al paragrafo la classe `rosso` per i primi due giudizi, `arancione` per «sufficiente» e `verde` per gli altri due (le classi sono già definite in `style.css`). Se un voto non è compreso tra 0 e 10, deve comparire solo «Inserisci voti tra 0 e 10», senza nessuna classe.

## Obiettivo

Combinare più condizioni con gli operatori logici, scegliere un giudizio tra più alternative e cambiare l'aspetto del risultato assegnando una classe CSS dal codice JavaScript.

## Anteprima

```
+---------------------------------+
| Pagella                         |
|                                 |
| Voto 1  [ 7   ]                 |
| Voto 2  [ 8   ]                 |
| Voto 3  [ 6   ]                 |
|                                 |
| [ Calcola la media ]            |
|                                 |
| Media: 7.0 – buono              |  <- in verde
+---------------------------------+
```

## Descrizione

### Più condizioni in sequenza

Quando le alternative sono più di due si scrive una **scala di `else if`**. L'ordine conta: il browser si ferma alla prima condizione vera e salta le altre. Per questo i controlli sulle soglie si scrivono partendo da un estremo (qui dal voto più basso):

```js
if (media < 4) {
  giudizio = "gravemente insufficiente";
} else if (media < 6) {      // arriva qui solo se media >= 4
  giudizio = "insufficiente";
} else {
  giudizio = "sufficiente o più";
}
```

### Gli operatori logici: `||` e `&&`

Per unire più condizioni in una sola si usano gli **operatori logici**:

- **`&&`** si legge "e": la condizione complessiva è vera quando **tutte** le condizioni sono vere.
- **`||`** si legge "oppure": è vera quando **almeno una** condizione è vera.

```js
if (voto < 0 || voto > 10) {
  // il voto è fuori dall'intervallo 0-10
}
```

### Cambiare la classe di un elemento: `className`

Ogni elemento ha una proprietà `className` con il contenuto dell'attributo `class` in HTML. Assegnandole un nuovo valore si cambia l'aspetto dell'elemento, perché il browser applica le regole CSS della nuova classe. Un'assegnazione alla stringa vuota toglie ogni classe:

```js
risultato.className = "verde";   // <p id="risultato" class="verde">
risultato.className = "";        // nessuna classe
```

È il modo più comodo per far decidere a JavaScript l'aspetto, lasciando però i colori e gli stili nel file CSS.

### Arrotondare: `toFixed`

`numero.toFixed(1)` restituisce il numero arrotondato con **1 cifra decimale** (come testo). Con `toFixed(2)` si hanno due decimali:

```js
const media = 7.0333;
media.toFixed(1);   // "7.0"
```

## Suggerimenti

- Fai prima il controllo degli errori con `if (... || ...)` e solo nel ramo `else` calcola la media: così non rischi di mostrare una media senza senso.
- Per non scrivere sei confronti su una sola riga lunghissima puoi andare a capo dopo ogni `||`: JavaScript lo permette.
- Memorizza il giudizio in una variabile `let giudizio` e la classe in una variabile `let colore`, riempite dalla scala di `else if`; solo alla fine scrivi il testo e imposta `className`.
- Un campo lasciato vuoto vale `0` e viene accettato come voto: provalo, e pensa a come potresti impedirlo (estensione facoltativa).
- Verifica i casi limite: `4, 4, 4` (media esattamente 4, quindi «insufficiente»), `8, 9, 8` (media 8,3, quindi «buono»), `0, 0, 0`, e un voto `11`.

## Soluzione

=== "index.html"
    ```html
    --8<-- "HTML-CSS-Javascript/Media-voti/index.html"
    ```
=== "style.css"
    ```css
    --8<-- "HTML-CSS-Javascript/Media-voti/style.css"
    ```
=== "script.js"
    ```js
    --8<-- "HTML-CSS-Javascript/Media-voti/script.js"
    ```

<div class="oc-embed"
     data-path="HTML-CSS-Javascript/Media-voti/index.html;HTML-CSS-Javascript/Media-voti/style.css;HTML-CSS-Javascript/Media-voti/script.js"
     data-lang="html"
     data-autorun="true">
</div>
