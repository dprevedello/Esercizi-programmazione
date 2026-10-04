<?php
// Listini ammessi: tutto ciò che arriva dal modulo va confrontato con questi array
$prezziDimensione = ["piccola" => 5.00, "media" => 7.00, "grande" => 9.00];
$extraImpasto     = ["classico" => 0.00, "integrale" => 1.00, "senzaglutine" => 2.00];
$ingredientiExtra = ["prosciutto" => "Prosciutto", "funghi" => "Funghi", "olive" => "Olive", "salame" => "Salame piccante"];
$prezzoIngrediente = 1.50;
$costoConsegna = 2.00;

$dimensione = $_POST["dimensione"] ?? "";
$impasto    = $_POST["impasto"] ?? "";
$quantita   = (int) ($_POST["quantita"] ?? 0);
$consegna   = isset($_POST["consegna"]);

// Se nessuna casella è selezionata, il campo "extra" non viene proprio inviato
$extra = $_POST["extra"] ?? [];
if (!is_array($extra)) {
    $extra = [];
}
$extra = array_values(array_intersect($extra, array_keys($ingredientiExtra)));

$valido = isset($prezziDimensione[$dimensione])
    && isset($extraImpasto[$impasto])
    && $quantita >= 1 && $quantita <= 10;

if ($valido) {
    $prezzoUnitario = $prezziDimensione[$dimensione] + $extraImpasto[$impasto] + count($extra) * $prezzoIngrediente;
    $totale = $prezzoUnitario * $quantita + ($consegna ? $costoConsegna : 0);
}
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Riepilogo ordine</title>
    <link rel="stylesheet" href="../includes/stile.css">
</head>
<body>
<main>
    <?php if (!$valido): ?>
        <p class="messaggio ko">Ordine non valido: torna al modulo e riprova.</p>
    <?php else: ?>
        <h1>Riepilogo ordine</h1>
        <div class="scheda">
            <p><strong><?= $quantita ?></strong> pizza/e <strong><?= $dimensione ?></strong>, impasto <strong><?= $impasto ?></strong>.</p>
            <?php if (count($extra) > 0): ?>
                <p>Ingredienti extra:</p>
                <ul>
                    <?php foreach ($extra as $chiave): ?>
                        <li><?= $ingredientiExtra[$chiave] ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <p class="tenue">Nessun ingrediente extra.</p>
            <?php endif; ?>
            <p>Consegna: <?= $consegna ? "a domicilio" : "ritiro in negozio" ?></p>
            <p class="prezzo">Totale: € <?= number_format($totale, 2, ",", ".") ?></p>
        </div>
    <?php endif; ?>
    <p><a href="index.html">&larr; Nuovo ordine</a></p>
</main>
</body>
</html>
