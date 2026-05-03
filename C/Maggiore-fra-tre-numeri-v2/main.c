#include <stdio.h>

int main(void) {
    int numero1, numero2, numero3;

    printf("Inserire il primo numero: ");
    scanf("%d", &numero1);
    printf("Inserire il secondo numero: ");
    scanf("%d", &numero2);
    printf("Inserire il terzo numero: ");
    scanf("%d", &numero3);

    // Verifico quale sia il maggiore fra i primi due numeri
    // quindi confronto il maggiore con il terzo
    int maggiore;
    if(numero1 > numero2)
        maggiore = numero1;
    else
        maggiore = numero2;
    if(numero3 > maggiore)
        maggiore = numero3;

    printf("Il maggiore è %d!\n", maggiore);

    return 0;
}