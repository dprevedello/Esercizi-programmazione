#include <stdio.h>

int main(void) {
    // Ovviamente questa è una soluzione, ma non la useremo.
    // int risultato = 1 + 2 + 3 + 4 + 5 + 6 + 7 + 8 + 9 + 10 + 11 + 12;

    int risultato = 0;
    for(int n = 1; n<=12; n++)
        risultato += n;
    
    printf("La somma dei primi 12 numeri vale: %d\n", risultato);
    return 0;
}