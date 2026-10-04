<?php
require __DIR__ . "/../includes/auth_db.php";
require __DIR__ . "/../includes/connessione.php";

richiediLogin();
$utente = utenteCorrente();

$stmt = connetti("negozio")->prepare("SELECT username, email, ruolo, creato_il FROM utenti WHERE id = :id");
$stmt->execute(["id" => $utente["id"]]);
$dati = $stmt->fetch();
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Il mio profilo</title>
    <link rel="stylesheet" href="../includes/stile.css">
</head>
<body>
<nav class="menu">
    <a href="index.php">Home</a>
    <a href="ordini.php">I miei ordini</a>
    <a href="profilo.php" class="attiva">Profilo</a>
    <a href="logout.php">Esci (<?= htmlspecialchars($utente["username"]) ?>)</a>
</nav>
<main>
    <h1>Il mio profilo</h1>
    <table>
        <tr><th>Nome utente</th><td><?= htmlspecialchars($dati["username"]) ?></td></tr>
        <tr><th>Email</th><td><?= htmlspecialchars($dati["email"]) ?></td></tr>
        <tr><th>Ruolo</th><td><?= htmlspecialchars($dati["ruolo"]) ?></td></tr>
        <tr><th>Iscritto dal</th><td><?= date("d/m/Y", strtotime($dati["creato_il"])) ?></td></tr>
    </table>
</main>
</body>
</html>
