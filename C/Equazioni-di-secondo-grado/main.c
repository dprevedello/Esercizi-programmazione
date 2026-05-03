#include <stdio.h>
#include <math.h>

int main(void) {
    float a, b, c;

    printf("Inserire il coefficiente a dell'equazione: ");
    scanf("%f", &a);
    printf("Inserire il coefficiente b dell'equazione: ");
    scanf("%f", &b);
    printf("Inserire il coefficiente c dell'equazione: ");
    scanf("%f", &c);

    float delta = b*b - 4*a*c;
    
    if( delta < 0 )
        printf("Non esistono soluzioni all'equazione!\n");
    else if( delta == 0 )
        printf("Esiste una sola soluzione pari a: %.2f\n", -b/(2*a));
    else
        printf("Esistono due soluzioni: %.2f e %.2f\n", (-b+sqrt(delta))/(2*a), (-b-sqrt(delta))/(2*a));

    return 0;
}