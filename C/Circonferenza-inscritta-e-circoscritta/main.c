#include <stdio.h>
#include <math.h>

int main(void) {
    int lato;

    printf("Inserire il lato del quadrato: ");
    scanf("%d", &lato);

    // Il raggio della circonferenza inscritta è semplicemente la metà
    // del lato del quadrato
    float raggioIns = lato / 2.0;

    // Il raggio della circonferenza circoscritta è la metà della diagonale
    // del quadrato. Con qualche passaggio matematico si ottiene:
    // float raggioCirc = sqrt(lato*lato + lato*lato) / 2;
    // float raggioCirc = sqrt(2*lato*lato) / 2;
    // float raggioCirc = lato * sqrt(2) / 2;
    float raggioCirc = lato / sqrt(2);

    printf("Il raggio inscritto vale %.1f\n", raggioIns);
    printf("Il raggio circoscritto vale %.3f\n", raggioCirc);

    return 0;
}