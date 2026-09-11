#!/bin/bash
# Cerca tutti i file .log in una cartella (anche nelle sottocartelle) e li raccoglie
# in un'unica cartella di archivio.

mkdir -p logs/vecchi archivio_log
echo "avvio ok" > logs/app1.log
echo "errore di connessione" > logs/app2.log
echo "log molto vecchio" > logs/vecchi/old.log
touch logs/note.txt

echo "--- Tutti i file .log trovati (anche nelle sottocartelle) ---"
find logs -name "*.log"

echo ""
echo "--- Li spostiamo tutti in 'archivio_log' con find + -exec ---"
find logs -name "*.log" -exec mv {} archivio_log/ \;
ls archivio_log

echo ""
echo "--- File rimasti in 'logs' (contati con find + wc -l) ---"
find logs -type f | wc -l
