#!/bin/bash
# Dimostra i comandi per ottenere informazioni sull'utente e sui gruppi correnti.

echo "--- whoami: utente corrente ---"
whoami

echo ""
echo "--- id: utente, gruppo primario e gruppi secondari ---"
id

echo ""
echo "--- gruppo primario dell'utente corrente ---"
id -gn
