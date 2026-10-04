<?php
require __DIR__ . "/../includes/connessione.php";

$pdo = connetti("negozio");

$perPagina = 5;

// 1) quanti prodotti ci sono in tutto
$totale = (int) $pdo->query("SELECT COUNT(*) FROM prodotti")->fetchColumn();
$numeroPagine = max(1, (int) ceil($totale / $perPagina));

// 2) quale pagina è stata richiesta (tenuta sempre dentro i limiti validi)
$pagina = (int) ($_GET["pagina"] ?? 1);
$pagina = max(1, min($numeroPagine, $pagina));

// 3) come ordinare (valori ammessi, perché il nome della colonna non si può passare come parametro)
$ordiniAmmessi = ["nome" => "p.nome ASC", "prezzo" => "p.prezzo ASC"];
$ordine = $_GET["ordine"] ?? "nome";
if (!isset($ordiniAmmessi[$ordine])) {
    $ordine = "nome";
}

// 4) le righe della pagina: LIMIT = quante, OFFSET = da quale saltare
$offset = ($pagina - 1) * $perPagina;
$stmt = $pdo->prepare(
    "SELECT p.id, p.nome, p.prezzo, c.nome AS categoria
     FROM prodotti p
     JOIN categorie c ON c.id = p.id_categoria
     ORDER BY " . $ordiniAmmessi[$ordine] . "
     LIMIT :limite OFFSET :offset"
);
// LIMIT e OFFSET vogliono numeri interi: con bindValue si indica il tipo, altrimenti
// i valori verrebbero passati come testo e la query darebbe errore
$stmt->bindValue(":limite", $perPagina, PDO::PARAM_INT);
$stmt->bindValue(":offset", $offset, PDO::PARAM_INT);
$stmt->execute();
$prodotti = $stmt->fetchAll();

// Costruisce il link a una pagina mantenendo l'ordinamento scelto
function link_pagina(int $n, string $ordine): string
{
    return "index.php?" . http_build_query(["pagina" => $n, "ordine" => $ordine]);
}
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Prodotti paginati</title>
    <link rel="stylesheet" href="../includes/stile.css">
</head>
<body>
<main>
    <h1>Prodotti</h1>

    <p>
        Ordina per:
        <a href="<?= link_pagina(1, "nome") ?>"<?= $ordine === "nome" ? ' style="font-weight:bold"' : "" ?>>nome</a> |
        <a href="<?= link_pagina(1, "prezzo") ?>"<?= $ordine === "prezzo" ? ' style="font-weight:bold"' : "" ?>>prezzo</a>
    </p>

    <table>
        <tr><th>Prodotto</th><th>Categoria</th><th class="destra">Prezzo</th></tr>
        <?php foreach ($prodotti as $p): ?>
            <tr>
                <td><?= htmlspecialchars($p["nome"]) ?></td>
                <td><?= htmlspecialchars($p["categoria"]) ?></td>
                <td class="destra">€ <?= number_format((float) $p["prezzo"], 2, ",", ".") ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <p class="tenue">
        Prodotti <?= $offset + 1 ?>–<?= $offset + count($prodotti) ?> di <?= $totale ?>
        (pagina <?= $pagina ?> di <?= $numeroPagine ?>)
    </p>

    <p>
        <?php if ($pagina > 1): ?>
            <a href="<?= link_pagina($pagina - 1, $ordine) ?>">&larr; Precedente</a>
        <?php endif; ?>

        <?php for ($n = 1; $n <= $numeroPagine; $n++): ?>
            <?php if ($n === $pagina): ?>
                <strong>[<?= $n ?>]</strong>
            <?php else: ?>
                <a href="<?= link_pagina($n, $ordine) ?>"><?= $n ?></a>
            <?php endif; ?>
        <?php endfor; ?>

        <?php if ($pagina < $numeroPagine): ?>
            <a href="<?= link_pagina($pagina + 1, $ordine) ?>">Successiva &rarr;</a>
        <?php endif; ?>
    </p>
</main>
</body>
</html>
