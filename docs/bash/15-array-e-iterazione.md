# Array e iterazione

Scrivi uno script Bash che, dato un array di voti, calcoli e stampi la somma, la media e il voto massimo.

## Obiettivo

Dato un array di voti, calcolare la somma, la media (intera) e il voto massimo.

## Descrizione

Un **array** in Bash si dichiara elencando i valori tra parentesi tonde, separati da spazi:

```bash
voti=(7 8 6 9 5 10)
```

Per accedere a un singolo elemento si usa l'indice tra parentesi quadre (`${voti[0]}` è il primo elemento); per ottenere **tutti** gli elementi si usa **`"${voti[@]}"`**, tipicamente in un ciclo `for`:

```bash
for voto in "${voti[@]}"; do
    ...
done
```

`${#voti[@]}` restituisce invece il **numero di elementi** dell'array.

!!! info "Solo numeri interi"
    L'espansione aritmetica `$(( ))` di Bash lavora solo con numeri interi: la divisione `somma / ${#voti[@]}` tronca il risultato, senza cifre decimali. Per una media con i decimali servirebbe un comando esterno come `awk` o `bc`.

## Suggerimenti

- Racchiudi sempre `"${voti[@]}"` tra virgolette quando cicli su un array: evita problemi se un elemento contenesse spazi.
- Inizializza `massimo` con il primo elemento dell'array, non con `0`: se tutti i voti fossero negativi, partire da `0` darebbe un risultato sbagliato.
- Estensione: prova a calcolare anche il voto minimo, con la stessa logica usata per il massimo.

## Soluzione

```bash
--8<-- "Bash/Array-e-iterazione/main.sh"
```

<div class="oc-embed"
     data-path="Bash/Array-e-iterazione/main.sh"
     data-lang="bash"
     data-autorun="true">
</div>
