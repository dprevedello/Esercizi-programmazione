#include <stdio.h>
#include <math.h>

int main(void) {
    int perimetro;

    printf("Inserire il perimetro del triangolo equilatero: ");
    scanf("%d", &perimetro);

    float lato = perimetro / 3.0;

    // Con qualche passaggio matematico si ottiene l'altezza:
    // float altezza = sqrt(lato*lato - (lato/2.0)*(lato/2.0));
    // float altezza = sqrt(lato*lato - lato*lato/4.0);
    // float altezza = sqrt((3/4.0) * lato*lato);
    // float altezza = lato * sqrt(3/4.0);
    float altezza = lato * sqrt(3) / 2;

    float area = lato * altezza / 2;

    printf("L'area vale %.3f\n", area);

    return 0;
}