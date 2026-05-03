#include <stdio.h>

int main(){
    int numero;

    do {
        printf("Inserire un numero positivo: ");
        scanf("%d", &numero);
        if(numero < 0)
            printf("ERRORE: il numero deve essere positivo.\n\n");
    } while(numero < 0);
    
    // Stampo le divisioni successive e conto da quante cifre è composto il numero
    int cifre=0;
    for(int n = numero; n>0; n/=2, cifre++)
        printf("%5d | %d\n", n, n%2);
    printf("%5d | \n\n", 0);
    if(numero==0)
        cifre=1;
    
    printf("%d in binario vale: ", numero);
    for(int i = cifre-1; i>=0; i--) // Stampo ciascuna cifra 
        printf("%d", 1<<i & numero && 1);
    printf("\n");
    
    return 0;
}