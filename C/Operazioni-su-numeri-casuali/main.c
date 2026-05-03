#include <stdio.h>
#include <stdlib.h>
#include <time.h>

int main(void) {
    srand(time(NULL));

    int numero, minimo, massimo, somma=0;

    for(int i=0; i<100; i++){
        numero = rand() % 1001;
        printf("%d ", numero);

        if(i==0)
            minimo = massimo = numero;
        else {
            if(numero < minimo)
                minimo = numero;
            if(numero > massimo)
                massimo = numero;
        }
        somma += numero;
    }

    printf("\n\nIl minimo è: %d\n", minimo);
    printf("Il massimo è: %d\n", massimo);
    printf("La media vale: %.3f\n", somma/100.0);
    printf("La somma vale: %d\n", somma);
    
    return 0;
}