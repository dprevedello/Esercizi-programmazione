# Gestione errori con trap

Scrivi uno script Bash che si interrompa automaticamente al primo errore e che esegua sempre un'operazione di pulizia, ad esempio la cancellazione di un file temporaneo, prima di terminare, in qualunque modo lo script finisca.

## Obiettivo

Scrivere uno script che si interrompa automaticamente al primo errore e che, comunque vada, esegua sempre un'operazione di pulizia prima di terminare.

## Descrizione

Per impostazione predefinita, Bash prosegue l'esecuzione di uno script anche dopo che un comando è fallito. Il comando **`set -e`**, messo all'inizio dello script, cambia questo comportamento: se un comando restituisce un codice di errore, lo script si interrompe immediatamente.

Il comando **`trap`** permette di associare una funzione (o un comando) a un evento, in modo che venga eseguita automaticamente quando quell'evento si verifica:

```bash
trap cleanup EXIT
```

**`EXIT`** non è un errore in senso stretto, ma uno pseudo-segnale che Bash genera sempre alla fine dello script, sia che sia terminato con successo, sia con un errore: è il punto ideale per eseguire operazioni di pulizia (es. cancellare file temporanei) che devono avvenire *in ogni caso*.

I messaggi di errore, per convenzione, si scrivono su **standard error** invece che su standard output, usando la redirezione `>&2`:

```bash
echo "Errore: ..." >&2
```

## Suggerimenti

- Definisci la funzione di `cleanup` **prima** della riga `trap`, altrimenti Bash non saprebbe ancora a cosa si riferisce.
- `set -e` non intercetta tutti i tipi di errore (ad esempio, un comando dentro una condizione `if` non lo attiva): è un buon punto di partenza, non una garanzia assoluta.
- Prova a togliere `trap cleanup EXIT` e osserva che, se lo script termina prima con `exit 1`, il file temporaneo non viene più ripulito.

## Soluzione

```bash
--8<-- "Bash/Gestione-errori-trap/main.sh"
```

<div class="oc-embed"
     data-path="Bash/Gestione-errori-trap/main.sh"
     data-lang="bash"
     data-autorun="true">
</div>
