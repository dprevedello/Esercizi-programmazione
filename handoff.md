# Handoff — Esercizi-programmazione

## 1. Contesto del progetto
Sito didattico MkDocs Material (repo GitHub: `dprevedello/Esercizi-programmazione`, locale in `C:\Users\dprev\OneDrive\Desktop\Esercizi-programmazione`) con esercizi in Java, C e Bash (ognuno con un blocco OneCompiler embedded per eseguire il codice direttamente nella pagina) e una sezione di riferimento Linux sui comandi principali.

**Repo GitHub**: `https://github.com/dprevedello/Esercizi-programmazione`
**Sito in sviluppo locale**: `http://127.0.0.1:8000`

> **Nota di manutenzione su questo documento**: `handoff.md` esiste in **due copie** — il doc del Project "Esercizi programmazione" su claude.ai (fonte primaria, consultabile da qualunque sessione) e il file `handoff.md` nella root del repository, sul disco locale. Quando si aggiorna questo documento, aggiornare **sempre entrambe le copie nella stessa sessione** (prima il doc del Project, poi scrivere lo stesso contenuto anche sul file locale tramite il collegamento al PC), così restano allineate.

---

## 2. Stato attuale

- **`docs/javascripts/onecompiler.js`** — riscritto: caricamento file da GitHub via `fetch`, toolbar esterna (Esegui/Reimposta/Chiudi), autorun, sync automatica del tema MkDocs. Dettagli implementativi nel file stesso.
- **`docs/java/`** — 46 esercizi su 13 sezioni, tutti con `oc-embed` dove applicabile (eccezioni e motivi in sezione 3).
- **`docs/c/`** — 60 esercizi, tutti con `oc-embed` e `data-autorun`.
- **`docs/bash/`** — 37 esercizi su 9 sezioni (Fondamentali, Condizioni, Cicli, Stringhe e array, File e redirezione, Filtri e pipe, Funzioni, Script avanzati, Comandi di sistema in pipeline), tutti con `oc-embed`, `data-lang="bash"` e `data-autorun="true"`. Sorgenti in `Bash/<Nome-esercizio>/main.sh`. Ogni script è self-contained (crea da sé eventuali file/cartelle di prova) per evitare dipendenze da file esterni non presenti nella sandbox OneCompiler. Il testo sotto il titolo di ogni esercizio è una **consegna** in stile compito (copiabile su Classroom), non un abstract — vedi sezione 3 e 7.1. Popolata il 09/09/2026, estesa con la sezione 9 l'11/09/2026.
- **`docs/linux/`** — sezione di **riferimento** (non esercizi da consegnare) su 11 categorie di comandi Linux (Filesystem e navigazione, Gestione file/cartelle, Permessi, Utenti e gruppi, Redirezione e pipe, Visualizzazione/ricerca testo, Variabili d'ambiente e alias, Processi e risorse, Reti, Pacchetti e info di sistema, Archiviazione/compressione). Sorgenti demo in `Linux/<NN-Nome-categoria>/demo.sh`. Le pagine "Reti" e "Pacchetti e informazioni di sistema" hanno un `oc-embed` limitato ai soli comandi eseguibili offline (`hostname`, `ip addr`, `uname -a`), con warning per gli altri comandi che richiedono rete/privilegi di amministratore. Creata l'11/09/2026. Citata anche nella tabella delle sezioni in `docs/index.md` (home del sito) dal 12/09/2026.
- **`docs/stylesheets/extra.css`** — stile barra laterale aggiornato (titoli sezione, freccia, dark mode). Dettagli nel file stesso.
- **Documentazione aggiornata**: `docs/come-usare.md`, `README.md`, `docs/index.md`, `docs/java/index.md`, `mkdocs.yml`.
- **Sezioni ancora vuote (solo placeholder in `index.md` e nav)**: Database, HTML-CSS-JavaScript, PacketTracer, PHP, Python.

---

## 3. Decisioni prese

*Attributi `oc-embed` (data-lang, data-path, data-stdin, data-height, data-autorun): elenco completo in `README.md` → sezione "Blocco OneCompiler".*

### Quando NON usare `oc-embed`
| Caso | Esercizi/pagine | Motivo | Soluzione adottata |
|---|---|---|---|
| GUI Swing | Java 35–39 | OneCompiler non supporta finestre | Warning "eseguire in locale" |
| CSV locale | Java 31–32 | File non accessibile in sandbox | Warning + istruzioni |
| Socket multi-processo | Java 42, 45, 46 | Richiedono due processi separati | Solo snippet + warning |
| HTTP/HTTPS client | Java 43, 44 | URL nel sorgente → OneCompiler richiede login | Warning "eseguire in locale" |
| Rete (ping/curl/wget/ssh/scp) | Linux/09-Reti | Sandbox isolata da Internet | Embed limitato a `hostname`/`ip addr`, resto solo teoria + warning |
| Pacchetti/history/man | Linux/10 | Richiedono root, rete, o non danno output utile one-shot | Embed limitato a `uname -a`, resto solo teoria + warning |

### Comportamento stdin in OneCompiler (embed)
- `triggerRun` via postMessage funziona **anche** con stdin pre-compilato
- Il `\n` finale è obbligatorio per programmi C che usano `fgets`
- Per Java con menu (`nextInt()` + `nextLine()`): aggiungere `\n` finale alla sequenza stdin
- Per Bash con `read`/`read -p` in ciclo (es. menu interattivo con `until`): lo stdin precaricato simula una sequenza di scelte; aggiungere sempre `|| break` dopo un `read` in un ciclo, per evitare loop infiniti se lo stdin finisse prima del previsto

### Convenzioni numerazione esercizi Java
- Inserendo nuovi esercizi in sezioni esistenti, tutti i file successivi vanno rinominati
- I file `.md` vengono spostati con `Filesystem:move_file` (non copiati)
- Il `mkdocs.yml` va aggiornato contestualmente alla rinumerazione

### Convenzioni esercizi Bash
- Sorgente unico per esercizio: `Bash/<Nome-Esercizio>/main.sh` (stesso schema di `C/<Nome>/main.c`)
- Ogni script è autosufficiente: crea con `cat <<EOF`/`touch`/`mkdir -p` qualunque file o cartella di cui ha bisogno, così l'`oc-embed` funziona senza file esterni multipli
- Esercizi che in un terminale reale userebbero argomenti da riga di comando (`$1`, `$2`, ...) li simulano con `set -- valore1 valore2 ...` a inizio script, con nota `!!! info "Simulazione nel sandbox"` nella pagina, perché OneCompiler non permette di passare argomenti CLI all'avvio
- Verifica prima di pubblicare un nuovo esercizio Bash: `bash -n` per la sintassi, esecuzione end-to-end con lo stesso `data-stdin` dichiarato nell'`oc-embed`, e pulizia di eventuali file di test creati per errore nella root del repo durante le prove locali

### Consegna vs abstract sotto il titolo (differenza tra sezioni!)
- **Bash**: il testo subito sotto il titolo (prima di `## Obiettivo`) è una **consegna** in stile compito, pensata per essere copiata così com'è su una piattaforma come Classroom — non un riassunto per chi scorre l'indice. Stile: frase diretta e imperativa ("Scrivi uno script Bash che...") un po' più ricca di una singola riga essenziale; elenco puntato "Il programma deve:" solo quando i requisiti distinti sono più di uno (es. esercizi 12 e 31); mai riferimenti meta come "esercizio di sintesi" o "che unisce le tecniche viste" — si descrive sempre l'attività concreta. La convenzione sul nome del file da salvare (`nome_cognome_slug.sh`) compare solo nei primi 4 esercizi (sezione Fondamentali), poi non più.
- **Java e C**: mantengono ancora il vecchio formato ad **abstract** (riassunto in terza persona per chi scorre l'indice) — non ancora convertiti al formato consegna. Se in futuro si decide di uniformare anche queste sezioni, replicare lo stile Bash.

### Convenzioni pagine Linux (sezione di riferimento, non esercizi)
- Non seguono la struttura Obiettivo/Descrizione/Suggerimenti/Soluzione delle altre sezioni: sono pagine di reference, una per categoria di comandi (`docs/linux/NN-slug.md`), senza consegna né voto/difficoltà.
- Struttura per pagina: titolo, breve intro, una sottosezione `## \`comando\`` per ogni comando (spiegazione breve, sintassi, tabella opzioni se pertinente, esempio in code-block), poi in fondo un blocco "## Prova tu" con l'`oc-embed` (`data-lang="bash"`) se almeno una parte della pagina è eseguibile nella sandbox offline.
- Sorgente demo: `Linux/<NN-Nome-categoria>/demo.sh` (stesso principio del `main.sh` di Bash: self-contained, crea da sé i file di prova).
- Se l'intera categoria richiede rete/privilegi non ottenibili in sandbox (es. Reti, Pacchetti), l'embed copre solo la parte eseguibile offline e un blocco `!!! warning "Esegui in locale"` spiega cosa non funziona e perché.
- La sezione Linux va citata anche in `docs/index.md` (tabella "Le sezioni disponibili" in home): è facile dimenticarsene proprio perché non è un "linguaggio" con esercizi.

### Convenzioni git (commit)
- I commit sul repository vanno creati a nome di **Daniele** (`Daniele Prevedello <dprevedello86@gmail.com>`, già impostato come `user.name`/`user.email` git in locale) — **non** aggiungere trailer tipo "Co-Authored-By: Claude" né riferimenti alla sessione/chat nel messaggio di commit.
- Il push da qui (tramite il collegamento al PC) fallisce sempre con `fatal: could not read Username for 'https://github.com'`: questa shell non ha un credential helper configurato e non può autenticarsi in modo non interattivo su GitHub. Il commit resta quindi pronto in locale; il push va completato a mano da Daniele con `git push origin main` dal proprio terminale, dove le credenziali sono già salvate.

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

1. **Valutare** eventuali nuovi esercizi da aggiungere alle sezioni Thread e Socket (Java)
2. **Valutare** il Launcher per Echo Socket se si vuole OneCompiler anche per i socket semplici
3. **Popolare** le sezioni ancora vuote: Database, HTML-CSS-JavaScript, PacketTracer, PHP, Python (stesso approccio usato per Bash/Linux: analizzare le sezioni esistenti come riferimento, proporre un percorso, poi creare sorgenti + pagine + indice + nav)
4. **Valutare** se convertire anche le sezioni C e Java al formato "consegna" (vedi sezione 3), oppure lasciarle nel formato abstract attuale

---

## 6. Struttura del repository
Vedi `README.md` → sezione "Struttura del progetto" (tenuta aggiornata). Percorso locale: `C:\Users\dprev\OneDrive\Desktop\Esercizi-programmazione\`.

---

## 7. Stile della documentazione (linee guida di scrittura)

Le pagine di esercizio (`docs/java/*.md`, `docs/c/*.md`, `docs/bash/*.md`) seguono una struttura fissa, pensata per studenti delle superiori (indirizzo Informatica e Telecomunicazioni) che stanno imparando il linguaggio. Ogni nuova pagina deve rispettarla. Le pagine della sezione `docs/linux/*.md` sono un caso a parte (reference, non esercizi): vedi la sezione 7.5.

### 7.1 Struttura di una pagina esercizio

1. **Titolo (`#`)** — nome breve dell'esercizio (2-4 parole), es. `# Rettangolo`, `# Bubblesort e ricerca binaria`.
2. **Testo introduttivo** (subito sotto il titolo, senza header):
   - **Bash**: una **consegna** in stile compito, copiabile su Classroom — vedi sezione 3 per lo stile esatto.
   - **Java e C**: un **abstract** di 1 frase in terza persona, che riassume cosa fa l'esercizio e quali concetti introduce (per chi scorre l'indice).
3. **`## Obiettivo`** — cosa deve fare il programma, in 1-3 frasi. Deve bastare da solo a capire il compito senza leggere il resto.
4. **`## Struttura`** (solo se multi-file, es. client/server) — tabella `| File | Ruolo |`.
5. **`## Descrizione`** — la parte teorica. Spiega i concetti nuovi necessari a risolvere l'esercizio, non l'algoritmo dell'esercizio stesso:
   - Se ci sono più concetti, dividerli in sottosezioni `###`, una per concetto (es. `### Incapsulamento`, `### ServerSocket e accept()`).
   - Ogni sottosezione: un breve paragrafo che introduce e **grassetta** il termine nuovo alla prima occorrenza, seguito quando utile da uno snippet minimale (```java/```c/```bash) che isola il concetto — MAI il codice risolutivo completo.
   - Regole, formule o casi particolari possono comparire come elenco puntato o tabella (es. regola dell'anno bisestile, casi non supportati da OneCompiler).
6. **`## Suggerimenti`** — elenco puntato di aiuti pratici: firme di funzioni/metodi da usare, valori di test consigliati, errori comuni da evitare, eventuali estensioni facoltative ("Estensione: ..."). Orienta, non rivela la soluzione.
7. **`## Soluzione`** — codice incluso via snippet (`--8<-- "percorso/File.ext"`), mai incollato a mano: la fonte è sempre il file nel repository. Multi-file → tab (`=== "File.java"`).
8. **Blocco OneCompiler** (`<div class="oc-embed">`) subito dopo la Soluzione, con gli attributi documentati in `README.md`.
9. **Ammonizione `!!! warning`** (se l'esercizio non gira in OneCompiler) o **`!!! info`** (se il comportamento è simulato/adattato per la sandbox) — spiega perché e cosa fare. Sempre in fondo alla pagina, dopo il blocco OneCompiler.

### 7.2 Registro e linguaggio (target: studenti delle superiori)

- Italiano, tono didattico diretto; imperativo nei Suggerimenti e nelle consegne Bash ("Usa...", "Scrivi...", "Testa il programma con...").
- Ogni termine tecnico nuovo va **grassettato** e definito in modo semplice alla prima occorrenza — non dare per scontato che lo studente lo conosca già.
- Preferire esempi concreti e numerici a spiegazioni astratte (es. "2024 è bisestile... 1900 non è bisestile...").
- Frasi brevi, un concetto per frase. Evitare gergo non necessario; se inevitabile, spiegarlo subito.
- Codice inline con backtick per classi/metodi/parole chiave (`Scanner`, `this`, `ArrayList`).
- Nella Descrizione solo ciò che serve per affrontare l'esercizio: l'obiettivo è che lo studente scriva il codice, non che legga la soluzione.

### 7.3 Indice di sezione (`index.md`)

Ogni `index.md` di un linguaggio/percorso a esercizi segue questo schema:

- Frontmatter YAML con `icon:` (icona Material del linguaggio).
- `#` con icona + nome linguaggio, poi 2-3 frasi di presentazione: cos'è il linguaggio, perché si studia, che competenze sviluppa.
- `## Cosa imparerai` — elenco puntato dei macro-argomenti del percorso.
- `## Compilare ed eseguire` — blocco di codice con i comandi, eventuale nota/ammonizione su strumenti da installare (es. JDK, WSL/Git Bash per Bash su Windows).
- `## Esercizi disponibili` — sotto-sezioni `### N. Nome argomento :icona:`, ciascuna con tabella `| # | Esercizio | Argomento | Difficoltà |`:
  - **Esercizio**: link al file.
  - **Argomento**: elenco di costrutti/concetti toccati, non descrizione discorsiva.
  - **Difficoltà**: icona colorata + etichetta — :material-circle-outline: Base, :material-circle-slice-4: Intermedio, :material-circle: Avanzato.
- (opzionale) `## Risorse utili` — link a documentazione ufficiale/esterna.

L'`index.md` della sezione Linux segue uno schema simile ma senza tabella di difficoltà (colonna "Comandi principali" al suo posto) — vedi 7.5.

### 7.4 Cosa evitare

- Non duplicare il codice sorgente nella pagina: solo snippet dimostrativi in Descrizione, la Soluzione è sempre inclusa via `--8<--`.
- Non introdurre più di un concetto nuovo per sottosezione della Descrizione.
- Non omettere Obiettivo o Suggerimenti anche per esercizi semplici, per mantenere coerenza tra le pagine.
- Non dimenticare il warning quando l'esercizio non è compatibile con OneCompiler (vedi tabella in sezione 3), o la nota info quando il comportamento è simulato per la sandbox.
- Bash: non usare riferimenti meta nella consegna ("che unisce le tecniche viste", "esercizio di sintesi") — descrivere sempre l'attività concreta richiesta.

### 7.5 Pagine di riferimento Linux (`docs/linux/*.md`)

Diverse dalle pagine esercizio: niente Obiettivo/Consegna/Soluzione, sono pagine di consultazione.

- Titolo, poi 1-2 frasi di intro su cosa copre la categoria.
- Una sottosezione `## \`comando\`` per ogni comando: spiegazione breve, sintassi se utile, tabella delle opzioni principali se il comando ne ha diverse rilevanti, un esempio in code-block.
- In fondo, `## Prova tu` con l'`oc-embed` (`data-lang="bash"`, sorgente in `Linux/<NN-Nome-categoria>/demo.sh`), se almeno una parte della categoria è eseguibile offline nella sandbox.
- Se dei comandi della pagina non sono eseguibili in sandbox (rete, privilegi di amministratore, comandi interattivi come `top`/`less`/`man` senza un terminale reale), aggiungere un `!!! warning "Esegui in locale"` che spiega perché, mantenendo comunque la teoria e gli esempi in code-block.
