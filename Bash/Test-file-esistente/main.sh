#!/bin/bash
# Verifica l'esistenza di un file e di una cartella nel filesystem.

file="dati.txt"
cartella="archivio"

echo "Ciao, sono un file di prova." > "$file"
mkdir -p "$cartella"

if [ -f "$file" ]; then
    echo "Il file '$file' esiste."
else
    echo "Il file '$file' non esiste."
fi

if [ -d "$cartella" ]; then
    echo "La cartella '$cartella' esiste."
else
    echo "La cartella '$cartella' non esiste."
fi

if [ -f "non-esiste.txt" ]; then
    echo "Il file 'non-esiste.txt' esiste."
else
    echo "Il file 'non-esiste.txt' non esiste."
fi
