#!/bin/bash
# Monitora lo spazio occupato da una cartella di lavoro e segnala se supera una soglia.

cartella="dati_progetto"
soglia_kb=50

mkdir -p "$cartella"
for i in 1 2 3 4 5; do
    head -c 20000 /dev/zero > "$cartella/file_$i.dat"
done

dimensione_kb=$(du -sk "$cartella" | cut -f1)

echo "Spazio occupato da '$cartella': ${dimensione_kb} KB"

if (( dimensione_kb > soglia_kb )); then
    echo "ATTENZIONE: lo spazio occupato supera la soglia di ${soglia_kb} KB!"
else
    echo "Spazio occupato entro la soglia di ${soglia_kb} KB."
fi
