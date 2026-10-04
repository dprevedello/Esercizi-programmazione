<?php
require __DIR__ . "/../includes/connessione.php";

$pdo = connetti("scuola");

// query() va bene quando l'istruzione SQL non contiene dati forniti dall'utente
$studenti = $pdo->query("SELECT id, nome, cognome, data_nascita, email FROM studenti ORDER BY cognome, nome")->fetchAll();
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Elenco studenti</title>
    <link rel="stylesheet" href="../includes/stile.css">
</head>
<body>
<main>
    <h1>Elenco studenti</h1>

    <?php if (count($studenti) === 0): ?>
        <p class="tenue">Nessuno studente in archivio.</p>
    <?php else: ?>
        <table>
            <thead>
                <tr><th>#</th><th>Cognome</th><th>Nome</th><th>Nato il</th><th>Email</th></tr>
            </thead>
            <tbody>
                <?php foreach ($studenti as $i => $s): ?>
                    <tr<?= $i % 2 === 1 ? ' class="alterna"' : '' ?>>
                        <td><?= $s["id"] ?></td>
                        <td><?= htmlspecialchars($s["cognome"]) ?></td>
                        <td><?= htmlspecialchars($s["nome"]) ?></td>
                        <td><?= date("d/m/Y", strtotime($s["data_nascita"])) ?></td>
                        <td><?= htmlspecialchars($s["email"]) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <p class="tenue"><?= count($studenti) ?> studenti.</p>
    <?php endif; ?>
</main>
</body>
</html>
