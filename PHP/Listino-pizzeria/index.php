<?php
$pizze = [
    ["nome" => "Margherita",     "ingredienti" => "pomodoro, mozzarella, basilico",         "prezzo" => 6.50, "vegetariana" => true],
    ["nome" => "Marinara",       "ingredienti" => "pomodoro, aglio, origano",               "prezzo" => 5.00, "vegetariana" => true],
    ["nome" => "Diavola",        "ingredienti" => "pomodoro, mozzarella, salame piccante",  "prezzo" => 8.00, "vegetariana" => false],
    ["nome" => "Quattro formaggi","ingredienti" => "mozzarella, gorgonzola, fontina, grana", "prezzo" => 9.00, "vegetariana" => true],
    ["nome" => "Capricciosa",    "ingredienti" => "pomodoro, mozzarella, prosciutto, funghi, carciofi", "prezzo" => 9.50, "vegetariana" => false],
];

$totale = 0;
foreach ($pizze as $p) {
    $totale += $p["prezzo"];
}
$media = $totale / count($pizze);
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Listino della pizzeria</title>
    <link rel="stylesheet" href="../includes/stile.css">
</head>
<body>
<main>
    <h1>Pizzeria Da Mario – Listino</h1>

    <table>
        <thead>
            <tr>
                <th>Pizza</th>
                <th>Ingredienti</th>
                <th class="destra">Prezzo</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pizze as $i => $p): ?>
                <tr<?= $i % 2 === 1 ? ' class="alterna"' : '' ?>>
                    <td>
                        <?= $p["nome"] ?>
                        <?php if ($p["vegetariana"]): ?>
                            <span title="Vegetariana">🌱</span>
                        <?php endif; ?>
                    </td>
                    <td><?= $p["ingredienti"] ?></td>
                    <td class="destra prezzo">€ <?= number_format($p["prezzo"], 2, ",", ".") ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <p class="tenue">
        <?= count($pizze) ?> pizze in listino – prezzo medio
        € <?= number_format($media, 2, ",", ".") ?>.
    </p>
</main>
</body>
</html>
