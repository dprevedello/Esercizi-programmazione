# Ciclo for sui file di una cartella

Scrivi uno script Bash che crei alcuni file di esempio dentro una cartella e ne stampi l'elenco usando un ciclo `for`.

## Obiettivo

Creare alcuni file di esempio dentro una cartella e stamparne l'elenco con un ciclo `for`.

## Descrizione

Oltre alla forma numerica in stile C, il `for` di Bash può ciclare direttamente su un elenco di elementi, ad esempio i file che corrispondono a un pattern:

```bash
for file in cartella/*; do
    echo "$file"
done
```

Il simbolo **`*`** è un carattere jolly (**glob**) che la shell espande, prima ancora di eseguire il comando, nell'elenco di tutti i file presenti nella cartella. Il comando **`basename`** restituisce solo il nome del file, senza il percorso che lo precede.

## Suggerimenti

- Racchiudi sempre `"$file"` tra virgolette: se un nome contiene spazi, senza virgolette lo script lo tratterebbe come più argomenti.
- `touch` crea file vuoti: comodo per preparare rapidamente dati di prova.
- Se la cartella fosse vuota, il pattern `cartella/*` non verrebbe espanso e il ciclo userebbe il testo letterale: puoi ignorare questo caso per ora.

## Soluzione

```bash
--8<-- "Bash/Ciclo-for-sui-file/main.sh"
```

<div class="oc-embed"
     data-path="Bash/Ciclo-for-sui-file/main.sh"
     data-lang="bash"
     data-autorun="true">
</div>
