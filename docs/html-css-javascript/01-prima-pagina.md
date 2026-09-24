# Prima pagina HTML

Crea la tua prima pagina HTML seguendo esattamente questa struttura: un titolo di scheda "La mia prima pagina", un titolo principale con il tuo nome e cognome, e un paragrafo con questo testo (sostituendo i campi tra parentesi quadre): *"Ciao, mi chiamo [nome cognome] e frequento la classe [classe] dell'IIS Andrea Ponti. Questa è la mia prima pagina web!"*

## Obiettivo

Scrivere una pagina HTML minima ma completa e corretta: dichiarazione del documento, intestazione con titolo, e un contenuto visibile nel corpo.

## Anteprima

```
+------------------------------------------+
| La mia prima pagina                      | <- titolo scheda browser
+------------------------------------------+
|                                          |
| Mario Rossi                              | <- h1
|                                          |
| Ciao, mi chiamo Mario Rossi e frequento  | <- p
| la classe 3A Informatica dell'IIS Andrea |
| Ponti. Questa è la mia prima pagina web! |
|                                          |
+------------------------------------------+
```

## Descrizione

### La dichiarazione del documento

Ogni pagina HTML inizia con `<!DOCTYPE html>`, che dice al browser di interpretare il file secondo lo standard HTML5. Subito dopo viene l'elemento `<html>`, che racchiude tutta la pagina; l'attributo `lang="it"` dichiara che il contenuto è in italiano (aiuta i motori di ricerca e i lettori per non vedenti).

```html
<!DOCTYPE html>
<html lang="it">
  ...
</html>
```

### L'intestazione: `head` e `title`

Dentro `<html>` c'è l'elemento **`head`**, che contiene informazioni sulla pagina non visibili nel corpo (come il titolo o il set di caratteri). Il tag **`meta charset="UTF-8"`** dichiara la codifica dei caratteri, così accenti e simboli speciali vengono mostrati correttamente. L'elemento **`title`** definisce il testo che compare nella scheda del browser.

```html
<head>
  <meta charset="UTF-8">
  <title>La mia prima pagina</title>
</head>
```

### Il corpo della pagina: `body`

Tutto ciò che è visibile all'utente va dentro l'elemento **`body`**. Qui useremo un titolo `<h1>` (il titolo principale della pagina, ne esiste uno solo per pagina) e un paragrafo `<p>` per il testo.

```html
<body>
  <h1>...</h1>
  <p>...</p>
</body>
```

## Suggerimenti

- Rispetta l'ordine degli elementi: `<!DOCTYPE html>`, poi `<html>`, dentro cui stanno `<head>` e `<body>`.
- Ogni tag di apertura va chiuso: `<p>` si chiude con `</p>`.
- Il testo del paragrafo può andare su più righe nel codice sorgente: il browser lo mostrerà comunque come un unico blocco di testo.

## Soluzione

```html
--8<-- "HTML-CSS-Javascript/Prima-pagina/index.html"
```

<div class="oc-embed"
     data-path="HTML-CSS-Javascript/Prima-pagina/index.html"
     data-lang="html"
     data-autorun="true">
</div>
