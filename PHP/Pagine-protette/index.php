<?php
require __DIR__ . "/auth.php";
$utente = utenteCorrente();
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link rel="stylesheet" href="../includes/stile.css">
</head>
<body>
<nav class="menu">
    <a href="index.php">Home</a>
    <?php if ($utente !== null): ?>
        <a href="profilo.php">Profilo</a>
        <?php if ($utente["ruolo"] === "admin"): ?>
            <a href="admin.php">Amministrazione</a>
        <?php endif; ?>
        <a href="logout.php">Esci (<?= htmlspecialchars($utente["nome"]) ?>)</a>
    <?php else: ?>
        <a href="login.php">Accedi</a>
    <?php endif; ?>
</nav>
<main>
    <h1>Benvenuto nel sito</h1>
    <p>Questa pagina è pubblica. Il <strong>profilo</strong> richiede l'accesso, l'<strong>amministrazione</strong> è riservata agli amministratori.</p>
</main>
</body>
</html>
