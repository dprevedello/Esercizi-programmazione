# Form: campi di base

Crea un modulo di contatto con **esattamente** questi tre campi, ciascuno con la sua etichetta: "Nome" (campo di testo), "Email" (campo email), "Messaggio" (campo di testo). Aggiungi un pulsante con scritto "Invia".

## Obiettivo

Costruire un modulo HTML con campi di input associati correttamente alle rispettive etichette.

## Anteprima

```
+-----------------------------------+
| Nome                              |
| [_______________________________] |
|                                   |
| Email                             |
| [_______________________________] |
|                                   |
| Messaggio                         |
| [_______________________________] |
|                                   |
|           ( Invia )               | <- button
+-----------------------------------+
```

## Descrizione

### Il contenitore del modulo: `form`

L'elemento **`form`** racchiude tutti i campi di un modulo. Da solo non fa nulla di visibile: serve a raggruppare i controlli e, in un sito reale, a definire dove e come inviare i dati (cosa che vedremo più avanti con JavaScript).

### Campi di input: `input`

L'elemento **`input`** crea un campo dove l'utente può digitare. L'attributo **`type`** ne determina il comportamento: `type="text"` è un campo di testo generico, `type="email"` è pensato per indirizzi email (alcuni browser controllano automaticamente che il formato sia plausibile).

```html
<input type="text" id="nome" name="nome">
<input type="email" id="email" name="email">
```

### Etichette: `label`

Una **`label`** descrive un campo del modulo. L'attributo **`for`** deve contenere lo stesso valore dell'**`id`** del campo a cui si riferisce: questo collegamento non è solo visivo, permette anche di cliccare sull'etichetta per attivare il campo, ed è fondamentale per l'accessibilità.

```html
<label for="nome">Nome</label>
<input type="text" id="nome" name="nome">
```

### Perché ogni campo è dentro un `div`

`label` e `input` sono elementi **inline** (lo abbiamo visto nell'esercizio sul block/inline): da soli, senza nessun elemento block attorno, il browser li mette uno di fianco all'altro sulla stessa riga, e lo stesso farebbe con il campo successivo. Per ottenere l'"a capo" tra un campo e l'altro mostrato nell'anteprima, ogni coppia etichetta+campo va racchiusa in un **`div`** (un elemento block, che occupa sempre tutta la riga): è lo stesso `div` generico già usato in esercizi precedenti, qui con la classe `campo` in previsione dello stile CSS che aggiungeremo più avanti.

```html
<div class="campo">
  <label for="nome">Nome</label>
  <input type="text" id="nome" name="nome">
</div>
```

### Il pulsante di invio: `button`

L'elemento **`button`** con `type="submit"` crea il pulsante che, in un modulo reale, invia i dati inseriti.

## Suggerimenti

- Controlla sempre che il `for` della `label` corrisponda esattamente all'`id` del campo: un errore di battitura rompe il collegamento senza dare nessun avviso visibile.
- L'attributo `name` (diverso da `id`) è quello che identifica il dato quando il modulo viene inviato: è buona norma includerlo fin da ora, anche se in questo esercizio non lo useremo ancora.
- L'ordine in pagina è: etichetta, poi campo corrispondente, per ciascuno dei tre campi, ciascuna coppia racchiusa nel proprio `div`.

## Soluzione

```html
--8<-- "HTML-CSS-Javascript/Form-contatti/index.html"
```

<div class="oc-embed"
     data-path="HTML-CSS-Javascript/Form-contatti/index.html"
     data-lang="html"
     data-autorun="true">
</div>
