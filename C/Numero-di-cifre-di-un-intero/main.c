#include <stdio.h>

int main(void) {
    int numero;

    printf("Inserire un numero: ");
    scanf("%d", &numero);

    int cifre = 1;
    for(int base=10; numero/base > 0; base*=10)
        cifre++;

    printf("%d è composto da %d cifr%c in base 10\n", numero, cifre, cifre==1 ? 'a':'e');

    cifre = 1;
    for(int base=2; numero/base > 0; base*=2)
        cifre++;

    printf("%d è composto da %d cifr%c in base 2\n", numero, cifre, cifre==1 ? 'a':'e');

    return 0;
}