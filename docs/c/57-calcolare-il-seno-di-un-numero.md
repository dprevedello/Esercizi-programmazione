# Calcolare il seno di un numero

Calcolare il seno di un numero x chiesto in input utilizzando lo sviluppo di Taylor fino al termine n-esimo. Si utilizzi la ricorsione.

## Obiettivo

Il programma deve richiedere un angolo x (in radianti) e un numero intero n, quindi calcolare un'approssimazione di sin(x) sommando i primi n+1 termini dello sviluppo di Taylor, usando funzioni ricorsive per il calcolo del fattoriale e della potenza.

## Descrizione

Lo sviluppo di Taylor di sin(x) vale:

$$ \sin(x) \approx \sum_{k=0}^n (-1)^k \frac{x^{2k+1}}{(2k+1)!} $$

I primi termini sono:

$$\sin(x) \approx x - \frac{x^3}{3!} + \frac{x^5}{5!} - \frac{x^7}{7!} + \ldots$$

Più termini si includono (maggiore è n), più l'approssimazione è precisa. La serie converge per qualsiasi valore di x, ma per x grandi servono più termini.

**Una funzione ricorsiva** richiama sé stessa (**ricorsione diretta**) o tramite un'altra funzione (**ricorsione indiretta**). Affinché il procedimento abbia fine devono esistere **casi base** e ogni chiamata deve avvicinare i parametri ai casi base.

In questo esercizio si usano due funzioni ricorsive:

- `potenza(double x, int n)`: calcola x^n ricorsivamente.
- `fattoriale(int n)`: calcola n! ricorsivamente.

## Suggerimenti

- Implementa `double potenza(double x, int n)` con caso base n == 0 → 1.0 e caso ricorsivo `x * potenza(x, n-1)`.
- Implementa `long long fattoriale(int n)` con caso base n == 0 → 1 e caso ricorsivo `n * fattoriale(n-1)`.
- Nel ciclo principale somma i termini `pow(-1, k) * potenza(x, 2*k+1) / fattoriale(2*k+1)` per k da 0 a n.
- Confronta il risultato con `sin(x)` della libreria `<math.h>` per verificare la precisione al variare di n.

## Soluzione

```c
--8<-- "C/Calcolare-il-seno-di-un-numero/main.c"
```

<div class="oc-embed"
     data-path="C/Calcolare-il-seno-di-un-numero/main.c"
     data-lang="c">
</div>
