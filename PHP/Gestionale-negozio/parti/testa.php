<?php
// Intestazione comune a tutte le pagine del gestionale.
// Si usa dopo aver controllato l'accesso: richiede $titolo e $pagina (nome della voce di menu attiva).
$utente = utenteCorrente();
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= htmlspecialchars($titolo) ?> – Gestionale</title>
    <link rel="stylesheet" href="../includes/stile.css">
</head>
<body>
<nav class="menu">
    <a href="index.php"<?= $pagina === "elenco" ? ' class="attiva"' : "" ?>>Prodotti</a>
    <a href="prodotto.php"<?= $pagina === "nuovo" ? ' class="attiva"' : "" ?>>Nuovo prodotto</a>
    <a href="logout.php">Esci (<?= htmlspecialchars($utente["username"]) ?>)</a>
</nav>
<main>
    <h1><?= htmlspecialchars($titolo) ?></h1>
    <?php mostraFlash(); ?>
