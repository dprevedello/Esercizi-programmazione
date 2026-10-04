<?php
date_default_timezone_set("Europe/Rome");

$ora = (int) date("H");
if ($ora < 12) {
    $saluto = "Buongiorno";
} elseif ($ora < 18) {
    $saluto = "Buon pomeriggio";
} else {
    $saluto = "Buonasera";
}

$giorni = ["domenica", "lunedì", "martedì", "mercoledì", "giovedì", "venerdì", "sabato"];
$mesi = ["", "gennaio", "febbraio", "marzo", "aprile", "maggio", "giugno",
         "luglio", "agosto", "settembre", "ottobre", "novembre", "dicembre"];

$giornoSettimana = $giorni[(int) date("w")];
$giornoMese = (int) date("j");
$mese = $mesi[(int) date("n")];
$anno = date("Y");
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pagina dinamica</title>
    <link rel="stylesheet" href="../includes/stile.css">
</head>
<body>
<main>
    <h1><?= $saluto ?>, visitatore!</h1>

    <div class="scheda">
        <p>Oggi è <strong><?= $giornoSettimana ?> <?= $giornoMese ?> <?= $mese ?> <?= $anno ?></strong>.</p>
        <p>Sul server sono le <strong><?= date("H:i") ?></strong>.</p>
    </div>

    <?php if ($ora >= 22 || $ora < 6): ?>
        <p class="messaggio info">È notte fonda: non sarebbe ora di dormire?</p>
    <?php elseif (date("N") >= 6): ?>
        <p class="messaggio ok">È il fine settimana: buon riposo!</p>
    <?php else: ?>
        <p class="messaggio info">Buon lavoro e buono studio.</p>
    <?php endif; ?>

    <h2>Conto alla rovescia</h2>
    <ul>
        <?php for ($i = 3; $i >= 1; $i--): ?>
            <li><?= $i ?></li>
        <?php endfor; ?>
        <li>Via!</li>
    </ul>
</main>
<footer>
    <p>&copy; <?= $anno ?> – pagina generata da PHP</p>
</footer>
</body>
</html>
