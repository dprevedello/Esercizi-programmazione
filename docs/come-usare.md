# Come usare il sito

Questa pagina spiega tutto quello che ti serve per lavorare con gli esercizi.

---

## Navigare tra le sezioni

Il sito è diviso in **sezioni**, una per ogni linguaggio o argomento.
Puoi spostarti tra le sezioni in due modi:

- **Menu superiore** — clicca sul nome della sezione (Bash, C, Python, ecc.).
- **Menu laterale** — mostra tutti gli esercizi della sezione corrente.

All'interno di ogni sezione gli esercizi sono **numerati e progressivi**:
conviene seguirli nell'ordine suggerito, soprattutto se sei alle prime armi.

---

## Eseguire il codice con OneCompiler

Molte pagine includono un **riquadro OneCompiler** direttamente nella pagina:
puoi scrivere e lanciare il codice senza installare nulla sul computer.

### Come funziona

1. Il riquadro mostra un editor con il codice dell'esercizio già caricato.
2. Clicca sul pulsante **Run** (▶) per eseguirlo.
3. L'output appare nella parte inferiore del riquadro.
4. Puoi modificare il codice liberamente: le modifiche non vengono salvate
   e non influenzano gli altri studenti.

!!! warning "Attenzione"
    OneCompiler richiede una **connessione a internet**.
    Se sei offline, copia il codice nel tuo editor locale (vedi sotto).

### Aprire OneCompiler in una nuova scheda

Se il riquadro è troppo piccolo, clicca sull'icona :octicons-link-external-16:
in alto a destra per aprire l'editor in una scheda separata con più spazio.

---

## Copiare ed eseguire gli esercizi in locale

Se preferisci lavorare con il tuo computer, puoi copiare il codice e usarlo
nel tuo ambiente di sviluppo.

=== "Python"

    ```bash
    # Crea un file con il codice dell'esercizio
    nano esercizio.py   # oppure usa VS Code, Thonny, ecc.

    # Eseguilo
    python3 esercizio.py
    ```

=== "C"

    ```bash
    # Compila
    gcc -o esercizio esercizio.c -Wall

    # Esegui
    ./esercizio
    ```

=== "Java"

    ```bash
    # Compila
    javac Esercizio.java

    # Esegui
    java Esercizio
    ```

=== "PHP"

    ```bash
    # Esegui da riga di comando
    php esercizio.php

    # Oppure metti il file nella cartella del web server (es. /var/www/html/)
    ```

=== "Bash"

    ```bash
    # Rendi il file eseguibile
    chmod +x esercizio.sh

    # Eseguilo
    ./esercizio.sh
    ```

---

## Scaricare il repository completo

Se vuoi avere tutti gli esercizi sul computer, puoi clonare il repository
con **Git**:

```bash
git clone https://github.com/nomeutente/Esercizi-programmazione.git
```

Oppure scarica lo ZIP dalla pagina del repository su GitHub:
clicca su **Code → Download ZIP**.

---

## Domande frequenti

??? question "Il codice non funziona in OneCompiler — cosa faccio?"
    Controlla che il linguaggio selezionato in OneCompiler corrisponda
    a quello dell'esercizio. Se il problema persiste, prova a eseguire
    il codice in locale o chiedi al tuo insegnante.

??? question "Posso salvare le mie soluzioni su OneCompiler?"
    Sì: crea un account gratuito su [onecompiler.com](https://onecompiler.com)
    e usa il pulsante **Save** per conservare i tuoi file.

??? question "Come faccio a proporre una correzione a un esercizio?"
    Apri una *Issue* sul repository GitHub oppure usa il link
    **Modifica questa pagina** (icona matita) in cima a ogni pagina.
