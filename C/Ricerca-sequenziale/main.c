#include <stdio.h>
#include <stdlib.h>
#include <time.h>

#define DIM 100

int main(void) {
    srand(time(NULL));

    int numeri[DIM];
    for(int i=0; i<DIM; i++){
        numeri[i] = rand() % 1000;
        printf("%d ", numeri[i]);
    }

    int valore;
    printf("\n\nInserire il valore da cercare (tra 0 e 1000): ");
    scanf("%d", &valore);
    
    /*********** RICERCA SEQUENZIALE ***********/
    int posizione = -1;
    for(int i=0; i<DIM && posizione==-1; i++)
        if( numeri[i]==valore )
            posizione = i;
    /*******************************************/

    if( posizione!=-1 )
        printf("Il valore è presente in posizione %d\n", posizione);
    else
        printf("Il valore non è presente\n");

    return 0;
}