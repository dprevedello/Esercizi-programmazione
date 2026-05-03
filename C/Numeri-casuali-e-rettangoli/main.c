/**********************************************************************************

Generare due numeri casuali R e C tra 5 e 20, e disegnare su schermo un rettangolo 
di R righe e C colonne, pieno se R è pari, vuoto se dispari.
Il carattere che comporrà il rettangolo (sia vuoto che pieno) sarà un * se C < 10
oppure un # se C è >= 10.

***********************************************************************************/

#include <stdio.h>
#include <time.h>
#include <stdlib.h>

int main(){
    srand(time(NULL));
    
    int r = 5 + rand() % 16;
    int c = 5 + rand() % 16;

    printf("R=%d C=%d\n\n", r, c);
    
    char bordo = c<10 ? '*' : '#';
    char riempimento = r%2==0 ? bordo : ' ';

    for(int riga = 1; riga <= r; riga++){
        for(int colonna = 1; colonna <= c; colonna++)
            if(riga==1 || colonna==1 || riga==r || colonna==c)
                printf("%c", bordo);
            else
                printf("%c", riempimento);
        printf("\n");
    }
    
    return 0;
}