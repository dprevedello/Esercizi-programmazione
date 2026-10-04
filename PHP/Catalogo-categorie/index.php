<?php
require __DIR__ . "/../includes/connessione.php";

$pdo = connetti("negozio");

// JOIN: ogni prodotto viene abbinato alla sua categoria
$righe = $pdo->query(
    "SELECT c.nome AS categoria, p.id, p.nome, p.descrizione, p.prezzo, p.giacenza
     FROM prodotti p
     JOIN categorie c ON c.id = p.id_categoria
     ORDER BY c.nome, p.nome"
)->fetchAll();

// Raggruppamento in PHP: categoria => elenco dei prodotti
$perCategoria = [];
foreach ($righe as $r) {
    $perCategoria[$r["categoria"]][] = $r;
}

// LEFT JOIN + GROUP BY: quanti prodotti ha ogni categoria (anche se ne ha zero)
$conteggi = $pdo->query(
    "SELECT c.nome, COUNT(p.id) AS numero
     FROM categorie c
     LEFT JOIN prodotti p ON p.id_categoria = c.id
     GROUP BY c.id, c.nome
     ORDER BY c.nome"
)->fetchAll();
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Catalogo per categorie</title>
    <link rel="stylesheet" href="../includes/stile.css">
</head>
<body>
<main>
    <h1>Catalogo del negozio</h1>

    <p>
        <?php foreach ($conteggi as $c): ?>
            <a href="#<?= urlencode($c["nome"]) ?>"><?= htmlspecialchars($c["nome"]) ?></a>
            <span class="tenue">(<?= $c["numero"] ?>)</span> &nbsp;
        <?php endforeach; ?>
    </p>

    <?php foreach ($perCategoria as $categoria => $prodotti): ?>
        <h2 id="<?= urlencode($categoria) ?>"><?= htmlspecialchars($categoria) ?></h2>
        <div class="griglia">
            <?php foreach ($prodotti as $p): ?>
                <div class="scheda">
                    <h3><?= htmlspecialchars($p["nome"]) ?></h3>
                    <p class="tenue"><?= htmlspecialchars($p["descrizione"]) ?></p>
                    <!-- PDO restituisce i DECIMAL come testo: si converte prima di formattare -->
                    <p class="prezzo">€ <?= number_format((float) $p["prezzo"], 2, ",", ".") ?></p>
                    <?php if ($p["giacenza"] == 0): ?>
                        <p class="errore">Esaurito</p>
                    <?php elseif ($p["giacenza"] < 10): ?>
                        <p class="errore">Ultimi <?= $p["giacenza"] ?> pezzi</p>
                    <?php else: ?>
                        <p class="tenue">Disponibile</p>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endforeach; ?>
</main>
</body>
</html>
