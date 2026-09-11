#!/bin/bash
# Ruota un file di log: se esiste già un vecchio backup, lo sostituisce.

log="app.log"
backup="app.log.old"

echo "[INFO] Avvio applicazione" > "$log"
echo "[INFO] Operazione completata" >> "$log"

if [ -f "$backup" ]; then
    rm "$backup"
fi

if [ -f "$log" ]; then
    mv "$log" "$backup"
fi

echo "Nuovo ciclo di log" > "$log"

echo "--- Log corrente ($log) ---"
cat "$log"
echo "--- Log precedente ($backup) ---"
cat "$backup"
