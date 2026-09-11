#!/bin/bash
# Calcola il fattoriale di un numero con una funzione ricorsiva.

fattoriale() {
    local n="$1"
    if (( n <= 1 )); then
        echo 1
    else
        local sub=$(fattoriale $(( n - 1 )))
        echo $(( n * sub ))
    fi
}

for n in 0 1 5 7; do
    echo "$n! = $(fattoriale "$n")"
done
