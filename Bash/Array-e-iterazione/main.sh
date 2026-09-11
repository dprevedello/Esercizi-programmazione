#!/bin/bash
# Dichiara un array di voti e calcola somma, media (intera) e voto massimo.

voti=(7 8 6 9 5 10)

somma=0
massimo=${voti[0]}

for voto in "${voti[@]}"; do
    somma=$(( somma + voto ))
    if (( voto > massimo )); then
        massimo=$voto
    fi
done

media=$(( somma / ${#voti[@]} ))

echo "Voti: ${voti[@]}"
echo "Numero di voti: ${#voti[@]}"
echo "Somma: $somma"
echo "Media (arrotondata per difetto): $media"
echo "Voto massimo: $massimo"
