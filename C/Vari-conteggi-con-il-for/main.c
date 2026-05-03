#include <stdio.h>

int main(void) {
    printf("Numeri da 1 a 100\n");
    for(int n=1; n<=100; n++)
        printf("%d ", n);

    printf("\n\nNumeri da 100 a 1\n");
    for(int n=100; n>=1; n--)
        printf("%d ", n);

    printf("\n\nNumeri da 1 a 100 pari\n");
    for(int n=2; n<=100; n+=2)
        printf("%d ", n);

    printf("\n\nNumeri da 100 a 1 dispari\n");
    for(int n=99; n>=1; n-=2)
        printf("%d ", n);

    printf("\n\nLa tabellina del 3 fino a 100\n");
    for(int n=1; n*3<=100; n++)
        printf("%d ", n*3);

    printf("\n\nPotenze del 2 minori di 10000\n");
    for(int n=1; n<=10000; n*=2)
        printf("%d ", n);

    printf("\n\n");
    return 0;
}