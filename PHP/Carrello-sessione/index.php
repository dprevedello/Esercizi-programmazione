<?php
session_start();
require __DIR__ . "/prodotti.php";

$carrello = $_SESSION["carrello"] ?? [];
$articoli = array_sum($carrello);
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Negozio</title>
    <link rel="stylesheet" href="../includes/stile.css">
</head>
<body>
<main>
    <h1>Negozio di informatica</h1>
    <p><a href="carrello.php">Vai al carrello (<?= $articoli ?> articoli)</a></p>

    <div class="griglia">
        <?php foreach ($prodotti as $id => $p): ?>
            <div class="scheda">
                <h2><?= $p["nome"] ?></h2>
                <p class="prezzo">€ <?= number_format($p["prezzo"], 2, ",", ".") ?></p>
                <form method="post" action="carrello.php">
                    <input type="hidden" name="azione" value="aggiungi">
                    <input type="hidden" name="id" value="<?= $id ?>">
                    <button type="submit">Aggiungi al carrello</button>
                </form>
            </div>
        <?php endforeach; ?>
    </div>
</main>
</body>
</html>
