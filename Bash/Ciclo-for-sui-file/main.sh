#!/bin/bash
# Crea alcuni file di esempio e li elenca con un ciclo for.

cartella="esempio"
mkdir -p "$cartella"
touch "$cartella/report.txt" "$cartella/dati.csv" "$cartella/note.md"

echo "File contenuti in '$cartella':"
for file in "$cartella"/*; do
    echo " - $(basename "$file")"
done
