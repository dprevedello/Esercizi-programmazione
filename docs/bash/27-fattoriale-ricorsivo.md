# Fattoriale ricorsivo

Scrivi uno script Bash con una funzione ricorsiva che calcoli il fattoriale di un numero.

## Obiettivo

Calcolare il fattoriale di alcuni numeri usando una funzione ricorsiva.

## Descrizione

Una funzione è **ricorsiva** quando, al suo interno, richiama sé stessa per risolvere una versione più piccola dello stesso problema. Ogni funzione ricorsiva ha bisogno di due parti:

- un **caso base**, che ferma la ricorsione (qui, `n <= 1`, il cui fattoriale è `1`);
- un **caso ricorsivo**, che risolve il problema chiamando di nuovo la funzione su un valore più piccolo (`n - 1`), e combina il risultato con il valore corrente.

```bash
fattoriale() {
    local n="$1"
    if (( n <= 1 )); then
        echo 1
    else
        local sub=$(fattoriale $(( n - 1 )))
        echo $(( n * sub ))
    fi
}
```

La chiamata `$(fattoriale $(( n - 1 )))` cattura, tramite command substitution, il valore stampato dalla chiamata ricorsiva.

## Suggerimenti

- Senza un caso base corretto, una funzione ricorsiva richiamerebbe sé stessa all'infinito, fino a un errore.
- Prova a "srotolare" a mano la ricorsione per `n=3`: `fattoriale(3)` chiama `fattoriale(2)`, che chiama `fattoriale(1)`, che restituisce `1` senza ricorsione ulteriore.
- La ricorsione in Bash è meno efficiente di un ciclo per calcoli semplici come questo: qui serve soprattutto a capire il meccanismo, che ritroverai in Java e C.

## Soluzione

```bash
--8<-- "Bash/Fattoriale-ricorsivo/main.sh"
```

<div class="oc-embed"
     data-path="Bash/Fattoriale-ricorsivo/main.sh"
     data-lang="bash"
     data-autorun="true">
</div>
