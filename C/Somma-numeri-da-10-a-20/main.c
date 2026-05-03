#include <stdio.h>

int main(void) {
    int risultato = 0;
    for(int n = 10; n<=20; n++)
        risultato += n;
    
    printf("La somma dei numeri da 10 a 20 vale: %d\n", risultato);
    return 0;
}