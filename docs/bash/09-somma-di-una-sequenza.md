# Somma di una sequenza

Scrivi uno script Bash che calcoli e stampi la somma dei numeri interi da 1 a un valore N a tua scelta.

## Obiettivo

Calcolare e stampare la somma dei numeri interi da 1 a un valore N.

## Descrizione

Bash offre un ciclo `for` in stile C, utile quando si conosce il numero di ripetizioni:

```bash
for (( i=1; i<=N; i++ )); do
    ...
done
```

La struttura ha tre parti separate da `;`: inizializzazione, condizione di continuazione, incremento — esattamente come in C o Java.

Per fare calcoli aritmetici su una variabile si usa l'espansione **`$(( ... ))`**, che restituisce il risultato di un'espressione numerica:

```bash
somma=$(( somma + i ))
```

Questo è l'**accumulatore**: una variabile che parte da un valore iniziale (qui `0`) e viene aggiornata a ogni iterazione del ciclo.

## Suggerimenti

- Inizializza sempre l'accumulatore (`somma=0`) *prima* del ciclo, altrimenti il primo calcolo userà un valore vuoto.
- `$(( ... ))` non richiede il simbolo `$` davanti ai nomi delle variabili al suo interno.
- Prova a cambiare `N` per verificare che la somma sia corretta (formula di Gauss: N·(N+1)/2).

## Soluzione

```bash
--8<-- "Bash/Somma-di-una-sequenza/main.sh"
```

<div class="oc-embed"
     data-path="Bash/Somma-di-una-sequenza/main.sh"
     data-lang="bash"
     data-autorun="true">
</div>
