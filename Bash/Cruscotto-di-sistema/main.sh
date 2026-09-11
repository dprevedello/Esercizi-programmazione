#!/bin/bash
# Costruisce un cruscotto testuale con lo stato generale del sistema.

cruscotto="cruscotto.txt"

{
    echo "======================================"
    echo " CRUSCOTTO DI SISTEMA - $(date +"%d/%m/%Y %H:%M:%S")"
    echo "======================================"
    echo ""
    echo "Utente corrente: $(whoami)"
    echo "Sistema: $(uname -s) $(uname -r)"
    echo ""
    echo "--- Processi attivi (primi 5) ---"
    ps aux | head -n 6
    echo ""
    echo "--- Memoria disponibile ---"
    free -h 2>/dev/null || echo "(comando 'free' non disponibile)"
    echo ""
    echo "--- Spazio su disco ---"
    df -h . 2>/dev/null
    echo ""
    echo "--- Spazio occupato dalla cartella corrente ---"
    du -sh . 2>/dev/null
} > "$cruscotto"

echo "Cruscotto generato:"
cat "$cruscotto"
