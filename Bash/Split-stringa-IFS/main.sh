#!/bin/bash
# Suddivide una stringa in formato CSV nei singoli campi usando IFS.

riga="Mario,Rossi,17,4EINF"

IFS=',' read -r nome cognome eta classe <<< "$riga"

echo "Nome: $nome"
echo "Cognome: $cognome"
echo "Età: $eta"
echo "Classe: $classe"
