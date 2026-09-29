# Pagina personale "Chi sono" v2

Scrivi il file `style.css` collegato al documento HTML già pronto (non modificarlo) per trasformare la pagina "Chi sono" della sezione precedente in un vero layout moderno: su schermi larghi almeno 700px, "Chi sono" occupa una colonna più larga a sinistra mentre "Competenze" e "Link utili" si impilano in una colonna più stretta a destra; su schermi più piccoli, tutto torna a una singola colonna. Le competenze, inoltre, non sono più un elenco ma una fila di "tag" colorati che vanno a capo quando non c'entrano su una riga.

## Obiettivo

Riprendere lo stesso contenuto della pagina "Chi sono" (sezione 2) e riorganizzarlo con un vero layout: Grid per la struttura generale della pagina, Flexbox per i piccoli gruppi di elementi al suo interno, una media query per adattarsi allo schermo.

## Anteprima

```
Schermo largo (>= 700px):
+------------------------------------------+
|              (DP) Sono un programmatore  |
+---------------------------+--------------+
| Chi sono                  | Competenze   |
| "Imparare a programmare   | [Java][C]    |
|  significa..."            | [Bash]...    |
| Frequento l'indirizzo...  +--------------+
|                            | Link utili  |
|                            | GitHub, MDN |
+---------------------------+--------------+

Schermo stretto (< 700px): le tre sezioni si
impilano una sopra l'altra, a piena larghezza.
```

## Descrizione

Non ci sono concetti nuovi in questo esercizio: è la stessa pagina della sezione precedente, con lo stesso contenuto testuale, ma ripensata con gli strumenti di layout visti in questa sezione.

### Grid per la struttura, Flexbox per i dettagli

Il contenitore `.contenuto` usa **Grid** con `grid-template-areas` (esercizio sul layout del blog) per definire le due colonne principali della pagina. Dentro una di quelle aree, `.tag-lista` usa invece **Flexbox** con `flex-wrap` (esercizio sulla vetrina di libri) per disporre i singoli tag. Grid e Flexbox non sono in competizione: si usa Grid per la struttura a "griglia" della pagina nel suo insieme, Flexbox per l'allineamento di piccoli gruppi di elementi al suo interno — è la combinazione più comune nei siti reali.

### Una sola media query per tutta la pagina

```css
@media (min-width: 700px) {
  .contenuto {
    grid-template-columns: 2fr 1fr;
    grid-template-areas:
      "chi       competenze"
      "chi       contatti";
  }
}
```

Sotto i 700px, `.contenuto` resta a una colonna (il valore di base, fuori dalla media query): le tre `<section>` si impilano naturalmente una sotto l'altra, senza bisogno di altre regole.

## Suggerimenti

- Se le due colonne non compaiono, controlla di aver aggiunto `grid-area` a tutte e tre le `<section>` **dentro** la media query (le regole di base, fuori dalla media query, non impostano `grid-template-columns`, quindi `grid-area` da solo non baste al di sotto dei 700px).
- Il fatto che "Chi sono" occupi due righe di `grid-template-areas` (`"chi competenze"` e `"chi contatti"`) è ciò che lo fa apparire più alto delle altre due sezioni, occupando entrambe le righe della colonna di sinistra.
- Questa stessa pagina, con lo stesso contenuto, tornerà un'ultima volta più avanti nel percorso, quando vedremo JavaScript: per ora resta "statica", ma la struttura HTML è già pronta per aggiungere in futuro interattività (es. un tema chiaro/scuro).

## Soluzione

=== "index.html"
    ```html
    --8<-- "HTML-CSS-Javascript/Chi-sono-v2/index.html"
    ```
=== "style.css"
    ```css
    --8<-- "HTML-CSS-Javascript/Chi-sono-v2/style.css"
    ```

<div class="oc-embed"
     data-path="HTML-CSS-Javascript/Chi-sono-v2/index.html;HTML-CSS-Javascript/Chi-sono-v2/style.css"
     data-lang="html"
     data-autorun="true">
</div>
