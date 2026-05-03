#include <stdio.h>

int main(void) {
    int numero;

    do {
        printf("Inserire un numero (strettamente positivo): ");
        scanf("%d", &numero);
        if(numero <= 0)
            printf("ERRORE: il numero deve essere strettamente positivo.\n\n");
    } while(numero <= 0);

    int divisori = 0;
    for(int div=1; div<=numero; div++)
        if(numero%div==0)
            divisori++;

    if(divisori == 2)
        printf("Il numero è primo!\n");
    else
        printf("Il numero non è primo!\n");
    
    return 0;
}