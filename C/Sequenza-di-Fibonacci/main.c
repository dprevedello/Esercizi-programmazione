#include <stdio.h>

int main(void) {
    int numero;

    do {
        printf("Inserire un numero: ");
        scanf("%d", &numero);
        if(numero <= 0)
            printf("ERRORE: per il calcolo di Fibonacci il numero deve essere strettamente positivo.\n\n");
    } while(numero <= 0);

    int fibonacci = 1, n_1 = 1, n_2 = 0;
    for(int i=2; i<=numero; i++){
        fibonacci = n_1 + n_2;
        n_2 = n_1;
        n_1 = fibonacci;
    }
    
    printf("Il %d numero di Fibonacci è: %d\n", numero, fibonacci);

    return 0;
}