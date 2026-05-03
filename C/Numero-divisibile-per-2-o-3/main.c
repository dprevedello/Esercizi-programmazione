#include <stdio.h>

int main(void) {
    int numero;

    printf("Inserire un numero: ");
    scanf("%d", &numero);

    // Verifico che il numero sia divisibile per due o per tre.
    // Per verificare la divisibilità si usa l'operatore %, per
    // la congiunzione "oppure" si usa l'operatore or ||
    if(numero%2 == 0 || numero%3 == 0)
        printf("Il triplo è: %d\n", numero*3);
    else
        printf("La metà è: %.1f\n", numero/2.0);

    return 0;
}