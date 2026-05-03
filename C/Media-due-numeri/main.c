#include <stdio.h>

int main(void) {
    // Dichiarazione di due variabili di tipo float (numero con la vigola)
    float numero1, numero2;

    // Lettura del primo numero
    printf("Inserire il primo numero: ");
    scanf("%f", &numero1);

    // Lettura del secondo numero
    printf("Inserire il secondo numero: ");
    scanf("%f", &numero2);

    // Calcolo la media
    float media = (numero1 + numero2) / 2;

    // Visualizzo il risultato (NOTA: con una sola cifra decimale .1f)
    printf("La media vale %.1f", media);

    return 0;
}