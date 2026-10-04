<?php
// Un elenco di record: ogni elemento è a sua volta un array associativo.
// Questa è la stessa forma dei dati che leggerai dai database con PDO.
$studenti = [
    ["nome" => "Giulia", "classe" => "4AINF", "voto" => 8],
    ["nome" => "Marco",  "classe" => "4AINF", "voto" => 5],
    ["nome" => "Sara",   "classe" => "5AINF", "voto" => 9],
    ["nome" => "Luca",   "classe" => "5AINF", "voto" => 6],
    ["nome" => "Elena",  "classe" => "4AINF", "voto" => 7],
];

echo "Elenco studenti:\n";
foreach ($studenti as $s) {
    printf("%-8s %-6s %2d\n", $s["nome"], $s["classe"], $s["voto"]);
}

// Media di una "colonna": array_column estrae un solo campo da tutti i record
$voti = array_column($studenti, "voto");
echo "\nMedia: " . array_sum($voti) / count($voti) . "\n";

// Filtro scritto a mano
echo "\nSolo la 5AINF:\n";
foreach ($studenti as $s) {
    if ($s["classe"] === "5AINF") {
        echo "- " . $s["nome"] . "\n";
    }
}

// Ordinamento con funzione di confronto: usort + funzione freccia
usort($studenti, fn($x, $y) => $y["voto"] <=> $x["voto"]);
echo "\nClassifica:\n";
foreach ($studenti as $posizione => $s) {
    echo ($posizione + 1) . ". " . $s["nome"] . " (" . $s["voto"] . ")\n";
}

// Raggruppare per classe
$perClasse = [];
foreach ($studenti as $s) {
    $perClasse[$s["classe"]][] = $s["nome"];
}
echo "\nPer classe:\n";
foreach ($perClasse as $classe => $nomi) {
    echo "$classe: " . implode(", ", $nomi) . "\n";
}
