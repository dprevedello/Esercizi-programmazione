#include <stdio.h>

int main(void) {
    int secondi;
    printf("Inserire un numero di secondi: ");
    scanf("%d", &secondi);

    if( secondi<0 )
        printf("Valore inserito non corretto.\n");
    else {
        int hh = secondi/3600;
        int mm = (secondi - hh*3600)/60;
        int ss = secondi - hh*3600 - mm*60;
        printf("Orario: %dh:%dm:%ds\n", hh, mm, ss);
    }

    return 0;
}