#!/bin/bash
# Calcola la somma dei numeri da 1 a N usando un ciclo for.

N=10
somma=0

for (( i=1; i<=N; i++ )); do
    somma=$(( somma + i ))
done

echo "La somma dei numeri da 1 a $N è: $somma"
