#!/bin/bash
# Determina se un numero è pari o dispari usando l'operatore modulo.

numero=17

if (( numero % 2 == 0 )); then
    echo "$numero è pari"
else
    echo "$numero è dispari"
fi
