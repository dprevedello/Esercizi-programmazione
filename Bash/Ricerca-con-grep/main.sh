#!/bin/bash
# Cerca le righe che contengono una parola chiave in un file, usando grep.

file="studenti.txt"

cat > "$file" <<EOF
Rossi Mario 4EINF promosso
Bianchi Luca 4EINF non ammesso
Verdi Anna 5AINF promosso
Neri Sara 4EINF promosso
EOF

echo "Studenti promossi della 4EINF:"
grep "4EINF" "$file" | grep "promosso"
