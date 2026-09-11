#!/bin/bash
# Dimostra i comandi principali per creare, copiare, spostare ed eliminare file e cartelle.

mkdir -p archivio
touch archivio/originale.txt
echo "contenuto di esempio" > archivio/originale.txt

echo "--- cp: copia di un file ---"
cp archivio/originale.txt archivio/copia.txt
ls archivio

echo ""
echo "--- mv: rinomina/sposta un file ---"
mv archivio/copia.txt archivio/rinominato.txt
ls archivio

echo ""
echo "--- ln -s: crea un collegamento simbolico ---"
ln -s archivio/originale.txt link-originale.txt
ls -l link-originale.txt

echo ""
echo "--- rm: elimina file e cartelle ---"
rm link-originale.txt
rm -r archivio
ls
