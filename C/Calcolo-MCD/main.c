#include <stdio.h>

int mcd(int n1, int n2);

int main(void) {
    int numero1, numero2;

    do {
        printf("Inserire il primo numero con il qualse si vuole calcolare l'MCD: ");
        scanf("%d", &numero1);
        if(numero1 <= 0)
            printf("ERRORE: per il calcolo dell'MCD il numero deve essere strettamente positivo.\n\n");
    } while(numero1 < 0);

    do {
        printf("Inserire il secondo numero con il qualse si vuole calcolare l'MCD: ");
        scanf("%d", &numero2);
        if(numero2 <= 0)
            printf("ERRORE: per il calcolo dell'MCD il numero deve essere strettamente positivo.\n\n");
    } while(numero2 < 0);

    printf("\nIl massimo comun divisore fra %d e %d è %d\n", numero1, numero2, mcd(numero1, numero2));

    return 0;
}

int mcd(int n1, int n2){
    int a=n1, b=n2, r;

    do {
        r = a % b;
        a = b;
        b = r;
    } while(r != 0);

    return a;
}