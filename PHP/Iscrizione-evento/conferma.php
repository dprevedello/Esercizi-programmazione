<?php
$codice = $_GET["codice"] ?? "";
$iscrizione = null;

// Il codice è costruito dal server: se non ha il formato atteso non si cerca nemmeno
$file = __DIR__ . "/dati/iscrizioni.csv";
if (preg_match('/^[A-Z0-9]{6}$/', $codice) && file_exists($file)) {
    $f = fopen($file, "r");
    while (($riga = fgetcsv($f, null, ",", "\"", "")) !== false) {
        if ($riga[0] === $codice) {
            $iscrizione = $riga;
            break;
        }
    }
    fclose($f);
}

if ($iscrizione === null) {
    http_response_code(404);
}
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Conferma iscrizione</title>
    <link rel="stylesheet" href="../includes/stile.css">
</head>
<body>
<main>
    <?php if ($iscrizione === null): ?>
        <p class="messaggio ko">Iscrizione non trovata.</p>
    <?php else: ?>
        <?php [$cod, $quando, $nome, $cognome, $email, $classe, $lab, $pasto] = $iscrizione; ?>
        <h1>Iscrizione confermata!</h1>
        <div class="scheda">
            <p>Grazie <strong><?= htmlspecialchars($nome . " " . $cognome) ?></strong> (<?= htmlspecialchars($classe) ?>).</p>
            <p>Laboratori scelti: <?= htmlspecialchars($lab) ?></p>
            <p>Pasto: <?= htmlspecialchars($pasto) ?></p>
            <p>Il tuo codice di iscrizione è <strong><?= $cod ?></strong> (registrata il <?= htmlspecialchars($quando) ?>).</p>
        </div>
    <?php endif; ?>
    <p><a href="index.php">&larr; Nuova iscrizione</a> – <a href="elenco.php">Elenco iscritti</a></p>
</main>
</body>
</html>
