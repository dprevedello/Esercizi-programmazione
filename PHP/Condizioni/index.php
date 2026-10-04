<?php
echo "Voto (0-10): ";
$voto = (int) trim(fgets(STDIN));
echo $voto . "\n";

if ($voto < 0 || $voto > 10) {
    echo "Voto non valido.\n";
} else {
    // match restituisce un valore: la prima condizione vera vince
    $giudizio = match (true) {
        $voto < 4   => "Gravemente insufficiente",
        $voto < 6   => "Insufficiente",
        $voto === 6 => "Sufficiente",
        $voto === 7 => "Discreto",
        $voto === 8 => "Buono",
        default     => "Ottimo",
    };
    echo "Giudizio: $giudizio\n";

    // Operatore ternario: condizione ? valore_se_vera : valore_se_falsa
    $esito = $voto >= 6 ? "promosso" : "da recuperare";
    echo "Esito: $esito\n";

    if ($voto === 10) {
        echo "Complimenti, è il massimo!\n";
    } elseif ($voto >= 8) {
        echo "Ottimo lavoro!\n";
    }
}

// Operatore ?? : usa il valore di sinistra se esiste, altrimenti quello di destra
$nota = null;
echo "Nota del docente: " . ($nota ?? "nessuna nota") . "\n";
