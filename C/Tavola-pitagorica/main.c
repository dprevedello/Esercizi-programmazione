#include <stdio.h>

int main(void) {
    printf("\n---------------------------------------------------\n");
    for(int r=1; r<=10; r++){
        for(int c=1; c<=10; c++)
            if( r*c < 100 )
                printf("| %2d ", r*c);
            else
                printf("| %d", r*c);
        printf("|\n---------------------------------------------------\n");
    }

    return 0;
}