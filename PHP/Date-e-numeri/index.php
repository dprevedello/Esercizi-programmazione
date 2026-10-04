<?php
date_default_timezone_set("Europe/Rome");

$voci = [
    ["descrizione" => "Sito web vetrina",     "prezzo" => 850.00, "quantita" => 1],
    ["descrizione" => "Ore di assistenza",    "prezzo" => 45.50,  "quantita" => 6],
    ["descrizione" => "Dominio e hosting",    "prezzo" => 79.90,  "quantita" => 1],
];
$aliquotaIva = 22;

// Data di emissione fissa (mktime: ora, minuti, secondi, mese, giorno, anno)
$emissione = mktime(0, 0, 0, 10, 4, 2026);
$scadenza  = strtotime("+30 days", $emissione);

echo "PREVENTIVO del " . date("d/m/Y", $emissione) . "\n";
echo "Valido fino al " . date("d/m/Y", $scadenza) . "\n";
echo str_repeat("-", 44) . "\n";

$imponibile = 0;
foreach ($voci as $v) {
    $importo = $v["prezzo"] * $v["quantita"];
    $imponibile += $importo;
    // number_format(numero, decimali, separatore decimale, separatore migliaia)
    printf("%-20s %2d x %8s = %9s\n",
        $v["descrizione"],
        $v["quantita"],
        number_format($v["prezzo"], 2, ",", "."),
        number_format($importo, 2, ",", "."));
}

$iva = $imponibile * $aliquotaIva / 100;
$totale = $imponibile + $iva;

echo str_repeat("-", 44) . "\n";
echo "Imponibile: " . number_format($imponibile, 2, ",", ".") . " euro\n";
echo "IVA $aliquotaIva%: " . number_format($iva, 2, ",", ".") . " euro\n";
echo "TOTALE: " . number_format($totale, 2, ",", ".") . " euro\n\n";

// Arrotondamenti
echo "round(7.456, 2) = " . round(7.456, 2) . "\n";
echo "floor(7.9) = " . floor(7.9) . "\n";
echo "ceil(7.1) = " . ceil(7.1) . "\n";
echo "Rate da 3 (arrotondate per eccesso al centesimo): " .
    number_format(ceil($totale / 3 * 100) / 100, 2, ",", ".") . " euro\n";
