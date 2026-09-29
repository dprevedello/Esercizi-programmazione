# Badge di notifica e pulsante "torna su"

Scrivi il file `style.css` collegato al documento HTML già pronto (non modificarlo) per ottenere tre effetti che il flusso normale della pagina non permette: un numero rosso agganciato nell'angolo di un'icona, due riquadri parzialmente sovrapposti con uno sopra l'altro, e un pulsante "Torna su" che resta sempre visibile nell'angolo dello schermo mentre si scorre la pagina.

## Obiettivo

Staccare un elemento dal normale flusso della pagina e posizionarlo esattamente dove serve, usando `position` nelle sue diverse modalità e `z-index` per decidere chi sta sopra a chi.

## Anteprima

```
   🔔⁵                    <- il badge "5" agganciato in alto
                             a destra dell'icona campanella

+----------------+
|  Riquadro A    |
|      +----------------+
|      |  Riquadro B    | <- B sopra ad A, parzialmente
+------|                |    sovrapposto
       +----------------+

(scorrendo la pagina)              [ ↑ Torna su ]  <- resta sempre
                                                        nell'angolo
```

## Descrizione

### Il comportamento predefinito: `position: static`

Ogni elemento HTML è, per impostazione predefinita, in **`position: static`**: occupa il proprio posto nel normale flusso della pagina, uno dopo l'altro, e proprietà come `top`/`left`/`right`/`bottom` non hanno alcun effetto su di lui. È il comportamento visto finora in tutti gli esercizi precedenti, senza bisogno di dichiararlo esplicitamente.

### Un punto di riferimento: `position: relative`

**`position: relative`** lascia l'elemento nel flusso normale (occupa comunque il suo spazio), ma lo rende un **punto di riferimento** per eventuali elementi con `position: absolute` al suo interno:

```css
.icona-contenitore {
  position: relative;
}
```

Da solo, `position: relative` non sposta visibilmente nulla: il suo ruolo si vede solo in combinazione con `position: absolute` su un elemento figlio.

### Uscire dal flusso: `position: absolute`

**`position: absolute`** rimuove l'elemento dal flusso normale (non occupa più spazio tra gli altri elementi) e lo posiziona rispetto al più vicino antenato con `position: relative` (o `absolute`/`fixed`), usando `top`/`right`/`bottom`/`left`:

```css
.badge {
  position: absolute;
  top: -6px;
  right: -10px;
}
```

Valori negativi (come qui) spostano l'elemento **fuori** dal riquadro dell'antenato: il badge "sborda" leggermente dall'angolo dell'icona, invece di restare dentro di essa.

### Restare fermo sullo schermo: `position: fixed`

**`position: fixed`** funziona come `absolute`, ma il punto di riferimento è sempre la **finestra del browser**, non un antenato della pagina: l'elemento resta nella stessa posizione sullo schermo anche mentre si scorre la pagina.

```css
.torna-su {
  position: fixed;
  bottom: 20px;
  right: 20px;
}
```

### Chi sta sopra a chi: `z-index`

Quando due elementi posizionati (`relative`, `absolute` o `fixed`) si sovrappongono, **`z-index`** decide l'ordine di sovrapposizione: un valore più alto sta sempre sopra un valore più basso, indipendentemente dall'ordine nel codice HTML.

```css
.riquadro-dietro {
  z-index: 1;
}
.riquadro-davanti {
  z-index: 2; /* sopra all'altro riquadro */
}
```

## Suggerimenti

- `z-index` funziona solo su elementi che hanno già un `position` diverso da `static`: su un elemento `static`, `z-index` viene semplicemente ignorato.
- Se il badge non si aggancia all'icona ma "salta" altrove nella pagina, controlla che `.icona-contenitore` abbia effettivamente `position: relative`: senza un antenato posizionato, `position: absolute` si riferisce all'intera pagina.
- Estensione: prova a rimuovere `position: relative` da `.icona-contenitore` e osserva dove "vola" il badge — capirai perché quel punto di riferimento è necessario.

## Soluzione

=== "index.html"
    ```html
    --8<-- "HTML-CSS-Javascript/Badge-notifica/index.html"
    ```
=== "style.css"
    ```css
    --8<-- "HTML-CSS-Javascript/Badge-notifica/style.css"
    ```

<div class="oc-embed"
     data-path="HTML-CSS-Javascript/Badge-notifica/index.html;HTML-CSS-Javascript/Badge-notifica/style.css"
     data-lang="html"
     data-autorun="true">
</div>
