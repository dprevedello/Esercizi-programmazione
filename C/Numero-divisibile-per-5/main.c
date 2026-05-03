#include <stdio.h>

int main(void) {
    int numero;

    printf("Inserire un numero: ");
    scanf("%d", &numero);

    // Testo se il numero inserito è divisibile per 5. Per farlo calcolo il resto
    // della divisione intera per 5 tramite l'operatore % e, se pari a 0, allora  
    // il numero è divisibile per 5.
    if(numero%5 == 0)
        printf("Il numero è divisibile per 5!\n");

    return 0;
}