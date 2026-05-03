#include <stdio.h>

int main(void) {
    char bordo, contenuto;
    int righe, colonne;

    printf("Quale carattere si vuole usare per il bordo? ");
    scanf("%c", &bordo);
    printf("Quale carattere si vuole usare per il contenuto? ");
    scanf("\n%c", &contenuto);

    do{
        printf("\nQuante righe vuoi (minimo 3): ");
        scanf("%d", &righe);
        if( righe<3 )
            printf("Le righe devono essere almeno 3!");
    }while( righe<3 );
    do{
        printf("\nQuante colonne vuoi (minimo 3): ");
        scanf("%d", &colonne);
        if( colonne<3 )
            printf("Le colonne devono essere almeno 3!");
    }while( colonne<3 );

    for(int r=1; r<=righe; r++){
        for(int c=1; c<=colonne; c++)
            if( r==1 || r==righe || c==1 || c==colonne )
                printf("%c", bordo);
            else
                printf("%c", contenuto);
        printf("\n");
    }
    
    return 0;
}
