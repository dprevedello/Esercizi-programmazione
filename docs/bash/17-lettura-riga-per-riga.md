# Lettura riga per riga

Scrivi uno script Bash che crei un file con alcuni elementi (uno per riga) e li stampi numerati, leggendo il file una riga alla volta.

## Obiettivo

Creare un file con alcuni elementi (uno per riga) e stamparli numerati, leggendo il file una riga alla volta.

## Descrizione

Il modo idiomatico per leggere un file riga per riga in Bash è combinare un ciclo `while` con `read`, reindirizzando il file in ingresso al ciclo con **`< file`**:

```bash
while IFS= read -r riga; do
    ...
done < "$file"
```

- **`IFS=`** (vuoto) prima di `read` impedisce che eventuali spazi iniziali o finali della riga vengano rimossi.
- **`-r`** evita che il backslash venga interpretato come carattere di escape.
- **`< "$file"`** dopo `done` reindirizza il contenuto del file come input dell'intero ciclo, riga dopo riga.

## Suggerimenti

- Questo pattern (`while IFS= read -r riga; do ... done < file`) è uno standard: memorizzalo così com'è.
- Il ciclo termina automaticamente quando `read` non trova più righe da leggere (fine del file).
- Il comando `cat > file <<EOF ... EOF` (**heredoc**) è un modo comodo per creare un file di prova direttamente dentro lo script.

## Soluzione

```bash
--8<-- "Bash/Lettura-riga-per-riga/main.sh"
```

<div class="oc-embed"
     data-path="Bash/Lettura-riga-per-riga/main.sh"
     data-lang="bash"
     data-autorun="true">
</div>
