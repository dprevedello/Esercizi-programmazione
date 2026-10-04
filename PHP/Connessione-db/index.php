<?php
// Parametri di connessione (adattali al tuo ambiente)
$host     = "localhost";
$database = "scuola";
$utente   = "root";
$password = "";

$errore = null;

try {
    // Data Source Name: tipo di database, server, nome del database e codifica dei caratteri
    $dsn = "mysql:host=$host;dbname=$database;charset=utf8mb4";
    $pdo = new PDO($dsn, $utente, $password);

    // Gli errori SQL diventano eccezioni (PDOException), che si possono intercettare con try/catch
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // query() esegue un'istruzione SQL; fetchColumn() legge la prima colonna della prima riga
    $versione = $pdo->query("SELECT VERSION()")->fetchColumn();
    $numeroStudenti = $pdo->query("SELECT COUNT(*) FROM studenti")->fetchColumn();
} catch (PDOException $e) {
    http_response_code(500);
    $errore = $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Connessione al database</title>
    <link rel="stylesheet" href="../includes/stile.css">
</head>
<body>
<main>
    <h1>Connessione al database</h1>

    <?php if ($errore === null): ?>
        <p class="messaggio ok">Connessione riuscita al database <strong><?= htmlspecialchars($database) ?></strong>.</p>
        <div class="scheda">
            <p>Versione del server: <strong><?= htmlspecialchars($versione) ?></strong></p>
            <p>Studenti nella tabella <code>studenti</code>: <strong><?= $numeroStudenti ?></strong></p>
        </div>
    <?php else: ?>
        <p class="messaggio ko">Impossibile collegarsi al database.</p>
        <p class="tenue">Dettaglio tecnico (da mostrare solo durante lo sviluppo): <code><?= htmlspecialchars($errore) ?></code></p>
    <?php endif; ?>
</main>
</body>
</html>
