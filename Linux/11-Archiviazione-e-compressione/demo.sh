#!/bin/bash
# Dimostra tar, zip/unzip e gzip/gunzip.

mkdir -p documenti
echo "Report di esempio." > documenti/report.txt
echo "Altri dati di esempio." > documenti/dati.txt

echo "--- tar: crea un archivio compresso .tar.gz ---"
tar -czvf documenti.tar.gz documenti/
ls -lh documenti.tar.gz

echo ""
echo "--- tar: estrae un archivio .tar.gz ---"
mkdir -p estratto_tar
tar -xzvf documenti.tar.gz -C estratto_tar
ls estratto_tar/documenti

echo ""
echo "--- zip: crea un archivio .zip ---"
zip -r documenti.zip documenti/ > /dev/null
ls -lh documenti.zip

echo ""
echo "--- unzip: estrae un archivio .zip ---"
mkdir -p estratto_zip
unzip -o documenti.zip -d estratto_zip > /dev/null
ls estratto_zip/documenti

echo ""
echo "--- gzip: comprime un singolo file (senza creare un archivio con più file) ---"
gzip -k documenti/report.txt
ls -lh documenti/report.txt.gz

echo ""
echo "--- gunzip: decomprime (rimuoviamo prima l'originale per vedere gunzip in azione) ---"
rm documenti/report.txt
gunzip documenti/report.txt.gz
cat documenti/report.txt
