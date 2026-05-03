#include <stdio.h>

int main(void) {
    // Dichiarazione di una variabile di tipo int (numero intero)
    int numero;

    // Lettura del numero
    printf("Inserire un numero: ");
    scanf("%d", &numero);

    // Calcolo e stampo il doppio direttamente nella printf
    printf("Il doppio vale %d\n", numero*2);

    return 0;
}