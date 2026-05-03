#include <stdio.h>
#include <stdlib.h>     // Libreria inclusa per rand() e srand()
#include <time.h>       // Libreria inclusa per time()

int main(void) {
    int numero1 = rand();
    int numero2 = rand();
    int numero3 = rand();
    printf("Generazione numeri tra 0 e RAND_MAX (%d)\n", RAND_MAX);
    printf("Da notare che se non si invoca srand(), i numeri rimangono\n");
    printf("gli stessi fra successive esecuzioni:\n");
    printf("%d  %d  %d\n\n", numero1, numero2, numero3);

    srand(15);
    int numero4 = rand();
    int numero5 = rand();
    int numero6 = rand();
    printf("Anche se viene messo un parametro fisso (15 nell'esempio) in srand(),\n");
    printf("i numeri rimangono gli stessi fra successive esecuzioni:\n");
    printf("%d  %d  %d\n\n", numero4, numero5, numero6);

    srand( time(NULL) );    // Inizializzazione del seed della rand ad un valore legato al tempo corrente
    int numero7 = rand();
    int numero8 = rand();
    int numero9 = rand();
    printf("Se si parametrizza srand() con un valore legato al tempo corrente invece,\n");
    printf("i numeri visualizzati sranno sempre differenti:\n");
    printf("%d  %d  %d\n\n", numero7, numero8, numero9);

    // Generazione di un numero tra [0 e 100)    Zero incluso, cento escluso
    int numero10 = rand() % 100;
    printf("Numero tra [0 e 100): %d\n", numero10);

    // Generazione di un numero tra [10 e 100)    Dieci incluso, cento escluso
    int numero11 = 10 + rand() % (100 - 10);  // o semplicemente: 10 + rand() % 90
    printf("Numero tra [10 e 100): %d\n", numero11);

    // Generazione di un numero tra [10 e 100]    Dieci incluso, cento incluso
    int numero12 = 10 + rand() % (100 + 1 - 10);  // o semplicemente: 10 + rand() % 91
    printf("Numero tra [10 e 100]: %d\n", numero12);

    // Generazione di un numero tra [-50 e 100)    meno cinquanta incluso, cento incluso
    int numero13 = -50 + rand() % (100 - -50);  // o semplicemente: -50 + rand() % 150
    printf("Numero tra [-50 e 100): %d\n", numero13);

    // Generazione di un numero tra [0,00 e 1,00]    zezo incluso, uno incluso con due cifre decimali
    float numero14 = (rand() % (100 + 1)) / 100.0;  // o semplicemente: (rand() % 101) / 100.0
    printf("Numero tra [0.00 e 1.00] con due cifre decimali: %.2f\n", numero14);

    // Generazione di un numero tra [10,000 e 100,000]    dieci incluso, cento incluso con tre cifre decimali
    float numero15 = (rand() % (1000 + 1)) / 1000.0;  // o semplicemente: (rand() % 1001) / 1000.0
    numero15 = 10 + rand() % (100 - 10) + numero15;
    printf("Numero tra [10,000 e 100,000] con tre cifre decimali: %.3f\n", numero15);

    return 0;
}