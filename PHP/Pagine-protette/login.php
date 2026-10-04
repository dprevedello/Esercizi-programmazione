<?php
require __DIR__ . "/auth.php";
require __DIR__ . "/utenti.php";

$errore = "";
$username = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST["username"] ?? "");
    $password = $_POST["password"] ?? "";

    if (isset($utenti[$username]) && $utenti[$username]["password"] === $password) {
        session_regenerate_id(true);
        $_SESSION["utente"] = $username;
        $_SESSION["ruolo"]  = $utenti[$username]["ruolo"];

        // Dopo il login si torna alla pagina che l'utente voleva vedere
        $destinazione = $_SESSION["dopo_login"] ?? "index.php";
        unset($_SESSION["dopo_login"]);
        header("Location: " . $destinazione);
        exit;
    }
    $errore = "Nome utente o password errati.";
}
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Accesso</title>
    <link rel="stylesheet" href="../includes/stile.css">
</head>
<body>
<main>
    <h1>Accedi</h1>
    <?php if (isset($_SESSION["dopo_login"])): ?>
        <p class="messaggio info">Per vedere quella pagina devi prima accedere.</p>
    <?php endif; ?>
    <?php if ($errore !== ""): ?>
        <p class="messaggio ko"><?= $errore ?></p>
    <?php endif; ?>
    <form method="post" action="login.php">
        <label for="username">Nome utente</label>
        <input type="text" id="username" name="username" value="<?= htmlspecialchars($username) ?>">
        <label for="password">Password</label>
        <input type="password" id="password" name="password">
        <button type="submit">Entra</button>
    </form>
    <p class="tenue">Utenti di prova: mario / segreta123 (utente), admin / admin123 (admin).</p>
</main>
</body>
</html>
