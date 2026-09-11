#!/bin/bash
# Menù interattivo: ripete la richiesta finché l'utente non sceglie di uscire.

scelta=""

until [ "$scelta" = "0" ]; do
    echo ""
    echo "=== MENU ==="
    echo "1) Saluta"
    echo "2) Mostra un messaggio del giorno"
    echo "0) Esci"
    read -p "Scegli un'opzione: " scelta || break

    case "$scelta" in
        1) echo "Ciao! Benvenuto nel menu Bash." ;;
        2) echo "Oggi è un bel giorno per imparare Bash." ;;
        0) echo "Uscita in corso..." ;;
        *) echo "Opzione non valida." ;;
    esac
done
