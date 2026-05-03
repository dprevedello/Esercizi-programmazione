#include <stdio.h>

int main(void) {
    int numero1, numero2;

    printf("Inserire il primo numero: ");
    scanf("%d", &numero1);
    printf("Inserire il secondo numero: ");
    scanf("%d", &numero2);

    if(numero1 > numero2)
        printf("Il maggiore è %d!\n", numero1);
    else
        printf("Il maggiore è %d!\n", numero2);

    return 0;
}