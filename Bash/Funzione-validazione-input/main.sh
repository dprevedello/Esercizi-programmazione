#!/bin/bash
# Definisce una funzione che valida se un valore è un numero intero positivo.

is_numero_positivo() {
    local valore="$1"
    if [[ "$valore" =~ ^[0-9]+$ ]] && (( valore > 0 )); then
        return 0
    else
        return 1
    fi
}

for test in 25 -3 abc 0 100; do
    if is_numero_positivo "$test"; then
        echo "'$test' è un numero positivo valido"
    else
        echo "'$test' NON è valido"
    fi
done
