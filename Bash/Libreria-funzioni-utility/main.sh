#!/bin/bash
# Raccolta di funzioni riutilizzabili per operazioni comuni.

quadrato() {
    local n="$1"
    echo $(( n * n ))
}

e_pari() {
    local n="$1"
    (( n % 2 == 0 ))
}

saluta() {
    local nome="$1"
    echo "Ciao, $nome!"
}

saluta "Mario"

for n in 4 7 10; do
    q=$(quadrato "$n")
    if e_pari "$n"; then
        parita="pari"
    else
        parita="dispari"
    fi
    echo "$n al quadrato è $q ed è $parita"
done
