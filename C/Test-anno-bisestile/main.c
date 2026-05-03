#include <stdio.h>

int main(){
    int anno;
    
    printf("Inserire un anno: ");
    scanf("%d", &anno);
    
    if( (anno%4 == 0 && anno%100 != 0) || anno%400 == 0 )
        printf("\nIl %d è un anno bisestile!\n", anno);
    else
        printf("\nIl %d NON è un anno bisestile!\n", anno);
        
    return 0;
}
