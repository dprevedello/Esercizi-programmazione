<?php
// Corsi ammessi: la chiave è il valore del <select>, il valore è il nome da mostrare
$corsi = [
    "python" => "Python da zero",
    "web"    => "Siti web con HTML e CSS",
    "php"    => "PHP e database",
];

$nome  = trim($_POST["nome"] ?? "");
$email = trim($_POST["email"] ?? "");
$eta   = trim($_POST["eta"] ?? "");
$corso = $_POST["corso"] ?? "";
$privacy = isset($_POST["privacy"]);

// Si raccolgono tutti gli errori in un array, poi si decide cosa mostrare
$errori = [];

if (strlen($nome) < 2) {
    $errori[] = "Il nome deve avere almeno 2 caratteri.";
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errori[] = "L'indirizzo email non è valido.";
}
if (filter_var($eta, FILTER_VALIDATE_INT, ["options" => ["min_range" => 14, "max_range" => 19]]) === false) {
    $errori[] = "L'età deve essere un numero intero tra 14 e 19.";
}
if (!array_key_exists($corso, $corsi)) {
    $errori[] = "Scegli uno dei corsi proposti.";
}
if (!$privacy) {
    $errori[] = "Devi accettare il trattamento dei dati.";
}
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Esito iscrizione</title>
    <link rel="stylesheet" href="../includes/stile.css">
</head>
<body>
<main>
    <?php if (count($errori) > 0): ?>
        <h1>Iscrizione non riuscita</h1>
        <div class="messaggio ko">
            <ul>
                <?php foreach ($errori as $e): ?>
                    <li><?= $e ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <p><a href="index.html">&larr; Torna al modulo</a></p>
    <?php else: ?>
        <h1>Iscrizione completata</h1>
        <div class="scheda">
            <p><strong><?= htmlspecialchars($nome) ?></strong>, età <?= (int) $eta ?>, è iscritto al corso
               «<?= $corsi[$corso] ?>».</p>
            <p>Una conferma sarà inviata a <?= htmlspecialchars($email) ?>.</p>
        </div>
    <?php endif; ?>
</main>
</body>
</html>
