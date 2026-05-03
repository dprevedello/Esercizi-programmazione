# Esercizi di Programmazione

Raccolta didattica di esercizi di programmazione per studenti della scuola secondaria di secondo grado.

Il sito è consultabile all'indirizzo:
**[nomeutente.github.io/Esercizi-programmazione](https://nomeutente.github.io/Esercizi-programmazione)**

---

## Contenuto del repository

| Sezione | Esercizi | Argomento |
|---|---|---|
| `Bash/` | — | Script da riga di comando su Linux/macOS |
| `C/` | 56 | Linguaggio C — ogni esercizio in una propria sottocartella |
| `Database/` | — | SQL e algebra relazionale su database relazionali |
| `Java/` | — | Programmazione orientata agli oggetti in Java |
| `PacketTracer/` | — | Reti con Cisco Packet Tracer |
| `PHP/` | — | PHP lato server: variabili, form, sessioni |
| `Python/` | — | Python dalla sintassi base a classi e file |

La documentazione del sito si trova nella cartella `docs/`.

---

## Avviare il sito in locale

**Requisiti:** Python 3.10 o superiore.

```bash
# 1. Clona il repository
git clone https://github.com/nomeutente/Esercizi-programmazione.git
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

### Python, Java, PHP, Bash, Database

1. Crea il file `docs/<sezione>/nome-esercizio.md`.
2. Aggiungi la voce corrispondente nel blocco `nav:` di `mkdocs.yml`:
   ```yaml
   - "Titolo esercizio": <sezione>/nome-esercizio.md
   ```

### C (con sottocartella)

Ogni esercizio C vive in una propria sottocartella, con il sorgente e
opzionalmente file di input/output di esempio:

```
C/
└── Nome-esercizio/
    ├── main.c
    └── (input.txt, output-atteso.txt — opzionali)
```

1. Crea la sottocartella `C/Nome-esercizio/` con `main.c`.
2. Crea la pagina di documentazione `docs/c/Nome-esercizio/index.md`.
3. Aggiungi la voce nel gruppo tematico corretto in `mkdocs.yml`:
   ```yaml
   - "Titolo esercizio": c/Nome-esercizio/index.md
   ```
4. Aggiorna la tabella riepilogativa in `docs/c/index.md`.

### Blocco OneCompiler

Per incorporare l'editor interattivo in una pagina, copia il template da
`docs/_templates/onecompiler-block.html` e sostituisci i tre segnaposto:

| Segnaposto | Valore |
|---|---|
| `LANGUAGE` | `c`, `python`, `java`, `php`, `bash` |
| `TITOLO_ESERCIZIO` | Titolo mostrato nell'intestazione |
| `ENCODED_CODE` | Codice sorgente in Base64 |

Per ottenere la stringa Base64 del codice sorgente:

```bash
base64 -w 0 main.c
```

Vedi `docs/python/01-hello-world.md` come esempio completo funzionante.

---

## Esercizi C — classificazione per argomento

| Gruppo | Esercizi |
|---|---|
| Fondamentali | Hello World, Doppio, Media, Calcolatrice, Valore assoluto |
| Condizioni | Pari/dispari, Divisibilità, Maggiore tra 2/3 numeri (3 varianti), Anno bisestile |
| Cicli | Somme, Conteggi, Tavola pitagorica, Mesi, Divisori, Cifre, Primo, Fibonacci |
| Funzioni e ricorsione | Fattoriale (2 varianti), Fibonacci ricorsivo, Binario ricorsivo |
| Matematica e geometria | Aree/perimetri, Equazioni, Conversioni, MCD/MCM, Nepero, Radice, Seno |
| Array e casuali | Generazione, Calcoli su vettori, Min/max, Sequenze, Sentinella |
| Ordinamento e ricerca | Ricerca sequenziale, Bubblesort, Quicksort (entrambi con ricerca binaria) |
| Stringhe e caratteri | Maiuscolo, Palindroma, Statistiche frase, Cifrario di Cesare |
| Numeri binari | Conversione iterativa, Operatori bitwise |
| Figure e output | Rettangolo base, Rettangolo personalizzato, Figure geometriche |
| Giochi e logica | Indovina il numero |

---

## Struttura del progetto

```
Esercizi-programmazione/
├── .github/
│   └── workflows/
│       └── deploy.yml              # GitHub Actions: deploy automatico
├── Bash/
├── C/
│   ├── Algoritmo-di-Cesare/main.c
│   ├── Analisi-sequenza-di-numeri/main.c
│   ├── Area-triangolo-equilatero/main.c
│   └── … (56 sottocartelle, una per esercizio)
├── Database/
├── Java/
├── PacketTracer/
├── PHP/
├── Python/
├── docs/
│   ├── index.md                    # homepage del sito
│   ├── come-usare.md
│   ├── stylesheets/
│   │   └── extra.css               # stili personalizzati (OneCompiler, tabelle)
│   ├── _templates/
│   │   └── onecompiler-block.html  # snippet riutilizzabile per l'editor
│   ├── bash/index.md
│   ├── c/
│   │   ├── index.md                # indice con tutti i 56 esercizi classificati
│   │   └── <NomeEsercizio>/
│   │       └── index.md            # pagina di ciascun esercizio
│   ├── database/index.md
│   ├── java/index.md
│   ├── packettracer/index.md
│   ├── php/index.md
│   └── python/
│       ├── index.md
│       └── 01-hello-world.md       # esempio di pagina esercizio con OneCompiler
├── mkdocs.yml
├── requirements.txt
└── .gitignore
```

---

## Licenza

Materiale didattico a uso interno scolastico.
