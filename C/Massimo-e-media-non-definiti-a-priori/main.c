#include <stdio.h>

int main(void) {
    int valore, max, somma=0;
    int inseriti = 0;
    // int uscita;
    char uscita;

    do {
        printf("Inserire un numero: ");
        scanf("%d", &valore);

        if( inseriti == 0 )
            max = valore;
        else if( valore > max )
            max = valore;
        somma += valore;
        inseriti++;

        printf("Vuoi terminare (S o N)? ");
        // Uso \n%c per evitare la lettura dello \n lasciato dalla precedente scanf
        scanf("\n%c", &uscita);
        printf("\n");
    } while( uscita != 's' && uscita != 'S' );

    printf("Il valore massimo è %d\n", max);
    printf("Il valor medio è: %.2f\n", (float)somma/inseriti);

    return 0;
}