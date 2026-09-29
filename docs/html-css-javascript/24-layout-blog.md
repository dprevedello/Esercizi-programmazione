# Layout di un blog

Scrivi il file `style.css` collegato al documento HTML già pronto (non modificarlo) in modo da ottenere il classico layout a blog: intestazione a tutta larghezza in alto, barra laterale a sinistra, contenuto principale a destra, piè di pagina a tutta larghezza in basso — usando le aree nominate di Grid, non calcoli manuali di larghezza.

## Obiettivo

Assegnare un nome a ogni zona del layout e posizionare gli elementi per nome, invece che per riga e colonna numerica.

## Anteprima

```
+------------------------------------------+
| Il Blog di Rete                          | <- intestazione (tutta larghezza)
+------------------+-----------------------+
| Categorie        | Come funziona il      |
| Archivio         | protocollo TCP        | <- laterale | contenuto
| Chi scrive       | Il TCP garantisce...  |
+------------------+-----------------------+
|          © 2026 Il Blog di Rete          | <- piede (tutta larghezza)
+------------------------------------------+
```

## Descrizione

### Disegnare il layout: `grid-template-areas`

**`grid-template-areas`** permette di "disegnare" il layout scrivendo il nome di ogni area dentro una griglia di stringhe: ogni riga di testo corrisponde a una riga della griglia, e ripetere lo stesso nome più volte fa "fondere" quelle celle in un'unica area più grande.

```css
.pagina {
  display: grid;
  grid-template-areas:
    "intestazione intestazione"
    "laterale     contenuto"
    "piede        piede";
}
```

Qui `intestazione` occupa entrambe le colonne nella prima riga, `laterale` e `contenuto` si dividono la riga centrale, `piede` torna a occupare tutta la larghezza nell'ultima riga — il codice si "legge" quasi come un disegno del layout finale.

### Collegare un elemento a un'area: `grid-area`

Ogni figlio del contenitore Grid si posiziona nell'area corrispondente assegnandogli lo stesso nome con **`grid-area`**:

```css
.intestazione {
  grid-area: intestazione;
}
.contenuto {
  grid-area: contenuto;
}
```

L'elemento si sposta automaticamente nella zona giusta della griglia, qualunque sia la sua posizione nel codice HTML.

### Combinare colonne fisse e flessibili

Le colonne di questo layout non sono uguali tra loro: la barra laterale ha una larghezza fissa, il contenuto occupa il resto dello spazio.

```css
.pagina {
  grid-template-columns: 200px 1fr;
}
```

`200px` fissa la prima colonna a una larghezza costante; `1fr` fa sì che la seconda colonna occupi tutto lo spazio rimanente, qualunque sia la larghezza dello schermo.

### Un'altezza minima per tutta la pagina: `min-height: 100vh`

**`vh`** (*viewport height*) è un'unità relativa all'altezza della finestra del browser: `100vh` corrisponde all'intera altezza visibile. Usarla come `min-height` sul contenitore Grid fa in modo che il piè di pagina resti in fondo alla pagina anche quando il contenuto è poco, invece di "salire" subito sotto il testo.

## Suggerimenti

- I nomi delle aree in `grid-template-areas` devono formare sempre un **rettangolo**: non è possibile, ad esempio, far "saltare" un'area in modo che circondi un'altra su tre lati.
- Se un'area non compare dove previsto, controlla che il nome scritto in `grid-area` sia scritto **esattamente** come nella "mappa" di `grid-template-areas` (compresi eventuali errori di battitura).
- Estensione: prova ad aggiungere una colonna per una seconda barra laterale a destra (es. "In evidenza"), aggiornando sia `grid-template-columns` che le tre righe di `grid-template-areas`.

## Soluzione

=== "index.html"
    ```html
    --8<-- "HTML-CSS-Javascript/Layout-blog/index.html"
    ```
=== "style.css"
    ```css
    --8<-- "HTML-CSS-Javascript/Layout-blog/style.css"
    ```

<div class="oc-embed"
     data-path="HTML-CSS-Javascript/Layout-blog/index.html;HTML-CSS-Javascript/Layout-blog/style.css"
     data-lang="html"
     data-autorun="true">
</div>
