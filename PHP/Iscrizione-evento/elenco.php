<?php
$file = __DIR__ . "/dati/iscrizioni.csv";
$iscritti = [];
$perLaboratorio = [];

if (file_exists($file)) {
    $f = fopen($file, "r");
    while (($riga = fgetcsv($f, null, ",", "\"", "")) !== false) {
        $iscritti[] = $riga;
        foreach (explode(", ", $riga[6]) as $lab) {
            $perLaboratorio[$lab] = ($perLaboratorio[$lab] ?? 0) + 1;
        }
    }
    fclose($f);
}
ksort($perLaboratorio);
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Iscritti</title>
    <link rel="stylesheet" href="../includes/stile.css">
</head>
<body>
<main>
    <h1>Iscritti: <?= count($iscritti) ?></h1>

    <?php if (count($iscritti) === 0): ?>
        <p class="tenue">Nessuna iscrizione ricevuta.</p>
    <?php else: ?>
        <h2>Per laboratorio</h2>
        <ul>
            <?php foreach ($perLaboratorio as $lab => $n): ?>
                <li><?= htmlspecialchars($lab) ?>: <?= $n ?></li>
            <?php endforeach; ?>
        </ul>

        <h2>Elenco</h2>
        <table>
            <tr><th>Codice</th><th>Nome</th><th>Classe</th><th>Laboratori</th></tr>
            <?php foreach ($iscritti as $r): ?>
                <tr>
                    <td><?= htmlspecialchars($r[0]) ?></td>
                    <td><?= htmlspecialchars($r[2] . " " . $r[3]) ?></td>
                    <td><?= htmlspecialchars($r[5]) ?></td>
                    <td><?= htmlspecialchars($r[6]) ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    <p><a href="index.php">&larr; Modulo di iscrizione</a></p>
</main>
</body>
</html>
