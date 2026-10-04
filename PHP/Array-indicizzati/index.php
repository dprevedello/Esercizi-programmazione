<?php
$voti = [7, 5.5, 8, 6, 9, 4.5, 7.5];

echo "Voti: " . implode(", ", $voti) . "\n";
echo "Numero di voti: " . count($voti) . "\n";
echo "Primo voto: " . $voti[0] . "\n";
echo "Ultimo voto: " . $voti[count($voti) - 1] . "\n";

$somma = array_sum($voti);
echo "Somma: $somma\n";
echo "Media: " . round($somma / count($voti), 2) . "\n";
echo "Voto massimo: " . max($voti) . "\n";
echo "Voto minimo: " . min($voti) . "\n";

// Aggiungere un elemento in coda
$voti[] = 10;
array_push($voti, 6.5);
echo "Dopo le aggiunte (" . count($voti) . " voti): " . implode(", ", $voti) . "\n";

// Ricerca
echo "C'è un 10? " . (in_array(10, $voti) ? "sì" : "no") . "\n";
echo "Il 9 è in posizione " . array_search(9, $voti) . "\n";

// Ordinamento (modifica l'array originale)
sort($voti);
echo "Ordinati: " . implode(", ", $voti) . "\n";
rsort($voti);
echo "Dal più alto: " . implode(", ", $voti) . "\n";

// Ultimi tre elementi
echo "I tre migliori: " . implode(", ", array_slice($voti, 0, 3)) . "\n";

// foreach con indice
foreach ($voti as $posizione => $v) {
    if ($v < 6) {
        echo "Insufficienza alla posizione $posizione: $v\n";
    }
}
