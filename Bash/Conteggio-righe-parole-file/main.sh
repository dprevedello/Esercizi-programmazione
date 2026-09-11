#!/bin/bash
# Conta righe, parole e caratteri di un file con wc.

file="testo.txt"

cat > "$file" <<EOF
Bash è una shell.
È anche un linguaggio di scripting.
Si usa per automatizzare compiti ripetitivi.
EOF

echo "Contenuto di $file:"
cat "$file"
echo ""
echo "Statistiche:"
wc -l "$file"   # righe
wc -w "$file"   # parole
wc -c "$file"   # caratteri (byte)
