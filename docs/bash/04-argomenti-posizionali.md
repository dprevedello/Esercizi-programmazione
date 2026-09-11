# Argomenti posizionali

Scrivi uno script Bash che stampi il proprio nome, il numero di argomenti ricevuti e il loro valore, usando le variabili speciali `$0`, `$1`, `$#` e `$@`. Salva il file come `nome_cognome_argomenti.sh`.

## Obiettivo

Stampare il nome dello script, il numero di argomenti ricevuti e il loro valore, usando le variabili speciali di Bash.

## Descrizione

Quando uno script viene lanciato con degli argomenti (es. `./script.sh Mario Rossi 17`), Bash li rende disponibili tramite alcune variabili speciali dette **parametri posizionali**:

| Variabile | Significato |
|---|---|
| `$0` | Nome dello script |
| `$1`, `$2`, ... | Primo, secondo, ... argomento |
| `$#` | Numero totale di argomenti |
| `$@` | Tutti gli argomenti, come lista separata |

!!! info "Simulazione nel sandbox"
    L'editor online non permette di passare argomenti da riga di comando all'avvio dello script. Per poterli comunque sperimentare, questo esercizio li simula con il comando `set -- valore1 valore2 ...`, che riassegna manualmente `$1`, `$2`, ecc. In un terminale reale li passeresti invece direttamente al lancio dello script.

## Suggerimenti

- In locale, prova a lanciare lo script con argomenti diversi, ad esempio `./script.sh Luigi Bianchi 16`.
- Usa `$#` per controllare quanti argomenti sono stati passati prima di usarli.
- `$@` e `$*` sembrano simili ma si comportano diversamente se racchiusi tra virgolette con più parole: preferisci `"$@"` quando devi ciclare sugli argomenti.

## Soluzione

```bash
--8<-- "Bash/Argomenti-posizionali/main.sh"
```

<div class="oc-embed"
     data-path="Bash/Argomenti-posizionali/main.sh"
     data-lang="bash"
     data-autorun="true">
</div>
