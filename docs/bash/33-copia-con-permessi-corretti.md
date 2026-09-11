# Copia con permessi corretti

Scrivi uno script Bash che copi uno script in una cartella di distribuzione e ne imposti correttamente i permessi di esecuzione, verificando poi che lo script copiato funzioni.

## Obiettivo

Creare un piccolo script, copiarlo in una cartella di "distribuzione" e assicurarsi che, una volta copiato, sia eseguibile — poi eseguirlo per verificarlo.

## Descrizione

Il comando `cp` (visto nella sezione [Linux](../linux/index.md)) copia il **contenuto** di un file, ma non sempre i permessi risultano quelli previsti per la destinazione d'uso: è buona norma, dopo una copia, verificare ed eventualmente correggere i permessi con `chmod`, soprattutto per gli script che devono restare eseguibili.

```bash
cp origine.sh destinazione/origine.sh
chmod 755 destinazione/origine.sh
```

`755` in forma ottale corrisponde a `rwxr-xr-x`: lettura, scrittura ed esecuzione per il proprietario; lettura ed esecuzione per gruppo e altri.

## Suggerimenti

- Controlla i permessi con `ls -l` sia prima sia dopo la copia, per vedere l'effetto di `chmod`.
- Se dimentichi `chmod +x`, eseguire lo script con `./script.sh` restituisce un errore di permesso negato.
- Estensione: prova a copiare un'intera cartella di script con `cp -r`, e ad applicare `chmod` a tutti i file al suo interno con un ciclo `for`.

## Soluzione

```bash
--8<-- "Bash/Copia-con-permessi-corretti/main.sh"
```

<div class="oc-embed"
     data-path="Bash/Copia-con-permessi-corretti/main.sh"
     data-lang="bash"
     data-autorun="true">
</div>
