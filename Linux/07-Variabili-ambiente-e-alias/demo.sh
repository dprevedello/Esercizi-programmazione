#!/bin/bash
# Dimostra variabili d'ambiente, $PATH e alias.

echo "--- una variabile d'ambiente comune: HOME ---"
echo "$HOME"

echo ""
echo "--- PATH: le cartelle in cui la shell cerca gli eseguibili ---"
echo "$PATH"

echo ""
echo "--- export: rende una variabile visibile ai comandi lanciati dallo script ---"
export SALUTO="Ciao dal sistema!"
bash -c 'echo "Dentro un sotto-processo: $SALUTO"'

echo ""
echo "--- alias: crea un nome breve per un comando lungo ---"
shopt -s expand_aliases
mkdir -p dati_alias
touch dati_alias/a.txt dati_alias/b.txt
alias ll='ls -la'
ll dati_alias
