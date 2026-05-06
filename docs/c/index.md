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
| [Hello World](01-hello-world.md) | Struttura minima di un programma C, `printf` |
| [Media di due numeri](02-media-due-numeri.md) | Variabili `float`, divisione, `scanf` |
| [Doppio di un numero](03-doppio-di-un-numero.md) | Variabili intere, operatori aritmetici |
| [Perimetro e area del quadrato](04-perimetro-e-area-del-quadrato.md) | Operazioni su `float` |
| [Diagonale del rettangolo](05-diagonale-rettangolo.md) | Teorema di Pitagora, `sqrt` |
| [Circonferenza inscritta/circoscritta](06-circonferenza-inscritta-e-circoscritta.md) | Uso di `M_PI`, `<math.h>` |
| [Area triangolo equilatero](07-area-triangolo-equilatero.md) | Formula con `sqrt`, `<math.h>` |

### 2. Condizioni

| Esercizio | Argomento |
|---|---|
| [Valore assoluto](08-valore-assoluto.md) | Condizione semplice, `if` / `else` |
| [Equazione della retta](09-equazione-della-retta.md) | Coefficiente angolare, intercetta |
| [Numero divisibile per 5](10-numero-divisibile-per-5.md) | Condizione con `%`, output descrittivo |
| [Numero pari o dispari](11-numero-pari-o-dispari.md) | Operatore modulo `%`, `if` / `else` |
| [Equazioni di secondo grado](12-equazioni-di-secondo-grado.md) | Discriminante, `sqrt`, gestione casi |
| [Maggiore fra due numeri](13-maggiore-fra-due-numeri.md) | Confronto tra variabili |
| [Maggiore fra tre numeri (v1)](14-maggiore-fra-tre-numeri-v1.md) | `if` / `else if` annidati |
| [Maggiore fra tre numeri (v2)](15-maggiore-fra-tre-numeri-v2.md) | Variante con variabile temporanea |
| [Maggiore fra tre numeri (v3)](16-maggiore-fra-tre-numeri-v3.md) | Variante con funzione ausiliaria |
| [Divisibile per 2 o 3](17-numero-divisibile-per-2-o-3.md) | Operatori logici `\|\|` e `&&` |
| [Divisibile per 3 e 7](18-numero-divisibile-per-3-e-7.md) | Doppia condizione con `&&` |
| [Test anno bisestile](19-test-anno-bisestile.md) | Condizioni multiple, regola del calendario |
| [Conversione tempo in orario](20-conversione-tempo-in-orario.md) | Divisione intera e modulo |
| [Convertitore di temperature](21-convertitore-di-temperature.md) | Formule lineari, `switch` |
| [Stampa dei mesi](22-stampa-dei-mesi.md) | `for` + `switch`, output testuale |
| [Semplice calcolatrice](23-semplice-calcolatrice.md) | `switch`, operatori sui 4 tipi |

### 3. Cicli

| Esercizio | Argomento |
|---|---|
| [Somma dei primi 12 numeri naturali](24-somma-dei-primi-12-numeri-naturali.md) | Ciclo `for`, accumulatore |
| [Somma numeri da 10 a 20](25-somma-numeri-da-10-a-20.md) | `for` con limite variabile |
| [Vari conteggi con il for](26-vari-conteggi-con-il-for.md) | Più contatori nello stesso ciclo |
| [Indovina il numero](27-indovina-il-numero.md) | `rand()`, ciclo di gioco, hint alto/basso |
| [Numero di cifre di un intero](28-numero-di-cifre-di-un-intero.md) | Divisione intera ripetuta, `while` |
| [Massimo/media non definiti a priori](29-massimo-e-media-non-definiti-a-priori.md) | Ciclo con sentinella, `while` |
| [Generazione numeri casuali](30-generazione-numeri-casuali.md) | `rand()`, `srand()`, `<stdlib.h>` |
| [Operazioni su numeri casuali](31-operazioni-su-numeri-casuali.md) | Min, max, conteggi su array |
| [Tavola pitagorica](32-tavola-pitagorica.md) | Cicli `for` annidati, formattazione output |
| [Stampa rettangolo base](33-stampa-rettangolo-base.md) | Cicli annidati, `*` e spazi |
| [Stampa rettangolo personalizzato](34-stampa-rettangolo-personalizzato.md) | Dimensioni da input, bordi e riempimento |
| [Numeri casuali e rettangoli](35-numeri-casuali-e-rettangoli.md) | Array + output grafico |
| [Disegno di figure geometriche](36-disegno-di-figure-geometriche.md) | Triangoli, rombi, pattern con `*` |
| [Stampa numero binario](37-stampa-numero-binario.md) | Maschera di bit, operatori bitwise |

### 4. Calcolo numerico

| Esercizio | Argomento |
|---|---|
| [Stampa divisori di un numero](38-stampa-divisori-di-un-numero.md) | Ciclo con `%`, raccolta risultati |
| [Verifica numero primo](39-verifica-numero-primo.md) | Algoritmo di primalità, `break` |
| [Calcolo del fattoriale](40-calcolo-del-fattoriale.md) | Funzione con ciclo `for` |
| [Sequenza di Fibonacci](41-sequenza-di-fibonacci.md) | Due variabili di appoggio, ciclo `for` |

### 5. Funzioni e ricorsione

| Esercizio | Argomento |
|---|---|
| [Calcolo radice quadrata](42-calcolo-radice-quadrata.md) | Metodo di Newton-Raphson |
| [Calcolo MCD](43-calcolo-mcd.md) | Algoritmo di Euclide iterativo |
| [Calcolo mcm (base)](44-calcolo-mcm-base.md) | Ciclo con multipli |
| [Calcolo mcm con Euclide](45-calcolo-mcm-con-euclide.md) | MCD → MCM, efficienza |
| [Calcolo numero di Nepero](46-calcolo-numero-di-nepero.md) | Serie di Taylor, convergenza |
| [Calcolo del fattoriale (ricorsivo)](47-calcolo-del-fattoriale-ricorsivo.md) | Caso base e caso ricorsivo |
| [Sequenza di Fibonacci (ricorsivo)](48-sequenza-di-fibonacci-ricorsivo.md) | Doppia chiamata ricorsiva |

### 6. Enum

| Esercizio | Argomento |
|---|---|
| [Analisi sequenza di numeri](49-analisi-sequenza-di-numeri.md) | Lettura da input, statistiche |

### 7. Stringhe e vettori

| Esercizio | Argomento |
|---|---|
| [Conversione in maiuscolo](50-conversione-in-maiuscolo.md) | Array di `char`, `toupper`, `<ctype.h>` |
| [Parola palindroma](51-parola-palindroma.md) | Indici inversi, confronto caratteri |
| [Cifrario di Cesare](52-algoritmo-di-cesare.md) | Shift su caratteri, crittografia base |
| [Statistiche su una frase](53-statistiche-su-una-frase.md) | Conteggio vocali, consonanti, spazi |
| [Conversione numero in binario](54-conversione-numero-in-binario.md) | Divisioni successive, array di bit |
| [Calcoli su vettori random](55-calcoli-su-vettori-random.md) | Array, somma, media su dati casuali |
| [Conversione in binario (ricorsivo)](56-conversione-numero-in-binario-ricorsivo.md) | Ricorsione su divisione intera |
| [Seno di un numero](57-calcolare-il-seno-di-un-numero.md) | Serie di Maclaurin, precisione |

### 8. Algoritmi standard

| Esercizio | Argomento |
|---|---|
| [Ricerca sequenziale](58-ricerca-sequenziale.md) | Scansione lineare, flag di trovato |
| [Bubblesort e ricerca binaria](59-bubblesort-e-ricerca-binaria.md) | Algoritmo O(n²), ricerca su array ordinato |
| [Quicksort e ricerca binaria](60-quicksort-e-ricerca-binaria.md) | Algoritmo O(n log n), pivot, ricorsione |
