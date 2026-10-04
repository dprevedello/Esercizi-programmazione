<?php
$file = __DIR__ . "/dati/messaggi.txt";
// file() legge il file e restituisce un array con una riga per elemento
$righe = file_exists($file) ? file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) : [];
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Messaggi ricevuti</title>
    <link rel="stylesheet" href="../includes/stile.css">
</head>
<body>
<main>
    <h1>Messaggi ricevuti (<?= count($righe) ?>)</h1>

    <?php if (count($righe) === 0): ?>
        <p class="tenue">Nessun messaggio ricevuto finora.</p>
    <?php else: ?>
        <table>
            <tr><th>Data</th><th>Nome</th><th>Email</th><th>Messaggio</th></tr>
            <?php foreach (array_reverse($righe) as $riga): ?>
                <?php [$data, $nome, $email, $testo] = explode(";", $riga, 4); ?>
                <tr>
                    <td><?= htmlspecialchars($data) ?></td>
                    <td><?= htmlspecialchars($nome) ?></td>
                    <td><?= htmlspecialchars($email) ?></td>
                    <td><?= htmlspecialchars($testo) ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    <p><a href="index.html">&larr; Torna al modulo</a></p>
</main>
</body>
</html>
