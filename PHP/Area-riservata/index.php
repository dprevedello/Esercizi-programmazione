<?php
require __DIR__ . "/../includes/auth_db.php";
require __DIR__ . "/../includes/connessione.php";

richiediLogin();
$utente = utenteCorrente();

$stmt = connetti("negozio")->prepare("SELECT COUNT(*) AS n, COALESCE(SUM(totale), 0) AS speso FROM ordini WHERE id_utente = :id");
$stmt->execute(["id" => $utente["id"]]);
$riepilogo = $stmt->fetch();
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>La mia area</title>
    <link rel="stylesheet" href="../includes/stile.css">
</head>
<body>
<nav class="menu">
    <a href="index.php" class="attiva">Home</a>
    <a href="ordini.php">I miei ordini</a>
    <a href="profilo.php">Profilo</a>
    <a href="logout.php">Esci (<?= htmlspecialchars($utente["username"]) ?>)</a>
</nav>
<main>
    <h1>Bentornato, <?= htmlspecialchars($utente["username"]) ?></h1>
    <div class="scheda">
        <p>Hai effettuato <strong><?= $riepilogo["n"] ?></strong> ordini per un totale di
        <strong>€ <?= number_format((float) $riepilogo["speso"], 2, ",", ".") ?></strong>.</p>
    </div>
</main>
</body>
</html>
