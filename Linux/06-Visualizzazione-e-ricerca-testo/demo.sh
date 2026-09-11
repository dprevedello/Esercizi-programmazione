#!/bin/bash
# Dimostra i comandi per visualizzare e cercare testo dentro i file.

mkdir -p dati
cat > dati/poesia.txt <<EOF
Nel mezzo del cammin di nostra vita
mi ritrovai per una selva oscura
che la diritta via era smarrita.
EOF

echo "--- cat: stampa tutto il contenuto ---"
cat dati/poesia.txt

echo ""
echo "--- head -n 2: prime 2 righe ---"
head -n 2 dati/poesia.txt

echo ""
echo "--- tail -n 1: ultima riga ---"
tail -n 1 dati/poesia.txt

echo ""
echo "--- grep -i: cerca ignorando maiuscole/minuscole ---"
grep -i "SELVA" dati/poesia.txt

echo ""
echo "--- grep -c: conta le righe corrispondenti ---"
grep -c "via" dati/poesia.txt

echo ""
echo "--- find: cerca file per nome dentro una cartella ---"
find dati -name "*.txt"
