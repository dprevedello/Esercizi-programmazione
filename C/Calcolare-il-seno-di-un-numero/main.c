#include <stdio.h>
#include <math.h>

double grad_rad(double gradi);
long double fattoriale(int n);
long double sen_taylor(double x, int n);

int main(){
	double gradi;
	int grado_polinomio;

	printf("Inserire un angolo in gradi: ");
	scanf("%lf", &gradi);

	do {
		printf("Inserire il grado del polinomio di Taylor: ");
		scanf("%d", &grado_polinomio);
		if(grado_polinomio <= 0)
			printf("ERRORE: il numero deve essere strettamente positivo.\n\n");
	} while(grado_polinomio <= 0);

	double radianti = grad_rad(gradi);

	printf("\nCalcoliamolo e paragoniamolo con il valore della libreria del C:\n");
	printf("sen(%.2lf) = %.10Lf\n", gradi, sen_taylor(radianti, grado_polinomio));
	printf("sin(%.2lf) = %.10lf\n", gradi, sin(radianti));
	printf("Errore di: %.10Lf\n", sin(radianti) - sen_taylor(radianti, grado_polinomio));

	return 0;
}

double grad_rad(double gradi){
	return gradi * M_PI / 180.0;
}

long double fattoriale(int n){
	if(n == 0)
		return 1;
	return n * fattoriale(n-1);
}

long double sen_taylor(double x, int n){
	if(n < 0)
		return 0;
	return pow(-1, n) * pow(x, 2*n+1) / fattoriale(2*n+1) + sen_taylor(x, n-1);
}