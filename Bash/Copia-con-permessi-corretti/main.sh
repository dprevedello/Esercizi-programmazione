#!/bin/bash
# Duplica uno script in una cartella di distribuzione, assicurandosi che sia eseguibile.

mkdir -p distribuzione
cat > mio_script.sh <<'EOF'
#!/bin/bash
echo "Sono uno script di esempio"
EOF

echo "Permessi prima della copia:"
ls -l mio_script.sh

cp mio_script.sh distribuzione/mio_script.sh
chmod 755 distribuzione/mio_script.sh

echo ""
echo "Permessi dopo la copia in 'distribuzione':"
ls -l distribuzione/mio_script.sh

echo ""
echo "Esecuzione dello script copiato:"
./distribuzione/mio_script.sh
