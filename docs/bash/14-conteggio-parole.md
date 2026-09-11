# Conteggio parole di una frase

Scrivi uno script Bash che, data una frase, ne conti e stampi il numero di parole.

## Obiettivo

Data una frase, contare quante parole contiene.

## Descrizione

Quando una variabile viene espansa **senza virgolette** dentro le parentesi tonde di un array, Bash la suddivide automaticamente in più elementi usando gli spazi come separatore — un meccanismo chiamato **word splitting**:

```bash
frase="una frase di prova"
parole=($frase)
```

Il risultato è un **array**: `parole` conterrà `"una"`, `"frase"`, `"di"`, `"prova"` come elementi distinti. La lunghezza di un array si ottiene con **`${#array[@]}`**.

## Suggerimenti

- Se la frase contenesse più spazi consecutivi, il word splitting li tratta come un unico separatore.
- Questo metodo funziona bene per frasi semplici; per testi con punteggiatura complessa servirebbero strumenti più avanzati (vedi la sezione sui filtri con `awk`).
- Prova a cambiare `frase` e verifica che il conteggio resti corretto.

## Soluzione

```bash
--8<-- "Bash/Conteggio-parole/main.sh"
```

<div class="oc-embed"
     data-path="Bash/Conteggio-parole/main.sh"
     data-lang="bash"
     data-autorun="true">
</div>
