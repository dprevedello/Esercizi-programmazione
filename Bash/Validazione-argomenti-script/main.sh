#!/bin/bash
# Valida che sia stato passato esattamente un argomento numerico.
# (argomento simulato con "set --": vedi l'esercizio sui parametri posizionali)

set -- 25

if [ $# -ne 1 ]; then
    echo "Errore: devi passare esattamente un argomento."
    exit 1
fi

if ! [[ "$1" =~ ^[0-9]+$ ]]; then
    echo "Errore: '$1' non è un numero intero valido."
    exit 1
fi

echo "Argomento valido ricevuto: $1"
