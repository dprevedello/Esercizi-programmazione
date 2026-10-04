<?php
require __DIR__ . "/../includes/auth_db.php";
require __DIR__ . "/../includes/flash.php";

richiediLogin();
$utente = utenteCorrente();
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Il mio account</title>
    <link rel="stylesheet" href="../includes/stile.css">
</head>
<body>
<main>
    <h1>Ciao, <?= htmlspecialchars($utente["username"]) ?></h1>
    <?php mostraFlash(); ?>
    <p><a href="password.php">Cambia la password</a> · <a href="logout.php">Esci</a></p>
</main>
</body>
</html>
