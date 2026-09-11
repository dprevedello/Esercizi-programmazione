# Menù interattivo con until

Scrivi uno script Bash che realizzi un piccolo menù a scelta multipla. Il programma deve:

- mostrare almeno due opzioni operative e un'opzione per uscire;
- ripetere il menù finché l'utente non sceglie di uscire;
- gestire una scelta non valida senza bloccarsi.

## Obiettivo

Mostrare un menù con alcune opzioni numerate e ripeterlo finché l'utente non sceglie l'opzione di uscita (`0`).

## Descrizione

Il ciclo **`until`** è l'opposto del `while`: ripete il blocco **finché la condizione è falsa**, cioè si ferma non appena diventa vera.

```bash
until [ "$scelta" = "0" ]; do
    ...
done
```

Per gestire più alternative in base al valore di una variabile, invece di una lunga catena di `if`/`elif`, si usa il costrutto **`case`**:

```bash
case "$scelta" in
    1) echo "opzione 1" ;;
    2) echo "opzione 2" ;;
    *) echo "opzione non valida" ;;
esac
```

Ogni blocco termina con `;;` e il carattere `*` rappresenta il caso predefinito, eseguito quando nessun altro corrisponde.

## Suggerimenti

- `read -p "testo" variabile` mostra il prompt e legge l'input in un'unica riga.
- Aggiungi `|| break` dopo il `read`: se lo standard input finisse improvvisamente (fine dei dati precaricati, o `Ctrl+D` in un terminale), il ciclo si interrompe invece di restare bloccato.
- Metti sempre un caso `*)` nel `case`, per gestire input imprevisti senza che lo script si blocchi.
- In un terminale reale il menù resterebbe in attesa di input a ogni giro; qui lo stdin precaricato simula una sequenza di scelte, terminata da `0` per uscire dal ciclo.

## Soluzione

```bash
--8<-- "Bash/Menu-interattivo/main.sh"
```

<div class="oc-embed"
     data-path="Bash/Menu-interattivo/main.sh"
     data-lang="bash"
     data-stdin="1\n2\n9\n0"
     data-autorun="true">
</div>
