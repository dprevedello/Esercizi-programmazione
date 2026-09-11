# Variabili e concatenazione

Scrivi uno script Bash che dichiari alcune variabili (nome, cognome, età) e le combini in un messaggio di saluto stampato a video. Salva il file come `nome_cognome_variabili.sh`.

## Obiettivo

Dichiarare alcune variabili (nome, cognome, età) e stampare un messaggio di saluto che le combini in un'unica frase.

## Descrizione

In Bash una **variabile** si crea con un'assegnazione diretta, senza dichiarare un tipo e **senza spazi** intorno al segno `=`:

```bash
nome="Mario"
```

Per leggere il valore di una variabile si usa il simbolo `$` seguito dal nome (`$nome`), oppure la forma con le parentesi graffe `${nome}`, utile quando il nome della variabile è seguito da altro testo senza spazio.

Racchiudere le stringhe tra doppi apici (`"..."`) permette di **interpolare** variabili al loro interno; con gli apici singoli (`'...'`) il contenuto viene invece trattato come testo letterale.

## Suggerimenti

- Non lasciare spazi prima o dopo il segno `=` in un'assegnazione: `nome = "Mario"` genera un errore.
- Usa `${eta}` se subito dopo la variabile c'è altro testo attaccato, es. `"${eta}anni"`.
- Puoi concatenare più variabili semplicemente scrivendole una di seguito all'altra dentro la stessa stringa.

## Soluzione

```bash
--8<-- "Bash/Variabili-e-concatenazione/main.sh"
```

<div class="oc-embed"
     data-path="Bash/Variabili-e-concatenazione/main.sh"
     data-lang="bash"
     data-autorun="true">
</div>
