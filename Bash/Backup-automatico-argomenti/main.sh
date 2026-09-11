#!/bin/bash
# Script di backup completo: valida gli argomenti, verifica il file sorgente
# e crea una copia con timestamp, gestendo gli errori con codici di uscita appropriati.
# (argomento simulato con "set --": vedi l'esercizio sui parametri posizionali)

set -- appunti.txt

if [ $# -ne 1 ]; then
    echo "Uso: $0 <file_da_salvare>" >&2
    exit 1
fi

sorgente="$1"

# Crea il file sorgente solo per rendere l'esempio eseguibile in autonomia.
echo "Contenuto da salvare." > "$sorgente"

if [ ! -f "$sorgente" ]; then
    echo "Errore: il file '$sorgente' non esiste." >&2
    exit 2
fi

timestamp=$(date +"%Y%m%d_%H%M%S")
destinazione="${sorgente%.*}_$timestamp.bak"

if cp "$sorgente" "$destinazione"; then
    echo "Backup completato: $destinazione"
    exit 0
else
    echo "Errore durante la copia del file." >&2
    exit 3
fi
