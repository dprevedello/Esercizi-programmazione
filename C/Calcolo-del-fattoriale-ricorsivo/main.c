#include <stdio.h>

long fattoriale(int n);

int main(void) {
    int numero;

    do {
        printf("Inserire un numero: ");
        scanf("%d", &numero);
        if(numero < 0)
            printf("ERRORE: per il calcolo del fattoriale il numero deve essere maggiore o uguale a 0.\n\n");
    } while(numero < 0);

    printf("\nIl fattoriale di %d vale: %ld\n", numero, fattoriale(numero));
    
    return 0;
}

long fattoriale(int n){
    if(n < 0)
        return -1;
    if(n == 0)
        return 1;
    return n * fattoriale(n-1);
}