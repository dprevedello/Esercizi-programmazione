<?php
session_start();
require __DIR__ . "/../includes/connessione.php";
require __DIR__ . "/../includes/flash.php";

$pdo = connetti("biblioteca");
$libri = $pdo->query("SELECT id, titolo, anno, genere FROM libri ORDER BY titolo")->fetchAll();
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Catalogo della biblioteca</title>
    <link rel="stylesheet" href="../includes/stile.css">
</head>
<body>
<main>
    <h1>Catalogo della biblioteca</h1>
    <?php mostraFlash(); ?>

    <table>
        <tr><th>Titolo</th><th>Anno</th><th>Genere</th><th></th></tr>
        <?php foreach ($libri as $l): ?>
            <tr>
                <td><?= htmlspecialchars($l["titolo"]) ?></td>
                <td><?= $l["anno"] ?></td>
                <td><?= htmlspecialchars($l["genere"]) ?></td>
                <td><a href="modifica.php?id=<?= $l["id"] ?>">Modifica</a></td>
            </tr>
        <?php endforeach; ?>
    </table>
</main>
</body>
</html>
