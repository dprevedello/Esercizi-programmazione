<?php
session_start();
require __DIR__ . "/../includes/connessione.php";
require __DIR__ . "/../includes/flash.php";

$pdo = connetti("biblioteca");
$libri = $pdo->query("SELECT id, titolo, anno FROM libri ORDER BY id")->fetchAll();
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gestione libri</title>
    <link rel="stylesheet" href="../includes/stile.css">
</head>
<body>
<main>
    <h1>Gestione dei libri</h1>
    <?php mostraFlash(); ?>

    <table>
        <tr><th>#</th><th>Titolo</th><th>Anno</th><th></th></tr>
        <?php foreach ($libri as $l): ?>
            <tr>
                <td><?= $l["id"] ?></td>
                <td><?= htmlspecialchars($l["titolo"]) ?></td>
                <td><?= $l["anno"] ?></td>
                <td><a href="elimina.php?id=<?= $l["id"] ?>">Elimina…</a></td>
            </tr>
        <?php endforeach; ?>
    </table>
</main>
</body>
</html>
