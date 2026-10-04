<?php
// Variabili: iniziano con $ e non hanno bisogno di un tipo dichiarato
$nome = "Giulia";
$eta = 17;
$citta = "Gallarate";
$altezza = 1.68;
$maggiorenne = $eta >= 18;

// Interpolazione: dentro le virgolette doppie la variabile viene sostituita col suo valore
echo "Ciao, mi chiamo $nome e ho $eta anni.\n";

// Concatenazione: il punto unisce due stringhe
echo "Abito a " . $citta . ".\n";
echo "Altezza: {$altezza} m\n";

// Un calcolo dentro una stringa va fatto fuori dalle virgolette
$anno = 2026;
echo "Compirò 100 anni nel " . ($anno + (100 - $eta)) . ".\n";

// Il tipo viene deciso da PHP in base al valore
echo "\nI tipi delle variabili:\n";
echo '$nome è ' . gettype($nome) . "\n";
echo '$eta è ' . gettype($eta) . "\n";
echo '$altezza è ' . gettype($altezza) . "\n";
echo '$maggiorenne è ' . gettype($maggiorenne) . "\n";
var_dump($maggiorenne);
