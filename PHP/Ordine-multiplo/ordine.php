<?php
require __DIR__ . "/../includes/connessione.php";

$pdo = connetti("negozio");

$id = (int) ($_GET["id"] ?? 0);

$stmt = $pdo->prepare("SELECT id, data_ordine, totale FROM ordini WHERE id = :id");
$stmt->execute(["id" => $id]);
$ordine = $stmt->fetch();

if ($ordine === false) {
    http_response_code(404);
} else {
    $stmt = $pdo->prepare(
        "SELECT p.nome, r.quantita, r.prezzo_unitario
         FROM righe_ordine r
         JOIN prodotti p ON p.id = r.id_prodotto
         WHERE r.id_ordine = :id
         ORDER BY p.nome"
    );
    $stmt->execute(["id" => $id]);
    $righe = $stmt->fetchAll();
}
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Riepilogo ordine</title>
    <link rel="stylesheet" href="../includes/stile.css">
</head>
<body>
<main>
    <?php if ($ordine === false): ?>
        <p class="messaggio ko">Ordine non trovato.</p>
    <?php else: ?>
        <h1>Ordine n. <?= $ordine["id"] ?></h1>
        <p class="messaggio ok">Ordine registrato il <?= date("d/m/Y H:i", strtotime($ordine["data_ordine"])) ?>.</p>
        <table>
            <tr><th>Prodotto</th><th class="destra">Quantità</th><th class="destra">Prezzo</th><th class="destra">Subtotale</th></tr>
            <?php foreach ($righe as $r): ?>
                <tr>
                    <td><?= htmlspecialchars($r["nome"]) ?></td>
                    <td class="destra"><?= $r["quantita"] ?></td>
                    <td class="destra">€ <?= number_format((float) $r["prezzo_unitario"], 2, ",", ".") ?></td>
                    <td class="destra">€ <?= number_format($r["prezzo_unitario"] * $r["quantita"], 2, ",", ".") ?></td>
                </tr>
            <?php endforeach; ?>
            <tr><th colspan="3" class="destra">Totale</th><th class="destra">€ <?= number_format((float) $ordine["totale"], 2, ",", ".") ?></th></tr>
        </table>
    <?php endif; ?>
    <p><a href="index.php">&larr; Nuovo ordine</a></p>
</main>
</body>
</html>
