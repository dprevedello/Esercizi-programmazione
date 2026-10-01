# Primo script

Scrivi il file `script.js` collegato al documento HTML già pronto (non modificarlo) in modo che, premendo il pulsante «Saluta», il paragrafo con id `messaggio` mostri la scritta «Ciao, mondo! Questo testo l'ha scritto JavaScript.». Il pulsante chiama la funzione `saluta()`: sei tu a doverla definire.

## Obiettivo

Scrivere la prima funzione JavaScript e usarla per cambiare il testo di un elemento della pagina quando l'utente clicca un pulsante.

## Anteprima

```
Prima del clic:                         Dopo il clic:
+-------------------------------+       +-------------------------------+
| Il mio primo script           |       | Il mio primo script           |
|                               |       |                               |
| Premi il pulsante per far     |       | Ciao, mondo! Questo testo     |
| scrivere qualcosa a           |       | l'ha scritto JavaScript.      |
| JavaScript.                   |       |                               |
|                               |       |                               |
| [ Saluta ]                    |       | [ Saluta ]                    |
+-------------------------------+       +-------------------------------+
```

## Descrizione

### Lo script: il tag `<script>`

**JavaScript** è il linguaggio che permette a una pagina web di *reagire* a ciò che fa l'utente: HTML dà la struttura, CSS l'aspetto, JavaScript il comportamento. Il codice si scrive in un file con estensione `.js` e si collega alla pagina con il tag `<script>`, **in fondo al `<body>`**, dopo tutti gli altri elementi: in questo modo, quando il codice parte, il browser ha già letto la pagina e gli elementi esistono.

```html
  <script src="script.js"></script>
</body>
```

Nel documento HTML di questo esercizio il collegamento è già scritto: tu lavori solo nel file `script.js`.

### Le funzioni

Una **funzione** è un blocco di istruzioni con un nome, che viene eseguito solo quando qualcuno la **chiama**. Si scrive con la parola `function`, il nome, due parentesi tonde e le parentesi graffe che contengono le istruzioni:

```js
function saluta() {
  // le istruzioni vanno scritte qui dentro
}
```

Le righe che iniziano con `//` sono **commenti**: il browser le ignora, servono solo a chi legge il codice. Ogni istruzione termina con un punto e virgola (`;`).

### Trovare un elemento: `getElementById`

Per cambiare un elemento della pagina bisogna prima trovarlo. `document.getElementById("messaggio")` significa: "cerca nella pagina (`document`) l'elemento con id `messaggio`". Gli `id` sono quelli già visti negli esercizi HTML e CSS. Il testo tra virgolette si chiama **stringa**.

### Cambiare il testo: `textContent`

`textContent` è il testo contenuto in un elemento. Si può cambiare scrivendo `=` e il nuovo valore (questa operazione si chiama **assegnazione**: il simbolo `=` non vuol dire "uguale", ma "metti questo valore qui"):

```js
document.getElementById("titolo").textContent = "Nuovo titolo";
```

### Chiamare la funzione dal pulsante: `onclick`

Nell'HTML il pulsante ha l'attributo `onclick="saluta()"`, che significa: "quando qualcuno clicca, chiama la funzione `saluta`". Quell'attributo c'è già: tu devi solo scrivere la funzione con lo stesso nome.

## Suggerimenti

- JavaScript distingue le **maiuscole dalle minuscole**: `saluta` e `Saluta` sono due nomi diversi. Il nome della funzione deve essere identico a quello scritto nell'`onclick`.
- Se premi il pulsante e non succede nulla, controlla l'ortografia dell'id tra virgolette e che ogni virgoletta aperta sia stata chiusa. Aprendo la pagina in locale, il tasto F12 mostra la Console del browser con gli errori in rosso.
- Il testo che inserisci tra virgolette deve essere esattamente quello richiesto, comprese maiuscole e punteggiatura. Dentro una stringa tra virgolette doppie l'apostrofo (`'`) si può scrivere senza problemi.
- Estensione: dopo aver finito, aggiungi in locale un secondo pulsante «Cancella» che svuota il paragrafo (assegna a `textContent` la stringa vuota `""`).

## Soluzione

=== "index.html"
    ```html
    --8<-- "HTML-CSS-Javascript/Primo-script/index.html"
    ```
=== "style.css"
    ```css
    --8<-- "HTML-CSS-Javascript/Primo-script/style.css"
    ```
=== "script.js"
    ```js
    --8<-- "HTML-CSS-Javascript/Primo-script/script.js"
    ```

<div class="oc-embed"
     data-path="HTML-CSS-Javascript/Primo-script/index.html;HTML-CSS-Javascript/Primo-script/style.css;HTML-CSS-Javascript/Primo-script/script.js"
     data-lang="html"
     data-autorun="true">
</div>
