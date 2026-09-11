# Log rotator semplice

Scrivi uno script Bash che gestisca un file di log in modo che, a ogni nuova esecuzione, il contenuto precedente venga conservato in un file separato invece di essere perso.

## Obiettivo

Gestire un file di log in modo che, a ogni nuovo "ciclo", il contenuto precedente venga conservato in un file separato invece di essere perso.

## Descrizione

La **redirezione in append** `>>` aggiunge testo alla fine di un file senza cancellarne il contenuto, a differenza di `>` che lo sovrascrive:

```bash
echo "riga" >> file.log
```

La **rotazione dei log** è una tecnica comune nei sistemi reali: quando un file di log cresce troppo o si conclude un ciclo di esecuzione, viene rinominato (es. in `.old`) e se ne crea uno nuovo vuoto, così da non perdere lo storico ma nemmeno lasciarlo crescere indefinitamente. Il comando **`mv sorgente destinazione`** rinomina (o sposta) un file.

## Suggerimenti

- Controlla sempre con `[ -f "$backup" ]` se un vecchio backup esiste già, prima di crearne uno nuovo, per evitare errori o perdite di dati impreviste.
- L'ordine delle operazioni conta: prima elimina il vecchio backup, poi rinomina il log corrente, infine crea il nuovo log vuoto.
- Un log rotator reale userebbe anche una condizione sulla dimensione del file (es. con `du` o `wc -c`) per decidere quando ruotare.

## Soluzione

```bash
--8<-- "Bash/Log-rotator-semplice/main.sh"
```

<div class="oc-embed"
     data-path="Bash/Log-rotator-semplice/main.sh"
     data-lang="bash"
     data-autorun="true">
</div>
