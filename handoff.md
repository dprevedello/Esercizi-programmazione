# Handoff — Esercizi-programmazione

## 1. Contesto del progetto
Sito didattico MkDocs Material (repo GitHub: `dprevedello/Esercizi-programmazione`, locale in `C:\Users\dprev\OneDrive\Desktop\Esercizi-programmazione`) con esercizi in Java e C, ognuno con un blocco OneCompiler embedded per eseguire il codice direttamente nella pagina.

**Repo GitHub**: `https://github.com/dprevedello/Esercizi-programmazione`
**Sito in sviluppo locale**: `http://127.0.0.1:8000`

---

## 2. Stato attuale

- **`docs/javascripts/onecompiler.js`** — riscritto: caricamento file da GitHub via `fetch`, toolbar esterna (Esegui/Reimposta/Chiudi), autorun, sync automatica del tema MkDocs. Dettagli implementativi nel file stesso.
- **`docs/java/`** — 46 esercizi su 13 sezioni, tutti con `oc-embed` dove applicabile (eccezioni e motivi in sezione 3).
- **`docs/c/`** — 60 esercizi, tutti con `oc-embed` e `data-autorun`.
- **`docs/stylesheets/extra.css`** — stile barra laterale aggiornato (titoli sezione, freccia, dark mode). Dettagli nel file stesso.
- **Documentazione aggiornata**: `docs/come-usare.md`, `README.md`, `docs/java/index.md`, `mkdocs.yml`.

---

## 3. Decisioni prese

*Attributi `oc-embed` (data-lang, data-path, data-stdin, data-height, data-autorun): elenco completo in `README.md` → sezione "Blocco OneCompiler".*

### Quando NON usare `oc-embed`
| Caso | Esercizi | Motivo | Soluzione adottata |
|---|---|---|---|
| GUI Swing | 35–39 | OneCompiler non supporta finestre | Warning "eseguire in locale" |
| CSV locale | 31–32 | File non accessibile in sandbox | Warning + istruzioni |
| Socket multi-processo | 42, 45, 46 | Richiedono due processi separati | Solo snippet + warning |
| HTTP/HTTPS client | 43, 44 | URL nel sorgente → OneCompiler richiede login | Warning "eseguire in locale" |

### Comportamento stdin in OneCompiler (embed)
- `triggerRun` via postMessage funziona **anche** con stdin pre-compilato
- Il `\n` finale è obbligatorio per programmi C che usano `fgets`
- Per Java con menu (`nextInt()` + `nextLine()`): aggiungere `\n` finale alla sequenza stdin

### Convenzioni numerazione esercizi Java
- Inserendo nuovi esercizi in sezioni esistenti, tutti i file successivi vanno rinominati
- I file `.md` vengono spostati con `Filesystem:move_file` (non copiati)
- Il `mkdocs.yml` va aggiornato contestualmente alla rinumerazione

### Idea Echo Socket Launcher (discussa, non implementata)
- Sarebbe possibile aggiungere `Launcher.java` che avvia server in thread daemon e client nel thread principale
- Deciso di non implementare per ora; `Server.java` e `Client.java` restano invariati

---

## 4. Problemi aperti / da risolvere

### HTTP/HTTPS client (43, 44)
- OneCompiler blocca l'esecuzione se trova URL nel sorgente (richiede login utente)
- Soluzione adottata: rimosso `oc-embed`, solo snippet + warning "eseguire in locale"
- Alternativa futura: offuscare l'URL nel sorgente (concatenazione di stringhe), ma fragile

---

## 5. Prossimi passi

1. **Valutare** eventuali nuovi esercizi da aggiungere alle sezioni Thread e Socket
2. **Valutare** il Launcher per Echo Socket se si vuole OneCompiler anche per i socket semplici

---

## 6. Struttura del repository
Vedi `README.md` → sezione "Struttura del progetto" (tenuta aggiornata). Percorso locale: `C:\Users\dprev\OneDrive\Desktop\Esercizi-programmazione\`.

---

## 7. Stile della documentazione (linee guida di scrittura)

Le pagine di esercizio (`docs/java/*.md`, `docs/c/*.md`) seguono una struttura fissa, pensata per studenti delle superiori (indirizzo Informatica e Telecomunicazioni) che stanno imparando il linguaggio. Ogni nuova pagina deve rispettarla.

### 7.1 Struttura di una pagina esercizio

1. **Titolo (`#`)** — nome breve dell'esercizio (2-4 parole), es. `# Rettangolo`, `# Bubblesort e ricerca binaria`.
2. **Riga di introduzione** (subito sotto il titolo, senza header) — 1 frase che riassume cosa fa l'esercizio e quali concetti/costrutti introduce. Fa da abstract per chi scorre l'indice.
3. **`## Obiettivo`** — cosa deve fare il programma, in 1-3 frasi. Deve bastare da solo a capire il compito senza leggere il resto.
4. **`## Struttura`** (solo se multi-file, es. client/server) — tabella `| File | Ruolo |`.
5. **`## Descrizione`** — la parte teorica. Spiega i concetti nuovi necessari a risolvere l'esercizio, non l'algoritmo dell'esercizio stesso:
   - Se ci sono più concetti, dividerli in sottosezioni `###`, una per concetto (es. `### Incapsulamento`, `### ServerSocket e accept()`).
   - Ogni sottosezione: un breve paragrafo che introduce e **grassetta** il termine nuovo alla prima occorrenza, seguito quando utile da uno snippet minimale (```java/```c) che isola il concetto — MAI il codice risolutivo completo.
   - Regole, formule o casi particolari possono comparire come elenco puntato o tabella (es. regola dell'anno bisestile, casi non supportati da OneCompiler).
6. **`## Suggerimenti`** — elenco puntato di aiuti pratici: firme di funzioni/metodi da usare, valori di test consigliati, errori comuni da evitare, eventuali estensioni facoltative ("Estensione: ..."). Orienta, non rivela la soluzione.
7. **`## Soluzione`** — codice incluso via snippet (`--8<-- "percorso/File.ext"`), mai incollato a mano: la fonte è sempre il file nel repository. Multi-file → tab (`=== "File.java"`).
8. **Blocco OneCompiler** (`<div class="oc-embed">`) subito dopo la Soluzione, con gli attributi documentati in `README.md`.
9. **Ammonizione `!!! warning`** (se l'esercizio non gira in OneCompiler) — spiega perché e cosa fare (di norma "esegui in locale"). Sempre in fondo alla pagina.

### 7.2 Registro e linguaggio (target: studenti delle superiori)

- Italiano, tono didattico diretto; imperativo nei Suggerimenti ("Usa...", "Scrivi...", "Testa il programma con...").
- Ogni termine tecnico nuovo va **grassettato** e definito in modo semplice alla prima occorrenza — non dare per scontato che lo studente lo conosca già.
- Preferire esempi concreti e numerici a spiegazioni astratte (es. "2024 è bisestile... 1900 non è bisestile...").
- Frasi brevi, un concetto per frase. Evitare gergo non necessario; se inevitabile, spiegarlo subito.
- Codice inline con backtick per classi/metodi/parole chiave (`Scanner`, `this`, `ArrayList`).
- Nella Descrizione solo ciò che serve per affrontare l'esercizio: l'obiettivo è che lo studente scriva il codice, non che legga la soluzione.

### 7.3 Indice di sezione (`index.md`)

Ogni `index.md` (uno per linguaggio) segue questo schema:

- Frontmatter YAML con `icon:` (icona Material del linguaggio).
- `#` con icona + nome linguaggio, poi 2-3 frasi di presentazione: cos'è il linguaggio, perché si studia, che competenze sviluppa.
- (Java) `## Cosa imparerai` — elenco puntato dei macro-argomenti del percorso.
- `## Compilare ed eseguire` — blocco di codice con i comandi, eventuale nota/ammonizione su strumenti da installare (es. JDK).
- `## Esercizi disponibili` — sotto-sezioni `### N. Nome argomento :icona:`, ciascuna con tabella `| # | Esercizio | Argomento | Difficoltà |`:
  - **Esercizio**: link al file.
  - **Argomento**: elenco di costrutti/concetti toccati, non descrizione discorsiva.
  - **Difficoltà**: icona colorata + etichetta — :material-circle-outline: Base, :material-circle-slice-4: Intermedio, :material-circle: Avanzato.
- (opzionale) `## Risorse utili` — link a documentazione ufficiale/esterna.

### 7.4 Cosa evitare

- Non duplicare il codice sorgente nella pagina: solo snippet dimostrativi in Descrizione, la Soluzione è sempre inclusa via `--8<--`.
- Non introdurre più di un concetto nuovo per sottosezione della Descrizione.
- Non omettere Obiettivo o Suggerimenti anche per esercizi semplici, per mantenere coerenza tra le pagine.
- Non dimenticare il warning quando l'esercizio non è compatibile con OneCompiler (vedi tabella in sezione 3).
