<?php
// Funzioni comuni a tutte le pagine della bacheca.
session_start();
require __DIR__ . "/../includes/connessione.php";
require __DIR__ . "/../includes/flash.php";

const CATEGORIE = ["vendo" => "Vendo", "cerco" => "Cerco", "scambio" => "Scambio", "altro" => "Altro"];

function db(): PDO
{
    static $pdo = null;
    return $pdo ??= connetti("bacheca");
}

// Restituisce ["id" => ..., "username" => ...] dell'utente autenticato oppure null
function utente(): ?array
{
    return isset($_SESSION["utente_id"])
        ? ["id" => $_SESSION["utente_id"], "username" => $_SESSION["utente_username"]]
        : null;
}

function richiediUtente(): array
{
    $u = utente();
    if ($u === null) {
        flash("info", "Accedi per continuare.");
        header("Location: login.php");
        exit;
    }
    return $u;
}

// Apertura della pagina: intestazione e menu
function testa(string $titolo): void
{
    $u = utente();
    ?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= htmlspecialchars($titolo) ?> – Bacheca</title>
    <link rel="stylesheet" href="../includes/stile.css">
</head>
<body>
<nav class="menu">
    <a href="index.php">Annunci</a>
    <?php if ($u !== null): ?>
        <a href="nuovo.php">Pubblica</a>
        <a href="logout.php">Esci (<?= htmlspecialchars($u["username"]) ?>)</a>
    <?php else: ?>
        <a href="login.php">Accedi</a>
        <a href="registrazione.php">Registrati</a>
    <?php endif; ?>
</nav>
<main>
    <h1><?= htmlspecialchars($titolo) ?></h1>
    <?php mostraFlash(); ?>
<?php
}

function coda(): void
{
    echo "</main>\n</body>\n</html>\n";
}
