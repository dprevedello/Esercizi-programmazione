<?php
require __DIR__ . "/../includes/auth_db.php";
require __DIR__ . "/../includes/connessione.php";
require __DIR__ . "/../includes/flash.php";

richiediRuolo("admin");
$pdo = connetti("negozio");

const PER_PAGINA = 8;

// --- filtri di ricerca (GET) ---
$q         = trim($_GET["q"] ?? "");
$categoria = (int) ($_GET["categoria"] ?? 0);

$condizioni = [];
$parametri  = [];
if ($q !== "") {
    $condizioni[] = "p.nome LIKE :q";
    $parametri["q"] = "%" . addcslashes($q, "%_\\") . "%";
}
if ($categoria > 0) {
    $condizioni[] = "p.id_categoria = :categoria";
    $parametri["categoria"] = $categoria;
}
$where = $condizioni ? " WHERE " . implode(" AND ", $condizioni) : "";

// --- paginazione ---
$stmt = $pdo->prepare("SELECT COUNT(*) FROM prodotti p" . $where);
$stmt->execute($parametri);
$totale = (int) $stmt->fetchColumn();
$numeroPagine = max(1, (int) ceil($totale / PER_PAGINA));
$nPag = max(1, min($numeroPagine, (int) ($_GET["pagina"] ?? 1)));

$stmt = $pdo->prepare(
    "SELECT p.id, p.nome, p.prezzo, p.giacenza, p.immagine, c.nome AS categoria
     FROM prodotti p JOIN categorie c ON c.id = p.id_categoria" . $where . "
     ORDER BY p.nome
     LIMIT :limite OFFSET :offset"
);
foreach ($parametri as $nome => $valore) {
    $stmt->bindValue(":" . $nome, $valore);
}
$stmt->bindValue(":limite", PER_PAGINA, PDO::PARAM_INT);
$stmt->bindValue(":offset", ($nPag - 1) * PER_PAGINA, PDO::PARAM_INT);
$stmt->execute();
$prodotti = $stmt->fetchAll();

$categorie = $pdo->query("SELECT id, nome FROM categorie ORDER BY nome")->fetchAll();

// Link a una pagina che conserva i filtri attivi
function link_pagina(int $n, string $q, int $categoria): string
{
    return "index.php?" . http_build_query(["q" => $q, "categoria" => $categoria, "pagina" => $n]);
}

$titolo = "Prodotti";
$pagina = "elenco";   // voce di menu evidenziata da testa.php
require __DIR__ . "/parti/testa.php";
?>
    <form method="get" action="index.php">
        <div style="display:grid;grid-template-columns:2fr 1fr auto;gap:.75rem;align-items:end">
            <div>
                <label for="q">Cerca per nome</label>
                <input type="text" id="q" name="q" value="<?= htmlspecialchars($q) ?>">
            </div>
            <div>
                <label for="categoria">Categoria</label>
                <select id="categoria" name="categoria">
                    <option value="0">Tutte</option>
                    <?php foreach ($categorie as $c): ?>
                        <option value="<?= $c["id"] ?>"<?= $categoria === (int) $c["id"] ? " selected" : "" ?>><?= htmlspecialchars($c["nome"]) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" style="margin-top:0">Cerca</button>
        </div>
    </form>

    <p class="tenue"><?= $totale ?> prodotti – pagina <?= $nPag ?> di <?= $numeroPagine ?></p>

    <table>
        <tr><th></th><th>Prodotto</th><th>Categoria</th><th class="destra">Prezzo</th><th class="destra">Giacenza</th><th></th></tr>
        <?php foreach ($prodotti as $p): ?>
            <tr>
                <td style="width:56px">
                    <?php if ($p["immagine"] !== null): ?>
                        <img src="immagini/<?= htmlspecialchars($p["immagine"]) ?>" alt="" style="width:48px;height:48px;object-fit:cover;border-radius:4px">
                    <?php endif; ?>
                </td>
                <td><?= htmlspecialchars($p["nome"]) ?></td>
                <td><?= htmlspecialchars($p["categoria"]) ?></td>
                <td class="destra">€ <?= number_format((float) $p["prezzo"], 2, ",", ".") ?></td>
                <td class="destra"><?= $p["giacenza"] ?></td>
                <td>
                    <a href="prodotto.php?id=<?= $p["id"] ?>">Modifica</a>
                    <form method="post" action="elimina.php" class="inline" onsubmit="return confirm('Eliminare il prodotto?');">
                        <input type="hidden" name="id" value="<?= $p["id"] ?>">
                        <button type="submit" class="pericolo">Elimina</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
        <?php if (count($prodotti) === 0): ?>
            <tr><td colspan="6" class="tenue">Nessun prodotto trovato.</td></tr>
        <?php endif; ?>
    </table>

    <p>
        <?php if ($nPag > 1): ?><a href="<?= link_pagina($nPag - 1, $q, $categoria) ?>">&larr; Precedente</a><?php endif; ?>
        <?php for ($n = 1; $n <= $numeroPagine; $n++): ?>
            <?= $n === $nPag ? "<strong>[$n]</strong>" : '<a href="' . link_pagina($n, $q, $categoria) . '">' . $n . '</a>' ?>
        <?php endfor; ?>
        <?php if ($nPag < $numeroPagine): ?><a href="<?= link_pagina($nPag + 1, $q, $categoria) ?>">Successiva &rarr;</a><?php endif; ?>
    </p>
<?php require __DIR__ . "/parti/coda.php"; ?>
