<?php
require __DIR__ . "/../includes/auth_db.php";
require __DIR__ . "/../includes/connessione.php";

richiediLogin();
$utente = utenteCorrente();
$pdo = connetti("negozio");

// Il filtro "id_utente = :utente" usa l'utente della SESSIONE, non un valore scelto dal browser:
// ognuno vede soltanto i propri ordini.
$stmt = $pdo->prepare("SELECT id, data_ordine, totale FROM ordini WHERE id_utente = :utente ORDER BY data_ordine DESC");
$stmt->execute(["utente" => $utente["id"]]);
$ordini = $stmt->fetchAll();

// Dettaglio di un ordine (?id=N) solo se appartiene all'utente
$dettaglio = null;
$righe = [];
$idRichiesto = (int) ($_GET["id"] ?? 0);
if ($idRichiesto > 0) {
    $stmt = $pdo->prepare("SELECT id, data_ordine, totale FROM ordini WHERE id = :id AND id_utente = :utente");
    $stmt->execute(["id" => $idRichiesto, "utente" => $utente["id"]]);
    $dettaglio = $stmt->fetch();

    if ($dettaglio === false) {
        http_response_code(404);   // 404 e non 403: non si rivela nemmeno che quell'ordine esiste
    } else {
        $stmt = $pdo->prepare(
            "SELECT p.nome, r.quantita, r.prezzo_unitario
             FROM righe_ordine r JOIN prodotti p ON p.id = r.id_prodotto
             WHERE r.id_ordine = :id ORDER BY p.nome"
        );
        $stmt->execute(["id" => $idRichiesto]);
        $righe = $stmt->fetchAll();
    }
}
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>I miei ordini</title>
    <link rel="stylesheet" href="../includes/stile.css">
</head>
<body>
<nav class="menu">
    <a href="index.php">Home</a>
    <a href="ordini.php" class="attiva">I miei ordini</a>
    <a href="profilo.php">Profilo</a>
    <a href="logout.php">Esci (<?= htmlspecialchars($utente["username"]) ?>)</a>
</nav>
<main>
    <h1>I miei ordini</h1>

    <?php if ($dettaglio === false): ?>
        <p class="messaggio ko">Ordine non trovato.</p>
    <?php elseif ($dettaglio !== null): ?>
        <div class="scheda">
            <h2>Ordine n. <?= $dettaglio["id"] ?> del <?= date("d/m/Y", strtotime($dettaglio["data_ordine"])) ?></h2>
            <table>
                <?php foreach ($righe as $r): ?>
                    <tr>
                        <td><?= htmlspecialchars($r["nome"]) ?></td>
                        <td class="destra"><?= $r["quantita"] ?> × € <?= number_format((float) $r["prezzo_unitario"], 2, ",", ".") ?></td>
                    </tr>
                <?php endforeach; ?>
                <tr><th>Totale</th><th class="destra">€ <?= number_format((float) $dettaglio["totale"], 2, ",", ".") ?></th></tr>
            </table>
        </div>
    <?php endif; ?>

    <?php if (count($ordini) === 0): ?>
        <p class="tenue">Non hai ancora effettuato ordini.</p>
    <?php else: ?>
        <table>
            <tr><th>N.</th><th>Data</th><th class="destra">Totale</th><th></th></tr>
            <?php foreach ($ordini as $o): ?>
                <tr>
                    <td><?= $o["id"] ?></td>
                    <td><?= date("d/m/Y H:i", strtotime($o["data_ordine"])) ?></td>
                    <td class="destra">€ <?= number_format((float) $o["totale"], 2, ",", ".") ?></td>
                    <td><a href="ordini.php?id=<?= $o["id"] ?>">Dettaglio</a></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</main>
</body>
</html>
