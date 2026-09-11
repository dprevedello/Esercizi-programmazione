#!/bin/bash
# Simula il passaggio di argomenti da riga di comando con "set --"
# e mostra come leggerli all'interno dello script.

set -- Mario Rossi 17

echo "Nome dello script: $0"
echo "Numero di argomenti: $#"
echo "Primo argomento: $1"
echo "Secondo argomento: $2"
echo "Tutti gli argomenti: $@"
