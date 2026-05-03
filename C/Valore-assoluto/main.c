#include <stdio.h>

int main(void) {
    int numero;

    printf("Inserire un numero: ");
    scanf("%d", &numero);

    if(numero<0)
        numero = -numero;

    printf("Il valore assoluto è: %d\n", numero);

    return 0;
}