<?php
session_start();
require __DIR__ . "/../includes/connessione.php";
require __DIR__ . "/../includes/flash.php";
require __DIR__ . "/errori.php";

$pdo = connetti("biblioteca");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $azione = $_POST["azione"] ?? "";

    try {
        if ($azione === "aggiungi") {
            $nome    = trim($_POST["nome"] ?? "");
            $cognome = trim($_POST["cognome"] ?? "");
            $email   = trim($_POST["email"] ?? "");

            if ($nome === "" || $cognome === "" || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                flash("ko", "Compila nome, cognome e un'email valida.");
            } else {
                // Niente controllo preventivo: se l'email esiste già, il vincolo UNIQUE del database
                // lancia un'eccezione (codice 1062) che viene tradotta in un messaggio chiaro.
                $pdo->prepare("INSERT INTO soci (nome, cognome, email) VALUES (:nome, :cognome, :email)")
                    ->execute(["nome" => $nome, "cognome" => $cognome, "email" => $email]);
                flash("ok", "Socio «" . $nome . " " . $cognome . "» registrato.");
            }
        } elseif ($azione === "elimina") {
            $id = (int) ($_POST["id"] ?? 0);
            $stmt = $pdo->prepare("DELETE FROM soci WHERE id = :id");
            $stmt->execute(["id" => $id]);
            flash($stmt->rowCount() === 1 ? "ok" : "ko", $stmt->rowCount() === 1 ? "Socio eliminato." : "Socio non trovato.");
        }
    } catch (PDOException $e) {
        flash("ko", messaggioErrore($e));
    }

    header("Location: soci.php");
    exit;
}

$soci = $pdo->query("SELECT id, nome, cognome, email FROM soci ORDER BY cognome, nome")->fetchAll();
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Soci</title>
    <link rel="stylesheet" href="../includes/stile.css">
</head>
<body>
<nav class="menu"><a href="index.php">Prestiti</a><a href="soci.php" class="attiva">Soci</a></nav>
<main>
    <h1>Soci della biblioteca</h1>
    <?php mostraFlash(); ?>

    <form method="post" action="soci.php">
        <input type="hidden" name="azione" value="aggiungi">
        <label for="nome">Nome</label>
        <input type="text" id="nome" name="nome">
        <label for="cognome">Cognome</label>
        <input type="text" id="cognome" name="cognome">
        <label for="email">Email</label>
        <input type="text" id="email" name="email">
        <button type="submit">Registra il socio</button>
    </form>

    <h2>Elenco (<?= count($soci) ?>)</h2>
    <table>
        <tr><th>Cognome e nome</th><th>Email</th><th></th></tr>
        <?php foreach ($soci as $s): ?>
            <tr>
                <td><?= htmlspecialchars($s["cognome"] . " " . $s["nome"]) ?></td>
                <td><?= htmlspecialchars($s["email"]) ?></td>
                <td>
                    <form method="post" class="inline">
                        <input type="hidden" name="azione" value="elimina">
                        <input type="hidden" name="id" value="<?= $s["id"] ?>">
                        <button type="submit" class="pericolo">Elimina</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</main>
</body>
</html>
