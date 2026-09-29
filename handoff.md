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
- **`docs/html-css-javascript/`** — sezione **in costruzione**, popolata a partire dal 21/09/2026. Tre sottosezioni completate finora:
  - **"1. HTML — Fondamentali"** (esercizi 01-09): Prima pagina HTML, Titoli e paragrafi, Liste e link, Immagini e tabelle, Div/span/class/id, Block e inline, Struttura semantica HTML5, Form base, Form avanzato — tutti solo `index.html` (nessun CSS/JS), con `oc-embed` e `data-lang="html"` (anteprima browser dal vivo invece di console, nessuno `data-stdin`). Sorgenti in `HTML-CSS-Javascript/<Nome-esercizio>/index.html`.
  - **"2. CSS — Selettori e stile di base"** (esercizi 10-20, creata il 29/09/2026): Scheda di un linguaggio (selettori elemento/classe/id), Semaforo (colori e unità di misura), Locandina di un festival musicale (tipografia + Google Fonts), Menu di una pizzeria (selettori discendenti/figlio diretto/raggruppati), Classifica di un torneo eSport (liste e pseudo-classi strutturali), Sitografia dei linguaggi studiati (stati dei link `:link`/`:visited`/`:hover`/`:active`), Biglietto da visita digitale (cascata/eredità/specificità), Scheda prodotto e-commerce (box model), Profilo social (variabili CSS), Blocco citazioni (pseudo-elementi `::before`/`::after`), Pagina personale "Chi sono" (mini-progetto di sezione). Ogni esercizio fornisce un `index.html` **fisso** (non va modificato) più un `style.css` che lo studente scrive da zero; sorgenti in `HTML-CSS-Javascript/<Nome-esercizio>/{index.html,style.css}`. Convenzioni specifiche in sezione 3 e 7.6.
  - **"3. CSS — Layout moderno"** (esercizi 21-30, creata il 29/09/2026): Barra di navigazione (Flexbox: `justify-content`/`align-items`/`gap`), Vetrina di libri (Flexbox: `flex-direction`/`flex-wrap`/`flex-grow`/`shrink`/`basis`), Galleria fotografica (Grid: `grid-template-columns`/`rows`), Layout di un blog (Grid: `grid-template-areas`/`grid-area`), Badge di notifica e "torna su" (`position: relative`/`absolute`/`fixed`, `z-index`), Card responsive (media query, mobile-first), Pagina "Chi sono" v2 (mini-progetto: stessa pagina dell'esercizio 20, ristrutturata con Grid + Flexbox + media query — confronto "prima/dopo" con la sottosezione 2), Introduzione a Bootstrap (`container`/`row`/`col-*`), Componenti Bootstrap (`navbar`/`card`/`btn`, classi di utilità), Mini-sito di una città italiana (mini-progetto finale: sito multi-pagina con Bootstrap, soluzione su Napoli). Sorgenti in `HTML-CSS-Javascript/<Nome-esercizio>/`. Convenzioni specifiche in sezione 3 e 7.6.
  - Sezioni successive pianificate (JS fondamentali, DOM, eventi, form/validazione, JS avanzato, mini-progetti di integrazione) discusse a grandi linee ma non ancora create — vedi sezione 5.
- **`docs/stylesheets/extra.css`** — stile barra laterale aggiornato (titoli sezione, freccia, dark mode). Dettagli nel file stesso.
- **Documentazione aggiornata**: `docs/come-usare.md`, `README.md`, `docs/index.md`, `docs/java/index.md`, `docs/html-css-javascript/index.md`, `mkdocs.yml`.
- **Sezioni ancora vuote (solo placeholder in `index.md` e nav)**: Database, PacketTracer, PHP, Python. (HTML-CSS-JavaScript non è più vuota: vedi sopra.)

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
- Per `data-lang="html"` non si usa `data-stdin`: l'iframe mostra un'anteprima del browser (la pagina renderizzata), non una console

### Convenzioni numerazione esercizi Java
- Inserendo nuovi esercizi in sezioni esistenti, tutti i file successivi vanno rinominati
- I file `.md` vengono spostati con `Filesystem:move_file` (non copiati)
- Il `mkdocs.yml` va aggiornato contestualmente alla rinumerazione

### Convenzioni esercizi Bash
- Sorgente unico per esercizio: `Bash/<Nome-Esercizio>/main.sh` (stesso schema di `C/<Nome>/main.c`)
- Ogni script è autosufficiente: crea con `cat <<EOF`/`touch`/`mkdir -p` qualunque file o cartella di cui ha bisogno, così l'`oc-embed` funziona senza file esterni multipli
- Esercizi che in un terminale reale userebbero argomenti da riga di comando (`$1`, `$2`, ...) li simulano con `set -- valore1 valore2 ...` a inizio script, con nota `!!! info "Simulazione nel sandbox"` nella pagina, perché OneCompiler non permette di passare argomenti CLI all'avvio
- Verifica prima di pubblicare un nuovo esercizio Bash: `bash -n` per la sintassi, esecuzione end-to-end con lo stesso `data-stdin` dichiarato nell'`oc-embed`, e pulizia di eventuali file di test creati per errore nella root del repo durante le prove locali

### Convenzioni esercizi HTML-CSS-Javascript
- Sorgente per esercizio: `HTML-CSS-Javascript/<Nome-esercizio>/index.html` (+ `style.css`/`script.js` quando la sezione lo richiede, eventualmente altre pagine HTML per i mini-progetti multi-pagina). `index.html` collega gli altri file con `<link>`/`<script>` come farebbe una pagina reale; l'`oc-embed` con `data-lang="html"` mostra un'anteprima del browser dal vivo, non una console.
- **Approccio didattico deciso in fase di progettazione** (discusso il 21/09/2026, applicato dalla sezione 1 in poi):
  - Progressione **concetti isolati poi integrazione**: prime sezioni solo HTML, poi solo CSS (base, poi layout moderno), poi solo JS, con mini-progetti finali che uniscono i tre file.
  - Formato **consegna** in stile compito (come Bash), non abstract in terza persona.
  - Esercizi **caratterizzati** su contenuti reali o plausibili (voci Wikipedia, video divulgativi, articoli di news, siti reali come IMDb/Eventbrite, ma anche scenari inventati ma realistici come un menu di pizzeria o un profilo social) invece di "argomento a piacere" — più coinvolgenti e insegnano anche a rielaborare contenuti concreti.
  - Per i primi esercizi (studenti giovani/inesperti): **contenuto guidato in modo esplicito** (testo esatto da inserire, non libero) invece di lasciare scelta libera, per ridurre il carico cognitivo iniziale. Margini di libertà maggiori nelle sezioni più avanzate, fino alla piena apertura del mini-progetto finale della sottosezione 3 (nessuna indicazione di contenuto, solo requisiti strutturali).
  - Ogni pagina esercizio include una sezione **`## Anteprima`** (subito dopo `## Obiettivo`, prima di `## Descrizione`) con uno schema **ASCII** di come deve apparire la pagina renderizzata nel browser — non presente nelle altre sezioni del sito, introdotta apposta per gli esercizi visivi di questa sezione. Vedi sezione 7.6.
  - La `## Descrizione` di ogni esercizio spiega brevemente i tag/proprietà introdotti (uno per sottosezione, termine in grassetto alla prima occorrenza, snippet minimale), sullo stesso modello delle altre sezioni.
- **Sottosezione 2 (CSS — Selettori e stile di base)**, specifiche aggiuntive rispetto a HTML:
  - Ogni esercizio fornisce un `index.html` **già completo e non modificabile**: lo studente scrive solo il `style.css` collegato, per isolare l'apprendimento del CSS da quello dell'HTML (coerente con la progressione "concetti isolati").
  - La consegna specifica il risultato visivo esatto da ottenere (colori, dimensioni, comportamento) in modo direttivo, sullo stesso principio dei primi esercizi HTML.
  - L'`oc-embed` usa `data-path="HTML-CSS-Javascript/<Cartella>/index.html;HTML-CSS-Javascript/<Cartella>/style.css"` (i due file separati da `;`) e la `## Soluzione` mostra entrambi i file in tab (`=== "index.html"` / `=== "style.css"`).
  - L'esercizio sulla tipografia (12-locandina-festival) importa un font da Google Fonts via `<link>`: aggiunta una nota `!!! info` che avvisa che, se la sandbox OneCompiler non ha accesso a Google Fonts, il titolo userà il font di riserva generico invece del web font — per vedere il font vero va aperto il file in locale.
  - Il mini-progetto finale della sottosezione (20-chi-sono) è pensato per essere **ripreso come punto di partenza nella sottosezione 3 (CSS layout moderno)**: stessa pagina, trasformata con Flexbox/Grid e media query, per un confronto "prima/dopo" tra le due sottosezioni — realizzato nell'esercizio 27 (chi-sono-v2).
- **Sottosezione 3 (CSS — Layout moderno)**, specifiche aggiuntive:
  - Esercizi 21-27 (Flexbox, Grid, position, media query, mini-progetto "Chi sono v2") seguono la stessa convenzione della sottosezione 2: `index.html` fisso fornito, lo studente scrive solo `style.css`.
  - Esercizi 28-29 (introduzione a Bootstrap, componenti Bootstrap): convenzione diversa — lo studente scrive **direttamente `index.html`** (nessun `style.css` separato), perché Bootstrap si applica tramite classi HTML e non ha senso isolare un CSS da scrivere. Bootstrap incluso via CDN jsDelivr (`https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css`), nessuna versione JS di Bootstrap usata (niente componenti che richiedono il bundle JS, come i dropdown o il navbar-toggler).
  - Esercizio 30 (mini-progetto finale "Mini-sito di una città italiana"): consegna **aperta**, senza contenuto guidato — lo studente scelga la città, il numero di pagine (minimo due) e organizza il contenuto da solo, mettendo insieme tutti i concetti della sezione (selettori, box model, Flexbox/Grid, media query, Bootstrap). Soluzione di riferimento su Napoli, due pagine (`index.html` Home, `storia.html` Storia e cultura) che condividono una navbar Bootstrap duplicata (stesso markup, `href` diversi) e uno `style.css` comune con le sole regole che Bootstrap non fornisce (hero con immagine di sfondo, altezza uniforme delle immagini nelle card, stile del footer). Il `<link>` a Bootstrap va sempre prima di quello a `style.css`, per lasciare vincere le regole del progetto in caso di conflitto (cascata). `data-path` dell'`oc-embed` elenca tutti e tre i file separati da `;` (`index.html;storia.html;style.css`), stesso principio della sottosezione 2 per i file multipli.
- Immagini: quando un esercizio le richiede, si preferiscono URL diretti da Wikimedia Commons nel formato `https://commons.wikimedia.org/wiki/Special:FilePath/<Nome-file>.jpg` (redirect ufficiale di Wikimedia pensato per l'hotlink, non richiede di conoscere il percorso con hash) invece di cercare l'URL con hash su `upload.wikimedia.org`. Per gli esercizi CSS "isolati" (sottosezioni 2 e 3, tranne il mini-progetto finale) si preferiscono invece elementi/`div` segnaposto stilizzati via CSS, per non introdurre dipendenze di rete quando l'esercizio non riguarda le immagini in sé. Per il mini-progetto finale (30-citta-italiana), le immagini reali sono invece centrali alla consegna (che richiede esplicitamente "immagini"): i nomi file esatti su Wikimedia Commons vanno sempre **verificati con una ricerca web** prima di scriverli nel sorgente, non indovinati per analogia — un nome plausibile ma sbagliato produce un link rotto silenzioso.
- Dati "vivi" citati in un esercizio (es. classifiche come l'indice TIOBE, o dati demografici come popolazione/superficie di una città) vengono presentati nella soluzione come esempio plausibile ma non garantito aggiornato, con nota esplicita (`!!! info`) che invita a verificare la fonte (es. ISTAT, Wikipedia) al momento dell'uso in classe.

### Consegna vs abstract sotto il titolo (differenza tra sezioni!)
- **Bash e HTML-CSS-Javascript**: il testo subito sotto il titolo (prima di `## Obiettivo`) è una **consegna** in stile compito, pensata per essere copiata così com'è su una piattaforma come Classroom — non un riassunto per chi scorre l'indice. Stile: frase diretta e imperativa (mai riferimenti meta come "esercizio di sintesi" o "che unisce le tecniche viste") — si descrive sempre l'attività concreta. Per Bash, elenco puntato "Il programma deve:" solo quando i requisiti distinti sono più di uno; per HTML-CSS-Javascript, il contenuto esatto da inserire (o, nelle sottosezioni CSS, il risultato visivo esatto da ottenere) è spesso specificato inline nella consegna stessa, tranne nel mini-progetto finale aperto (30-citta-italiana) dove la consegna indica solo i requisiti strutturali (vedi sezione 3). La convenzione sul nome del file da salvare (`nome_cognome_slug.sh`) compare solo nei primi 4 esercizi Bash (sezione Fondamentali), poi non più; non è (ancora) adottata per HTML-CSS-Javascript.
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

### Mount del PC non raggiungibile da `device_bash`
- Dal 22/09/2026 circa, un aggiornamento Windows (rilasciato l'8 settembre) impedisce il mount del collegamento cartella (`sandbox-helper: no Plan9 drive shares mounted`): `device_bash` non funziona (confermato ancora non funzionante il 29/09/2026), ma `device_list_dir`/`device_stage_files`/`device_commit_files` restano utilizzabili con i percorsi Windows nativi. Workaround adottato: creare i file localmente nell'ambiente cloud e trasferirli con `device_commit_files`, invece di scrivere/editare direttamente sul PC via shell. Problema noto e in tracciamento lato Anthropic, non risolvibile da qui.
- Nota aggiuntiva: anche il tool `Filesystem` (MCP locale) dà errore di schema (`$schema` draft-07 non supportato) su questa macchina; per leggere file di testo sul PC si usa `Desktop_Commander__read_file` come alternativa funzionante.

---

## 5. Prossimi passi

1. **HTML-CSS-Javascript**: la sottosezione **3. CSS — Layout moderno** (Flexbox/Grid/position/media query/Bootstrap, esercizi 21-30) è completa. Prossima sottosezione da discutere e pianificare con Daniele prima di costruirla: **4. JS fondamentali del linguaggio** (variabili, funzioni, cicli, condizioni), poi 5. Manipolazione del DOM, 6. Eventi, 7. Form e validazione, 8. JS avanzato (localStorage/JSON/fetch), 9. Mini-progetti di integrazione. Portata totale ancora da definire con precisione (indicativamente 30-40 esercizi in tutto per l'intera sezione HTML-CSS-Javascript, di cui 30 già creati).
2. **Valutare** eventuali nuovi esercizi da aggiungere alle sezioni Thread e Socket (Java)
3. **Valutare** il Launcher per Echo Socket se si vuole OneCompiler anche per i socket semplici
4. **Popolare** le sezioni ancora vuote: Database, PacketTracer, PHP, Python (stesso approccio usato per Bash/Linux/HTML-CSS-Javascript: analizzare le sezioni esistenti come riferimento, proporre un percorso, poi creare sorgenti + pagine + indice + nav)
5. **Valutare** se convertire anche le sezioni C e Java al formato "consegna" (vedi sezione 3), oppure lasciarle nel formato abstract attuale

---

## 6. Struttura del repository
Vedi `README.md` → sezione "Struttura del progetto" (tenuta aggiornata). Percorso locale: `C:\Users\dprev\OneDrive\Desktop\Esercizi-programmazione\`.

---

## 7. Stile della documentazione (linee guida di scrittura)

Le pagine di esercizio (`docs/java/*.md`, `docs/c/*.md`, `docs/bash/*.md`, `docs/html-css-javascript/*.md`) seguono una struttura fissa, pensata per studenti delle superiori (indirizzo Informatica e Telecomunicazioni) che stanno imparando il linguaggio. Ogni nuova pagina deve rispettarla. Le pagine della sezione `docs/linux/*.md` sono un caso a parte (reference, non esercizi): vedi la sezione 7.5. La sezione `docs/html-css-javascript/*.md` ha un'aggiunta specifica (`## Anteprima`): vedi la sezione 7.6.

### 7.1 Struttura di una pagina esercizio

1. **Titolo (`#`)** — nome breve dell'esercizio (2-4 parole), es. `# Rettangolo`, `# Bubblesort e ricerca binaria`.
2. **Testo introduttivo** (subito sotto il titolo, senza header):
   - **Bash e HTML-CSS-Javascript**: una **consegna** in stile compito, copiabile su Classroom — vedi sezione 3 per lo stile esatto.
   - **Java e C**: un **abstract** di 1 frase in terza persona, che riassume cosa fa l'esercizio e quali concetti introduce (per chi scorre l'indice).
3. **`## Obiettivo`** — cosa deve fare il programma, in 1-3 frasi. Deve bastare da solo a capire il compito senza leggere il resto.
4. **`## Anteprima`** (solo HTML-CSS-Javascript) — schema ASCII di come deve apparire la pagina renderizzata. Vedi sezione 7.6.
5. **`## Struttura`** (solo se multi-file, es. client/server, o mini-progetti multi-pagina) — tabella `| File | Ruolo |`.
6. **`## Descrizione`** — la parte teorica. Spiega i concetti nuovi necessari a risolvere l'esercizio, non l'algoritmo dell'esercizio stesso:
   - Se ci sono più concetti, dividerli in sottosezioni `###`, una per concetto (es. `### Incapsulamento`, `### ServerSocket e accept()`, `### Selettore discendente`).
   - Ogni sottosezione: un breve paragrafo che introduce e **grassetta** il termine nuovo alla prima occorrenza, seguito quando utile da uno snippet minimale (```java/```c/```bash/```html/```css) che isola il concetto — MAI il codice risolutivo completo.
   - Regole, formule o casi particolari possono comparire come elenco puntato o tabella (es. regola dell'anno bisestile, casi non supportati da OneCompiler, tabella di specificità CSS).
7. **`## Suggerimenti`** — elenco puntato di aiuti pratici: firme di funzioni/metodi da usare, valori di test consigliati, errori comuni da evitare, eventuali estensioni facoltative ("Estensione: ..."). Orienta, non rivela la soluzione.
8. **`## Soluzione`** — codice incluso via snippet (`--8<-- "percorso/File.ext"`), mai incollato a mano: la fonte è sempre il file nel repository. Multi-file → tab (`=== "File.java"`), incluso per gli esercizi CSS con `index.html` + `style.css` (+ altre pagine HTML per i mini-progetti multi-pagina).
9. **Blocco OneCompiler** (`<div class="oc-embed">`) subito dopo la Soluzione, con gli attributi documentati in `README.md`.
10. **Ammonizione `!!! warning`** (se l'esercizio non gira in OneCompiler) o **`!!! info`** (se il comportamento è simulato/adattato per la sandbox, o se un dato citato può cambiare nel tempo) — spiega perché e cosa fare. Sempre in fondo alla pagina, dopo il blocco OneCompiler.

### 7.2 Registro e linguaggio (target: studenti delle superiori)

- Italiano, tono didattico diretto; imperativo nei Suggerimenti e nelle consegne Bash/HTML-CSS-Javascript ("Usa...", "Scrivi...", "Crea...", "Testa il programma con...").
- Ogni termine tecnico nuovo va **grassettato** e definito in modo semplice alla prima occorrenza — non dare per scontato che lo studente lo conosca già.
- Preferire esempi concreti e numerici a spiegazioni astratte (es. "2024 è bisestile... 1900 non è bisestile...").
- Frasi brevi, un concetto per frase. Evitare gergo non necessario; se inevitabile, spiegarlo subito.
- Codice inline con backtick per classi/metodi/parole chiave/selettori (`Scanner`, `this`, `ArrayList`, `<div>`, `:hover`).
- Nella Descrizione solo ciò che serve per affrontare l'esercizio: l'obiettivo è che lo studente scriva il codice, non che legga la soluzione.

### 7.3 Indice di sezione (`index.md`)

Ogni `index.md` di un linguaggio/percorso a esercizi segue questo schema:

- Frontmatter YAML con `icon:` (icona Material del linguaggio).
- `#` con icona + nome linguaggio, poi 2-3 frasi di presentazione: cos'è il linguaggio, perché si studia, che competenze sviluppa.
- `## Cosa imparerai` — elenco puntato dei macro-argomenti del percorso.
- `## Compilare ed eseguire` (o `## Aprire i file nel browser` per HTML-CSS-Javascript) — blocco di codice con i comandi, eventuale nota/ammonizione su strumenti da installare (es. JDK, WSL/Git Bash per Bash su Windows, Live Server per HTML).
- `## Esercizi disponibili` — sotto-sezioni `### N. Nome argomento :icona:`, ciascuna con tabella `| # | Esercizio | Argomento | Difficoltà |`:
  - **Esercizio**: link al file.
  - **Argomento**: elenco di costrutti/concetti toccati, non descrizione discorsiva.
  - **Difficoltà**: icona colorata + etichetta — :material-circle-outline: Base, :material-circle-slice-4: Intermedio, :material-circle: Avanzato.
- (opzionale) `## Risorse utili` — link a documentazione ufficiale/esterna.

L'`index.md` della sezione Linux segue uno schema simile ma senza tabella di difficoltà (colonna "Comandi principali" al suo posto) — vedi 7.5. Quello di HTML-CSS-Javascript, essendo la sezione ancora in costruzione, ha un'ammonizione `!!! info "In costruzione"` sopra le tabelle e mostra solo le sottosezioni già popolate (attualmente 1. HTML, 2. CSS base, 3. CSS layout moderno).

### 7.4 Cosa evitare

- Non duplicare il codice sorgente nella pagina: solo snippet dimostrativi in Descrizione, la Soluzione è sempre inclusa via `--8<--`.
- Non introdurre più di un concetto nuovo per sottosezione della Descrizione.
- Non omettere Obiettivo o Suggerimenti anche per esercizi semplici, per mantenere coerenza tra le pagine.
- Non dimenticare il warning quando l'esercizio non è compatibile con OneCompiler (vedi tabella in sezione 3), o la nota info quando il comportamento è simulato per la sandbox o un dato può cambiare nel tempo.
- Bash: non usare riferimenti meta nella consegna ("che unisce le tecniche viste", "esercizio di sintesi") — descrivere sempre l'attività concreta richiesta. Stessa regola per HTML-CSS-Javascript.
- HTML-CSS-Javascript: non inventare/indovinare nomi di file immagine su Wikimedia Commons — verificarli sempre con una ricerca web prima di scriverli nel sorgente (vedi sezione 3).

### 7.5 Pagine di riferimento Linux (`docs/linux/*.md`)

Diverse dalle pagine esercizio: niente Obiettivo/Consegna/Soluzione, sono pagine di consultazione.

- Titolo, poi 1-2 frasi di intro su cosa copre la categoria.
- Una sottosezione `## \`comando\`` per ogni comando: spiegazione breve, sintassi se utile, tabella delle opzioni principali se il comando ne ha diverse rilevanti, un esempio in code-block.
- In fondo, `## Prova tu` con l'`oc-embed` (`data-lang="bash"`, sorgente in `Linux/<NN-Nome-categoria>/demo.sh`), se almeno una parte della categoria è eseguibile offline nella sandbox.
- Se dei comandi della pagina non sono eseguibili in sandbox (rete, privilegi di amministratore, comandi interattivi come `top`/`less`/`man` senza un terminale reale), aggiungere un `!!! warning "Esegui in locale"` che spiega perché, mantenendo comunque la teoria e gli esempi in code-block.

### 7.6 Pagine esercizio HTML-CSS-Javascript (`docs/html-css-javascript/*.md`)

Seguono la struttura generale (7.1) con differenze rispetto a Java/C/Bash:

- **Consegna direttiva nei primi esercizi, via via più aperta**: per gli studenti alle prime armi, la consegna specifica il contenuto esatto da inserire (testo, dati, opzioni di un form) o — nelle sottosezioni CSS — il risultato visivo esatto da ottenere, invece di lasciare la scelta libera: riduce il carico cognitivo e rende più semplice correggere i compiti. Margini di libertà maggiori man mano che il percorso avanza, fino alla consegna completamente aperta del mini-progetto finale della sottosezione 3 (30-citta-italiana): solo requisiti strutturali, nessun contenuto suggerito.
- **Sezione `## Anteprima`**, subito dopo `## Obiettivo` e prima di `## Descrizione` (o di `## Struttura`, se presente): uno schema **ASCII** racchiuso in un blocco di codice, che mostra come deve apparire la pagina **renderizzata** nel browser (non il codice sorgente). Utile perché, a differenza di Java/C/Bash, il risultato di questi esercizi è visivo. Le frecce (`←`) o le note a fianco indicano quale tag/regola CSS produce quella parte della pagina. Per i mini-progetti multi-pagina (es. 30-citta-italiana), lo schema mostra entrambe le pagine affiancate.
- L'`oc-embed` usa sempre `data-lang="html"` (mai `data-stdin`, l'anteprima è il browser stesso). `data-path` elenca `index.html` e, quando la sezione lo richiede, `style.css`/`script.js`/altre pagine HTML separati da `;`.
- **Sottosezione 1 (HTML)**: solo `index.html`, nessun CSS/JS.
- **Sottosezione 2 (CSS base)**: `index.html` fisso e non modificabile fornito allo studente, che scrive solo `style.css`. La Soluzione mostra entrambi i file in tab.
- **Sottosezione 3 (CSS layout moderno)**: stessa convenzione della sottosezione 2 per gli esercizi 21-27 (`index.html` fisso, solo `style.css` da scrivere). Eccezione per gli esercizi Bootstrap (28-29): lo studente scrive direttamente `index.html` (nessun `style.css` separato), perché Bootstrap si applica tramite classi HTML. Il mini-progetto finale (30) è multi-pagina (`index.html` + `storia.html` nella soluzione, condividono un `style.css` comune) e la Soluzione mostra tutti i file in tab.
- Esercizi "caratterizzati" su fonti reali o scenari plausibili (una voce Wikipedia, un video divulgativo, un articolo di news, il formato di un sito reale, uno scenario inventato come un menu o un profilo social): quando la consegna cita una fonte esterna con dati che possono cambiare nel tempo (una classifica, una statistica, dati demografici di una città), la Soluzione include un'ammonizione `!!! info` che segnala il dato come indicativo e invita a verificarlo. Quando un esercizio dipende da una risorsa esterna che potrebbe non essere raggiungibile nella sandbox (es. Google Fonts), si aggiunge analogamente una nota `!!! info` che spiega il comportamento di fallback.
- Immagini reali (Wikimedia Commons, formato `Special:FilePath`): usate quando l'esercizio riguarda esplicitamente le immagini (es. il mini-progetto finale 30-citta-italiana); i nomi file vanno sempre verificati con una ricerca web, mai indovinati. Negli altri esercizi CSS si preferiscono `div` segnaposto stilizzati, per non introdurre dipendenze di rete non necessarie.
