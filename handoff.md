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

### Esercizi non ancora verificati a runtime
- `29-massimo-e-media-non-definiti-a-priori.md` (C) — terminazione con `S`/`N`, da verificare case sensitivity
- `55-calcoli-su-vettori-random.md` (C) — stdin copre solo 5 dei 10 valori (il resto è random)
- Esercizi Java nuovi (19–24, 40–41): stdin non ancora testati sul sito reale

### HTTP/HTTPS client (43, 44)
- OneCompiler blocca l'esecuzione se trova URL nel sorgente (richiede login utente)
- Soluzione adottata: rimosso `oc-embed`, solo snippet + warning "eseguire in locale"
- Alternativa futura: offuscare l'URL nel sorgente (concatenazione di stringhe), ma fragile

---

## 5. Prossimi passi

1. **Testare sul sito** gli esercizi Java nuovi (19–24, 40–41) con stdin
2. **Verificare `29-massimo-e-media-non-definiti-a-priori`** (C): case sensitivity `S`/`N`
3. **Valutare** eventuali nuovi esercizi da aggiungere alle sezioni Thread e Socket
4. **Valutare** il Launcher per Echo Socket se si vuole OneCompiler anche per i socket semplici

---

## 6. Struttura del repository
Vedi `README.md` → sezione "Struttura del progetto" (tenuta aggiornata). Percorso locale: `C:\Users\dprev\OneDrive\Desktop\Esercizi-programmazione\`.
