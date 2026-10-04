<?php
require __DIR__ . "/../includes/auth_db.php";
require __DIR__ . "/../includes/connessione.php";
require __DIR__ . "/../includes/flash.php";

richiediRuolo("admin");
$pdo = connetti("negozio");

const CARTELLA = __DIR__ . "/immagini/";
const TIPI = ["image/jpeg" => "jpg", "image/png" => "png", "image/gif" => "gif"];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = (int) ($_POST["id"] ?? 0);
    $azione = $_POST["azione"] ?? "carica";

    $stmt = $pdo->prepare("SELECT nome, immagine FROM prodotti WHERE id = :id");
    $stmt->execute(["id" => $id]);
    $prodotto = $stmt->fetch();

    if ($prodotto === false) {
        flash("ko", "Prodotto non trovato.");
    } elseif ($azione === "rimuovi") {
        if ($prodotto["immagine"] !== null) {
            @unlink(CARTELLA . basename($prodotto["immagine"]));
            $pdo->prepare("UPDATE prodotti SET immagine = NULL WHERE id = :id")->execute(["id" => $id]);
        }
        flash("ok", "Immagine di «" . $prodotto["nome"] . "» rimossa.");
    } else {
        $f = $_FILES["immagine"] ?? null;
        if ($f === null || $f["error"] !== UPLOAD_ERR_OK) {
            flash("ko", "Scegli un file valido (massimo 2 MB).");
        } elseif ($f["size"] > 2 * 1024 * 1024) {
            flash("ko", "L'immagine supera i 2 MB.");
        } else {
            $tipo = (new finfo(FILEINFO_MIME_TYPE))->file($f["tmp_name"]);
            if (!isset(TIPI[$tipo]) || @getimagesize($f["tmp_name"]) === false) {
                flash("ko", "Il file non è un'immagine JPEG, PNG o GIF valida.");
            } else {
                $nuovoNome = "p" . $id . "-" . bin2hex(random_bytes(4)) . "." . TIPI[$tipo];
                if (move_uploaded_file($f["tmp_name"], CARTELLA . $nuovoNome)) {
                    // Si salva nel database solo il NOME del file, non l'immagine né il percorso completo
                    $pdo->prepare("UPDATE prodotti SET immagine = :immagine WHERE id = :id")
                        ->execute(["immagine" => $nuovoNome, "id" => $id]);
                    // La vecchia immagine, se c'era, non serve più
                    if ($prodotto["immagine"] !== null) {
                        @unlink(CARTELLA . basename($prodotto["immagine"]));
                    }
                    flash("ok", "Immagine di «" . $prodotto["nome"] . "» aggiornata.");
                } else {
                    flash("ko", "Impossibile salvare l'immagine.");
                }
            }
        }
    }
    header("Location: admin.php");
    exit;
}

$prodotti = $pdo->query("SELECT id, nome, immagine FROM prodotti ORDER BY nome")->fetchAll();
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gestione immagini</title>
    <link rel="stylesheet" href="../includes/stile.css">
</head>
<body>
<nav class="menu">
    <a href="index.php">Catalogo</a>
    <a href="admin.php" class="attiva">Gestione immagini</a>
    <a href="logout.php">Esci</a>
</nav>
<main>
    <h1>Immagini dei prodotti</h1>
    <?php mostraFlash(); ?>
    <table>
        <tr><th>Prodotto</th><th>Immagine</th><th>Carica o sostituisci</th></tr>
        <?php foreach ($prodotti as $p): ?>
            <tr>
                <td><?= htmlspecialchars($p["nome"]) ?></td>
                <td>
                    <?php if ($p["immagine"] !== null): ?>
                        <img src="immagini/<?= htmlspecialchars($p["immagine"]) ?>" alt="" style="height:48px;border-radius:4px">
                    <?php else: ?>
                        <span class="tenue">—</span>
                    <?php endif; ?>
                </td>
                <td>
                    <form method="post" action="admin.php" enctype="multipart/form-data" class="inline">
                        <input type="hidden" name="id" value="<?= $p["id"] ?>">
                        <input type="file" name="immagine" accept="image/jpeg,image/png,image/gif" style="width:auto">
                        <button type="submit">Carica</button>
                    </form>
                    <?php if ($p["immagine"] !== null): ?>
                        <form method="post" action="admin.php" class="inline">
                            <input type="hidden" name="id" value="<?= $p["id"] ?>">
                            <input type="hidden" name="azione" value="rimuovi">
                            <button type="submit" class="pericolo">Rimuovi</button>
                        </form>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</main>
</body>
</html>
