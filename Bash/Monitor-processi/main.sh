#!/bin/bash
# Avvia alcuni processi in background e ne isola le informazioni con ps, grep e awk.

sleep 30 &
sleep 30 &

echo "--- Tutti i processi 'sleep' in esecuzione ---"
ps aux | grep "[s]leep"

echo ""
echo "--- Solo i PID dei processi 'sleep', estratti con awk ---"
ps aux | grep "[s]leep" | awk '{print $2}'

echo ""
echo "--- Terminiamo tutti i processi 'sleep' trovati ---"
for pid in $(ps aux | grep "[s]leep" | awk '{print $2}'); do
    kill "$pid"
    echo "Terminato processo $pid"
done

wait 2>/dev/null

echo ""
echo "--- Verifica: nessun processo 'sleep' dovrebbe più essere presente ---"
ps aux | grep "[s]leep" || echo "(nessun processo 'sleep' trovato)"
