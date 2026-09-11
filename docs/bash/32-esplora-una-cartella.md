# Esplora una cartella

Scrivi uno script Bash che descriva il contenuto di una cartella di progetto, elencando ogni elemento al suo interno insieme al tipo rilevato dal comando `file`.

## Obiettivo

Creare una piccola struttura di cartelle e file di esempio, poi stampare per ciascun elemento contenuto nella cartella principale il nome e il tipo (file, cartella, ecc.).

## Descrizione

Il comando **`file`** (visto nella sezione [Linux](../linux/index.md)) indica il tipo di un file indipendentemente dalla sua estensione; l'opzione **`-b`** ("brief") ne stampa solo la descrizione, senza ripetere il nome del file:

```bash
file -b main.py
```

Combinando un ciclo `for` su un'espansione a jolly (`progetto/*`) con `basename` e `file -b`, si ottiene un piccolo "esploratore" testuale della cartella.

## Suggerimenti

- `ls -la` mostra tutti i dettagli in un colpo solo; il ciclo `for` con `file -b` permette invece di personalizzare come vengono presentate le informazioni, elemento per elemento.
- `file -b` su una cartella restituisce semplicemente `directory`.
- Estensione: prova a distinguere nel ciclo, con un `if [ -d ... ]`, le cartelle dai file, stampandole con un simbolo diverso.

## Soluzione

```bash
--8<-- "Bash/Esplora-una-cartella/main.sh"
```

<div class="oc-embed"
     data-path="Bash/Esplora-una-cartella/main.sh"
     data-lang="bash"
     data-autorun="true">
</div>
