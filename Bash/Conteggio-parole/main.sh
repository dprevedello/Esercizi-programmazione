#!/bin/bash
# Conta il numero di parole in una frase, usando la suddivisione automatica di Bash.

frase="Bash è potente e divertente da imparare"
parole=($frase)

echo "Frase: $frase"
echo "Numero di parole: ${#parole[@]}"
