#!/bin/bash
# Dimostra chmod e la lettura dei permessi con ls -l.

file="script_esempio.sh"
echo '#!/bin/bash' > "$file"
echo 'echo "Ciao!"' >> "$file"

echo "--- permessi iniziali ---"
ls -l "$file"

echo ""
echo "--- chmod +x: aggiunge il permesso di esecuzione ---"
chmod +x "$file"
ls -l "$file"

echo ""
echo "--- chmod 644: forma numerica (rw- r-- r--) ---"
chmod 644 "$file"
ls -l "$file"

echo ""
echo "--- eseguiamo lo script dopo aver ripristinato il permesso di esecuzione ---"
chmod +x "$file"
./"$file"
