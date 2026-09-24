# Form avanzato: select, textarea, checkbox e radio

Crea il modulo di iscrizione al "Coding Day" dell'istituto con **esattamente** questi campi: un menu a tendina "Ruolo" con le opzioni Sviluppatore, Designer, Project Manager; un'area di testo "Perché vuoi partecipare?"; una casella di spunta con testo "Accetto il regolamento dell'evento"; un gruppo di pulsanti radio "Modalità di partecipazione" con le opzioni "In presenza" e "Online".

## Obiettivo

Usare controlli di modulo diversi dal semplice campo di testo, ciascuno adatto a un tipo diverso di scelta.

## Anteprima

```
+----------------------------------------+
| Iscrizione al Coding Day               | <- h1
|                                        |
| Ruolo                                  |
| [ Sviluppatore            v ]          | <- select
|                                        |
| Perché vuoi partecipare?               |
| [_______________________________]      | <- textarea
| [_______________________________]      |
|                                        |
| [ ] Accetto il regolamento dell'evento | <- checkbox
|                                        |
| Modalità di partecipazione             |
| ( ) In presenza   ( ) Online           | <- radio
|                                        |
|           ( Iscriviti )                |
+----------------------------------------+
```

## Descrizione

### Menu a tendina: `select` e `option`

**`select`** crea un menu a tendina; ogni scelta possibile è un elemento **`option`** al suo interno. L'attributo `value` di ciascuna `option` è il dato che verrebbe effettivamente inviato (può essere diverso dal testo mostrato all'utente).

```html
<select id="ruolo" name="ruolo">
  <option value="sviluppatore">Sviluppatore</option>
  <option value="designer">Designer</option>
</select>
```

### Testo su più righe: `textarea`

**`textarea`** è un campo di testo che, a differenza di `input`, può contenere più righe. L'attributo `rows` suggerisce quante righe mostrare inizialmente (l'utente può comunque scrivere testo più lungo, che scorre).

```html
<textarea id="motivazione" name="motivazione" rows="4"></textarea>
```

### Scelte multiple indipendenti: `checkbox`

Un `<input type="checkbox">` è una casella di spunta che l'utente può attivare o disattivare in modo indipendente dalle altre. Più checkbox nella stessa pagina non si escludono a vicenda.

### Scelta esclusiva tra più opzioni: `radio`

Un gruppo di `<input type="radio">` con lo **stesso `name`** permette di selezionare **una sola** opzione tra tutte quelle del gruppo: selezionandone una, le altre con lo stesso `name` si deselezionano automaticamente.

```html
<input type="radio" id="presenza" name="modalita" value="presenza">
<label for="presenza">In presenza</label>
<input type="radio" id="online" name="modalita" value="online">
<label for="online">Online</label>
```

### Raggruppare campi correlati: `fieldset` e `legend`

**`fieldset`** raggruppa visivamente un insieme di campi correlati (qui, il gruppo di radio button), disegnando un riquadro attorno a loro. **`legend`** fornisce il titolo del gruppo, mostrato come etichetta del riquadro.

## Suggerimenti

- Il `name` è ciò che collega i radio button in un unico gruppo esclusivo: se per errore usi `name` diversi, l'utente potrà selezionarli tutti insieme, cosa sbagliata per una scelta "o l'uno o l'altro".
- Ogni checkbox e ogni radio button ha comunque bisogno di una `label` propria, associata tramite `for`/`id`, esattamente come i campi di testo.
- `fieldset`/`legend` non sono obbligatori per far funzionare i radio button, ma rendono il modulo più chiaro e sono considerati buona pratica quando si raggruppano scelte correlate.

## Soluzione

```html
--8<-- "HTML-CSS-Javascript/Form-iscrizione/index.html"
```

<div class="oc-embed"
     data-path="HTML-CSS-Javascript/Form-iscrizione/index.html"
     data-lang="html"
     data-autorun="true">
</div>
