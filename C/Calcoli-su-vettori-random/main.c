#include <stdio.h>
#include <stdlib.h>
#include <time.h>
#include <math.h>

void stampa(int valori[], int len){
    for(int i=0; i<len; i++)
        printf("%d ", valori[i]);
}

int minimo(int valori[], int len){
    int min = valori[0];
    for(int i=1; i<len; i++)
        if(valori[i] < min)
            min = valori[i];
    return min;
}

int massimo(int valori[], int len){
    int max = valori[0];
    for(int i=1; i<len; i++)
        if(valori[i] > max)
            max = valori[i];
    return max;
}

float media(int valori[], int len){
    float somma = 0;
    for(int i=0; i<len; i++)
        somma += valori[i];
    return somma / len;
}

int moda(int valori[], int len){
    int index, frequenza = 0;
    for(int i=0; i<len; i++){
        int freq = 1;
        for(int j=i+1; j<len; j++)
            if( valori[i] == valori[j] )
                freq++;
        if(freq > frequenza){
            frequenza = freq;
            index = i;
        }
    }
    if( frequenza == 1 )
        return -1;
    return index;
}

int mediana(int valori[], int len){
    return valori[len/2];
}

float varianza(int valori[], int len){
    float avg = media(valori, len);
    float somma;
    for(int i=0; i<len; i++)
        somma += pow(valori[i] - avg, 2);
    return somma / len;
}

int main(void) {
    int numeri[200];
    int n;

    do {
        printf("Quanti numeri vanno generati (da 1 a 200): ");
        scanf("%d", &n);
        if(n < 1 || n > 200)
            printf("ERRORE: il numero deve essere tra 1 e 200.\n\n");
    } while(n < 1 || n > 200);

    srand(time(NULL));
    for(int i=0; i<n; i++)
        numeri[i] = rand() % 201 - 100;

    printf("\nMenu\n");
    printf("1) Stampa\n");
    printf("2) Minimo\n");
    printf("3) Massimo\n");
    printf("4) Media\n");
    printf("5) Moda\n");
    printf("6) Varianza\n");
    printf("7) Termina\n");
    
    int scelta;
    do{
        printf("Operazione da effettuare? ");
        scanf("%d", &scelta);
        printf("\n");

        int val;
        switch(scelta){
            case 1:
                stampa(numeri, n);
                break;
            case 2:
                printf("Il minimo valore è: %d", minimo(numeri, n));
                break;
            case 3:
                printf("Il massimo valore è: %d", massimo(numeri, n));
                break;
            case 4:
                printf("La media vale: %.3f", media(numeri, n));
                break;
            case 5:
                val = moda(numeri, n);
                if(val==-1)
                    printf("Nessun valore modale");
                else
                    printf("Il valore modale è: %d", numeri[val]);
                break;
            case 6:
                printf("La varianza è: %.3f", varianza(numeri, n));
                break;
            case 7:
                break;
            default:
                printf("ERRORE: Scelta non disponibile.");
        };
        printf("\n");

    } while(scelta != 7);
    
    return 0;
}