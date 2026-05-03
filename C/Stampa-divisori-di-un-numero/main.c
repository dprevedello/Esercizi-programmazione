#include <stdio.h>

int main(void) {
    int numero;

    do {
        printf("Inserire un numero (strettamente positivo): ");
        scanf("%d", &numero);
        if(numero <= 0)
            printf("ERRORE: il numero deve essere strettamente positivo.\n\n");
    } while(numero <= 0);

    printf("\nI divisori di %d sono: ", numero);
    for(int div=1; div<=numero; div++)
        if(numero%div==0)
            printf("%d ", div);
    printf("\n");
    
    return 0;
}