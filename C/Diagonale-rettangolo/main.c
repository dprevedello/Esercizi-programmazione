#include <stdio.h>
#include <math.h>

int main(void) {
    int area, altezza;

    printf("Inserire l'area del rettangolo: ");
    scanf("%d", &area);
    printf("Inserire l'altezza: ");
    scanf("%d", &altezza);

    // Inizio con il ricavare la base (per evitare la divisione intera,
    // eseguo il type-cast sulla variabile area, convertendola in float)
    float base = (float)area / altezza;

    // Calcolo della diagonale (NOTA: viene usata la funzione sqrt per il 
    // calcolo della radice qudrata)
    float diagonale = sqrt(base*base + altezza*altezza);

    printf("La diagonale vale %.3f\n", diagonale);

    return 0;
}