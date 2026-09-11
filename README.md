# Esercizi di Programmazione

Raccolta didattica di esercizi di programmazione per studenti della scuola secondaria di secondo grado.

Il sito è consultabile all'indirizzo:
**[dprevedello.github.io/Esercizi-programmazione](https://dprevedello.github.io/Esercizi-programmazione)**

---

## Contenuto del repository

| Sezione | Esercizi | Argomento |
|---|---|---|
| `Bash/` | 37 | Script da riga di comando su Linux/macOS — dai fondamentali (variabili, cicli, funzioni) alle pipeline con comandi di sistema |
| `C/` | 60 | Linguaggio C — dagli esercizi base ai più avanzati |
| `Database/` | — | SQL e algebra relazionale su database relazionali |
| `HTML-CSS-Javascript/` | — | Pagine web, stili CSS e scripting lato client |
| `Java/` | 46 | Programmazione orientata agli oggetti in Java — metodi statici, Javadoc, OOP, eccezioni, file, thread, socket |
| `Linux/` | 11 categorie | Guida di riferimento ai comandi principali della shell (non esercizi da consegnare) |
| `PacketTracer/` | — | Reti con Cisco Packet Tracer |
| `PHP/` | — | PHP lato server: variabili, form, sessioni |
| `Python/` | — | Python dalla sintassi base a classi e file |

La documentazione del sito si trova nella cartella `docs/`.

---

## Avviare il sito in locale

**Requisiti:** Python 3.10 o superiore.

```bash
# 1. Clona il repository
git clone https://github.com/dprevedello/Esercizi-programmazione.git
cd Esercizi-programmazione

# 2. (Consigliato) Crea un ambiente virtuale
python3 -m venv .venv
source .venv/bin/activate      # Windows: .venv\Scripts\activate

# 3. Installa le dipendenze
pip install -r requirements.txt

# 4. Avvia il server di sviluppo
mkdocs serve
```

Il sito sarà disponibile su `http://localhost:8000` e si aggiorna automaticamente ad ogni modifica.

> **Nota:** le dipendenze sono bloccate su MkDocs 1.x (`<2.0`) per garantire la compatibilità con il tema Material for MkDocs. MkDocs 2.0 è un fork incompatibile; vedi [questo articolo](https://squidfunk.github.io/mkdocs-material/blog/2026/02/18/mkdocs-2.0/) per i dettagli.

---

## Build e deploy

Il deploy su **GitHub Pages** avviene automaticamente tramite GitHub Actions ad ogni push sul ramo `main` (vedi `.github/workflows/deploy.yml`).

Per fare il build manuale:

```bash
mkdocs build          # genera il sito nella cartella site/
mkdocs gh-deploy      # build + push su gh-pages
```

---

## Aggiungere un esercizio

### C, Python, Java, PHP, Bash, Database, HTML-CSS-Javascript, PacketTracer

1. Crea il file `docs/<linguaggio>/nome-esercizio.md`.
2. Aggiungi la voce corrispondente nel blocco `nav:` di `mkdocs.yml`:
   ```yaml
   - "Titolo esercizio": <linguaggio>/nome-esercizio.md
   ```

### Esempio per il linguaggio C

Ogni esercizio C vive in una propria sottocartella, con il sorgente e
opzionalmente file di input/output di esempio:

```
C/
└── Nome-esercizio/
    ├── main.c
    └── (input.txt, output-atteso.txt — opzionali)
```

1. Crea la sottocartella `C/Nome-esercizio/` con `main.c`.
2. Crea la pagina di documentazione `docs/c/NN-nome-esercizio.md`.
3. Aggiungi la voce nel gruppo tematico corretto in `mkdocs.yml`:
   ```yaml
   - "Titolo esercizio": c/NN-nome-esercizio.md
   ```
4. Aggiorna la tabella riepilogativa in `docs/c/index.md`.

### Esempio per il linguaggio Java

Ogni esercizio Java vive in una propria sottocartella con uno o più file `.java`:

```
Java/
└── Nome-esercizio/
    ├── NomeClasse.java
    └── (AltraClasse.java — se l'esercizio richiede più classi)
```

1. Crea la sottocartella `Java/Nome-esercizio/` con i file `.java`.
2. Crea la pagina di documentazione `docs/java/NN-nome-esercizio.md`.
3. Aggiungi la voce nel gruppo tematico corretto in `mkdocs.yml`:
   ```yaml
   - "Titolo esercizio": java/NN-nome-esercizio.md
   ```
4. Aggiorna la tabella riepilogativa in `docs/java/index.md`.

Le sezioni tematiche Java attualmente disponibili sono:
`Metodi statici` · `Javadoc` · `Creazione di oggetti basilari` · `ArrayList` · `HashMap` · `Ereditarietà` · `Interfacce e classi astratte` · `Eccezioni` · `File di testo e serializzazione` · `Esercizi avanzati` · `GUI` · `Thread` · `Socket`

### Esempio per il linguaggio Bash

Ogni esercizio Bash vive in una propria sottocartella con un unico script `main.sh`:

```
Bash/
└── Nome-esercizio/
    └── main.sh
```

1. Crea la sottocartella `Bash/Nome-esercizio/` con `main.sh`. Lo script deve essere **autosufficiente**: se ha bisogno di file o cartelle di prova, li crea da sé (`cat <<EOF`, `touch`, `mkdir -p`), perché la sandbox OneCompiler non ha accesso a file esterni multipli. Eventuali argomenti da riga di comando si simulano con `set -- valore1 valore2 ...` a inizio script.
2. Crea la pagina di documentazione `docs/bash/NN-nome-esercizio.md`. Il testo sotto il titolo è una **consegna** in stile compito, pronta per essere incollata su una piattaforma come Google Classroom (non un abstract in terza persona come per C e Java) — vedi le convenzioni descritte in `handoff.md`.
3. Aggiungi la voce nel gruppo tematico corretto in `mkdocs.yml`:
   ```yaml
   - "Titolo esercizio": bash/NN-nome-esercizio.md
   ```
4. Aggiorna la tabella riepilogativa in `docs/bash/index.md`.
5. Verifica lo script con `bash -n` (sintassi) ed eseguilo end-to-end con lo stesso `data-stdin` dichiarato nell'`oc-embed`, in una cartella temporanea isolata.

Le sezioni tematiche Bash attualmente disponibili sono:
`Fondamentali` · `Condizioni` · `Cicli` · `Stringhe e array` · `File e redirezione` · `Filtri e pipe` · `Funzioni` · `Script avanzati` · `Comandi di sistema in pipeline`

### Aggiungere una pagina alla sezione Linux (guida di riferimento)

La sezione `docs/linux/` **non** è una raccolta di esercizi da consegnare, ma una guida di riferimento ai comandi della shell: niente Obiettivo/Consegna/Soluzione/voto, solo teoria, sintassi ed esempi. Ogni categoria vive in una propria sottocartella con un unico script dimostrativo `demo.sh`:

```
Linux/
└── NN-Nome-categoria/
    └── demo.sh
```

1. Crea la sottocartella `Linux/NN-Nome-categoria/` con `demo.sh` (autosufficiente, come i `main.sh` di Bash).
2. Crea la pagina `docs/linux/NN-nome-categoria.md`: titolo, breve intro, una sottosezione `## \`comando\`` per ogni comando trattato (spiegazione, sintassi, tabella opzioni se utile, esempio), poi un blocco `## Prova tu` con l'`oc-embed` collegato a `demo.sh`.
3. Se alcuni comandi della categoria non sono eseguibili nella sandbox (richiedono rete, privilegi di amministratore o un terminale interattivo), limita l'`oc-embed` alla parte eseguibile offline e aggiungi un'ammonizione `!!! warning "Esegui in locale"` per il resto.
4. Aggiungi la voce in `mkdocs.yml` sotto `- Linux:` e aggiorna la tabella riepilogativa in `docs/linux/index.md`.

Le categorie Linux attualmente disponibili sono:
`Filesystem e navigazione` · `Gestione file e cartelle` · `Permessi e proprietari` · `Utenti e gruppi` · `Redirezione e pipe` · `Visualizzazione e ricerca testo` · `Variabili ambiente e alias` · `Processi e risorse` · `Reti` · `Pacchetti e informazioni di sistema` · `Archiviazione e compressione`

### Blocco OneCompiler

Per ogni esercizio si può incorporare l'editor interattivo nella pagina tramite un `<div>` con classe `oc-embed`.
Il codice viene caricato automaticamente da GitHub al primo clic, senza necessità di aggiornarlo manualmente.

#### Attributi disponibili

| Attributo | Obbligatorio | Valore | Default |
|---|---|---|---|
| `data-lang` | ✅ | `c`, `java`, `python`, `php`, `bash` | `c` |
| `data-path` | ✅ | Percorso del file nel repo (es. `Java/Somma-di-due-numeri/SommaNumeri.java`). Più file separati da `;` | — |
| `data-stdin` | ✗ | Input precaricato nel campo STDIN. Usa `\n` per separare le righe (es. `1\n2\n0`) | stringa vuota |
| `data-height` | ✗ | Altezza in pixel dell'editor | `500` |
| `data-autorun` | ✗ | `true` per eseguire il codice automaticamente al caricamento | `false` |

#### Esempi

Esercizio base (singolo file):

```html
<div class="oc-embed"
     data-lang="c"
     data-path="C/Hello-world/main.c">
</div>
```

Esercizio con più file Java:

```html
<div class="oc-embed"
     data-lang="java"
     data-path="Java/Magazzino-digitale/MainMagazzino.java;Java/Magazzino-digitale/Magazzino.java;Java/Magazzino-digitale/Articolo.java"
     data-height="600">
</div>
```

Esercizio con menu interattivo (stdin precaricato):

```html
<div class="oc-embed"
     data-lang="java"
     data-path="Java/Menu-interattivo/Menu.java"
     data-stdin="1\n3\n2\n0">
</div>
```

Soluzione con esecuzione automatica:

```html
<div class="oc-embed"
     data-lang="java"
     data-path="Java/Somma-di-due-numeri/SommaNumeri.java"
     data-stdin="5\n3"
     data-autorun="true">
</div>
```

Vedi `docs/c/01-hello-world.md` come esempio completo funzionante, oppure `docs/bash/01-hello-world.md` per un esempio in Bash.

---

## Struttura del progetto

```
Esercizi-programmazione/
├── .github/
│   └── workflows/
│       └── deploy.yml              # GitHub Actions: deploy automatico
├── Bash/
│   ├── Hello-world/main.sh
│   └── … (37 sottocartelle, una per esercizio)
├── C/
│   ├── Hello-world/main.c
│   └── … (60 sottocartelle, una per esercizio)
├── Database/
├── HTML-CSS-Javascript
├── Java/
│   ├── Somma-di-due-numeri/SommaNumeri.java
│   ├── Stampa-di-un-array/StampaArray.java
│   ├── Conteggio-vocali/ContaVocali.java
│   ├── Gioco-indovina-il-numero/IndovinaNumero.java
│   ├── Menu-interattivo/Menu.java
│   ├── Manipolazione-stringhe/EsercizioStringhe.java
│   └── Generatore-codice-fiscale/CodiceFiscale.java
├── Linux/
│   ├── 01-Filesystem-e-navigazione/demo.sh
│   └── … (11 sottocartelle, una per categoria di comandi)
├── PacketTracer/
├── PHP/
├── Python/
├── docs/
│   ├── index.md                    # homepage del sito
│   ├── come-usare.md
│   ├── stylesheets/
│   │   └── extra.css               # stili personalizzati
│   ├── javascripts/
│   │   ├── mathjax.js              # rendering formule LaTeX
│   │   └── onecompiler.js          # editor OneCompiler embedded
│   ├── bash/
│   │   ├── index.md                # indice con tutti i 37 esercizi classificati
│   │   ├── 01-hello-world.md       # pagina di ciascun esercizio
│   │   └── ... (37 pagine su 9 sezioni tematiche)
│   ├── c/
│   │   ├── index.md                # indice con tutti i 60 esercizi classificati
│   │   ├── 01-hello-world.md       # pagina di ciascun esercizio
│   │   └── ...
│   ├── database/
│   │   └── index.md
│   ├── html-css-javascript/
│   │   └── index.md
│   ├── java/
│   │   ├── index.md                # indice con tutti gli esercizi classificati
│   │   ├── 01-somma-di-due-numeri.md
│   │   └── … (46 pagine su 13 sezioni tematiche)
│   ├── linux/
│   │   ├── index.md                # indice con le 11 categorie di comandi
│   │   ├── 01-filesystem-e-navigazione.md   # una pagina per categoria
│   │   └── ... (11 pagine di riferimento)
│   ├── packettracer/
│   │   └── index.md
│   ├── php/
│   │   └── index.md
│   └── python/
│       └── index.md
├── mkdocs.yml
├── requirements.txt
└── .gitignore
```

---

## Licenza

Materiale didattico a uso interno scolastico.
