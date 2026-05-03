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
    
    /*********** BUBBLE SORT ***********/
    for(int i=DIM-1; i>0; i--)
        for(int j=0; j<i; j++)
            if(numeri[j] > numeri[j+1]){
                int tmp = numeri[j];
                numeri[j] = numeri[j+1];
                numeri[j+1] = tmp;
            }
    /***********************************/

    printf("\n\n");
    for(int i=0; i<DIM; i++)
        printf("%d ", numeri[i]);

    int valore;
    printf("\n\nInserire il valore da cercare (tra 0 e 1000): ");
    scanf("%d", &valore);
    
    /************** RICERCA BINARIA **************/
    int sx = 0, dx = DIM-1;
    while( sx<=dx && numeri[(sx+dx)/2]!=valore )
        if( valore > numeri[(sx+dx)/2] )
            sx = (sx+dx)/2 + 1;
        else
            dx = (sx+dx)/2 - 1;
    /*********************************************/

    if( sx<=dx )
        printf("Il valore è presente in posizione %d\n", (sx+dx)/2);
    else
        printf("Il valore non è presente\n");

    return 0;
}