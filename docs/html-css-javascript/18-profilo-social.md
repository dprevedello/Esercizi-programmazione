# Profilo social

Scrivi il file `style.css` collegato al documento HTML già pronto (non modificarlo) definendo un unico colore "brand" e un unico raggio d'angolo come variabili, e riutilizzandoli per l'avatar, il bordo della card, l'handle e il pulsante "Segui", in modo che cambiando quei due valori in un solo punto cambi l'aspetto di tutta la card.

## Obiettivo

Definire valori riutilizzabili con le variabili CSS e richiamarli in più punti del foglio di stile, invece di ripetere lo stesso valore ovunque serve.

## Anteprima

```
+----------------------------+
|          (MC)              | <- avatar, sfondo colore brand
|      Marco Colombo         |
|      @marco.codes          | <- colore brand
|                             |
|  Studente di Informatica,  |
|  appassionato di robotica  |
|  e videogiochi indie.      |
|                             |
|  128 post  2.430 follower  |
|      310 seguiti           |
|                             |
|      [    Segui    ]       | <- sfondo colore brand
+----------------------------+
   (bordo della card: colore brand,
    angoli arrotondati)
```

## Descrizione

### Definire variabili CSS: `:root` e `--nome`

Una **variabile CSS** (o *custom property*) è un valore con un nome scelto da chi scrive il codice, che può essere richiamato più volte. Si definisce con due trattini davanti al nome, dentro un selettore: **`:root`** è una convenzione che rappresenta l'intero documento, il posto più comune dove dichiarare le variabili "globali" del sito.

```css
:root {
  --colore-brand: #6c5ce7;
  --raggio-bordo: 10px;
}
```

### Usare una variabile: `var()`

Per usare una variabile al posto di un valore, si richiama il suo nome dentro la funzione **`var()`**, in qualunque proprietà dove sarebbe valido quel tipo di valore:

```css
.profilo {
  border: 1px solid var(--colore-brand);
  border-radius: var(--raggio-bordo);
}
.segui {
  background-color: var(--colore-brand);
  border-radius: var(--raggio-bordo);
}
```

### Perché non scrivere semplicemente lo stesso colore quattro volte

Scrivendo `#6c5ce7` direttamente in ogni regola, per cambiare il colore del "brand" servirebbe modificare ogni occorrenza una per una, con il rischio di dimenticarne qualcuna o di sbagliare a copiarla. Con una variabile, cambiando **una sola riga** in `:root` cambia automaticamente ovunque quella variabile viene richiamata — utile fin da progetti piccoli come questo, indispensabile su siti reali con centinaia di regole.

## Suggerimenti

- I nomi delle variabili sono case-sensitive e devono iniziare sempre con due trattini: `--colore-brand` e `--Colore-Brand` sarebbero due variabili diverse.
- Prova a cambiare solo il valore di `--colore-brand` in `:root` (ad esempio in un verde) e osserva quanti elementi cambiano colore insieme, senza aver toccato nessun'altra riga.
- Le variabili CSS torneranno molto utili nella prossima sezione sul layout, per mantenere coerenti spaziature e colori tra più componenti di una pagina.

## Soluzione

=== "index.html"
    ```html
    --8<-- "HTML-CSS-Javascript/Profilo-social/index.html"
    ```
=== "style.css"
    ```css
    --8<-- "HTML-CSS-Javascript/Profilo-social/style.css"
    ```

<div class="oc-embed"
     data-path="HTML-CSS-Javascript/Profilo-social/index.html;HTML-CSS-Javascript/Profilo-social/style.css"
     data-lang="html"
     data-autorun="true">
</div>
