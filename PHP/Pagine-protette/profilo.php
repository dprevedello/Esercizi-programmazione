<?php
require __DIR__ . "/auth.php";
richiediLogin();
$utente = utenteCorrente();
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profilo</title>
    <link rel="stylesheet" href="../includes/stile.css">
</head>
<body>
<main>
    <h1>Il tuo profilo</h1>
    <div class="scheda">
        <p>Utente: <strong><?= htmlspecialchars($utente["nome"]) ?></strong></p>
        <p>Ruolo: <strong><?= htmlspecialchars($utente["ruolo"]) ?></strong></p>
    </div>
    <p><a href="index.php">&larr; Home</a></p>
</main>
</body>
</html>
