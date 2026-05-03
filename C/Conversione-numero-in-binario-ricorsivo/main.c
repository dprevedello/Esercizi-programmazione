#include <stdio.h>

void binario(int n);

int main(){
    int numero;

    do {
        printf("Inserire un numero positivo: ");
        scanf("%d", &numero);
        if(numero < 0)
            printf("ERRORE: il numero deve essere positivo.\n\n");
    } while(numero < 0);
    
    printf("%d in binario vale: ", numero);
    binario(numero);
    printf("\n");

    return 0;
}

void binario(int n){
    if(n > 1)
        binario(n/2);
    printf("%d", n%2);
}