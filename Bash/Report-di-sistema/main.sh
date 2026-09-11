#!/bin/bash
# Genera un report testuale con alcune informazioni di base sul sistema.

report="report_sistema.txt"

{
    echo "=== Report di sistema ==="
    echo "Generato il: $(date +"%d/%m/%Y alle %H:%M:%S")"
    echo "Utente: $(whoami)"
    echo "Sistema: $(uname -s) $(uname -r)"
    echo "Spazio occupato nella cartella corrente:"
    du -sh . 2>/dev/null
} > "$report"

echo "Report generato in '$report':"
cat "$report"
