<?php
session_start();
require __DIR__ . "/../includes/connessione.php";
require __DIR__ . "/../includes/flash.php";

$pdo = connetti("negozio");
$utenti = $pdo->query("SELECT id, username, email, ruolo, password_hash, creato_il FROM utenti ORDER BY id")->fetchAll();
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Utenti registrati</title>
    <link rel="stylesheet" href="../includes/stile.css">
</head>
<body>
<main>
    <h1>Utenti registrati</h1>
    <?php mostraFlash(); ?>
    <p class="tenue">
        Pagina a solo scopo didattico: in un sito vero nessuno deve vedere gli hash delle password.
        Nota che due utenti con la stessa password hanno comunque hash diversi (il "sale" è casuale).
    </p>
    <table>
        <tr><th>Utente</th><th>Email</th><th>Ruolo</th><th>Hash memorizzato</th></tr>
        <?php foreach ($utenti as $u): ?>
            <tr>
                <td><?= htmlspecialchars($u["username"]) ?></td>
                <td><?= htmlspecialchars($u["email"]) ?></td>
                <td><?= $u["ruolo"] ?></td>
                <td style="font-family:monospace;font-size:.75rem;word-break:break-all"><?= htmlspecialchars($u["password_hash"]) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <p><a href="index.php">&larr; Nuova registrazione</a></p>
</main>
</body>
</html>
