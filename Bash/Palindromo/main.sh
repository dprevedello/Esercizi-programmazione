#!/bin/bash
# Verifica se una parola è palindroma, confrontandola con la sua versione invertita.

parola="anna"
invertita=""

lunghezza=${#parola}
for (( i=lunghezza-1; i>=0; i-- )); do
    invertita+="${parola:i:1}"
done

if [ "$parola" = "$invertita" ]; then
    echo "'$parola' è palindroma"
else
    echo "'$parola' non è palindroma (invertita: '$invertita')"
fi
