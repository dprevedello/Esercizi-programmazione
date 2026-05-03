#include <stdio.h>

int main(void) {
    int mese;

    printf("Inserire il mese corrente: ");
    scanf("%d", &mese);

    // Viene scelto il mese da stampare tramite il
    // costrutto switch-case
    switch(mese){
        case 1:
            printf("Il mese è Gennaio\n");
            break;
        case 2:
            printf("Il mese è Febbraio\n");
            break;
        case 3:
            printf("Il mese è Marzo\n");
            break;
        case 4:
            printf("Il mese è Aprile\n");
            break;
        case 5:
            printf("Il mese è Maggio\n");
            break;
        case 6:
            printf("Il mese è Giugno\n");
            break;
        case 7:
            printf("Il mese è Luglio\n");
            break;
        case 8:
            printf("Il mese è Agosto\n");
            break;
        case 9:
            printf("Il mese è Settembre\n");
            break;
        case 10:
            printf("Il mese è Ottobre\n");
            break;
        case 11:
            printf("Il mese è Novembre\n");
            break;
        case 12:
            printf("Il mese è Dicembre\n");
            break;
        default:
            printf("Il numero inserito non corrisponde ad un mese!\n");
    };

    return 0;
}