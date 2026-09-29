# Biglietto da visita digitale

Scrivi il file `style.css` collegato al documento HTML già pronto (non modificarlo) aggiungendo **esattamente** queste regole, nell'ordine indicato, senza ometterne nessuna: `.biglietto` con font senza grazie, padding e un bordo grigio chiaro; `h2` blu; `.nome` verde; `#nome-titolare` rosso; `.ruolo` grigio e corsivo; `.biglietto p` nero; `.contatto` verde acqua (`teal`). Poi osserva il risultato: alcune di queste regole "perdono" il conflitto con un'altra, pur essendo scritte più in basso nel file.

## Obiettivo

Prevedere e verificare quale regola vince quando più selettori diversi puntano allo stesso elemento, calcolando la specificità invece di affidarsi solo all'ordine nel file.

## Anteprima

```
+-----------------------------------+
| Giulia Bianchi                    | <- h2, rosso (vince #nome-titolare,
|                                   |    non blu di h2 né verde di .nome)
| Sviluppatrice Full-Stack          | <- .ruolo, grigio corsivo
|                                   |
| Email: giulia.bianchi@example.com | <- p.contatto, NERO
| Tel: 011 1234567                  | <- (vince .biglietto p, non teal!)
+-----------------------------------+
```

## Descrizione

### Ereditarietà

Alcune proprietà CSS, come `font-family` e `color`, sono **ereditate**: se non viene specificato nient'altro, un elemento eredita il valore dal suo genitore. Impostando `font-family` su `.biglietto`, tutti i suoi discendenti (`h2`, `p`) lo ereditano automaticamente, senza bisogno di ripeterlo su ciascuno.

```css
.biglietto {
  font-family: sans-serif;
}
```

### La cascata: quando due regole si scontrano

Quando più regole CSS si applicano allo stesso elemento con la stessa proprietà (qui, `color`), il browser deve decidere quale usare. Questo meccanismo si chiama **cascata**, e si basa su due criteri, in ordine di importanza: prima la **specificità** (quanto è "mirato" un selettore), poi — solo a parità di specificità — **l'ordine nel file** (vince l'ultima regola scritta).

### Calcolare la specificità

Ogni selettore ha una specificità calcolabile contando tre tipi di componenti: **id** (peso maggiore), **classi e pseudo-classi** (peso medio), **elementi** (peso minore). Su `h2 { }`, `.nome { }`, `#nome-titolare { }` applicati tutti allo stesso `<h2>`:

| Selettore | Componenti | Specificità |
|---|---|---|
| `h2` | 1 elemento | bassa |
| `.nome` | 1 classe | media |
| `#nome-titolare` | 1 id | alta |

Vince `#nome-titolare`: il testo è **rosso**, non blu né verde, indipendentemente da dove compare la regola nel file.

### Il caso "contro-intuitivo": `.biglietto p` contro `.contatto`

Confrontando `.biglietto p` (una classe + un elemento) e `.contatto` (una sola classe), il primo selettore ha specificità maggiore, anche se **sembra** più generico a prima vista e anche se `.contatto` è scritta più in basso nel file:

```css
.biglietto p {
  color: black;   /* 1 classe + 1 elemento → specificità più alta */
}
.contatto {
  color: teal;    /* 1 sola classe → specificità più bassa, PERDE */
}
```

Per questo i due paragrafi con `class="contatto"` restano **neri**, non verde acqua: la specificità si calcola contando i componenti del selettore, non "quanto sembra specifico" leggendolo a occhio.

### Perché evitare `!important`

Il modificatore `!important` forza una regola a vincere qualunque confronto di specificità. Sembra una scorciatoia comoda per "vincere sempre", ma rende il CSS difficile da mantenere: se in futuro serve un'eccezione a quella regola, l'unico modo è aggiungere un altro `!important` ancora più difficile da tracciare. Meglio, quasi sempre, scrivere selettori con la specificità corretta fin dall'inizio.

## Suggerimenti

- Non serve memorizzare formule complicate: basta contare, per ciascun selettore, quanti id, quante classi e quanti elementi contiene, e confrontare le tre cifre da sinistra a destra.
- Se un colore non è quello atteso, prova a "smontare" il selettore che pensavi dovesse vincere e confrontarlo componente per componente con quello che invece si è applicato.
- Estensione: prova ad aggiungere `#nome-titolare { color: orange !important; }` e osserva come batte perfino l'id da solo — ma evita di usarlo nei prossimi esercizi, per le ragioni spiegate sopra.

## Soluzione

=== "index.html"
    ```html
    --8<-- "HTML-CSS-Javascript/Biglietto-da-visita/index.html"
    ```
=== "style.css"
    ```css
    --8<-- "HTML-CSS-Javascript/Biglietto-da-visita/style.css"
    ```

<div class="oc-embed"
     data-path="HTML-CSS-Javascript/Biglietto-da-visita/index.html;HTML-CSS-Javascript/Biglietto-da-visita/style.css"
     data-lang="html"
     data-autorun="true">
</div>
