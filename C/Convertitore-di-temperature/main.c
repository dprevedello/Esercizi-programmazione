#include <stdio.h>

int main(void) {
    float celsius;

    printf("Inserire la temperatura in Celsius: ");
    scanf("%f", &celsius);

    if(celsius < -273.15)
        printf("\nErrore: la temperatura è inferiore allo zero assoluto (-273,15 °C)\n");
    else {
        float fahrenheit = (9./5) * celsius + 32;
        float kelvin = celsius + 273.15 ;

        printf("\nLa temperatura in Fahrenheit è di %.2f°F\n", fahrenheit);
        printf("La temperatura in Kelvin è di %.2f°K\n", kelvin);
    }

    return 0;
}