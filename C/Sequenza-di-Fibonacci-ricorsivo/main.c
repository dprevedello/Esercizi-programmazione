#include <stdio.h>

int fibonacci(int n);

int main(void) {
    int numero;

    do {
        printf("Inserire un numero: ");
        scanf("%d", &numero);
        if(numero <= 0)
            printf("ERRORE: per il calcolo di Fibonacci il numero deve essere strettamente positivo.\n\n");
    } while(numero <= 0);
    
    printf("Il %d° numero di Fibonacci è: %d\n", numero, fibonacci(numero));

    return 0;
}

int fibonacci(int n){
    if(n < 0)
        return -1;
    if(n <= 1)
        return 1;
    return fibonacci(n-1) + fibonacci(n-2);
}