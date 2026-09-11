# Maggiore fra due numeri

Scrivi uno script Bash che confronti due numeri interi e stampi quale dei due è il maggiore, segnalando anche il caso in cui siano uguali.

## Obiettivo

Dati due numeri interi, stampare quale dei due è il maggiore, oppure segnalare se sono uguali.

## Descrizione

Quando le alternative da gestire sono più di due, si usa **`elif`** (contrazione di "else if") per aggiungere condizioni intermedie tra `if` ed `else`:

```bash
if (( a > b )); then
    ...
elif (( b > a )); then
    ...
else
    ...
fi
```

Le condizioni vengono valutate **in ordine**: la prima che risulta vera interrompe la catena ed esegue il blocco corrispondente.

## Suggerimenti

- Puoi concatenare quanti `elif` vuoi tra un `if` e l'`else` finale.
- Metti sempre per ultimo il caso più "generico" (qui, l'uguaglianza), così da coprire ogni possibilità.
- Prova a modificare i valori di `a` e `b` per testare tutti e tre i rami.

## Soluzione

```bash
--8<-- "Bash/Maggiore-fra-due-numeri/main.sh"
```

<div class="oc-embed"
     data-path="Bash/Maggiore-fra-due-numeri/main.sh"
     data-lang="bash"
     data-autorun="true">
</div>
