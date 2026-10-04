<?php
require __DIR__ . "/comune.php";

$errori = [];
$username = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST["username"] ?? "");
    $password = $_POST["password"] ?? "";

    if (!preg_match('/^[A-Za-z0-9_]{3,30}$/', $username)) {
        $errori["username"] = "Da 3 a 30 caratteri: lettere, numeri e trattino basso.";
    }
    if (strlen($password) < 8) {
        $errori["password"] = "La password deve avere almeno 8 caratteri.";
    }

    if (count($errori) === 0) {
        try {
            db()->prepare("INSERT INTO utenti (username, password_hash) VALUES (:username, :hash)")
                ->execute(["username" => $username, "hash" => password_hash($password, PASSWORD_DEFAULT)]);
            flash("ok", "Registrazione completata: ora puoi accedere.");
            header("Location: login.php");
            exit;
        } catch (PDOException $e) {
            if (($e->errorInfo[1] ?? 0) === 1062) {
                $errori["username"] = "Questo nome utente è già in uso.";
            } else {
                throw $e;
            }
        }
    }
}

testa("Registrazione");
?>
    <form method="post" action="registrazione.php" novalidate>
        <label for="username">Nome utente</label>
        <input type="text" id="username" name="username" value="<?= htmlspecialchars($username) ?>">
        <?php if (isset($errori["username"])): ?><p class="errore"><?= $errori["username"] ?></p><?php endif; ?>
        <label for="password">Password (almeno 8 caratteri)</label>
        <input type="password" id="password" name="password">
        <?php if (isset($errori["password"])): ?><p class="errore"><?= $errori["password"] ?></p><?php endif; ?>
        <button type="submit">Registrati</button>
    </form>
<?php coda(); ?>
