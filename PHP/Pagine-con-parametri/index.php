<?php
require __DIR__ . "/dati.php";

// Il parametro ?id=... arriva nell'array $_GET come testo
$id = isset($_GET["id"]) ? (int) $_GET["id"] : null;
$corso = ($id !== null && array_key_exists($id, $corsi)) ? $corsi[$id] : null;

// Un id presente ma sbagliato: risposta HTTP 404 (non trovato)
if ($id !== null && $corso === null) {
    http_response_code(404);
}
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Corsi estivi</title>
    <link rel="stylesheet" href="../includes/stile.css">
</head>
<body>
<main>
    <h1>Corsi estivi di informatica</h1>

    <?php if ($corso !== null): ?>
        <div class="scheda">
            <h2><?= $corso["titolo"] ?></h2>
            <p><?= $corso["descrizione"] ?></p>
            <p>Durata: <strong><?= $corso["durata"] ?> ore</strong> – Livello: <strong><?= $corso["livello"] ?></strong></p>
        </div>
        <p><a href="index.php">&larr; Torna all'elenco</a></p>

    <?php elseif ($id !== null): ?>
        <p class="messaggio ko">Il corso numero <?= $id ?> non esiste.</p>
        <p><a href="index.php">&larr; Torna all'elenco</a></p>

    <?php else: ?>
        <ul>
            <?php foreach ($corsi as $codice => $c): ?>
                <li><a href="index.php?id=<?= $codice ?>"><?= $c["titolo"] ?></a> (<?= $c["durata"] ?> ore)</li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</main>
</body>
</html>
