#!/bin/bash
# Organizza dei file di esempio in sottocartelle in base alla loro estensione.

cartella="scrivania"
mkdir -p "$cartella"
touch "$cartella/report.txt" "$cartella/foto.jpg" "$cartella/dati.csv" "$cartella/note.txt" "$cartella/logo.jpg"

cd "$cartella"

for file in *; do
    [ -f "$file" ] || continue
    estensione="${file##*.}"
    mkdir -p "$estensione"
    mv "$file" "$estensione/"
done

echo "Organizzazione completata:"
find . -type f | sort
