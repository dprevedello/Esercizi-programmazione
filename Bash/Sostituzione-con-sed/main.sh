#!/bin/bash
# Sostituisce del testo all'interno di un file usando sed.

file="config.txt"

cat > "$file" <<EOF
ambiente=sviluppo
porta=8080
debug=true
EOF

echo "--- Prima ---"
cat "$file"

sed -i 's/ambiente=sviluppo/ambiente=produzione/' "$file"
sed -i 's/debug=true/debug=false/' "$file"

echo ""
echo "--- Dopo ---"
cat "$file"
