#include <stdio.h>

int main(void) {
    long double e = 1;
    long double fatt = 1;

    for( int i=1; i<=20; i++ ){
        fatt *= (1.L/i);
        e += fatt;
    }

    printf("Il valore di e è pari a: %.20Lf\n", e);
    
    return 0;
}