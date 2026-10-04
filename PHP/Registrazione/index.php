<?php
session_start();
require __DIR__ . "/../includes/connessione.php";
require __DIR__ . "/../includes/flash.php";

$pdo = connetti("negozio");

$errori = [];
$username = "";
$email = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username  = trim($_POST["username"] ?? "");
    $email     = trim($_POST["email"] ?? "");
    $password  = $_POST["password"] ?? "";
    $conferma  = $_POST["conferma"] ?? "";

    if (!preg_match('/^[A-Za-z0-9_]{3,30}$/', $username)) {
        $errori["username"] = "Da 3 a 30 caratteri: lettere, numeri e trattino basso.";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($email) > 80) {
        $errori["email"] = "Inserisci un indirizzo email valido.";
    }
    if (strlen($password) < 8) {
        $errori["password"] = "La password deve avere almeno 8 caratteri.";
    } elseif ($password !== $conferma) {
        $errori["conferma"] = "Le due password non coincidono.";
    }

    if (count($errori) === 0) {
        try {
            // Nel database finisce solo l'impronta (hash) della password, mai il testo in chiaro
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $pdo->prepare("INSERT INTO utenti (username, email, password_hash) VALUES (:username, :email, :hash)")
                ->execute(["username" => $username, "email" => $email, "hash" => $hash]);

            flash("ok", "Registrazione completata: ora l'utente «" . $username . "» esiste nel database.");
            header("Location: utenti.php");
            exit;
        } catch (PDOException $e) {
            if (($e->errorInfo[1] ?? 0) === 1062) {
                // Duplicato su una colonna UNIQUE: il messaggio di MySQL dice quale
                if (preg_match("/for key '(utenti\.)?username'/", $e->getMessage())) {
                    $errori["username"] = "Questo nome utente è già in uso.";
                } else {
                    $errori["email"] = "Esiste già un account con questa email.";
                }
            } else {
                throw $e;
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registrazione</title>
    <link rel="stylesheet" href="../includes/stile.css">
</head>
<body>
<main>
    <h1>Crea un account</h1>
    <form method="post" action="index.php" novalidate>
        <label for="username">Nome utente</label>
        <input type="text" id="username" name="username" value="<?= htmlspecialchars($username) ?>">
        <?php if (isset($errori["username"])): ?><p class="errore"><?= $errori["username"] ?></p><?php endif; ?>

        <label for="email">Email</label>
        <input type="text" id="email" name="email" value="<?= htmlspecialchars($email) ?>">
        <?php if (isset($errori["email"])): ?><p class="errore"><?= $errori["email"] ?></p><?php endif; ?>

        <label for="password">Password (almeno 8 caratteri)</label>
        <input type="password" id="password" name="password">
        <?php if (isset($errori["password"])): ?><p class="errore"><?= $errori["password"] ?></p><?php endif; ?>

        <label for="conferma">Ripeti la password</label>
        <input type="password" id="conferma" name="conferma">
        <?php if (isset($errori["conferma"])): ?><p class="errore"><?= $errori["conferma"] ?></p><?php endif; ?>

        <button type="submit">Registrati</button>
    </form>
    <p><a href="utenti.php">Vedi gli utenti registrati</a></p>
</main>
</body>
</html>
