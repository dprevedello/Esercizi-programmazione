#include <stdio.h>

int main(void) {
    int numero;

    do {
        printf("Inserire un numero: ");
        scanf("%d", &numero);
        if(numero < 0)
            printf("ERRORE: per il calcolo del fattoriale il numero deve essere maggiore o uguale a 0.\n\n");
    } while(numero < 0);

    long fattoriale = 1;

    for(int i=1; i<=numero; i++)
        fattoriale*=i;

    printf("\nIl fattoriale di %d vale: %ld\n", numero, fattoriale);
    
    return 0;
}