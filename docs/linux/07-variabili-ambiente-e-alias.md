# Variabili d'ambiente e alias

La shell mantiene un proprio "ambiente" di variabili che influenzano il comportamento dei comandi, e permette di definire scorciatoie personalizzate.

## Variabili d'ambiente

Sono variabili disponibili a tutti i programmi lanciati dalla shell, non solo allo script corrente. Alcune sono predefinite dal sistema:

| Variabile | Contiene |
|---|---|
| `$HOME` | il percorso della home dell'utente |
| `$USER` | il nome dell'utente corrente |
| `$PATH` | l'elenco delle cartelle in cui la shell cerca gli eseguibili quando digiti un comando |

```bash
echo "$HOME"
echo "$PATH"
```

## `env` ed `export`

**`env`** (senza argomenti) stampa tutte le variabili d'ambiente attualmente impostate.

**`export`** rende una variabile visibile anche ai comandi e agli script lanciati da quella shell (senza `export`, la variabile resterebbe visibile solo alla shell corrente):

```bash
export NOME_APP="Registro voti"
```

## `$PATH` e ricerca degli eseguibili

Quando digiti un comando (es. `ls`), la shell lo cerca in ognuna delle cartelle elencate in `$PATH`, nell'ordine in cui compaiono, separate da `:`. È per questo che un tuo script non viene trovato digitando solo il suo nome, a meno che la cartella in cui si trova non sia in `$PATH`: per eseguirlo serve indicare il percorso, ad esempio `./script.sh`.

## `alias`

Crea un nome breve per un comando (o una sequenza di opzioni) usato di frequente:

```bash
alias ll='ls -la'
```

Da quel momento, digitare `ll` equivale a digitare `ls -la`. Per rimuovere un alias si usa `unalias ll`. Gli alias definiti da terminale valgono solo per la sessione corrente: per renderli permanenti si aggiungono al file di configurazione della shell, `~/.bashrc`.

## Prova tu

<div class="oc-embed"
     data-path="Linux/07-Variabili-ambiente-e-alias/demo.sh"
     data-lang="bash"
     data-autorun="true">
</div>
