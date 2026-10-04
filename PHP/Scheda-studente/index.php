<?php
require __DIR__ . "/../includes/connessione.php";

$pdo = connetti("scuola");

$id = isset($_GET["id"]) ? (int) $_GET["id"] : null;
$studente = null;
$classe = null;

if ($id !== null) {
    // Query PREPARATA: nell'istruzione c'è un segnaposto (:id), il valore viene passato a parte
    $stmt = $pdo->prepare("SELECT * FROM studenti WHERE id = :id");
    $stmt->execute(["id" => $id]);
    $studente = $stmt->fetch();      // una sola riga, oppure false se non c'è

    if ($studente !== false) {
        $stmt = $pdo->prepare("SELECT nome, indirizzo FROM classi WHERE id = :id");
        $stmt->execute(["id" => $studente["id_classe"]]);
        $classe = $stmt->fetch();
    } else {
        http_response_code(404);
    }
} else {
    $elenco = $pdo->query("SELECT id, nome, cognome FROM studenti ORDER BY cognome, nome")->fetchAll();
}

// L'id più alto presente: serve per non mostrare il link «Successivo» dopo l'ultimo studente
$ultimoId = (int) $pdo->query("SELECT MAX(id) FROM studenti")->fetchColumn();
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Scheda studente</title>
    <link rel="stylesheet" href="../includes/stile.css">
</head>
<body>
<main>
    <h1>Schede degli studenti</h1>

    <?php if ($id === null): ?>
        <ul>
            <?php foreach ($elenco as $s): ?>
                <li><a href="index.php?id=<?= $s["id"] ?>"><?= htmlspecialchars($s["cognome"] . " " . $s["nome"]) ?></a></li>
            <?php endforeach; ?>
        </ul>

    <?php elseif ($studente === false): ?>
        <p class="messaggio ko">Lo studente numero <?= $id ?> non esiste.</p>
        <p><a href="index.php">&larr; Torna all'elenco</a></p>

    <?php else: ?>
        <div class="scheda">
            <h2><?= htmlspecialchars($studente["nome"] . " " . $studente["cognome"]) ?></h2>
            <p>Classe: <strong><?= htmlspecialchars($classe["nome"]) ?></strong> (<?= htmlspecialchars($classe["indirizzo"]) ?>)</p>
            <p>Data di nascita: <?= date("d/m/Y", strtotime($studente["data_nascita"])) ?></p>
            <p>Email: <a href="mailto:<?= htmlspecialchars($studente["email"]) ?>"><?= htmlspecialchars($studente["email"]) ?></a></p>
        </div>
        <p>
            <?php if ($id > 1): ?><a href="index.php?id=<?= $id - 1 ?>">&larr; Precedente</a> | <?php endif; ?>
            <a href="index.php">Elenco</a>
            <?php if ($id < $ultimoId): ?>| <a href="index.php?id=<?= $id + 1 ?>">Successivo &rarr;</a><?php endif; ?>
        </p>
    <?php endif; ?>
</main>
</body>
</html>
