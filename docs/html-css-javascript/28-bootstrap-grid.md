# Introduzione a Bootstrap

Crea da zero una pagina `index.html` che collega **Bootstrap** tramite CDN (nessun `style.css` in questo esercizio: userai solo le classi già pronte di Bootstrap) e presenta un corso online: un titolo centrato, un sottotitolo, e tre colonne affiancate — "Lezioni pratiche", "Supporto dei docenti", "Certificato finale" — ciascuna con un titolo e una breve descrizione, che si impilano automaticamente una sopra l'altra sugli schermi stretti.

## Obiettivo

Usare per la prima volta un **framework CSS**: collegare Bootstrap da CDN e costruire un layout a griglia con le sue classi già pronte (`container`, `row`, `col-*`), senza scrivere una sola riga di CSS personalizzato.

## Anteprima

```
Schermo largo:
+------------------------------------------+
|         Impara a programmare da zero     |
|     Un corso pensato per chi parte...    |
+---------------+---------------+----------+
| Lezioni       | Supporto dei  | Certif.  |
| pratiche      | docenti       | finale   |
+---------------+---------------+----------+

Schermo stretto: le tre colonne si impilano
automaticamente una sopra l'altra.
```

## Descrizione

### Cos'è un framework CSS

Un **framework CSS** come Bootstrap è un foglio di stile già scritto da altri, pubblicato per essere riusato: fornisce classi pronte per i problemi più comuni (griglie, bottoni, barre di navigazione...) invece di scrivere ogni regola da zero. Non sostituisce quello che hai imparato finora: **usa** proprio Flexbox e Grid dietro le quinte, per fare esattamente le cose che hai già imparato a fare a mano, ma con meno codice da scrivere.

### Collegare Bootstrap da CDN

Un **CDN** (*Content Delivery Network*) è un servizio che ospita file pubblici, come le librerie più diffuse, così non serve scaricarle: basta un `<link>` nell'`<head>`, esattamente come per Google Fonts nell'esercizio sulla locandina:

```html
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
```

Da questo momento, tutte le classi di Bootstrap sono disponibili nella pagina, senza bisogno di un file `style.css` proprio.

### Il contenitore: `container`

La classe **`container`** racchiude il contenuto della pagina con margini laterali e una larghezza massima, che si adatta a "scalini" alle diverse dimensioni di schermo — il corrispettivo, pronto all'uso, del `max-width: ...; margin: 0 auto;` che avresti scritto a mano.

```html
<div class="container">
  ...
</div>
```

### Righe e colonne: `row` e `col-*`

Il sistema a griglia di Bootstrap si basa su due classi: **`row`** crea una riga flessibile (usa Flexbox sotto il cofano, esattamente come nell'esercizio sulla vetrina di libri), e al suo interno ogni **`col-*`** è una colonna. Lo schema a 12 colonne di Bootstrap divide ogni riga in 12 parti uguali: `col-md-4` significa "questa colonna occupa 4 delle 12 parti disponibili, cioè un terzo della riga, da schermi *medium* in su".

```html
<div class="row">
  <div class="col-md-4">...</div>
  <div class="col-md-4">...</div>
  <div class="col-md-4">...</div>
</div>
```

Sotto la soglia "medium" (circa 768px), Bootstrap fa impilare automaticamente le colonne una sopra l'altra: è già **responsive di default**, senza bisogno di scrivere tu una media query.

### Classi di utilità

Bootstrap offre anche piccole classi "di utilità" per esigenze comuni, da applicare direttamente nell'HTML: `text-center` (testo centrato), `mb-4`/`mt-5` (margine sotto/sopra, con una scala numerica di grandezze), `text-muted` (testo in un grigio più discreto).

```html
<h1 class="text-center mb-4">Impara a programmare da zero</h1>
```

## Suggerimenti

- Bootstrap richiede che ogni `col-*` sia sempre dentro una `row`, e ogni `row` sempre dentro un `container` (o `container-fluid`, a piena larghezza): saltare uno di questi livelli produce risultati imprevedibili.
- Se le colonne non si vedono affiancate nemmeno su schermo largo, controlla di aver scritto `col-md-4` e non semplicemente `col-4` (che invece si applicherebbe già da subito, senza aspettare la soglia "medium").
- Estensione: prova a sostituire `col-md-4` con `col-sm-6 col-lg-4` e osserva come ottieni un terzo comportamento intermedio (due colonne sugli schermi *small*, tre sugli schermi *large*).

## Soluzione

```html
--8<-- "HTML-CSS-Javascript/Bootstrap-grid/index.html"
```

<div class="oc-embed"
     data-path="HTML-CSS-Javascript/Bootstrap-grid/index.html"
     data-lang="html"
     data-autorun="true">
</div>
