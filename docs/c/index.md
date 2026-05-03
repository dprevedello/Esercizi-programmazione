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

## Esercizi disponibili

In questa sezione sono raccolti una serie di esempi di programmi
scritti in linguaggio C. Vanno dai più semplici ai più articolati e
includono in molti casi dei commenti che ne aiutano la comprensione.

### 1. Fondamentali

| Esercizio | Argomento |
|---|---|
| [Hello World](c/01-hello-world.md) | Struttura minima di un programma C, `printf` |
| [Media di due numeri](c/02-media-due-numeri.md) | Variabili `float`, divisione, `scanf` |
| [Doppio di un numero](c/03-doppio-di-un-numero.md) | Variabili intere, operatori aritmetici |
| [Perimetro e area del quadrato](c/04-perimetro-e-area-del-quadrato.md) | Operazioni su `float` |
| [Diagonale del rettangolo](c/05-diagonale-rettangolo.md) | Teorema di Pitagora, `sqrt` |
| [Circonferenza inscritta/circoscritta](c/06-circonferenza-inscritta-e-circoscritta.md) | Uso di `M_PI`, `<math.h>` |
| [Area triangolo equilatero](c/07-area-triangolo-equilatero.md) | Formula con `sqrt`, `<math.h>` |

### 2. Condizioni

| Esercizio | Argomento |
|---|---|
| [Valore assoluto](c/08-valore-assoluto.md) | Condizione semplice, `if` / `else` |
| [Equazione della retta](c/09-equazione-della-retta.md) | Coefficiente angolare, intercetta |
| [Numero divisibile per 5](c/10-numero-divisibile-per-5.md) | Condizione con `%`, output descrittivo |
| [Numero pari o dispari](Numero-pari-o-dispari/index.md) | Operatore modulo `%`, `if` / `else` |
| [Equazioni di secondo grado](Equazioni-di-secondo-grado/index.md) | Discriminante, `sqrt`, gestione casi |
| [Maggiore fra due numeri](Maggiore-fra-due-numeri/index.md) | Confronto tra variabili |
| [Maggiore fra tre numeri (v1)](Maggiore-fra-tre-numeri-v1/index.md) | `if` / `else if` annidati |
| [Maggiore fra tre numeri (v2)](Maggiore-fra-tre-numeri-v2/index.md) | Variante con variabile temporanea |
| [Maggiore fra tre numeri (v3)](Maggiore-fra-tre-numeri-v3/index.md) | Variante con funzione ausiliaria |
| [Divisibile per 2 o 3](Numero-divisibile-per-2-o-3/index.md) | Operatori logici `\|\|` e `&&` |
| [Divisibile per 3 e 7](Numero-divisibile-per-3-e-7/index.md) | Doppia condizione con `&&` |
| [Test anno bisestile](Test-anno-bisestile/index.md) | Condizioni multiple, regola del calendario |
| [Conversione tempo in orario](Conversione-tempo-in-orario/index.md) | Divisione intera e modulo |
| [Convertitore di temperature](Convertitore-di-temperature/index.md) | Formule lineari, `switch` |
| [Stampa dei mesi](Stampa-dei-mesi/index.md) | `for` + `switch`, output testuale |
| [Semplice calcolatrice](Semplice-calcolatrice/index.md) | `switch`, operatori sui 4 tipi |

### 3. Cicli

| Esercizio | Argomento |
|---|---|
| [Somma dei primi 12 numeri naturali](Somma-dei-primi-12-numeri-naturali/index.md) | Ciclo `for`, accumulatore |
| [Somma numeri da 10 a 20](Somma-numeri-da-10-a-20/index.md) | `for` con limite variabile |
| [Vari conteggi con il for](Vari-conteggi-con-il-for/index.md) | Più contatori nello stesso ciclo |
| [Indovina il numero](Indovina-il-numero/index.md) | `rand()`, ciclo di gioco, hint alto/basso |
| [Numero di cifre di un intero](Numero-di-cifre-di-un-intero/index.md) | Divisione intera ripetuta, `while` |
| [Massimo/media non definiti a priori](Massimo-e-media-non-definiti-a-priori/index.md) | Ciclo con sentinella, `while` |
| [Generazione numeri casuali](Generazione-numeri-casuali/index.md) | `rand()`, `srand()`, `<stdlib.h>` |
| [Operazioni su numeri casuali](Operazioni-su-numeri-casuali/index.md) | Min, max, conteggi su array |
| [Tavola pitagorica](Tavola-pitagorica/index.md) | Cicli `for` annidati, formattazione output |
| [Stampa rettangolo base](Stampa-rettangolo-base/index.md) | Cicli annidati, `*` e spazi |
| [Stampa rettangolo personalizzato](Stampa-rettangolo-personalizzato/index.md) | Dimensioni da input, bordi e riempimento |
| [Numeri casuali e rettangoli](Numeri-casuali-e-rettangoli/index.md) | Array + output grafico |
| [Disegno di figure geometriche](Disegno-di-figure-geometriche/index.md) | Triangoli, rombi, pattern con `*` |
| [Stampa numero binario](Stampa-numero-binario/index.md) | Maschera di bit, operatori bitwise |

### 4. Calcolo numerico

| Esercizio | Argomento |
|---|---|
| [Stampa divisori di un numero](Stampa-divisori-di-un-numero/index.md) | Ciclo con `%`, raccolta risultati |
| [Verifica numero primo](Verifica-numero-primo/index.md) | Algoritmo di primalità, `break` |
| [Calcolo del fattoriale](Calcolo-del-fattoriale/index.md) | Funzione con ciclo `for` |
| [Sequenza di Fibonacci](Sequenza-di-Fibonacci/index.md) | Due variabili di appoggio, ciclo `for` |

### 5. Funzioni e ricorsione

| Esercizio | Argomento |
|---|---|
| [Calcolo radice quadrata](Calcolo-radice-quadrata/index.md) | Metodo di Newton-Raphson |
| [Calcolo MCD](Calcolo-MCD/index.md) | Algoritmo di Euclide iterativo |
| [Calcolo mcm (base)](Calcolo-mcm-base/index.md) | Ciclo con multipli |
| [Calcolo mcm con Euclide](Calcolo-mcm-Euclide/index.md) | MCD → MCM, efficienza |
| [Calcolo numero di Nepero](Calcolo-numero-di-Nepero/index.md) | Serie di Taylor, convergenza |
| [Calcolo del fattoriale (ricorsivo)](Calcolo-del-fattoriale-ricorsivo/index.md) | Caso base e caso ricorsivo |
| [Sequenza di Fibonacci (ricorsivo)](Sequenza-di-Fibonacci-ricorsivo/index.md) | Doppia chiamata ricorsiva |

### 6. Enum

| Esercizio | Argomento |
|---|---|
| [Analisi sequenza di numeri](Analisi-sequenza-di-numeri/index.md) | Lettura da input, statistiche |

### 7. Stringhe e vettori

| Esercizio | Argomento |
|---|---|
| [Conversione in maiuscolo](Conversione-in-maiuscolo/index.md) | Array di `char`, `toupper`, `<ctype.h>` |
| [Parola palindroma](Parola-palindroma/index.md) | Indici inversi, confronto caratteri |
| [Cifrario di Cesare](Algoritmo-di-Cesare/index.md) | Shift su caratteri, crittografia base |
| [Statistiche su una frase](Statistiche-su-una-frase/index.md) | Conteggio vocali, consonanti, spazi |
| [Conversione numero in binario](Conversione-numero-in-binario/index.md) | Divisioni successive, array di bit |
| [Calcoli su vettori random](Calcoli-su-vettori-random/index.md) | Array, somma, media su dati casuali |
| [Conversione in binario (ricorsivo)](Conversione-numero-in-binario-ricorsivo/index.md) | Ricorsione su divisione intera |
| [Seno di un numero](Calcolare-il-seno-di-un-numero/index.md) | Serie di Maclaurin, precisione |

### 8. Algoritmi standard

| Esercizio | Argomento |
|---|---|
| [Ricerca sequenziale](Ricerca-sequenziale/index.md) | Scansione lineare, flag di trovato |
| [Bubblesort e ricerca binaria](Bubblesort-e-ricerca-binaria/index.md) | Algoritmo O(n²), ricerca su array ordinato |
| [Quicksort e ricerca binaria](Quicksort-e-ricerca-binaria/index.md) | Algoritmo O(n log n), pivot, ricorsione |
