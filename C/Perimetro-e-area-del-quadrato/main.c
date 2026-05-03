#include <stdio.h>

int main(void) {
    int lato;

    printf("Inserire il lato: ");
    scanf("%d", &lato);

    // Calcolo area e perimetro
    int perimetro = lato*4;
    int area = lato*lato;

    printf("Il perimetro vale %d\n", perimetro);
    printf("L'area vale %d\n", area);

    return 0;
}