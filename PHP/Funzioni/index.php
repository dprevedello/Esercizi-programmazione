<?php
// Parametro con valore predefinito e tipo di ritorno dichiarato
function saluta(string $nome, string $saluto = "Ciao"): string
{
    return "$saluto, $nome!";
}

function ePrimo(int $n): bool
{
    if ($n < 2) {
        return false;
    }
    for ($d = 2; $d * $d <= $n; $d++) {
        if ($n % $d === 0) {
            return false;
        }
    }
    return true;
}

function fattoriale(int $n): int
{
    return $n <= 1 ? 1 : $n * fattoriale($n - 1);
}

function conIva(float $prezzo, float $aliquota = 22): float
{
    return $prezzo * (1 + $aliquota / 100);
}

// Passaggio per riferimento: la & permette alla funzione di modificare la variabile originale
function incrementa(int &$x): void
{
    $x++;
}

echo saluta("Giulia") . "\n";
echo saluta("Marco", "Buongiorno") . "\n";

echo "Numeri primi fino a 30:";
for ($i = 1; $i <= 30; $i++) {
    if (ePrimo($i)) {
        echo " " . $i;
    }
}
echo "\n";

echo "Fattoriale di 6: " . fattoriale(6) . "\n";
echo "100 euro con IVA al 22%: " . conIva(100) . "\n";
echo "100 euro con IVA al 10%: " . conIva(100, 10) . "\n";

$valore = 5;
incrementa($valore);
echo "Dopo incrementa(): $valore\n";

// Scope: una variabile creata fuori dalla funzione NON è visibile dentro
$esterna = "visibile solo fuori";
function provaScope(): void
{
    echo isset($esterna) ? "La vedo\n" : "Dentro la funzione \$esterna non esiste\n";
}
provaScope();
