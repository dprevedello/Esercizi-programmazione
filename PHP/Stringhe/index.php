<?php
echo "Scrivi una frase: ";
$frase = trim(fgets(STDIN));
echo $frase . "\n\n";

echo "Lunghezza: " . strlen($frase) . " caratteri\n";
echo "Parole: " . str_word_count($frase) . "\n";
echo "Maiuscolo: " . strtoupper($frase) . "\n";
echo "Minuscolo: " . strtolower($frase) . "\n";
echo "Iniziali maiuscole: " . ucwords($frase) . "\n";
echo "Al contrario: " . strrev($frase) . "\n";

// Ricerca dentro una stringa (stripos ignora maiuscole/minuscole)
echo "Contiene 'php'? " . (stripos($frase, "php") !== false ? "sì" : "no") . "\n";
echo "Contiene 'java'? " . (str_contains(strtolower($frase), "java") ? "sì" : "no") . "\n";
echo "Inizia con 'Il'? " . (str_starts_with($frase, "Il") ? "sì" : "no") . "\n";

// Sostituzione
echo "Sostituita: " . str_replace("web", "server", $frase) . "\n";

// Spezzare in parole e trovare la più lunga
$parole = explode(" ", $frase);
$piuLunga = "";
foreach ($parole as $p) {
    if (strlen($p) > strlen($piuLunga)) {
        $piuLunga = $p;
    }
}
echo "Parola più lunga: $piuLunga\n";
$ordinate = $parole;
sort($ordinate);
echo "Parole in ordine alfabetico: " . implode(" ", $ordinate) . "\n";

// Una porzione di stringa: substr(testo, inizio, lunghezza)
echo "Prime 10 lettere: " . substr($frase, 0, 10) . "\n";

// Palindromo: uguale se letto al contrario (ignorando maiuscole)
function ePalindroma(string $s): bool
{
    $s = strtolower($s);
    return $s === strrev($s);
}
foreach (["Anna", "ingegni", "PHP"] as $p) {
    echo "$p " . (ePalindroma($p) ? "è" : "non è") . " palindroma\n";
}
