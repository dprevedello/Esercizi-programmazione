---
icon: simple/c
---

# :simple-c: Linguaggio C

Il **linguaggio C** è uno dei linguaggi più importanti nella storia
dell'informatica: nato negli anni '70, è ancora oggi usato per sistemi
operativi, firmware, driver e applicazioni ad alte prestazioni.

Studiarlo significa capire davvero come funziona un programma: memoria,
puntatori, tipi di dato e compilazione sono concetti fondamentali che
tornano utili in qualsiasi altro linguaggio.

---

## Compilare ed eseguire

```bash
gcc -o programma main.c -Wall -Wextra -lm
./programma
```

> Il flag `-lm` è necessario per gli esercizi che usano `<math.h>` (seno, radice quadrata, ecc.).

---

## Esercizi disponibili

In questa sezione sono raccolti una serie di esempi di programmi
scritti in linguaggio C. Vanno dai più semplici ai più articolati e
includono in molti casi dei commenti che ne aiutano la comprensione.

### 1. Fondamentali :simple-c: 

| # | Esercizio | Argomento | Difficoltà |
|---|-----------|-----------|------------|
| 01 | [Hello World](01-hello-world.md) | Struttura minima di un programma C, `printf` | :material-circle-outline: Base |
| 02 | [Media di due numeri](02-media-due-numeri.md) | Variabili `float`, divisione, `scanf` | :material-circle-outline: Base |
| 03 | [Doppio di un numero](03-doppio-di-un-numero.md) | Variabili intere, operatori aritmetici | :material-circle-outline: Base |
| 04 | [Perimetro e area del quadrato](04-perimetro-e-area-del-quadrato.md) | Operazioni su `float` | :material-circle-outline: Base |
| 05 | [Diagonale del rettangolo](05-diagonale-rettangolo.md) | Teorema di Pitagora, `sqrt` | :material-circle-outline: Base |
| 06 | [Circonferenza inscritta/circoscritta](06-circonferenza-inscritta-e-circoscritta.md) | Uso di `M_PI`, `<math.h>` | :material-circle-outline: Base |
| 07 | [Area triangolo equilatero](07-area-triangolo-equilatero.md) | Formula con `sqrt`, `<math.h>` | :material-circle-outline: Base |

### 2. Condizioni :material-account-question:

| # | Esercizio | Argomento | Difficoltà |
|---|-----------|-----------|------------|
| 08 | [Valore assoluto](08-valore-assoluto.md) | Condizione semplice, `if` / `else` | :material-circle-outline: Base |
| 09 | [Equazione della retta](09-equazione-della-retta.md) | Coefficiente angolare, intercetta | :material-circle-outline: Base |
| 10 | [Numero divisibile per 5](10-numero-divisibile-per-5.md) | Condizione con `%`, output descrittivo | :material-circle-outline: Base |
| 11 | [Numero pari o dispari](11-numero-pari-o-dispari.md) | Operatore modulo `%`, `if` / `else` | :material-circle-outline: Base |
| 12 | [Equazioni di secondo grado](12-equazioni-di-secondo-grado.md) | Discriminante, `sqrt`, gestione casi | :material-circle-slice-4: Intermedio |
| 13 | [Maggiore fra due numeri](13-maggiore-fra-due-numeri.md) | Confronto tra variabili | :material-circle-outline: Base |
| 14 | [Maggiore fra tre numeri (v1)](14-maggiore-fra-tre-numeri-v1.md) | `if` / `else if` annidati | :material-circle-outline: Base |
| 15 | [Maggiore fra tre numeri (v2)](15-maggiore-fra-tre-numeri-v2.md) | Variante con variabile temporanea | :material-circle-outline: Base |
| 16 | [Maggiore fra tre numeri (v3)](16-maggiore-fra-tre-numeri-v3.md) | Variante con funzione ausiliaria | :material-circle-slice-4: Intermedio |
| 17 | [Divisibile per 2 o 3](17-numero-divisibile-per-2-o-3.md) | Operatori logici `\|\|` e `&&` | :material-circle-outline: Base |
| 18 | [Divisibile per 3 e 7](18-numero-divisibile-per-3-e-7.md) | Doppia condizione con `&&` | :material-circle-outline: Base |
| 19 | [Test anno bisestile](19-test-anno-bisestile.md) | Condizioni multiple, regola del calendario | :material-circle-slice-4: Intermedio |
| 20 | [Conversione tempo in orario](20-conversione-tempo-in-orario.md) | Divisione intera e modulo | :material-circle-outline: Base |
| 21 | [Convertitore di temperature](21-convertitore-di-temperature.md) | Formule lineari, `switch` | :material-circle-slice-4: Intermedio |
| 22 | [Stampa dei mesi](22-stampa-dei-mesi.md) | `for` + `switch`, output testuale | :material-circle-slice-4: Intermedio |
| 23 | [Semplice calcolatrice](23-semplice-calcolatrice.md) | `switch`, operatori sui 4 tipi | :material-circle-slice-4: Intermedio |

### 3. Cicli :fontawesome-solid-repeat:

| # | Esercizio | Argomento | Difficoltà |
|---|-----------|-----------|------------|
| 24 | [Somma dei primi 12 numeri naturali](24-somma-dei-primi-12-numeri-naturali.md) | Ciclo `for`, accumulatore | :material-circle-outline: Base |
| 25 | [Somma numeri da 10 a 20](25-somma-numeri-da-10-a-20.md) | `for` con limite variabile | :material-circle-outline: Base |
| 26 | [Vari conteggi con il for](26-vari-conteggi-con-il-for.md) | Più contatori nello stesso ciclo | :material-circle-slice-4: Intermedio |
| 27 | [Indovina il numero](27-indovina-il-numero.md) | `rand()`, ciclo di gioco, hint alto/basso | :material-circle-slice-4: Intermedio |
| 28 | [Numero di cifre di un intero](28-numero-di-cifre-di-un-intero.md) | Divisione intera ripetuta, `while` | :material-circle-slice-4: Intermedio |
| 29 | [Massimo/media non definiti a priori](29-massimo-e-media-non-definiti-a-priori.md) | Ciclo con sentinella, `while` | :material-circle-slice-4: Intermedio |
| 30 | [Generazione numeri casuali](30-generazione-numeri-casuali.md) | `rand()`, `srand()`, `<stdlib.h>` | :material-circle-outline: Base |
| 31 | [Operazioni su numeri casuali](31-operazioni-su-numeri-casuali.md) | Min, max, conteggi su array | :material-circle-slice-4: Intermedio |
| 32 | [Tavola pitagorica](32-tavola-pitagorica.md) | Cicli `for` annidati, formattazione output | :material-circle-slice-4: Intermedio |
| 33 | [Stampa rettangolo base](33-stampa-rettangolo-base.md) | Cicli annidati, `*` e spazi | :material-circle-slice-4: Intermedio |
| 34 | [Stampa rettangolo personalizzato](34-stampa-rettangolo-personalizzato.md) | Dimensioni da input, bordi e riempimento | :material-circle-slice-4: Intermedio |
| 35 | [Numeri casuali e rettangoli](35-numeri-casuali-e-rettangoli.md) | Array + output grafico | :material-circle-slice-4: Intermedio |
| 36 | [Disegno di figure geometriche](36-disegno-di-figure-geometriche.md) | Triangoli, rombi, pattern con `*` | :material-circle: Avanzato |
| 37 | [Stampa numero binario](37-stampa-numero-binario.md) | Maschera di bit, operatori bitwise | :material-circle: Avanzato |

### 4. Calcolo numerico :material-calculator-variant:

| # | Esercizio | Argomento | Difficoltà |
|---|-----------|-----------|------------|
| 38 | [Stampa divisori di un numero](38-stampa-divisori-di-un-numero.md) | Ciclo con `%`, raccolta risultati | :material-circle-slice-4: Intermedio |
| 39 | [Verifica numero primo](39-verifica-numero-primo.md) | Algoritmo di primalità, `break` | :material-circle-slice-4: Intermedio |
| 40 | [Calcolo del fattoriale](40-calcolo-del-fattoriale.md) | Funzione con ciclo `for` | :material-circle-outline: Base |
| 41 | [Sequenza di Fibonacci](41-sequenza-di-fibonacci.md) | Due variabili di appoggio, ciclo `for` | :material-circle-slice-4: Intermedio |

### 5. Funzioni e ricorsione :material-function-variant:

| # | Esercizio | Argomento | Difficoltà |
|---|-----------|-----------|------------|
| 42 | [Calcolo radice quadrata](42-calcolo-radice-quadrata.md) | Metodo di Newton-Raphson | :material-circle: Avanzato |
| 43 | [Calcolo MCD](43-calcolo-mcd.md) | Algoritmo di Euclide iterativo | :material-circle-slice-4: Intermedio |
| 44 | [Calcolo mcm (base)](44-calcolo-mcm-base.md) | Ciclo con multipli | :material-circle-slice-4: Intermedio |
| 45 | [Calcolo mcm con Euclide](45-calcolo-mcm-con-euclide.md) | MCD → MCM, efficienza | :material-circle: Avanzato |
| 46 | [Calcolo numero di Nepero](46-calcolo-numero-di-nepero.md) | Serie di Taylor, convergenza | :material-circle: Avanzato |
| 47 | [Calcolo del fattoriale (ricorsivo)](47-calcolo-del-fattoriale-ricorsivo.md) | Caso base e caso ricorsivo | :material-circle-slice-4: Intermedio |
| 48 | [Sequenza di Fibonacci (ricorsivo)](48-sequenza-di-fibonacci-ricorsivo.md) | Doppia chiamata ricorsiva | :material-circle: Avanzato |

### 6. Enum :material-format-list-numbered:

| # | Esercizio | Argomento | Difficoltà |
|---|-----------|-----------|------------|
| 49 | [Analisi sequenza di numeri](49-analisi-sequenza-di-numeri.md) | Lettura da input, statistiche | :material-circle-slice-4: Intermedio |

### 7. Stringhe e vettori :material-text:

| # | Esercizio | Argomento | Difficoltà |
|---|-----------|-----------|------------|
| 50 | [Conversione in maiuscolo](50-conversione-in-maiuscolo.md) | Array di `char`, `toupper`, `<ctype.h>` | :material-circle-slice-4: Intermedio |
| 51 | [Parola palindroma](51-parola-palindroma.md) | Indici inversi, confronto caratteri | :material-circle-slice-4: Intermedio |
| 52 | [Cifrario di Cesare](52-algoritmo-di-cesare.md) | Shift su caratteri, crittografia base | :material-circle-slice-4: Intermedio |
| 53 | [Statistiche su una frase](53-statistiche-su-una-frase.md) | Conteggio vocali, consonanti, spazi | :material-circle-slice-4: Intermedio |
| 54 | [Conversione numero in binario](54-conversione-numero-in-binario.md) | Divisioni successive, array di bit | :material-circle-slice-4: Intermedio |
| 55 | [Calcoli su vettori random](55-calcoli-su-vettori-random.md) | Array, somma, media su dati casuali | :material-circle-slice-4: Intermedio |
| 56 | [Conversione in binario (ricorsivo)](56-conversione-numero-in-binario-ricorsivo.md) | Ricorsione su divisione intera | :material-circle: Avanzato |
| 57 | [Seno di un numero](57-calcolare-il-seno-di-un-numero.md) | Serie di Maclaurin, precisione | :material-circle: Avanzato |

### 8. Algoritmi standard :material-code-json:

| # | Esercizio | Argomento | Difficoltà |
|---|-----------|-----------|------------|
| 58 | [Ricerca sequenziale](58-ricerca-sequenziale.md) | Scansione lineare, flag di trovato | :material-circle-slice-4: Intermedio |
| 59 | [Bubblesort e ricerca binaria](59-bubblesort-e-ricerca-binaria.md) | Algoritmo O(n²), ricerca su array ordinato | :material-circle: Avanzato |
| 60 | [Quicksort e ricerca binaria](60-quicksort-e-ricerca-binaria.md) | Algoritmo O(n log n), pivot, ricorsione | :material-circle: Avanzato |