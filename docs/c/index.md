# Linguaggio C

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

## Esercizi disponibili — 56 esercizi

Gli esercizi sono organizzati per argomento in ordine crescente di difficoltà.
Ogni esercizio si trova in una propria sottocartella del repository con il file `main.c`.

### 1. Fondamentali

| Esercizio | Argomento |
|---|---|
| [Hello World](Hello-world/index.md) | Struttura minima di un programma C, `printf` |
| [Doppio di un numero](Doppio-di-un-numero/index.md) | Variabili intere, operatori aritmetici |
| [Media di due numeri](Media-due-numeri/index.md) | Variabili `float`, divisione, `scanf` |
| [Calcolatrice semplice](Semplice-calcolatrice/index.md) | `switch`, operatori sui 4 tipi |
| [Valore assoluto](Valore-assoluto/index.md) | Condizione semplice, `if` / `else` |

### 2. Condizioni

| Esercizio | Argomento |
|---|---|
| [Numero pari o dispari](Numero-pari-o-dispari/index.md) | Operatore modulo `%`, `if` / `else` |
| [Divisibile per 5](Numero-divisibile-per-5/index.md) | Condizione con `%`, output descrittivo |
| [Divisibile per 2 o 3](Numero-divisibile-per-2-o-3/index.md) | Operatori logici `\|\|` e `&&` |
| [Divisibile per 3 e 7](Numero-divisibile-per-3-e-7/index.md) | Doppia condizione con `&&` |
| [Maggiore fra due numeri](Maggiore-fra-due-numeri/index.md) | Confronto tra variabili |
| [Maggiore fra tre numeri (v1)](Maggiore-fra-tre-numeri-v1/index.md) | `if` / `else if` annidati |
| [Maggiore fra tre numeri (v2)](Maggiore-fra-tre-numeri-v2/index.md) | Variante con variabile temporanea |
| [Maggiore fra tre numeri (v3)](Maggiore-fra-tre-numeri-v3/index.md) | Variante con funzione ausiliaria |
| [Anno bisestile](Test-anno-bisestile/index.md) | Condizioni multiple, regola del calendario |

### 3. Cicli

| Esercizio | Argomento |
|---|---|
| [Somma primi 12 naturali](Somma-dei-primi-12-numeri-naturali/index.md) | Ciclo `for`, accumulatore |
| [Somma da 10 a 20](Somma-numeri-da-10-a-20/index.md) | `for` con limite variabile |
| [Conteggi con il for](Vari-conteggi-con-il-for/index.md) | Più contatori nello stesso ciclo |
| [Tavola pitagorica](Tavola-pitagorica/index.md) | Cicli `for` annidati, formattazione output |
| [Stampa dei mesi](Stampa-dei-mesi/index.md) | `for` + `switch`, output testuale |
| [Divisori di un numero](Stampa-divisori-di-un-numero/index.md) | Ciclo con `%`, raccolta risultati |
| [Numero di cifre di un intero](Numero-di-cifre-di-un-intero/index.md) | Divisione intera ripetuta, `while` |
| [Verifica numero primo](Verifica-numero-primo/index.md) | Algoritmo di primalità, `break` |
| [Sequenza di Fibonacci](Sequenza-di-Fibonacci/index.md) | Due variabili di appoggio, ciclo `for` |

### 4. Funzioni e ricorsione

| Esercizio | Argomento |
|---|---|
| [Fattoriale](Calcolo-del-fattoriale/index.md) | Funzione con ciclo `for` |
| [Fattoriale ricorsivo](Calcolo-del-fattoriale-ricorsivo/index.md) | Caso base e caso ricorsivo |
| [Fibonacci ricorsivo](Sequenza-di-Fibonacci-ricorsivo/index.md) | Doppia chiamata ricorsiva |
| [Binario ricorsivo](Conversione-numero-in-binario-ricorsivo/index.md) | Ricorsione su divisione intera |

### 5. Matematica e geometria

| Esercizio | Argomento |
|---|---|
| [Area triangolo equilatero](Area-triangolo-equilatero/index.md) | Formula con `sqrt`, `<math.h>` |
| [Perimetro e area del quadrato](Perimetro-e-area-del-quadrato/index.md) | Operazioni su `float` |
| [Diagonale del rettangolo](Diagonale-rettangolo/index.md) | Teorema di Pitagora, `sqrt` |
| [Circonferenza inscritta/circoscritta](Circonferenza-inscritta-e-circoscritta/index.md) | Uso di `M_PI`, `<math.h>` |
| [Equazione della retta](Equazione-della-retta/index.md) | Coefficiente angolare, intercetta |
| [Equazioni di secondo grado](Equazioni-di-secondo-grado/index.md) | Discriminante, `sqrt`, gestione casi |
| [Convertitore di temperature](Convertitore-di-temperature/index.md) | Formule lineari, `switch` |
| [Conversione tempo in orario](Conversione-tempo-in-orario/index.md) | Divisione intera e modulo |
| [MCD](Calcolo-MCD/index.md) | Algoritmo di Euclide iterativo |
| [MCM (metodo base)](Calcolo-mcm-base/index.md) | Ciclo con multipli |
| [MCM (algoritmo di Euclide)](Calcolo-mcm-Euclide/index.md) | MCD → MCM, efficienza |
| [Numero di Nepero (e)](Calcolo-numero-di-Nepero/index.md) | Serie di Taylor, convergenza |
| [Radice quadrata](Calcolo-radice-quadrata/index.md) | Metodo di Newton-Raphson |
| [Seno di un numero](Calcolare-il-seno-di-un-numero/index.md) | Serie di Maclaurin, precisione |

### 6. Array e numeri casuali

| Esercizio | Argomento |
|---|---|
| [Generazione numeri casuali](Generazione-numeri-casuali/index.md) | `rand()`, `srand()`, `<stdlib.h>` |
| [Calcoli su vettori random](Calcoli-su-vettori-random/index.md) | Array, somma, media su dati casuali |
| [Operazioni su numeri casuali](Operazioni-su-numeri-casuali/index.md) | Min, max, conteggi su array |
| [Numeri casuali e rettangoli](Numeri-casuali-e-rettangoli/index.md) | Array + output grafico |
| [Analisi sequenza di numeri](Analisi-sequenza-di-numeri/index.md) | Lettura da input, statistiche |
| [Massimo e media (n non noto)](Massimo-e-media-non-definiti-a-priori/index.md) | Ciclo con sentinella, `while` |

### 7. Ordinamento e ricerca

| Esercizio | Argomento |
|---|---|
| [Ricerca sequenziale](Ricerca-sequenziale/index.md) | Scansione lineare, flag di trovato |
| [Bubblesort e ricerca binaria](Bubblesort-e-ricerca-binaria/index.md) | Algoritmo O(n²), ricerca su array ordinato |
| [Quicksort e ricerca binaria](Quicksort-e-ricerca-binaria/index.md) | Algoritmo O(n log n), pivot, ricorsione |

### 8. Stringhe e caratteri

| Esercizio | Argomento |
|---|---|
| [Conversione in maiuscolo](Conversione-in-maiuscolo/index.md) | Array di `char`, `toupper`, `<ctype.h>` |
| [Parola palindroma](Parola-palindroma/index.md) | Indici inversi, confronto caratteri |
| [Statistiche su una frase](Statistiche-su-una-frase/index.md) | Conteggio vocali, consonanti, spazi |
| [Cifrario di Cesare](Algoritmo-di-Cesare/index.md) | Shift su caratteri, crittografia base |

### 9. Numeri binari

| Esercizio | Argomento |
|---|---|
| [Conversione in binario](Conversione-numero-in-binario/index.md) | Divisioni successive, array di bit |
| [Stampa numero binario](Stampa-numero-binario/index.md) | Maschera di bit, operatori bitwise |

### 10. Figure e output formattato

| Esercizio | Argomento |
|---|---|
| [Rettangolo base](Stampa-rettangolo-base/index.md) | Cicli annidati, `*` e spazi |
| [Rettangolo personalizzato](Stampa-rettangolo-personalizzato/index.md) | Dimensioni da input, bordi e riempimento |
| [Figure geometriche](Disegno-di-figure-geometriche/index.md) | Triangoli, rombi, pattern con `*` |

### 11. Giochi e logica

| Esercizio | Argomento |
|---|---|
| [Indovina il numero](Indovina-il-numero/index.md) | `rand()`, ciclo di gioco, hint alto/basso |

---

## Struttura cartelle nel repository

```
C/
├── Hello-world/main.c
├── Doppio-di-un-numero/main.c
├── Algoritmo-di-Cesare/main.c
└── … (una sottocartella per ciascuno dei 56 esercizi)
```

La documentazione di ogni esercizio si trova in `docs/c/<NomeEsercizio>/index.md`.
