# Gestione di file e cartelle

Questi comandi permettono di creare, copiare, spostare ed eliminare file e cartelle: le operazioni più comuni nella gestione quotidiana del filesystem.

## `touch`

Crea un file vuoto, oppure aggiorna la data di modifica di un file esistente.

```bash
touch nuovo.txt
```

## `mkdir`

Crea una cartella (**m**a**k**e **dir**ectory).

| Opzione | Effetto |
|---|---|
| `-p` | crea anche le cartelle intermedie mancanti, senza errore se la cartella esiste già |

```bash
mkdir -p progetto/src
```

## `cp`

Copia un file o una cartella.

| Opzione | Effetto |
|---|---|
| `-r` | copia ricorsivamente (necessaria per le cartelle) |

```bash
cp sorgente.txt destinazione.txt
cp -r cartella_sorgente/ cartella_destinazione/
```

## `mv`

Sposta o rinomina un file o una cartella (non esiste un comando "rename" separato: si usa `mv` con lo stesso percorso di partenza).

```bash
mv vecchio_nome.txt nuovo_nome.txt
```

## `rm`

Elimina un file o una cartella. **Attenzione**: non esiste un "cestino", la cancellazione è definitiva.

| Opzione | Effetto |
|---|---|
| `-r` | elimina ricorsivamente (necessaria per le cartelle) |
| `-f` | forza l'eliminazione senza chiedere conferma |

```bash
rm file.txt
rm -r cartella/
```

## `ln`

Crea un collegamento tra file.

| Opzione | Effetto |
|---|---|
| `-s` | crea un collegamento **simbolico** (un puntatore al file originale, come i collegamenti di Windows) |

```bash
ln -s originale.txt collegamento.txt
```

## Prova tu

<div class="oc-embed"
     data-path="Linux/02-Gestione-file-e-cartelle/demo.sh"
     data-lang="bash"
     data-autorun="true">
</div>
