# Hello World

Scrivi uno script Bash che stampi a video il messaggio `Hello World!`. Salva il file come `nome_cognome_helloworld.sh`, rendilo eseguibile e prova a lanciarlo da terminale.

## Obiettivo

Scrivere uno script Bash che stampi la stringa `Hello World!` sulla console.

## Descrizione

Uno script Bash è un file di testo che contiene una sequenza di comandi eseguiti in ordine dalla shell. Per convenzione inizia con una riga speciale chiamata **shebang**:

```bash
#!/bin/bash
```

Questa riga indica al sistema operativo quale interprete usare per eseguire il file. Il comando **`echo`** stampa a video il testo passato come argomento.

## Suggerimenti

- Salva lo script con estensione `.sh` (es. `hello.sh`).
- Rendilo eseguibile con `chmod +x hello.sh` prima di lanciarlo con `./hello.sh`.
- In alternativa puoi eseguirlo direttamente con `bash hello.sh`, senza bisogno del permesso di esecuzione.
- Le righe che iniziano con `#` (tranne lo shebang) sono commenti e vengono ignorate dalla shell.

## Soluzione

```bash
--8<-- "Bash/Hello-world/main.sh"
```

<div class="oc-embed"
     data-path="Bash/Hello-world/main.sh"
     data-lang="bash"
     data-autorun="true">
</div>
