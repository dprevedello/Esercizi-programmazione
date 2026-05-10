# Calcolare il seno di un numero

Calcolare il seno di un numero x chiesto in input utilizzando lo sviluppo di Taylor fino al termine n-esimo. Si utilizzi la ricorsione.

## Obiettivo

Il programma deve richiedere un angolo x (in gradi) e un numero intero n, quindi calcolare un'approssimazione di sin(x) sommando i primi n+1 termini dello sviluppo di Taylor, usando una funzione ricorsiva per il calcolo del fattoriale.

## Descrizione

Lo sviluppo di Taylor di sin(x) vale:

$$ \sin(x) \approx \sum_{k=0}^n (-1)^k \frac{x^{2k+1}}{(2k+1)!} $$

I primi termini sono:

$$\sin(x) \approx x - \frac{x^3}{3!} + \frac{x^5}{5!} - \frac{x^7}{7!} + \ldots$$

Più termini si includono (maggiore è n), più l'approssimazione è precisa. La serie converge per qualsiasi valore di x, ma per x grandi servono più termini.

**Una funzione ricorsiva** richiama sé stessa (**ricorsione diretta**) o tramite un'altra funzione (**ricorsione indiretta**). Affinché il procedimento abbia fine devono esistere **casi base** e ogni chiamata deve avvicinare i parametri ai casi base.

In questo esercizio si usa la funzione ricorsiva `fattoriale(int n)` che calcola n! ricorsivamente.
Anche la serie di Taylor viene calcolata ricorsivamente.

## Suggerimenti

- Implementa una funzione `grad_rad()` per convertire i gradi in radianti.
- Implementa `long double fattoriale(int n)` con caso base n == 0 → 1 e caso ricorsivo `n * fattoriale(n-1)`.
- Usa `pow()` della libreria `<math.h>` per calcolare le potenze.
- Implementa una funzione ricorsiva che sommi i termini della serie di Taylor fino al grado richiesto.
- Confronta il risultato con `sin(x)` della libreria `<math.h>` per verificare la precisione al variare di n.

## Soluzione

```c
--8<-- "C/Calcolare-il-seno-di-un-numero/main.c"
```

<div class="oc-embed"
     data-path="C/Calcolare-il-seno-di-un-numero/main.c"
     data-lang="c"
     data-stdin="30\n10"
     data-autorun="true">
</div>
