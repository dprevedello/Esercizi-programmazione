#include <stdio.h>
#include <math.h>

int main(void) {
    float m, q, xp, yp;

    printf("Inserire il coefficiente angolare m della retta: ");
    scanf("%f", &m);
    printf("Inserire la quota all'origine q della retta: ");
    scanf("%f", &q);

    printf("Inserire la coordinata x del punto: ");
    scanf("%f", &xp);
    printf("Inserire la coordinata y del puntoa: ");
    scanf("%f", &yp);

    float yCalcolato = m*xp+q;

    // Viene confrontato il valore di y calcolato con quello del punto
    // per determinare se esso giace o meno sulla retta
    if(yp == yCalcolato)
        printf("Il punto appartiene alla retta\n");
    else
        printf("Il punto NON appartiene alla retta\n");

    return 0;
}