# Test file esistente

Scrivi uno script Bash che verifichi se un file e una cartella esistono nel filesystem, stampando un messaggio diverso a seconda del risultato.

## Obiettivo

Verificare se un file e una cartella esistono, stampando un messaggio diverso in base al risultato.

## Descrizione

Il comando **`[ ... ]`** (equivalente al comando `test`) permette di valutare condizioni su file e cartelle tramite alcuni operatori:

| Operatore | Vero se... |
|---|---|
| `-f percorso` | esiste ed è un file regolare |
| `-d percorso` | esiste ed è una cartella (directory) |
| `-e percorso` | esiste, di qualunque tipo |

```bash
if [ -f "$file" ]; then
    echo "Il file esiste"
fi
```

Racchiudere le variabili tra virgolette (`"$file"`) evita errori quando il percorso contiene spazi o è vuoto.

## Suggerimenti

- Non dimenticare gli spazi dopo `[` e prima di `]`: `[-f "$file"]` senza spazi non funziona.
- `mkdir -p` crea una cartella senza generare errore se esiste già.
- Usa `!` davanti alla condizione (es. `if [ ! -f "$file" ]`) per verificare che qualcosa **non** esista.

## Soluzione

```bash
--8<-- "Bash/Test-file-esistente/main.sh"
```

<div class="oc-embed"
     data-path="Bash/Test-file-esistente/main.sh"
     data-lang="bash"
     data-autorun="true">
</div>
