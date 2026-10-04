<?php
require __DIR__ . "/../includes/auth_db.php";
require __DIR__ . "/../includes/connessione.php";
require __DIR__ . "/../includes/flash.php";

richiediLogin();
$utente = utenteCorrente();

$errori = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $attuale  = $_POST["attuale"] ?? "";
    $nuova    = $_POST["nuova"] ?? "";
    $conferma = $_POST["conferma"] ?? "";

    $pdo = connetti("negozio");
    $stmt = $pdo->prepare("SELECT password_hash FROM utenti WHERE id = :id");
    $stmt->execute(["id" => $utente["id"]]);
    $hash = $stmt->fetchColumn();

    // Anche se l'utente è già loggato si richiede la password attuale:
    // protegge da chi trova un computer lasciato acceso.
    if (!password_verify($attuale, $hash)) {
        $errori["attuale"] = "La password attuale non è corretta.";
    }
    if (strlen($nuova) < 8) {
        $errori["nuova"] = "La nuova password deve avere almeno 8 caratteri.";
    } elseif ($nuova === $attuale) {
        $errori["nuova"] = "La nuova password deve essere diversa da quella attuale.";
    } elseif ($nuova !== $conferma) {
        $errori["conferma"] = "Le due password non coincidono.";
    }

    if (count($errori) === 0) {
        $pdo->prepare("UPDATE utenti SET password_hash = :hash WHERE id = :id")
            ->execute(["hash" => password_hash($nuova, PASSWORD_DEFAULT), "id" => $utente["id"]]);

        session_regenerate_id(true);   // dopo un cambio di credenziali si cambia anche l'id di sessione
        flash("ok", "Password aggiornata.");
        header("Location: index.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cambia password</title>
    <link rel="stylesheet" href="../includes/stile.css">
</head>
<body>
<main>
    <h1>Cambia password</h1>
    <form method="post" action="password.php">
        <label for="attuale">Password attuale</label>
        <input type="password" id="attuale" name="attuale">
        <?php if (isset($errori["attuale"])): ?><p class="errore"><?= $errori["attuale"] ?></p><?php endif; ?>

        <label for="nuova">Nuova password</label>
        <input type="password" id="nuova" name="nuova">
        <?php if (isset($errori["nuova"])): ?><p class="errore"><?= $errori["nuova"] ?></p><?php endif; ?>

        <label for="conferma">Ripeti la nuova password</label>
        <input type="password" id="conferma" name="conferma">
        <?php if (isset($errori["conferma"])): ?><p class="errore"><?= $errori["conferma"] ?></p><?php endif; ?>

        <button type="submit">Aggiorna la password</button>
    </form>
    <p><a href="index.php">&larr; Indietro</a></p>
</main>
</body>
</html>
