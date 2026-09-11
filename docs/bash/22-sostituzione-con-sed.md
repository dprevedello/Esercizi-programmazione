# Sostituzione testo con sed

Scrivi uno script Bash che, dato un semplice file di configurazione, sostituisca alcuni valori al suo interno e ne mostri il contenuto prima e dopo la modifica.

## Obiettivo

Dato un semplice file di configurazione, sostituire alcuni valori con `sed` e verificarne il contenuto prima e dopo la modifica.

## Descrizione

**`sed`** (stream editor) applica trasformazioni testuali riga per riga. Il comando di sostituzione più usato ha la forma:

```bash
sed 's/testo_da_cercare/testo_sostitutivo/' file.txt
```

La lettera **`s`** indica "substitute"; per impostazione predefinita `sed` stampa il risultato a video **senza modificare il file**. Per applicare la modifica direttamente al file si usa l'opzione **`-i`** (in-place):

```bash
sed -i 's/vecchio/nuovo/' file.txt
```

## Suggerimenti

- Senza `-i`, `sed` è utile per "provare" una sostituzione senza rischiare di rovinare il file originale.
- Il carattere `/` nel comando `s/.../.../ ` è solo una convenzione: se il testo da cercare contiene `/`, puoi usare un altro separatore, ad esempio `s|testo|altro|`.
- Per sostituire **tutte** le occorrenze in una riga (non solo la prima), aggiungi il flag `g` alla fine: `s/vecchio/nuovo/g`.

## Soluzione

```bash
--8<-- "Bash/Sostituzione-con-sed/main.sh"
```

<div class="oc-embed"
     data-path="Bash/Sostituzione-con-sed/main.sh"
     data-lang="bash"
     data-autorun="true">
</div>
