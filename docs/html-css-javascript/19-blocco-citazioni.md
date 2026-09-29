# Blocco citazioni

Scrivi il file `style.css` collegato al documento HTML già pronto (non modificarlo) in modo che ogni citazione: abbia un bordo colorato solo a sinistra, sia in corsivo, e mostri una virgoletta decorativa grande prima e dopo il testo — senza scrivere le virgolette nell'HTML.

## Obiettivo

Aggiungere contenuto puramente decorativo a un elemento tramite CSS, usando i pseudo-elementi `::before` e `::after`, senza modificare il testo HTML.

## Anteprima

```
+------------------------------------------+
| “Il modo migliore per imparare a         | <- ::before aggiunge “
| programmare è programmare.”              | <- ::after aggiunge ”
|   — Anonimo                              | <- .autore
+------------------------------------------+
   (bordo colorato solo sul lato sinistro)

+------------------------------------------+
| “Un buon codice si commenta da solo,     |
| ma un buon commento non fa mai male.”    |
|   — Anonimo                              |
+------------------------------------------+
```

## Descrizione

### Pseudo-elementi: `::before` e `::after`

A differenza delle pseudo-classi (che selezionano un elemento già esistente in base a stato o posizione), i **pseudo-elementi** `::before` e `::after` creano un elemento "virtuale" aggiuntivo, non presente nell'HTML, posizionato rispettivamente appena prima o appena dopo il contenuto reale dell'elemento:

```css
.citazione::before {
  content: "“";
}
.citazione::after {
  content: "”";
}
```

Questo elemento virtuale esiste solo a livello visivo: non compare aprendo il codice HTML, ed è pensato apposta per contenuto decorativo che non ha significato proprio (come le virgolette di una citazione), non per informazioni importanti che uno studente ipovedente con uno screen reader dovrebbe poter leggere.

### La proprietà obbligatoria: `content`

`::before` e `::after` **non funzionano senza** la proprietà **`content`**: è quella che stabilisce cosa mostrare (anche una stringa vuota `""`, se serve solo per creare uno spazio decorativo con altre proprietà come `background-color`).

```css
.citazione::after {
  content: "”";  /* obbligatoria, anche solo con un carattere */
  font-size: 2rem;
  color: #6c5ce7;
}
```

### Bordo su un solo lato: `border-left`

Le proprietà `border-top`, `border-right`, `border-bottom` e **`border-left`** permettono di impostare un bordo su un solo lato dell'elemento, invece dei quattro lati insieme come fa `border`:

```css
.citazione {
  border-left: 4px solid #6c5ce7;
}
```

## Suggerimenti

- Il carattere delle virgolette “ e ” (chiamate "virgolette tipografiche", diverse dalle virgolette dritte `"` della tastiera) va scritto direttamente nel valore di `content`, tra i propri apici.
- Se le virgolette non compaiono, controlla di aver scritto `::before`/`::after` con due punti doppi (la sintassi moderna dei pseudo-elementi) e non `:before`/`:after` con un punto solo (la vecchia sintassi, ancora tollerata dai browser ma da evitare nel codice nuovo).
- Estensione: prova ad aggiungere `display: block` su `.autore` (già block di suo, essendo un `<footer>`) e sperimenta `text-align: right` per allineare l'autore a destra.

## Soluzione

=== "index.html"
    ```html
    --8<-- "HTML-CSS-Javascript/Blocco-citazioni/index.html"
    ```
=== "style.css"
    ```css
    --8<-- "HTML-CSS-Javascript/Blocco-citazioni/style.css"
    ```

<div class="oc-embed"
     data-path="HTML-CSS-Javascript/Blocco-citazioni/index.html;HTML-CSS-Javascript/Blocco-citazioni/style.css"
     data-lang="html"
     data-autorun="true">
</div>
