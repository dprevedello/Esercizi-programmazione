# Ricerca avanzata con find

Scrivi uno script Bash che cerchi tutti i file con estensione `.log` in una cartella (comprese le sue sottocartelle) e li raccolga in un'unica cartella di archivio.

## Obiettivo

Creare alcuni file `.log` distribuiti tra una cartella e una sua sottocartella, poi individuarli tutti con `find` e spostarli in un'unica cartella di archivio.

## Descrizione

Il comando **`find`** (visto nella sezione [Linux](../linux/index.md)) cerca ricorsivamente in tutte le sottocartelle, a differenza di un semplice `ls`. L'opzione **`-exec`** permette di eseguire un comando su ciascun file trovato, uno alla volta:

```bash
find cartella -name "*.log" -exec mv {} destinazione/ \;
```

- **`{}`** viene sostituito, a ogni esecuzione, dal percorso del file trovato.
- **`\;`** (punto e virgola "protetto" dal backslash) segna la fine del comando da eseguire: senza il backslash, la shell interpreterebbe il `;` come separatore tra i comandi dello script invece che come parte dell'argomento di `find`.

## Suggerimenti

- Prova prima `find cartella -name "*.log"` da solo, per controllare quali file verrebbero trovati, **prima** di aggiungere `-exec` che li sposta.
- Con molti file, un'alternativa a `-exec ... \;` (che avvia un processo per ogni file) è la pipe verso `xargs`, più efficiente: `find cartella -name "*.log" | xargs mv -t destinazione/`.
- Estensione: usa `find cartella -type f | wc -l` per contare quanti file sono rimasti nella cartella originale dopo lo spostamento.

## Soluzione

```bash
--8<-- "Bash/Ricerca-avanzata-con-find/main.sh"
```

<div class="oc-embed"
     data-path="Bash/Ricerca-avanzata-con-find/main.sh"
     data-lang="bash"
     data-autorun="true">
</div>
