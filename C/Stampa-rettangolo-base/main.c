#include <stdio.h>

int main(void) {
    for(int r=1; r<=10; r++){
        for(int c=1; c<=20; c++)
            if( r==1 || r==10 || c==1 || c==20 )
                printf("#");
            else
                printf(" ");
        printf("\n");
    }
    
    return 0;
}