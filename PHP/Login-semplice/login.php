<?php
session_start();
require __DIR__ . "/utenti.php";

// Se l'utente è già autenticato non ha senso mostrargli il modulo
if (isset($_SESSION["utente"])) {
    header("Location: riservata.php");
    exit;
}

$errore = "";
$username = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST["username"] ?? "");
    $password = $_POST["password"] ?? "";

    if (isset($utenti[$username]) && $utenti[$username] === $password) {
        // Cambiare l'identificativo di sessione al login evita attacchi di "session fixation"
        session_regenerate_id(true);
        $_SESSION["utente"] = $username;
        header("Location: riservata.php");
        exit;
    }
    // Messaggio volutamente generico: non dice se è sbagliato l'utente o la password
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
</main>
</body>
</html>
