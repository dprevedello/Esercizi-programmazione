# Split di una stringa con IFS

Scrivi uno script Bash che, data una riga di testo con campi separati da virgola, estragga ciascun campo in una variabile distinta e lo stampi a video.

## Obiettivo

Data una riga di testo con campi separati da virgola, estrarre ciascun campo in una variabile distinta.

## Descrizione

**`IFS`** (Internal Field Separator) è la variabile che Bash usa per decidere dove "spezzare" una stringa quando la suddivide in più parti; il suo valore predefinito è lo spazio. Impostandolo temporaneamente su un altro carattere, si può suddividere un testo secondo un formato diverso, come il CSV:

```bash
IFS=',' read -r nome cognome eta classe <<< "$riga"
```

Il simbolo **`<<<`** è un **here-string**: passa il contenuto di una variabile come se fosse digitato in input al comando, senza bisogno di un file o di uno `echo` con pipe.

## Suggerimenti

- L'assegnazione `IFS=',' read ...` vale solo per quel singolo comando: non modifica `IFS` per il resto dello script.
- `read -r` (opzione `-r`, "raw") evita che il backslash `\` venga interpretato come carattere di escape: buona pratica quasi sempre.
- Se i campi nella riga fossero meno delle variabili elencate, le variabili in eccesso resterebbero vuote.

## Soluzione

```bash
--8<-- "Bash/Split-stringa-IFS/main.sh"
```

<div class="oc-embed"
     data-path="Bash/Split-stringa-IFS/main.sh"
     data-lang="bash"
     data-autorun="true">
</div>
