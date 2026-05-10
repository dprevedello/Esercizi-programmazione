# Esercizi di Programmazione

Raccolta didattica di esercizi di programmazione per studenti della scuola secondaria di secondo grado.

Il sito è consultabile all'indirizzo:
**[dprevedello.github.io/Esercizi-programmazione](https://dprevedello.github.io/Esercizi-programmazione)**

---

## Contenuto del repository

| Sezione | Esercizi | Argomento |
|---|---|---|
| `Bash/` | — | Script da riga di comando su Linux/macOS |
| `C/` | 60 | Linguaggio C — dagli esercizi base ai più avanzati |
| `Database/` | — | SQL e algebra relazionale su database relazionali |
| `HTML-CSS-Javascript/` | — | Pagine web, stili CSS e scripting lato client |
| `Java/` | 31 | Programmazione orientata agli oggetti in Java — metodi statici, Javadoc, OOP, eccezioni, file |
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

### C, Python, Java, PHP, Bash, Database, HTML-CSS-Javascrypt, PacketTracer

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
`Metodi statici` · `Javadoc` · `Creazione di oggetti basilari` · `ArrayList` · `HashMap` · `Ereditarietà` · `Interfacce e classi astratte` · `Eccezioni` · `File di testo e serializzazione` · `Esercizi avanzati`

### Blocco OneCompiler

Per ogni esercizio si può incorporare l'editor interattivo nella pagina, inserendo
il codice html e sostituendo i segnaposto:

| Segnaposto | Valore |
|---|---|
| `data-lang` | `c`, `python`, `java`, `php`, `bash` |
| `data-path` | Titolo mostrato nell'intestazione |

Esempio di codice da inserire:

```html
<div class="oc-embed"
     data-path="C/Hello-world/main.c"
     data-lang="c">
</div>
```

Vedi `docs/c/01-hello-world.md` come esempio completo funzionante.

---

## Struttura del progetto

```
Esercizi-programmazione/
├── .github/
│   └── workflows/
│       └── deploy.yml              # GitHub Actions: deploy automatico
├── Bash/
├── C/
│   ├── Hello-world/main.c
│   └── … (60 sottocartelle, una per esercizio)
├── Database/
├── HTML-CSS-Javascrypt
├── Java/
│   ├── Somma-di-due-numeri/SommaNumeri.java
│   ├── Stampa-di-un-array/StampaArray.java
│   ├── Conteggio-vocali/ContaVocali.java
│   ├── Gioco-indovina-il-numero/IndovinaNumero.java
│   ├── Menu-interattivo/Menu.java
│   ├── Manipolazione-stringhe/EsercizioStringhe.java
│   └── Generatore-codice-fiscale/CodiceFiscale.java
├── PacketTracer/
├── PHP/
├── Python/
├── docs/
│   ├── index.md                    # homepage del sito
│   ├── come-usare.md
│   ├── stylesheets/
│   │   └── extra.css               # stili personalizzati
│   ├── javascripts/
│   │   └── mathjax.js              # javascrypt per rendering formule LaTeX
│   │   └── onecompiler.js          # javascrypt per l'editor OneCompiler
│   ├── bash/
│   │   └── bash/index.md
│   ├── c/
│   │   ├── index.md                # indice con tutti i 60 esercizi classificati
│   │   ├── 01-hello-world.md       # pagina di ciascun esercizio
│   │   └── ...
│   ├── database/
│   │   └── database/index.md
│   ├── html-css-javascrypt/
│   │   └── html-css-javascrypt/index.md
│   ├── java/
│   │   ├── index.md                # indice con tutti gli esercizi classificati
│   │   ├── 01-somma-di-due-numeri.md
│   │   └── … (07 pagine, una per esercizio)
│   ├── packettracer/
│   │   └── packettracer/index.md
│   ├── php/
│   │   └── php/index.md
│   └── python/
│       └── index.md
├── mkdocs.yml
├── requirements.txt
└── .gitignore
```

---

## Licenza

Materiale didattico a uso interno scolastico.
