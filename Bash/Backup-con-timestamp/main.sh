#!/bin/bash
# Crea una copia di backup di un file, aggiungendo un timestamp al nome.

file="appunti.txt"
echo "Contenuto importante da salvare." > "$file"

timestamp=$(date +"%Y%m%d_%H%M%S")
backup="${file%.txt}_$timestamp.txt"

cp "$file" "$backup"

echo "File originale: $file"
echo "Backup creato:   $backup"
ls -1 *.txt
