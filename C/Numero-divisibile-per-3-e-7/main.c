#include <stdio.h>

int main(void) {
    int numero;

    printf("Inserire un numero: ");
    scanf("%d", &numero);

    // Verifico che il numero sia divisibile per tre e per sette.
    // Per verificare la divisibilità si usa l'operatore %, per la
    // congiunzione "e" si usa l'operatore and &&
    if(numero%3 == 0 && numero%7 == 0)
        printf("Il numero è divisibile per 3 e 7\n");
    else
        printf("Il numero NON è divisibile per 3 e 7\n");

    return 0;
}