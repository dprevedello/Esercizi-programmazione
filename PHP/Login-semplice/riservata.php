<?php
session_start();

// Pagina protetta: senza utente nella sessione si torna al login
if (!isset($_SESSION["utente"])) {
    header("Location: login.php");
    exit;
}
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
    <h1>Area riservata</h1>
    <p class="messaggio ok">Benvenuto, <strong><?= htmlspecialchars($_SESSION["utente"]) ?></strong>! Solo chi ha effettuato l'accesso può vedere questa pagina.</p>
    <p><a href="logout.php">Esci</a></p>
</main>
</body>
</html>
