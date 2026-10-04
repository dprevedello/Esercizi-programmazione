<?php
require __DIR__ . "/../includes/auth_db.php";
require __DIR__ . "/../includes/connessione.php";

if (utenteCorrente() !== null) {
    header("Location: index.php");
    exit;
}

$errore = "";
$username = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST["username"] ?? "");
    $password = $_POST["password"] ?? "";

    $stmt = connetti("negozio")->prepare("SELECT id, username, password_hash, ruolo FROM utenti WHERE username = :username");
    $stmt->execute(["username" => $username]);
    $utente = $stmt->fetch();

    // password_verify confronta la password scritta con l'hash salvato.
    // Il messaggio è identico se sbaglia l'utente o la password: non si rivela quale dei due.
    if ($utente !== false && password_verify($password, $utente["password_hash"])) {
        // pagina che l'utente voleva aprire prima di essere mandato al login (solo un nome di file, mai un indirizzo)
        $destinazione = $_SESSION["dopo_login"] ?? "index.php";
        accedi($utente);   // rigenera l'id di sessione ma conserva i dati
        unset($_SESSION["dopo_login"]);
        if (!preg_match('/^[a-z]+\.php$/', $destinazione) || $destinazione === "login.php") {
            $destinazione = "index.php";
        }
        header("Location: " . $destinazione);
        exit;
    }
    $errore = "Nome utente o password non corretti.";
}
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Accedi</title>
    <link rel="stylesheet" href="../includes/stile.css">
</head>
<body>
<main>
    <h1>Accedi</h1>
    <?php if ($errore !== ""): ?><p class="messaggio ko"><?= $errore ?></p><?php endif; ?>
    <form method="post" action="login.php">
        <label for="username">Nome utente</label>
        <input type="text" id="username" name="username" value="<?= htmlspecialchars($username) ?>">
        <label for="password">Password</label>
        <input type="password" id="password" name="password">
        <button type="submit">Entra</button>
    </form>
    <p class="tenue">Account di prova: <code>mario</code> / <code>segreta123</code> (cliente), <code>admin</code> / <code>admin123</code> (amministratore)</p>
</main>
</body>
</html>
