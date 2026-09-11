# Conteggio righe e parole di un file

Scrivi uno script Bash che crei un breve file di testo e ne stampi il numero di righe, di parole e di caratteri.

## Obiettivo

Creare un breve file di testo e stamparne il numero di righe, parole e caratteri.

## Descrizione

**`wc`** (word count) è un comando che calcola statistiche su un file o su un flusso di testo:

| Opzione | Conta |
|---|---|
| `-l` | il numero di righe |
| `-w` | il numero di parole |
| `-c` | il numero di caratteri (byte) |

```bash
wc -l file.txt
```

Senza opzioni, `wc` stampa tutte e tre le statistiche insieme.

## Suggerimenti

- `wc` considera una "riga" ogni sequenza di testo terminata da un carattere di a capo: un file senza a capo finale può dare un conteggio inaspettato.
- Puoi passare più file a `wc` in una volta sola: stamperà un totale alla fine.
- Prova a combinare `wc -l` con una pipe, ad esempio `cat file.txt | wc -l`, per ottenere lo stesso risultato in un altro modo.

## Soluzione

```bash
--8<-- "Bash/Conteggio-righe-parole-file/main.sh"
```

<div class="oc-embed"
     data-path="Bash/Conteggio-righe-parole-file/main.sh"
     data-lang="bash"
     data-autorun="true">
</div>
