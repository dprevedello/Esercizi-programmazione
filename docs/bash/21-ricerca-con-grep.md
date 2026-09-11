# Ricerca in un file con grep

Scrivi uno script Bash che, dato un elenco di studenti in un file di testo, stampi solo le righe relative agli studenti promossi di una specifica classe.

## Obiettivo

Dato un elenco di studenti in un file di testo, stampare solo le righe relative agli studenti promossi di una specifica classe.

## Descrizione

**`grep`** cerca un testo (o un pattern) all'interno di un file e stampa solo le righe che lo contengono:

```bash
grep "parola" file.txt
```

Collegando più comandi con il simbolo **`|`** (pipe), l'output del primo diventa l'input del secondo: questo permette di concatenare più filtri `grep` in sequenza per ottenere un effetto "AND" (la riga deve contenere entrambe le parole cercate).

## Suggerimenti

- `grep -i` ignora la differenza tra maiuscole e minuscole.
- `grep -c "parola" file` conta quante righe contengono la parola, senza stamparle.
- `grep -v "parola" file` fa l'opposto: stampa le righe che **non** contengono la parola.

## Soluzione

```bash
--8<-- "Bash/Ricerca-con-grep/main.sh"
```

<div class="oc-embed"
     data-path="Bash/Ricerca-con-grep/main.sh"
     data-lang="bash"
     data-autorun="true">
</div>
