<?php
// I dati del modulo arrivano nell'array $_POST, indicizzato con l'attributo name dei campi
$destinatario = trim($_POST["destinatario"] ?? "");
$occasione    = $_POST["occasione"] ?? "";
$messaggio    = trim($_POST["messaggio"] ?? "");

$titoli = [
    "compleanno" => "Buon compleanno",
    "natale"     => "Buon Natale",
    "laurea"     => "Congratulazioni per la laurea",
];

$valido = $destinatario !== "" && array_key_exists($occasione, $titoli);
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Il tuo biglietto</title>
    <link rel="stylesheet" href="../includes/stile.css">
</head>
<body>
<main>
    <?php if ($valido): ?>
        <div class="scheda">
            <h1><?= $titoli[$occasione] ?>, <?= htmlspecialchars($destinatario) ?>!</h1>
            <?php if ($messaggio !== ""): ?>
                <p><?= nl2br(htmlspecialchars($messaggio)) ?></p>
            <?php else: ?>
                <p class="tenue">(nessun messaggio personale)</p>
            <?php endif; ?>
        </div>
    <?php else: ?>
        <p class="messaggio ko">Mancano dei dati: compila il modulo.</p>
    <?php endif; ?>
    <p><a href="index.html">&larr; Crea un altro biglietto</a></p>
</main>
</body>
</html>
