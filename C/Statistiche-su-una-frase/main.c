#include <stdio.h>
#include <string.h>

int main(void) {
    char frase[500];

    printf("Inserire una frase: ");
    fgets(frase, sizeof(frase), stdin);
    frase[strlen(frase)-1] = '\0';

    int lunghezza=0, minuscole=0, maiuscole=0;
    int vocali=0, consonanti=0, cifre=0;
    for(int i=0; frase[i]!='\0'; i++){
        lunghezza++;

        if(frase[i]>='a' && frase[i]<='z')
            minuscole++;
        if(frase[i]>='A' && frase[i]<='Z')
            maiuscole++;

        if( (frase[i]>='a' && frase[i]<='z') || (frase[i]>='A' && frase[i]<='Z') ){
            if(frase[i]=='a' || frase[i]=='e' || frase[i]=='i' || frase[i]=='o' || frase[i]=='u')
                vocali++;
            else if(frase[i]=='A' || frase[i]=='E' || frase[i]=='I' || frase[i]=='O' || frase[i]=='U')
                vocali++;
            else
                consonanti++;
        }

        if(frase[i]>='0' && frase[i]<='9')
            cifre++;
    }

    int parole=0, inizio=0;
    for(int i=0; frase[i]!='\0'; i++){
        if( inizio==0 && frase[i]!=' ' && frase[i]!='\t' )
            inizio=1;
        else if( inizio==1 && (frase[i]==' ' || frase[i]=='\t') ){
            inizio=0;
            parole++;
        }
    }
    if(inizio==1)
        parole++;
    
    printf("La frase è lunga %d caratteri\n", lunghezza);
    printf("Ha %d minuscole e %d maiuscole\n", minuscole, maiuscole);
    printf("Ha %d vocali e %d consonanti\n", vocali, consonanti);
    printf("Ha %d cifre e %d parole\n", cifre, parole);

    return 0;
}