#!/bin/bash
# Gestisce errori e interruzioni con "set -e" e "trap".

set -e

cleanup() {
    echo "Pulizia in corso prima di uscire..."
    rm -f temp_dati.txt
}

trap cleanup EXIT

echo "Inizio elaborazione"
echo "dati temporanei" > temp_dati.txt

echo "Verifico che il file esista..."
if [ ! -f temp_dati.txt ]; then
    echo "Errore: file non trovato" >&2
    exit 1
fi

echo "File trovato, elaborazione completata con successo."
