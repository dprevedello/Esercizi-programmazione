<?php
require __DIR__ . "/../includes/auth_db.php";
require __DIR__ . "/../includes/connessione.php";

// Chi non è loggato va al login; chi è loggato ma non è admin riceve 403
richiediRuolo("admin");
$utente = utenteCorrente();
$pdo = connetti("negozio");

$stat = $pdo->query(
    "SELECT (SELECT COUNT(*) FROM prodotti) AS prodotti,
            (SELECT COUNT(*) FROM prodotti WHERE giacenza < 10) AS in_esaurimento,
            (SELECT COUNT(*) FROM ordini) AS ordini,
            (SELECT COALESCE(SUM(totale), 0) FROM ordini) AS incasso,
            (SELECT COUNT(*) FROM utenti) AS utenti"
)->fetch();
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pannello amministratore</title>
    <link rel="stylesheet" href="../includes/stile.css">
</head>
<body>
<nav class="menu">
    <a href="index.php" class="attiva">Riepilogo</a>
    <a href="prodotti.php">Prodotti</a>
    <a href="ordini.php">Ordini</a>
    <a href="logout.php">Esci (<?= htmlspecialchars($utente["username"]) ?>)</a>
</nav>
<main>
    <h1>Pannello amministratore</h1>
    <div class="griglia">
        <div class="scheda"><p class="tenue">Prodotti</p><p class="prezzo"><?= $stat["prodotti"] ?></p></div>
        <div class="scheda"><p class="tenue">In esaurimento (&lt; 10)</p><p class="prezzo"><?= $stat["in_esaurimento"] ?></p></div>
        <div class="scheda"><p class="tenue">Ordini</p><p class="prezzo"><?= $stat["ordini"] ?></p></div>
        <div class="scheda"><p class="tenue">Incasso</p><p class="prezzo">€ <?= number_format((float) $stat["incasso"], 2, ",", ".") ?></p></div>
        <div class="scheda"><p class="tenue">Utenti</p><p class="prezzo"><?= $stat["utenti"] ?></p></div>
    </div>
</main>
</body>
</html>
