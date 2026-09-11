# Monitor spazio disco

Scrivi uno script Bash che misuri lo spazio occupato da una cartella di lavoro e stampi un avviso se questo supera una soglia prestabilita.

## Obiettivo

Misurare lo spazio occupato da una cartella di lavoro e stampare un avviso se supera una soglia espressa in kilobyte.

## Descrizione

Il comando **`du`** (disk usage) calcola lo spazio occupato da file e cartelle. Con l'opzione **`-s`** (summary) restituisce solo il totale, invece del dettaglio di ogni sottocartella; con **`-k`** esprime il risultato in kilobyte:

```bash
du -sk cartella
```

L'output di `du` è composto da due colonne separate da tabulazione (dimensione e percorso): il comando **`cut -f1`** estrae solo la **prima colonna** (`-f` sta per "field"), cioè la dimensione:

```bash
dimensione_kb=$(du -sk cartella | cut -f1)
```

## Suggerimenti

- `cut -f1` funziona perché `du` separa le colonne con un carattere di tabulazione, il separatore predefinito di `cut`.
- Uno script di monitoraggio reale verrebbe eseguito periodicamente (ad esempio con `cron`), non una volta sola: qui ci limitiamo a un singolo controllo.
- Estensione: invece di un solo avviso testuale, prova a far terminare lo script con un `exit 1` quando la soglia viene superata, così da poterlo integrare in automazioni più complesse.

## Soluzione

```bash
--8<-- "Bash/Monitor-spazio-disco/main.sh"
```

<div class="oc-embed"
     data-path="Bash/Monitor-spazio-disco/main.sh"
     data-lang="bash"
     data-autorun="true">
</div>
