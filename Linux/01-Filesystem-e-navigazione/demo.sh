#!/bin/bash
# Dimostra i comandi di base per muoversi ed esplorare il filesystem.

mkdir -p progetto/src progetto/docs
touch progetto/src/main.py progetto/docs/note.txt

echo "--- pwd: cartella corrente ---"
pwd

echo ""
echo "--- ls: contenuto della cartella corrente ---"
ls

echo ""
echo "--- ls -la progetto: elenco dettagliato, inclusi i file nascosti ---"
ls -la progetto

echo ""
echo "--- cd + pwd: spostarsi in una sottocartella ---"
cd progetto/src
pwd

echo ""
echo "--- file: che tipo di file e'? ---"
file main.py

echo ""
echo "--- torna alla cartella precedente con cd - ---"
cd -
pwd
