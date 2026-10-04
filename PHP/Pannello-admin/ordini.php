<?php
require __DIR__ . "/../includes/auth_db.php";
require __DIR__ . "/../includes/connessione.php";

richiediRuolo("admin");
$utente = utenteCorrente();

$ordini = connetti("negozio")->query(
    "SELECT o.id, o.data_ordine, o.totale, u.username,
            (SELECT SUM(r.quantita) FROM righe_ordine r WHERE r.id_ordine = o.id) AS pezzi
     FROM ordini o JOIN utenti u ON u.id = o.id_utente
     ORDER BY o.data_ordine DESC"
)->fetchAll();
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tutti gli ordini</title>
    <link rel="stylesheet" href="../includes/stile.css">
</head>
<body>
<nav class="menu">
    <a href="index.php">Riepilogo</a>
    <a href="prodotti.php">Prodotti</a>
    <a href="ordini.php" class="attiva">Ordini</a>
    <a href="logout.php">Esci (<?= htmlspecialchars($utente["username"]) ?>)</a>
</nav>
<main>
    <h1>Tutti gli ordini</h1>
    <table>
        <tr><th>N.</th><th>Data</th><th>Cliente</th><th class="destra">Pezzi</th><th class="destra">Totale</th></tr>
        <?php foreach ($ordini as $o): ?>
            <tr>
                <td><?= $o["id"] ?></td>
                <td><?= date("d/m/Y H:i", strtotime($o["data_ordine"])) ?></td>
                <td><?= htmlspecialchars($o["username"]) ?></td>
                <td class="destra"><?= $o["pezzi"] ?></td>
                <td class="destra">€ <?= number_format((float) $o["totale"], 2, ",", ".") ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</main>
</body>
</html>
