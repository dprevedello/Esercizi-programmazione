<?php
session_start();
require __DIR__ . "/flash.php";

if (!isset($_SESSION["contatti"])) {
    $_SESSION["contatti"] = [];
    $_SESSION["prossimo_id"] = 1;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $azione = $_POST["azione"] ?? "";

    if ($azione === "aggiungi") {
        $nome = trim($_POST["nome"] ?? "");
        $telefono = trim($_POST["telefono"] ?? "");
        if ($nome === "" || !preg_match('/^[0-9 +]{6,15}$/', $telefono)) {
            flash("ko", "Contatto non aggiunto: servono un nome e un numero di telefono valido.");
        } else {
            $_SESSION["contatti"][$_SESSION["prossimo_id"]++] = ["nome" => $nome, "telefono" => $telefono];
            flash("ok", "Contatto «" . $nome . "» aggiunto.");
        }
    } elseif ($azione === "elimina") {
        $id = (int) ($_POST["id"] ?? 0);
        if (isset($_SESSION["contatti"][$id])) {
            flash("info", "Contatto «" . $_SESSION["contatti"][$id]["nome"] . "» eliminato.");
            unset($_SESSION["contatti"][$id]);
        }
    }

    // Il messaggio resta in sessione e verrà mostrato dalla pagina caricata dopo il redirect
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rubrica con messaggi flash</title>
    <link rel="stylesheet" href="../includes/stile.css">
</head>
<body>
<main>
    <h1>Rubrica</h1>

    <?php mostraFlash(); ?>

    <form method="post" action="index.php">
        <input type="hidden" name="azione" value="aggiungi">
        <label for="nome">Nome</label>
        <input type="text" id="nome" name="nome">
        <label for="telefono">Telefono</label>
        <input type="text" id="telefono" name="telefono">
        <button type="submit">Aggiungi</button>
    </form>

    <h2>Contatti (<?= count($_SESSION["contatti"]) ?>)</h2>
    <?php if (count($_SESSION["contatti"]) === 0): ?>
        <p class="tenue">Nessun contatto.</p>
    <?php else: ?>
        <table>
            <tr><th>Nome</th><th>Telefono</th><th></th></tr>
            <?php foreach ($_SESSION["contatti"] as $id => $c): ?>
                <tr>
                    <td><?= htmlspecialchars($c["nome"]) ?></td>
                    <td><?= htmlspecialchars($c["telefono"]) ?></td>
                    <td>
                        <form method="post" class="inline">
                            <input type="hidden" name="azione" value="elimina">
                            <input type="hidden" name="id" value="<?= $id ?>">
                            <button type="submit" class="pericolo">Elimina</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</main>
</body>
</html>
