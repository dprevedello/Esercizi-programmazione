#!/bin/bash
# Esplora il contenuto di una cartella di progetto, descrivendone la struttura.

mkdir -p progetto/src progetto/docs
touch progetto/src/main.py progetto/docs/note.txt progetto/README.md

echo "Contenuto di 'progetto':"
ls -la progetto

echo ""
echo "Dettaglio dei file:"
for elemento in progetto/*; do
    echo " - $(basename "$elemento"): $(file -b "$elemento")"
done
