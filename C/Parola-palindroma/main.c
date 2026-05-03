#include <stdio.h>
#include <string.h>

int main(void) {
    char parola[100];

    printf("Inserire una parola: ");
    scanf("%s", parola);

    int len = strlen(parola), palindroma = 1;
    for(int i=0; i<len/2 && palindroma; i++)
        if(parola[i] != parola[len-i-1])
            palindroma = 0;
    
    printf("La parola %s palindroma\n", palindroma ? "è" : "NON è");

    return 0;
}