#!/bin/bash
# Calcola statistiche su un file CSV con awk: media dei voti.

file="voti.csv"

cat > "$file" <<EOF
nome,voto
Mario,7
Luca,5
Anna,9
Sara,8
EOF

echo "Contenuto CSV:"
cat "$file"

echo ""
echo "Media dei voti:"
awk -F',' 'NR>1 { somma += $2; conta++ } END { print somma/conta }' "$file"
