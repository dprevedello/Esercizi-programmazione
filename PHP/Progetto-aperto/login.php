<?php
require __DIR__ . "/comune.php";

$errore = "";
$username = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST["username"] ?? "");
    $stmt = db()->prepare("SELECT id, username, password_hash FROM utenti WHERE username = :username");
    $stmt->execute(["username" => $username]);
    $riga = $stmt->fetch();

    if ($riga !== false && password_verify($_POST["password"] ?? "", $riga["password_hash"])) {
        session_regenerate_id(true);
        $_SESSION["utente_id"] = (int) $riga["id"];
        $_SESSION["utente_username"] = $riga["username"];
        header("Location: index.php");
        exit;
    }
    $errore = "Nome utente o password non corretti.";
}

testa("Accedi");
?>
    <?php if ($errore !== ""): ?><p class="messaggio ko"><?= $errore ?></p><?php endif; ?>
    <form method="post" action="login.php">
        <label for="username">Nome utente</label>
        <input type="text" id="username" name="username" value="<?= htmlspecialchars($username) ?>">
        <label for="password">Password</label>
        <input type="password" id="password" name="password">
        <button type="submit">Entra</button>
    </form>
    <p class="tenue">Account di prova: <code>anna</code> / <code>password1</code></p>
<?php coda(); ?>
