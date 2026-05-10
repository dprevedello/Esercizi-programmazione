# Calcoli su vettori random

Caricare un vettore di n numeri casuali (tra -100 e 100), con n chiesto all'utente (massimo 200), e offrire un menu per stamparli e calcolarne le statistiche.

## Obiettivo

Il programma deve chiedere all'utente quanti numeri generare (n, massimo 200), riempire un vettore con numeri casuali nell'intervallo [-100, 100] e presentare un menu che permetta di:

1. Stampare il vettore
2. Calcolare il minimo
3. Calcolare il massimo
4. Calcolare la media
5. Calcolare la moda
6. Calcolare la mediana
7. Calcolare la varianza
8. Uscire

## Descrizione

Questo esercizio unisce la generazione di dati casuali, la gestione di un menu con `switch-case` e il calcolo di diverse statistiche descrittive, ciascuna implementata in una funzione dedicata.

- **Minimo e massimo**: si trovano scorrendo il vettore con un ciclo e aggiornando le variabili di appoggio.
- **Media**: somma di tutti gli elementi divisa per n.
- **Moda**: il valore che compare più frequentemente. Si può calcolare confrontando ogni elemento con gli altri tramite doppi cicli.
- **Mediana**: valore che si trova in posizione centrale del vettore.
- **Varianza**: media dei quadrati degli scarti dalla media, calcolata come \(\frac{1}{n}\sum_{i=0}^{n-1}(x_i - \bar{x})^2\).

## Suggerimenti

- Per generare numeri in [-100, 100] usa la formula `rand() % 201 - 100`.
- Implementa ogni operazione come funzione separata che riceve il vettore e n come parametri.
- Per la moda usa due cicli annidati per contare le occorrenze di ciascun valore.
- La funzione della moda può restituire l'indice del valore modale invece del valore stesso.
- Il menu può essere gestito con un ciclo `do-while` che si ripete finché l'utente non sceglie di uscire.

## Soluzione

```c
--8<-- "C/Calcoli-su-vettori-random/main.c"
```

<div class="oc-embed"
     data-path="C/Calcoli-su-vettori-random/main.c"
     data-lang="c"
     data-stdin="10\n1\n2\n3\n4\n8"
     data-height="600"
     data-autorun="true">
</div>
