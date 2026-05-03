#include <stdio.h>

double radQuadrata(double valore);

int main(void) {
    float numero;

    do {
        printf("Inserire il numero del quale si vuole conoscere la radice quadrata: ");
        scanf("%f", &numero);
        if(numero < 0)
            printf("ERRORE: per il calcolo della radice il numero deve essere positivo.\n\n");
    } while(numero < 0);

    printf("\nLa radice vale: %.10f\n", radQuadrata(numero));

    return 0;
}

double radQuadrata(double valore){ 
    double radice = 1;
    for(int i=0; i<100; i++)
        radice = (radice + valore / radice) / 2;
    return radice;
}
