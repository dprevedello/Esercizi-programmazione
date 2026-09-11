# Funzione di validazione input

Scrivi uno script Bash con una funzione che stabilisca se un valore è un numero intero positivo, e usala per controllare una serie di valori diversi.

## Obiettivo

Scrivere una funzione che stabilisca se un valore è un numero intero positivo, e usarla per controllare una serie di valori diversi.

## Descrizione

Una **funzione** in Bash si definisce con `nome() { ... }` e si richiama semplicemente scrivendone il nome, come un comando qualsiasi:

```bash
is_numero_positivo() {
    local valore="$1"
    ...
}

is_numero_positivo "25"
```

Dentro la funzione, `$1` è il primo argomento passato alla chiamata (non quello dello script!). La parola chiave **`local`** dichiara una variabile visibile solo dentro la funzione, evitando che "sporchi" lo spazio dei nomi globale.

Una funzione può restituire un **codice di uscita** con `return`: per convenzione `0` significa "vero/successo", qualsiasi altro valore significa "falso/errore". Questo permette di usare direttamente la funzione come condizione di un `if`:

```bash
if is_numero_positivo "$test"; then
    ...
fi
```

## Suggerimenti

- `return` in una funzione **non** restituisce un valore come in altri linguaggi: restituisce solo un codice numerico (0-255), usato tipicamente per indicare successo/fallimento.
- Usa sempre `local` per le variabili interne a una funzione: senza, resterebbero visibili anche fuori, con il rischio di sovrascrivere altre variabili.
- L'operatore `&&` tra due condizioni richiede che siano **entrambe** vere.

## Soluzione

```bash
--8<-- "Bash/Funzione-validazione-input/main.sh"
```

<div class="oc-embed"
     data-path="Bash/Funzione-validazione-input/main.sh"
     data-lang="bash"
     data-autorun="true">
</div>
