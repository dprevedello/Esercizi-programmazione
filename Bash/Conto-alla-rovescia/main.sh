#!/bin/bash
# Conto alla rovescia da un valore iniziale fino a zero.

n=5

while (( n >= 0 )); do
    echo "$n"
    n=$(( n - 1 ))
done

echo "Decollo!"
