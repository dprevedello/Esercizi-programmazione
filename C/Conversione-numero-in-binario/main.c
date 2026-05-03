#include <stdio.h>

int main(){
    int numero;

    do {
        printf("Inserire un numero positivo: ");
        scanf("%d", &numero);
        if(numero < 0)
            printf("ERRORE: il numero deve essere positivo.\n\n");
    } while(numero < 0);
    
    // Calcolo il valore in binario e conto da quante cifre è composto il numero
    int binario[64] = {0, }, cifre=0;
    for(int n = numero; n>0; n/=2, cifre++)
        binario[cifre] = n%2;
    if(numero==0)
        cifre=1;
    
    printf("%d in binario vale: ", numero);
    for(int i = cifre-1; i>=0; i--) // Stampo ciascuna cifra 
        printf("%d", binario[i]);
    printf("\n");
    
    return 0;
}