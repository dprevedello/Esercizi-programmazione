# Pari o dispari

Scrivi uno script Bash che, dato un numero intero, stabilisca se è pari o dispari, stampando a video il risultato in modo chiaro.

## Obiettivo

Dato un numero intero, stampare se è pari o dispari.

## Descrizione

Per i confronti tra numeri interi, Bash mette a disposizione una sintassi aritmetica racchiusa tra doppie parentesi tonde: **`(( ... ))`**. All'interno si possono usare operatori familiari come in altri linguaggi (`==`, `>`, `<`, `%`), senza dover anteporre `$` ai nomi delle variabili:

```bash
if (( numero % 2 == 0 )); then
    echo "pari"
fi
```

L'operatore **`%`** (modulo) restituisce il resto della divisione intera: un numero è pari se il resto della divisione per 2 è `0`.

## Suggerimenti

- Dentro `(( ... ))` puoi scrivere `numero` invece di `$numero`: Bash lo interpreta comunque come variabile.
- Il costrutto `if`/`else` termina sempre con `fi` (`if` scritto al contrario).
- Esiste anche la sintassi con `[ ]` (es. `[ $((numero % 2)) -eq 0 ]`), ma `(( ))` è più leggibile per i confronti numerici.

## Soluzione

```bash
--8<-- "Bash/Pari-o-dispari/main.sh"
```

<div class="oc-embed"
     data-path="Bash/Pari-o-dispari/main.sh"
     data-lang="bash"
     data-autorun="true">
</div>
