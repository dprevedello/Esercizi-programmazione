<?php
require __DIR__ . "/../includes/auth_db.php";

richiediLogin();
$utente = utenteCorrente();
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Area riservata</title>
    <link rel="stylesheet" href="../includes/stile.css">
</head>
<body>
<main>
    <h1>Ciao, <?= htmlspecialchars($utente["username"]) ?>!</h1>
    <p>Sei autenticato con ruolo <strong><?= htmlspecialchars($utente["ruolo"]) ?></strong>.</p>
    <p><a href="logout.php">Esci</a></p>
</main>
</body>
</html>
