# Validazione argomenti script

Scrivi uno script Bash che controlli di aver ricevuto esattamente un argomento e che questo sia un numero intero, interrompendosi con un messaggio di errore se una delle due condizioni non è rispettata.

## Obiettivo

Verificare che lo script riceva esattamente un argomento e che questo sia un numero intero; in caso contrario, terminare con un messaggio di errore.

## Descrizione

La variabile **`$#`** contiene il numero di argomenti ricevuti dallo script: confrontandola con il valore atteso si può bloccare subito un'esecuzione scorretta.

Per controllare che una stringa rispetti un certo formato si usa **`[[ ... =~ ... ]]`**, che confronta il contenuto con un'**espressione regolare**:

```bash
if [[ "$1" =~ ^[0-9]+$ ]]; then
    echo "è un numero"
fi
```

`^[0-9]+$` significa: dall'inizio (`^`) alla fine (`$`) della stringa, una o più cifre (`[0-9]+`).

Il comando **`exit`** termina lo script restituendo un codice: per convenzione `0` indica successo, un valore diverso da zero indica un errore.

## Suggerimenti

- Controlla sempre prima il numero di argomenti (`$#`) e solo dopo il loro contenuto: evita errori se un argomento manca.
- `exit 1` interrompe subito lo script: le istruzioni successive non vengono eseguite.
- Prova a cambiare il valore simulato con `set --` per testare sia il caso valido sia quello non valido.

## Soluzione

```bash
--8<-- "Bash/Validazione-argomenti-script/main.sh"
```

<div class="oc-embed"
     data-path="Bash/Validazione-argomenti-script/main.sh"
     data-lang="bash"
     data-autorun="true">
</div>
