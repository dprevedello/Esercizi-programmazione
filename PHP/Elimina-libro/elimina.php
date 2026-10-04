<?php
session_start();
require __DIR__ . "/../includes/connessione.php";
require __DIR__ . "/../includes/flash.php";

$pdo = connetti("biblioteca");

// L'eliminazione avviene SOLO con POST: un link (GET) può essere aperto per errore,
// anticipato dal browser o inserito in una pagina di terzi, e non deve mai cancellare dati.
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = (int) ($_POST["id"] ?? 0);

    try {
        $stmt = $pdo->prepare("DELETE FROM libri WHERE id = :id");
        $stmt->execute(["id" => $id]);

        if ($stmt->rowCount() === 1) {
            flash("ok", "Libro eliminato.");
        } else {
            flash("ko", "Libro non trovato: nessuna riga eliminata.");
        }
    } catch (PDOException $e) {
        // 1451 = la riga è referenziata da un'altra tabella (chiave esterna): qui, da qualche prestito
        if ((int) $e->errorInfo[1] === 1451) {
            flash("ko", "Impossibile eliminare il libro: risulta in uno o più prestiti.");
        } else {
            throw $e;
        }
    }
    header("Location: index.php");
    exit;
}

// GET: pagina di conferma
$id = (int) ($_GET["id"] ?? 0);
$stmt = $pdo->prepare("SELECT id, titolo, anno FROM libri WHERE id = :id");
$stmt->execute(["id" => $id]);
$libro = $stmt->fetch();

if ($libro === false) {
    http_response_code(404);
}
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Elimina libro</title>
    <link rel="stylesheet" href="../includes/stile.css">
</head>
<body>
<main>
    <?php if ($libro === false): ?>
        <p class="messaggio ko">Libro non trovato.</p>
        <p><a href="index.php">&larr; Torna all'elenco</a></p>
    <?php else: ?>
        <h1>Eliminare questo libro?</h1>
        <div class="scheda">
            <p><strong><?= htmlspecialchars($libro["titolo"]) ?></strong> (<?= $libro["anno"] ?>)</p>
            <p class="tenue">L'operazione non si può annullare.</p>
        </div>
        <form method="post" action="elimina.php" class="inline">
            <input type="hidden" name="id" value="<?= $libro["id"] ?>">
            <button type="submit" class="pericolo">Sì, elimina</button>
        </form>
        <a href="index.php">Annulla</a>
    <?php endif; ?>
</main>
</body>
</html>
