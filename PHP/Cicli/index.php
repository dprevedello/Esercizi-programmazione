<?php
echo "Numero: ";
$n = (int) trim(fgets(STDIN));
echo $n . "\n\n";

// for: la tabellina
echo "Tabellina del $n:\n";
for ($i = 1; $i <= 10; $i++) {
    echo "$n x $i = " . ($n * $i) . "\n";
}

// for annidati: un triangolo di asterischi
echo "\nTriangolo:\n";
for ($riga = 1; $riga <= $n; $riga++) {
    for ($k = 0; $k < $riga; $k++) {
        echo "*";
    }
    echo "\n";
}

// while: conto alla rovescia
echo "\nConto alla rovescia: ";
$c = $n;
while ($c > 0) {
    echo $c . " ";
    $c--;
}
echo "Via!\n";

// foreach: scorre tutti gli elementi di un array
$colori = ["rosso", "verde", "blu"];
echo "\nColori:\n";
foreach ($colori as $colore) {
    echo "- $colore\n";
}

// do-while: il corpo viene eseguito almeno una volta
$somma = 0;
$k = 1;
do {
    $somma += $k;
    $k++;
} while ($k <= $n);
echo "\nSomma dei numeri da 1 a $n: $somma\n";
