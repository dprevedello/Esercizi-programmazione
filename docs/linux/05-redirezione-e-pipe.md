# Redirezione e pipe

Questi operatori collegano l'input e l'output dei comandi a file o ad altri comandi: sono il "collante" che permette di costruire pipeline complesse, e sono la base degli script Bash che li usano.

## Redirezione dell'output: `>` e `>>`

| Operatore | Effetto |
|---|---|
| `comando > file` | scrive l'output di `comando` su `file`, **sovrascrivendolo** se esiste già |
| `comando >> file` | **aggiunge** l'output di `comando` in fondo a `file`, senza cancellarne il contenuto |

```bash
echo "riga" > file.txt
echo "altra riga" >> file.txt
```

## Redirezione dell'input: `<`

Usa il contenuto di un file come input di un comando, al posto della tastiera.

```bash
wc -l < file.txt
```

## Redirezione degli errori: `2>` e `&>`

Ogni comando ha due canali di output distinti: lo **standard output** (`1`, l'output normale) e lo **standard error** (`2`, i messaggi di errore). Si possono reindirizzare separatamente:

| Operatore | Effetto |
|---|---|
| `comando 2> file` | scrive solo gli errori su `file` |
| `comando 2> /dev/null` | scarta gli errori (`/dev/null` è un file speciale che "butta via" tutto ciò che riceve) |
| `comando &> file` | scrive **sia** output normale **sia** errori sullo stesso file |

## La pipe: `|`

Collega l'output di un comando all'input del comando successivo, senza passare da un file intermedio:

```bash
cat file.txt | grep "parola"
```

Si possono concatenare più pipe in sequenza (`comando1 | comando2 | comando3`): è il principio su cui si basa tutta la sezione "Filtri e pipe" degli esercizi Bash.

## Prova tu

<div class="oc-embed"
     data-path="Linux/05-Redirezione-e-pipe/demo.sh"
     data-lang="bash"
     data-autorun="true">
</div>
