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
    int maggiore = (numero1 > numero2 ? numero1 : numero2);
    printf("Il maggiore è %d!\n", (numero3 > maggiore ? numero3 : maggiore));

    return 0;
}