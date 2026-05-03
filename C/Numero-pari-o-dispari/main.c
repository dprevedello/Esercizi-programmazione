#include <stdio.h>

int main(void) {
  int numero;

    printf("Inserire un numero: ");
    scanf("%d", &numero);

    // Testo se il numero inserito è divisibile per 2. Per farlo calcolo il resto
    // della divisione intera per 2 tramite l'operatore %. Se il resto è 0 allora  
    // il numero è pari, altrimenti dispari.
    if(numero%2 == 0)
        printf("Il numero è pari!\n");
    else
        printf("Il numero è dispari!\n");

    return 0;
}