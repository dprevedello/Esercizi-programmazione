#include <stdio.h>
#include <stdlib.h>
#include <time.h>

int main(void) {
    srand(time(NULL));
    int n = rand() % 100 + 1;

    int valore=0;
    printf("Indovina il numero! (tra 1 e 100)\n");
    for(int i=1; i<=10 && valore!=n; i++){
        printf("Tentativo %d: ", i);
        scanf("%d", &valore);

        if(valore == n)
            printf("Complimenti hai indovinato in %d mosse!\n", i);
        else if(valore > n)
            printf("%d è troppo grande... riprova!\n", valore);
        else
            printf("%d è troppo piccolo... riprova!\n", valore);
    }
    return 0;
}