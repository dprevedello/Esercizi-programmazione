# Backup automatico con controllo argomenti

Scrivi uno script Bash che riceva il nome di un file, ne verifichi l'esistenza e ne crei una copia di backup con un timestamp nel nome. Il programma deve:

- verificare che sia stato fornito un solo argomento (il file da salvare);
- controllare che il file indicato esista realmente;
- creare la copia di backup con un timestamp nel nome;
- terminare con un codice di uscita diverso per ogni tipo di errore riscontrato.

## Obiettivo

Scrivere uno script di backup che verifichi gli argomenti ricevuti, controlli che il file da salvare esista, ne crei una copia con timestamp e segnali con un codice di uscita appropriato l'esito dell'operazione.

## Descrizione

Questo script riprende e combina le tecniche viste nei capitoli precedenti: la validazione di `$#`, il controllo dell'esistenza di un file con `[ -f ... ]`, il timestamp con `date` e il backup con `cp`.

La novità è l'uso di **più codici di uscita distinti**, uno per ogni tipo di errore possibile:

```bash
exit 1   # argomenti mancanti o sbagliati
exit 2   # file sorgente non trovato
exit 3   # errore durante la copia
exit 0   # successo
```

Questa pratica è comune negli script "professionali": chi richiama lo script (un altro script, un sistema di automazione) può distinguere *perché* è fallito controllando il codice di uscita, senza dover analizzare il testo dei messaggi.

**`$0`** nel messaggio d'uso (`Uso: $0 <file>`) mostra sempre il nome corretto dello script, anche se viene rinominato.

## Suggerimenti

- Verifica sempre gli argomenti **prima** di usarli: uno script robusto non deve mai assumere che l'input sia corretto.
- `if cp "$sorgente" "$destinazione"; then ... else ... fi` controlla direttamente l'esito del comando `cp`, senza bisogno di leggere `$?` a parte.
- Dopo aver eseguito uno script in locale, puoi controllare il suo codice di uscita con `echo $?` nel terminale.

## Soluzione

```bash
--8<-- "Bash/Backup-automatico-argomenti/main.sh"
```

<div class="oc-embed"
     data-path="Bash/Backup-automatico-argomenti/main.sh"
     data-lang="bash"
     data-autorun="true">
</div>
