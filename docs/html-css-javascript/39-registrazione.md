# Registrazione con controllo dei dati

Il modulo `modulo` del documento HTML già pronto (non modificarlo) ha cinque controlli: nome utente, email, password, conferma password e una casella per accettare il regolamento. Scrivi il file `script.js` in modo che, premendo «Registrati», il modulo non venga inviato ma i dati vengano controllati da JavaScript. Per ogni campo sbagliato scrivi un messaggio nello span sotto il campo (`errore-username`, `errore-email`, `errore-password`, `errore-conferma`, `errore-regolamento`); per ogni campo corretto lo span va svuotato.

| Campo | Regola | Messaggio di errore |
|-------|--------|---------------------|
| Nome utente | almeno 4 caratteri | «Almeno 4 caratteri» |
| Email | contiene `@` e `.` | «Email non valida» |
| Password | almeno 8 caratteri | «Almeno 8 caratteri» |
| Conferma | uguale alla password | «Le password non coincidono» |
| Regolamento | casella selezionata | «Devi accettare il regolamento» |

Se non ci sono errori, nel paragrafo `esito` compare «Registrazione completata! Benvenuto, USERNAME.» con la classe `ok`; altrimenti compare «Correggi gli errori evidenziati.» con la classe `ko`.

## Obiettivo

Mettere insieme tutto ciò che hai imparato (eventi, condizioni, funzioni, lettura dei campi) per validare un modulo e dare un riscontro chiaro all'utente.

## Anteprima

```
+---------------------------------+
| Registrati                      |
|                                 |
| Nome utente                     |
| [ ale ]                         |
| Almeno 4 caratteri              |  <- messaggio in rosso
| Email                           |
| [ ale@scuola.it ]               |
| Password                        |
| [ ******** ]                    |
| Conferma password               |
| [ ******* ]                     |
| Le password non coincidono      |
| [ ] Accetto il regolamento      |
| Devi accettare il regolamento   |
|                                 |
| [ Registrati ]                  |
| Correggi gli errori evidenziati.|
+---------------------------------+
```

## Descrizione

### L'evento `submit` e `preventDefault`

Quando un modulo viene inviato (clic su un pulsante di tipo submit o tasto Invio) si verifica l'evento **`submit`**, e il browser ricarica la pagina per spedire i dati. Per controllarli prima, la funzione collegata all'evento riceve come parametro l'**evento** stesso, e chiamando `evento.preventDefault()` si **annulla il comportamento predefinito** (l'invio):

```js
function controlla(evento) {
  evento.preventDefault();   // la pagina non si ricarica
  // ...qui i controlli sui campi
}

document.getElementById("modulo").addEventListener("submit", controlla);
```

Nell'HTML il modulo ha l'attributo `novalidate`, che spegne i messaggi automatici del browser: così i controlli e i messaggi sono tutti scritti da te.

### Cercare dentro un testo: `includes`

La funzione `includes` dice se un testo ne contiene un altro. Restituisce `true` (vero) o `false` (falso), quindi si usa direttamente in un `if`:

```js
"ale@scuola.it".includes("@");    // true
"alescuola.it".includes("@");     // false
```

Per richiedere sia la chiocciola sia il punto si combinano le due condizioni con `&&`, già visto nell'esercizio sulla media dei voti.

### Leggere una casella di spunta: `checked`

Un `checkbox` non ha un testo da leggere: ha una proprietà **`checked`** che vale `true` se la casella è selezionata e `false` altrimenti. Un `if (regolamento.checked)` è già una condizione completa. Per negarla si mette un punto esclamativo davanti: `if (!regolamento.checked)` significa "se la casella **non** è selezionata".

### Contare gli errori

Per sapere se il modulo è corretto si usa una variabile **contatore** `errori` che parte da 0 e aumenta di 1 per ogni controllo fallito. Alla fine, `errori === 0` significa che tutto è a posto. Per non ripetere cinque volte la stessa riga che scrive il messaggio, conviene una piccola funzione ausiliaria:

```js
function mostraErrore(campo, messaggio) {
  document.getElementById("errore-" + campo).textContent = messaggio;
}
```

## Suggerimenti

- Ogni controllo ha la stessa forma: `if (condizione di errore) { mostraErrore("campo", "messaggio"); errori++; } else { mostraErrore("campo", ""); }`. Il ramo `else` serve a togliere un messaggio rimasto da un tentativo precedente.
- Leggi i campi con `.value` e togli gli spazi inutili con `.trim()` dal nome utente e dall'email.
- Per la conferma password confronta le due stringhe con `!==`.
- Per la lunghezza minima usa `.length`: `username.length < 4`.
- Estensione: aggiungi un controllo che la password contenga almeno un numero (suggerimento: un ciclo `for` sui caratteri e `"0123456789".includes(carattere)`).

## Soluzione

=== "index.html"
    ```html
    --8<-- "HTML-CSS-Javascript/Registrazione/index.html"
    ```
=== "style.css"
    ```css
    --8<-- "HTML-CSS-Javascript/Registrazione/style.css"
    ```
=== "script.js"
    ```js
    --8<-- "HTML-CSS-Javascript/Registrazione/script.js"
    ```

<div class="oc-embed"
     data-path="HTML-CSS-Javascript/Registrazione/index.html;HTML-CSS-Javascript/Registrazione/style.css;HTML-CSS-Javascript/Registrazione/script.js"
     data-lang="html"
     data-height="620"
     data-autorun="true">
</div>
