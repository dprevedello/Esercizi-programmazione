#!/bin/bash
# Dimostra i soli comandi di rete che non richiedono una connessione a Internet.

echo "--- hostname: nome della macchina ---"
hostname

echo ""
echo "--- ip addr: interfacce di rete disponibili ---"
ip addr show 2>/dev/null || ifconfig 2>/dev/null || echo "(comando non disponibile in questo ambiente)"
