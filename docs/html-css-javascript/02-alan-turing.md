# Titoli e paragrafi di testo

Crea una pagina su Alan Turing con questa identica struttura: un titolo principale "Alan Turing", seguito da tre sezioni con titolo di secondo livello — "Biografia", "Il contributo a Bletchley Park", "Eredità". In ciascuna sezione scrivi un paragrafo di 3-4 frasi **con parole tue**, includendo obbligatoriamente queste informazioni: in Biografia, che nacque a Londra nel 1912 e fu un matematico e logico; in Il contributo a Bletchley Park, che durante la Seconda guerra mondiale contribuì a decifrare i codici della macchina Enigma usata dai tedeschi, lavorando con la macchina "Bombe"; in Eredità, che è considerato uno dei padri dell'informatica moderna e che oggi il "Test di Turing" porta il suo nome. Concludi la pagina con un paragrafo "Per approfondire" e un link al video di Geopop [Alan Turing: il matematico che ha decifrato i codici tedeschi di Enigma con The Bombe](https://www.youtube.com/watch?v=IO17Q24fvWc).

## Obiettivo

Organizzare un testo più lungo usando una gerarchia di titoli, e inserire un collegamento ipertestuale a una risorsa esterna.

## Anteprima

```
+-----------------------------------------+
| Alan Turing                             | <- h1
|                                         |
| Biografia                               | <- h2
| Alan Turing nacque a Londra nel 1912... | <- p (3-4 frasi)
|                                         |
| Il contributo a Bletchley Park          | <- h2
| Durante la Seconda guerra mondiale...   | <- p (3-4 frasi)
|                                         |
| Eredità                                 | <- h2
| Turing è considerato uno dei padri...   | <- p (3-4 frasi)
|                                         |
| Per approfondire                        | <- h2
| Guarda il video: Alan Turing: il        | <- link cliccabile
| matematico che ha decifrato i codici... |
+-----------------------------------------+
```

## Descrizione

### Gerarchia dei titoli

HTML mette a disposizione sei livelli di titolo, da **`h1`** (il più importante, uno solo per pagina) a `h6`. Usarli in ordine crea una struttura logica del documento, un po' come i capitoli e i paragrafi di un libro: `h1` per il titolo generale, `h2` per le sezioni principali.

```html
<h1>Titolo della pagina</h1>
<h2>Prima sezione</h2>
<p>Testo della sezione...</p>
<h2>Seconda sezione</h2>
<p>Testo della sezione...</p>
```

### Collegamenti ipertestuali: il tag `a`

L'elemento **`a`** (*anchor*) crea un collegamento cliccabile verso un'altra pagina. L'indirizzo di destinazione va nell'attributo **`href`**. L'attributo **`target="_blank"`** fa sì che il link si apra in una nuova scheda del browser, invece di sostituire la pagina corrente.

```html
<a href="https://www.youtube.com/watch?v=IO17Q24fvWc" target="_blank">
  Testo del link
</a>
```

## Suggerimenti

- Non saltare livelli di titolo "a caso": in questa pagina va bene usare solo `h1` e `h2`, senza bisogno di `h3`.
- Scrivi i paragrafi con parole tue: copiare da Wikipedia non aiuta a imparare, ed è anche una buona occasione per esercitarsi a riassumere.
- Il testo del link (quello tra `<a>` e `</a>`) deve descrivere dove porta il collegamento, non essere generico come "clicca qui".

## Soluzione

```html
--8<-- "HTML-CSS-Javascript/Alan-turing/index.html"
```

<div class="oc-embed"
     data-path="HTML-CSS-Javascript/Alan-turing/index.html"
     data-lang="html"
     data-autorun="true">
</div>
