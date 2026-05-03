#include <stdio.h>

int main(void) {
    int lato;

    do{
        printf("\nDi quanto deve essere il lato? ");
        scanf("%d", &lato);
        if( lato<1 )
            printf("ERRORE: Il lato deve valere almeno 1!");
    }while( lato<1 );

    printf("\n");

    for(int r=1; r<=lato; r++){
        for(int c=1; c<=lato; c++)
            printf("*");
        printf("\n");
    }

    printf("\n");

    for(int r=1; r<=lato; r++){
        for(int c=1; c<=lato; c++)
            if(r==1 || r==lato || c==1 || c==lato)
                printf("*");
            else
                printf(" ");
        printf("\n");
    }

    printf("\n");

    for(int r=1; r<=lato; r++){
        for(int c=1; c<=r; c++)
            printf("*");
        printf("\n");
    }

    printf("\n");

    for(int r=1; r<=lato; r++){
        for(int c=1; c<=lato; c++)
            if(r>=c)
                printf("*");
            else
                printf("+");
        printf("\n");
    }

    return 0;
}