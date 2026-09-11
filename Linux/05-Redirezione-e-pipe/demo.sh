#!/bin/bash
# Dimostra la redirezione dell'output/input e il collegamento di comandi con la pipe.

echo "--- > : scrive (sovrascrivendo) l'output su un file ---"
echo "prima riga" > output.txt
cat output.txt

echo ""
echo "--- >> : aggiunge in fondo al file, senza sovrascrivere ---"
echo "seconda riga" >> output.txt
cat output.txt

echo ""
echo "--- < : usa un file come input di un comando ---"
wc -l < output.txt

echo ""
echo "--- 2> : reindirizza solo gli errori (stderr) su un file ---"
ls file-inesistente.txt 2> errori.log
echo "Contenuto di errori.log:"
cat errori.log

echo ""
echo "--- reindirizzare gli errori a /dev/null per scartarli ---"
ls file-inesistente.txt 2> /dev/null
echo "(nessun errore stampato qui sopra)"

echo ""
echo "--- | : la pipe collega l'output di un comando all'input del successivo ---"
cat output.txt | grep "seconda"
