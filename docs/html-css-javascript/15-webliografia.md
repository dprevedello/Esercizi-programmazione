# Sitografia dei linguaggi studiati

Scrivi il file `style.css` collegato al documento HTML già pronto (non modificarlo) in modo che i link: non siano mai sottolineati a riposo, siano blu scuro se non ancora visitati, viola se già visitati, arancione e sottolineati al passaggio del mouse, rossi mentre vengono cliccati.

## Obiettivo

Differenziare l'aspetto di un link nei suoi diversi stati, usando le quattro pseudo-classi dedicate ai link, nell'ordine corretto.

## Anteprima

```
+------------------------------------------------+
| Documentazione ufficiale                       |
|                                                |
| Documentazione Java        <- blu scuro,       |
| Documentazione C              non sottolineato |
| Documentazione Python                          |
| Manuale Bash               <- viola se già     |
| Documentazione HTML (MDN)     visitato         |
| Documentazione CSS (MDN)                       |
+------------------------------------------------+
   (al passaggio del mouse: arancione e
    sottolineato — durante il click: rosso)
```

## Descrizione

### Le quattro pseudo-classi dei link

Un elemento `<a>` con `href` può trovarsi in quattro stati diversi, ciascuno selezionabile con la propria pseudo-classe:

- **`:link`** — il link non è mai stato visitato (stato "a riposo").
- **`:visited`** — l'utente ha già visitato quella pagina in passato (il browser lo ricorda dalla cronologia).
- **`:hover`** — il puntatore del mouse è sopra il link, senza aver ancora cliccato.
- **`:active`** — il link è nel momento esatto del clic (tra il "premi" e il "rilascia" il pulsante del mouse).

```css
a:link {
  color: navy;
}
a:visited {
  color: purple;
}
a:hover {
  color: darkorange;
}
a:active {
  color: red;
}
```

### Perché l'ordine conta: la regola "LVHA"

Quando più pseudo-classi selezionano lo stesso elemento nello stesso momento (ad esempio un link già visitato *e* sotto il mouse), vince l'ultima regola scritta nel file, a parità di specificità. Per questo motivo si scrivono sempre in un ordine preciso, ricordato con l'acronimo **LVHA**: **L**ink, **V**isited, **H**over, **A**ctive. Scrivendole in un ordine diverso, ad esempio mettendo `:hover` prima di `:visited`, un link visitato non cambierebbe mai colore al passaggio del mouse.

### Rimuovere la sottolineatura: `text-decoration`

**`text-decoration`** controlla le linee decorative del testo. Il valore `none` rimuove la sottolineatura che i browser applicano di default ai link; `underline` la aggiunge (utile per farla comparire solo in un singolo stato, come `:hover`):

```css
a:link {
  text-decoration: none;
}
a:hover {
  text-decoration: underline;
}
```

## Suggerimenti

- Nella sandbox qui sotto puoi passare il mouse sui link per vedere `:hover` dal vivo; `:active` si vede solo nell'istante del clic, `:visited` solo se il browser ha già memorizzato quella pagina nella cronologia.
- Se `:hover` sembra non funzionare, controlla di non averlo scritto prima di `:link`/`:visited` nel file: l'ordine LVHA non è solo una convenzione, cambia davvero il risultato.
- `a` da sola (senza pseudo-classe) si applica a un link in *qualunque* stato: se serve una regola comune a tutti gli stati (come il font), conviene scriverla lì invece di ripeterla in ciascuna delle quattro pseudo-classi.

## Soluzione

=== "index.html"
    ```html
    --8<-- "HTML-CSS-Javascript/Webliografia/index.html"
    ```
=== "style.css"
    ```css
    --8<-- "HTML-CSS-Javascript/Webliografia/style.css"
    ```

<div class="oc-embed"
     data-path="HTML-CSS-Javascript/Webliografia/index.html;HTML-CSS-Javascript/Webliografia/style.css"
     data-lang="html"
     data-autorun="true">
</div>
