#!/bin/bash
# Trova le parole più frequenti in un testo, usando sort e uniq in pipe.

file="testo.txt"

cat > "$file" <<EOF
bash è potente bash è versatile bash si usa spesso
EOF

echo "Parole più frequenti:"
tr ' ' '\n' < "$file" | sort | uniq -c | sort -rn | head -n 3
