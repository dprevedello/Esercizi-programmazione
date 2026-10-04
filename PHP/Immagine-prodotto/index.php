<?php
require __DIR__ . "/../includes/auth_db.php";
require __DIR__ . "/../includes/connessione.php";

$utente = utenteCorrente();
$prodotti = connetti("negozio")->query(
    "SELECT p.id, p.nome, p.prezzo, p.immagine, c.nome AS categoria
     FROM prodotti p JOIN categorie c ON c.id = p.id_categoria
     ORDER BY c.nome, p.nome"
)->fetchAll();
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Catalogo con immagini</title>
    <link rel="stylesheet" href="../includes/stile.css">
</head>
<body>
<nav class="menu">
    <a href="index.php" class="attiva">Catalogo</a>
    <?php if ($utente !== null && $utente["ruolo"] === "admin"): ?>
        <a href="admin.php">Gestione immagini</a>
        <a href="logout.php">Esci</a>
    <?php else: ?>
        <a href="login.php">Area admin</a>
    <?php endif; ?>
</nav>
<main>
    <h1>Catalogo</h1>
    <div class="griglia">
        <?php foreach ($prodotti as $p): ?>
            <div class="scheda">
                <?php if ($p["immagine"] !== null): ?>
                    <img src="immagini/<?= htmlspecialchars($p["immagine"]) ?>" alt="<?= htmlspecialchars($p["nome"]) ?>" style="width:100%;height:140px;object-fit:cover;border-radius:6px">
                <?php else: ?>
                    <div style="height:140px;border-radius:6px;background:var(--bordo);display:flex;align-items:center;justify-content:center" class="tenue">nessuna immagine</div>
                <?php endif; ?>
                <h3><?= htmlspecialchars($p["nome"]) ?></h3>
                <p class="tenue"><?= htmlspecialchars($p["categoria"]) ?></p>
                <p class="prezzo">€ <?= number_format((float) $p["prezzo"], 2, ",", ".") ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</main>
</body>
</html>
