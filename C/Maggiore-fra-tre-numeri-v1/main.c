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
    if(numero1 > numero2)
        if(numero1 > numero3)
            printf("Il maggiore è %d!\n", numero1);
        else
            printf("Il maggiore è %d!\n", numero3);
    else
        if(numero2 > numero3)
            printf("Il maggiore è %d!\n", numero2);
        else
            printf("Il maggiore è %d!\n", numero3);

    return 0;
}