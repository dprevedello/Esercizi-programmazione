#!/bin/bash
# Legge un file riga per riga con "while read" e numera ogni riga.

file="elenco.txt"

cat > "$file" <<EOF
Mela
Banana
Pera
Kiwi
EOF

numero=1
while IFS= read -r riga; do
    echo "$numero) $riga"
    numero=$(( numero + 1 ))
done < "$file"
