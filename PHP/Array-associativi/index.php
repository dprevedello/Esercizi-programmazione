<?php
// Array associativo: ogni valore è identificato da una chiave (qui il nome)
$rubrica = [
    "Giulia" => "333 1234567",
    "Marco"  => "347 7654321",
    "Sara"   => "320 1112233",
];

echo "Numero di contatti: " . count($rubrica) . "\n";
echo "Il numero di Marco è " . $rubrica["Marco"] . "\n\n";

// Aggiungere e modificare
$rubrica["Luca"] = "331 4445566";
$rubrica["Sara"] = "320 9998877";

// Controllare se una chiave esiste
foreach (["Luca", "Elena"] as $nome) {
    if (isset($rubrica[$nome])) {
        echo "$nome è in rubrica.\n";
    } else {
        echo "$nome NON è in rubrica.\n";
    }
}

// Rimuovere
unset($rubrica["Giulia"]);

// Ordinare per chiave e scorrere chiave => valore
ksort($rubrica);
echo "\nRubrica in ordine alfabetico:\n";
foreach ($rubrica as $nome => $telefono) {
    echo "- $nome: $telefono\n";
}

// Solo le chiavi e solo i valori
echo "\nNomi: " . implode(", ", array_keys($rubrica)) . "\n";
echo "Numeri: " . implode(" | ", array_values($rubrica)) . "\n";

// Cercare la chiave a partire dal valore
echo "Il numero 347 7654321 è di " . array_search("347 7654321", $rubrica) . "\n";
