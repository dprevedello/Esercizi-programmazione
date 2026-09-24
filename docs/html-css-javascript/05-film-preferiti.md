# Div, span, class e id

Crea una pagina "I miei film preferiti" con un `id` sul titolo principale e tre `div` (tutti con la stessa `class`, ad esempio `scheda-film`), uno per ciascuno di questi film:

- **Matrix** (1999) — Un hacker scopre che la realtà è una simulazione controllata dalle macchine. Genere: *Fantascienza*
- **Inception** (2010) — Un ladro capace di entrare nei sogni altrui deve compiere il furto perfetto: impiantare un'idea. Genere: *Fantascienza*
- **Interstellar** (2014) — Un gruppo di astronauti cerca un nuovo pianeta abitabile attraverso un buco nero. Genere: *Fantascienza/Drammatico*

All'interno di ogni scheda, racchiudi il genere in uno `span`.

## Obiettivo

Raggruppare contenuti correlati con `div`, distinguere elementi che si ripetono (con `class`) da elementi unici (con `id`), ed evidenziare porzioni di testo in linea con `span`.

## Anteprima

```
+--------------------------------------------+
| I miei film preferiti                      | <- h1 con id="titolo"
|                                            |
| +---------------------------------------+  |
| | Matrix (1999)                          | | <- div.scheda-film
| | Un hacker scopre che la realtà...      | |
| | Genere: Fantascienza                   | | <- "Fantascienza" in span
| +---------------------------------------+  |
| +---------------------------------------+  |
| | Inception (2010)                       | | <- div.scheda-film
| | Un ladro capace di entrare...          | |
| | Genere: Fantascienza                   | |
| +---------------------------------------+  |
| +---------------------------------------+  |
| | Interstellar (2014)                    | | <- div.scheda-film
| | Un gruppo di astronauti cerca...       | |
| | Genere: Fantascienza/Drammatico        | |
| +---------------------------------------+  |
+--------------------------------------------+
```

## Descrizione

### Raggruppare contenuti: `div`

L'elemento **`div`** (*division*) è un contenitore generico, senza alcun significato particolare: serve solo a raggruppare altri elementi, ad esempio per trattarli insieme come un blocco unico (una "scheda", una "card"). Va a capo prima e dopo, come i paragrafi.

```html
<div>
  <h2>Titolo della scheda</h2>
  <p>Contenuto della scheda...</p>
</div>
```

### Evidenziare in linea: `span`

**`span`** è l'equivalente di `div` ma per il testo in linea: non va a capo, e serve per isolare una piccola parte di testo dentro un paragrafo (ad esempio per applicarle uno stile diverso in futuro con il CSS).

```html
<p>Genere: <span>Fantascienza</span></p>
```

### Riutilizzabile o unico: `class` e `id`

L'attributo **`class`** si può assegnare a più elementi: serve a dire "questi elementi sono dello stesso tipo" (le tre schede-film condividono la classe `scheda-film`). L'attributo **`id`** invece deve essere **unico** in tutta la pagina: identifica un singolo elemento specifico (in questo esercizio, solo il titolo principale).

```html
<h1 id="titolo">...</h1>
<div class="scheda-film">...</div>
```

## Suggerimenti

- Una `class` può ripetersi su più elementi, un `id` no: se lo scrivi due volte nella stessa pagina, il codice non è più valido.
- Il nome di classi e id è a scelta libera, ma per convenzione si scrive in minuscolo, con trattini al posto degli spazi (`scheda-film`, non `SchedaFilm` o `scheda film`).
- Per ora `class` e `id` non cambiano nulla nell'aspetto della pagina: serviranno quando, nella prossima sezione, introdurremo il CSS.

## Soluzione

```html
--8<-- "HTML-CSS-Javascript/Film-preferiti/index.html"
```

<div class="oc-embed"
     data-path="HTML-CSS-Javascript/Film-preferiti/index.html"
     data-lang="html"
     data-autorun="true">
</div>
