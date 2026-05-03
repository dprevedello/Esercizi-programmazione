#include <stdio.h>

typedef enum tipologia {
    crescente,
    decrescente,
    misto,
    indefinito
} tipologia;

int main(void) {
    int n;
    
    do {
        printf("Quanti numeri vuoi inserire? ");
        scanf("%d", &n);
        if(n < 1)
            printf("ERRORE: devi inserire almeno un numero.\n\n");
    } while(n < 1);

    int positivi=0, nulli=0, negativi=0;
    int pari=0, dispari=0;
    int prec;
    tipologia tipo = indefinito;

    for(int i=0; i<n; i++){
        int numero;
        printf("%d) inserire un numero: ", i+1);
        scanf("%d", &numero);

        // Positivi, nulli e negativi
        if(numero < 0)
            negativi++;
        else if(numero == 0)
            nulli++;
        else
            positivi++;

        // Pari o dispari
        if(numero%2 == 0)
            pari++;
        else
            dispari++;
        
        // Sequenza crescente, decrescente o né crescente né decrescente
        if(i>0){
            if(tipo == indefinito){
                if(prec < numero)
                    tipo=crescente;
                if(prec > numero)
                    tipo=decrescente;
            } else if(tipo != misto){
                if(prec < numero && tipo == decrescente)
                    tipo=misto;
                if(prec > numero && tipo == crescente)
                    tipo=misto;
            }
        }
        prec=numero;
    }

    printf("\nValori positivi: %d\nValori nulli: %d\nValori negativi: %d\n\n", positivi, nulli, negativi);
    printf("Numeri pari: %d\nNumeri dispari: %d\n\n", pari, dispari);

    switch(tipo){
        case indefinito:
            printf("Nulla può essere detto sulla sequenza.\n");
            break;
        case crescente:
            printf("La sequenza è crescente.\n");
            break;
        case decrescente:
            printf("La sequenza è decrescente.\n");
            break;
        case misto:
            printf("La sequenza è né crescente né decrescente.\n");
    }

    return 0;
}