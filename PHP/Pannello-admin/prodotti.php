<?php
require __DIR__ . "/../includes/auth_db.php";
require __DIR__ . "/../includes/connessione.php";
require __DIR__ . "/../includes/flash.php";

richiediRuolo("admin");
$utente = utenteCorrente();
$pdo = connetti("negozio");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Il controllo del ruolo è già stato fatto sopra: vale anche per le richieste POST.
    $id       = (int) ($_POST["id"] ?? 0);
    $prezzo   = str_replace(",", ".", trim($_POST["prezzo"] ?? ""));
    $giacenza = filter_var($_POST["giacenza"] ?? "", FILTER_VALIDATE_INT, ["options" => ["min_range" => 0]]);

    if (!is_numeric($prezzo) || (float) $prezzo <= 0 || $giacenza === false) {
        flash("ko", "Prezzo (maggiore di zero) e giacenza (intero ≥ 0) non validi.");
    } else {
        $stmt = $pdo->prepare("UPDATE prodotti SET prezzo = :prezzo, giacenza = :giacenza WHERE id = :id");
        $stmt->execute(["prezzo" => $prezzo, "giacenza" => $giacenza, "id" => $id]);
        flash("ok", "Prodotto aggiornato.");
    }
    header("Location: prodotti.php");
    exit;
}

$prodotti = $pdo->query(
    "SELECT p.id, p.nome, p.prezzo, p.giacenza, c.nome AS categoria
     FROM prodotti p JOIN categorie c ON c.id = p.id_categoria
     ORDER BY p.giacenza, p.nome"
)->fetchAll();
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gestione prodotti</title>
    <link rel="stylesheet" href="../includes/stile.css">
</head>
<body>
<nav class="menu">
    <a href="index.php">Riepilogo</a>
    <a href="prodotti.php" class="attiva">Prodotti</a>
    <a href="ordini.php">Ordini</a>
    <a href="logout.php">Esci (<?= htmlspecialchars($utente["username"]) ?>)</a>
</nav>
<main>
    <h1>Gestione prodotti</h1>
    <?php mostraFlash(); ?>
    <table>
        <tr><th>Prodotto</th><th>Categoria</th><th>Prezzo (€)</th><th>Giacenza</th><th></th></tr>
        <?php foreach ($prodotti as $p): ?>
            <tr>
                <td><?= htmlspecialchars($p["nome"]) ?></td>
                <td><?= htmlspecialchars($p["categoria"]) ?></td>
                <!-- i campi stanno in celle diverse: l'attributo form li collega al modulo della riga -->
                <td><input type="text" name="prezzo" form="riga<?= $p["id"] ?>" value="<?= number_format((float) $p["prezzo"], 2, ".", "") ?>" style="width:6rem"></td>
                <td><input type="number" name="giacenza" form="riga<?= $p["id"] ?>" value="<?= $p["giacenza"] ?>" min="0" style="width:5rem"></td>
                <td>
                    <form method="post" action="prodotti.php" id="riga<?= $p["id"] ?>" class="inline">
                        <input type="hidden" name="id" value="<?= $p["id"] ?>">
                        <button type="submit">Salva</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</main>
</body>
</html>
