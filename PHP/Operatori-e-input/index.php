<?php
// Lettura da tastiera: fgets(STDIN) legge una riga, trim() toglie l'a capo finale
echo "Primo numero: ";
$a = (int) trim(fgets(STDIN));
echo $a . "\n";
echo "Secondo numero: ";
$b = (int) trim(fgets(STDIN));
echo $b . "\n\n";

echo "Somma: " . ($a + $b) . "\n";
echo "Differenza: " . ($a - $b) . "\n";
echo "Prodotto: " . ($a * $b) . "\n";

if ($b === 0) {
    echo "Divisione impossibile: il secondo numero è zero.\n";
} else {
    echo "Divisione: " . ($a / $b) . "\n";
    echo "Divisione intera: " . intdiv($a, $b) . "\n";
    echo "Resto: " . ($a % $b) . "\n";
}
echo "$a elevato a $b: " . ($a ** $b) . "\n\n";

// == confronta solo il valore, === confronta anche il tipo
$testo = "17";
echo '"17" == 17  -> ' . var_export($testo == $a, true) . "\n";
echo '"17" === 17 -> ' . var_export($testo === $a, true) . "\n";

// Operatori di assegnamento composto e incremento
$contatore = 10;
$contatore += 5;
$contatore++;
echo "Contatore: $contatore\n";
