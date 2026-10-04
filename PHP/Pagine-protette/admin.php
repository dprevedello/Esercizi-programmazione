<?php
require __DIR__ . "/auth.php";
require __DIR__ . "/utenti.php";
richiediRuolo("admin");
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Amministrazione</title>
    <link rel="stylesheet" href="../includes/stile.css">
</head>
<body>
<main>
    <h1>Pannello di amministrazione</h1>
    <p>Utenti registrati:</p>
    <ul>
        <?php foreach ($utenti as $nome => $dati): ?>
            <li><?= htmlspecialchars($nome) ?> (<?= $dati["ruolo"] ?>)</li>
        <?php endforeach; ?>
    </ul>
    <p><a href="index.php">&larr; Home</a></p>
</main>
</body>
</html>
