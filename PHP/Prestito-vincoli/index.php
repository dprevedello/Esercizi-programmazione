<?php
session_start();
require __DIR__ . "/../includes/connessione.php";
require __DIR__ . "/../includes/flash.php";
require __DIR__ . "/errori.php";

$pdo = connetti("biblioteca");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $azione = $_POST["azione"] ?? "";

    if ($azione === "presta") {
        $idLibro = (int) ($_POST["id_libro"] ?? 0);
        $idSocio = (int) ($_POST["id_socio"] ?? 0);

        $pdo->beginTransaction();
        try {
            $pdo->prepare("INSERT INTO prestiti (id_libro, id_socio, data_prestito) VALUES (:libro, :socio, CURDATE())")
                ->execute(["libro" => $idLibro, "socio" => $idSocio]);
            // Se non resta nessuna copia, il vincolo CHECK (copie_disponibili >= 0) blocca l'UPDATE
            $pdo->prepare("UPDATE libri SET copie_disponibili = copie_disponibili - 1 WHERE id = :libro")
                ->execute(["libro" => $idLibro]);
            $pdo->commit();
            flash("ok", "Prestito registrato.");
        } catch (PDOException $e) {
            $pdo->rollBack();
            flash("ko", "Prestito non registrato. " . messaggioErrore($e));
        }

    } elseif ($azione === "restituisci") {
        $idPrestito = (int) ($_POST["id_prestito"] ?? 0);

        $pdo->beginTransaction();
        try {
            $stmt = $pdo->prepare("SELECT id_libro FROM prestiti WHERE id = :id AND data_restituzione IS NULL FOR UPDATE");
            $stmt->execute(["id" => $idPrestito]);
            $prestito = $stmt->fetch();

            if ($prestito === false) {
                $pdo->rollBack();
                flash("ko", "Prestito non trovato o già restituito.");
            } else {
                $pdo->prepare("UPDATE prestiti SET data_restituzione = CURDATE() WHERE id = :id")
                    ->execute(["id" => $idPrestito]);
                $pdo->prepare("UPDATE libri SET copie_disponibili = copie_disponibili + 1 WHERE id = :libro")
                    ->execute(["libro" => $prestito["id_libro"]]);
                $pdo->commit();
                flash("ok", "Restituzione registrata.");
            }
        } catch (PDOException $e) {
            $pdo->rollBack();
            flash("ko", "Restituzione non registrata. " . messaggioErrore($e));
        }
    }

    header("Location: index.php");
    exit;
}

$libri = $pdo->query("SELECT id, titolo, copie_disponibili, copie_totali FROM libri ORDER BY titolo")->fetchAll();
$soci  = $pdo->query("SELECT id, nome, cognome FROM soci ORDER BY cognome, nome")->fetchAll();
$inCorso = $pdo->query(
    "SELECT p.id, l.titolo, s.nome, s.cognome, p.data_prestito
     FROM prestiti p
     JOIN libri l ON l.id = p.id_libro
     JOIN soci s ON s.id = p.id_socio
     WHERE p.data_restituzione IS NULL
     ORDER BY p.data_prestito, p.id"
)->fetchAll();
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Prestiti</title>
    <link rel="stylesheet" href="../includes/stile.css">
</head>
<body>
<nav class="menu"><a href="index.php" class="attiva">Prestiti</a><a href="soci.php">Soci</a></nav>
<main>
    <h1>Prestiti della biblioteca</h1>
    <?php mostraFlash(); ?>

    <form method="post" action="index.php">
        <input type="hidden" name="azione" value="presta">
        <label for="id_libro">Libro</label>
        <select id="id_libro" name="id_libro">
            <?php foreach ($libri as $l): ?>
                <option value="<?= $l["id"] ?>"><?= htmlspecialchars($l["titolo"]) ?> (<?= $l["copie_disponibili"] ?>/<?= $l["copie_totali"] ?> copie)</option>
            <?php endforeach; ?>
        </select>
        <label for="id_socio">Socio</label>
        <select id="id_socio" name="id_socio">
            <?php foreach ($soci as $s): ?>
                <option value="<?= $s["id"] ?>"><?= htmlspecialchars($s["cognome"] . " " . $s["nome"]) ?></option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Registra il prestito</button>
    </form>

    <h2>Prestiti in corso (<?= count($inCorso) ?>)</h2>
    <table>
        <tr><th>Libro</th><th>Socio</th><th>Dal</th><th></th></tr>
        <?php foreach ($inCorso as $p): ?>
            <tr>
                <td><?= htmlspecialchars($p["titolo"]) ?></td>
                <td><?= htmlspecialchars($p["cognome"] . " " . $p["nome"]) ?></td>
                <td><?= date("d/m/Y", strtotime($p["data_prestito"])) ?></td>
                <td>
                    <form method="post" class="inline">
                        <input type="hidden" name="azione" value="restituisci">
                        <input type="hidden" name="id_prestito" value="<?= $p["id"] ?>">
                        <button type="submit">Restituisci</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</main>
</body>
</html>
