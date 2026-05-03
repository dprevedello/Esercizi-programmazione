#include <stdio.h>

int main(void) {
    char parola[100];

    printf("Inserire una parola: ");
    scanf("%s", parola);

    int scostamento = 'A' - 'a';
    for(int i=0; i<100 && parola[i]!='\0'; i++)
        if(parola[i]>='a' && parola[i]<='z')
            parola[i] = parola[i] + scostamento;
    
    printf("Parola in maiuscolo: %s\n", parola);

    return 0;
}