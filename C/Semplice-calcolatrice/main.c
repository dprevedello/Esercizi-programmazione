#include <stdio.h>

int main(void) {
    float numero1, numero2;
    int operazione;

    printf("Inserire il primo operando: ");
    scanf("%f", &numero1);
    printf("Inserire il secondo operando: ");
    scanf("%f", &numero2);

    printf("\nQuale operazione vuoi eseguire?\n");
    printf("1) somma\n");
    printf("2) sottrazione\n");
    printf("3) moltiplicazione\n");
    printf("4) divisione\n");
    printf("Scelta: ");
    scanf("%d", &operazione);

    switch( operazione ){
        case 1:
            printf("\n%f + %f = %f\n", numero1, numero2, numero1+numero2);
            break;
        case 2:
            printf("\n%f - %f = %f\n", numero1, numero2, numero1-numero2);
            break;
        case 3:
            printf("\n%f * %f = %f\n", numero1, numero2, numero1*numero2);
            break;
        case 4:
            printf("\n%f / %f = %f\n", numero1, numero2, numero1/numero2);
            break;
        default:
            printf("\nLa scelta non è corretta!\n");
    };

    return 0;
}