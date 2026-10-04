<?php
require __DIR__ . "/../includes/connessione.php";

$pdo = connetti("negozio");
$categorie = $pdo->query("SELECT id, nome FROM categorie ORDER BY nome")->fetchAll();

// I criteri di ricerca arrivano con GET: l'indirizzo può essere salvato e condiviso
$q          = trim($_GET["q"] ?? "");
$categoria  = (int) ($_GET["categoria"] ?? 0);
$massimo    = trim($_GET["massimo"] ?? "");
$disponibili = isset($_GET["disponibili"]);
$ordine     = $_GET["ordine"] ?? "nome";

// Il nome della colonna di ordinamento NON si può passare come parametro:
// si sceglie da un elenco di valori ammessi.
$ordiniAmmessi = [
    "nome"        => "p.nome ASC",
    "prezzo_asc"  => "p.prezzo ASC",
    "prezzo_desc" => "p.prezzo DESC",
];
if (!isset($ordiniAmmessi[$ordine])) {
    $ordine = "nome";
}

// La query si costruisce aggiungendo una condizione per ogni criterio compilato
$condizioni = [];
$parametri  = [];

if ($q !== "") {
    $condizioni[] = "(p.nome LIKE :q1 OR p.descrizione LIKE :q2)";
    // addcslashes() neutralizza i caratteri jolly % e _ scritti dall'utente
    $modello = "%" . addcslashes($q, "%_\\") . "%";
    $parametri["q1"] = $modello;
    $parametri["q2"] = $modello;
}
if ($categoria > 0) {
    $condizioni[] = "p.id_categoria = :categoria";
    $parametri["categoria"] = $categoria;
}
if ($massimo !== "" && is_numeric($massimo)) {
    $condizioni[] = "p.prezzo <= :massimo";
    $parametri["massimo"] = $massimo;
}
if ($disponibili) {
    $condizioni[] = "p.giacenza > 0";
}

$sql = "SELECT p.id, p.nome, p.prezzo, p.giacenza, c.nome AS categoria
        FROM prodotti p
        JOIN categorie c ON c.id = p.id_categoria";
if (count($condizioni) > 0) {
    $sql .= " WHERE " . implode(" AND ", $condizioni);
}
$sql .= " ORDER BY " . $ordiniAmmessi[$ordine];

$stmt = $pdo->prepare($sql);
$stmt->execute($parametri);
$risultati = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ricerca prodotti</title>
    <link rel="stylesheet" href="../includes/stile.css">
</head>
<body>
<main>
    <h1>Cerca nel catalogo</h1>

    <form method="get" action="index.php">
        <label for="q">Testo (nome o descrizione)</label>
        <input type="text" id="q" name="q" value="<?= htmlspecialchars($q) ?>">

        <label for="categoria">Categoria</label>
        <select id="categoria" name="categoria">
            <option value="0">Tutte</option>
            <?php foreach ($categorie as $c): ?>
                <option value="<?= $c["id"] ?>"<?= $categoria === (int) $c["id"] ? " selected" : "" ?>><?= htmlspecialchars($c["nome"]) ?></option>
            <?php endforeach; ?>
        </select>

        <label for="massimo">Prezzo massimo (€)</label>
        <input type="text" id="massimo" name="massimo" value="<?= htmlspecialchars($massimo) ?>">

        <div class="riga">
            <input type="checkbox" id="disponibili" name="disponibili" value="1"<?= $disponibili ? " checked" : "" ?>>
            <label for="disponibili">Solo prodotti disponibili</label>
        </div>

        <label for="ordine">Ordina per</label>
        <select id="ordine" name="ordine">
            <option value="nome"<?= $ordine === "nome" ? " selected" : "" ?>>Nome</option>
            <option value="prezzo_asc"<?= $ordine === "prezzo_asc" ? " selected" : "" ?>>Prezzo crescente</option>
            <option value="prezzo_desc"<?= $ordine === "prezzo_desc" ? " selected" : "" ?>>Prezzo decrescente</option>
        </select>

        <button type="submit">Cerca</button>
        <a href="index.php">Azzera i filtri</a>
    </form>

    <h2><?= count($risultati) ?> prodotti trovati</h2>
    <?php if (count($risultati) > 0): ?>
        <table>
            <tr><th>Prodotto</th><th>Categoria</th><th class="destra">Prezzo</th><th class="destra">Giacenza</th></tr>
            <?php foreach ($risultati as $p): ?>
                <tr>
                    <td><?= htmlspecialchars($p["nome"]) ?></td>
                    <td><?= htmlspecialchars($p["categoria"]) ?></td>
                    <td class="destra">€ <?= number_format((float) $p["prezzo"], 2, ",", ".") ?></td>
                    <td class="destra"><?= $p["giacenza"] ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else: ?>
        <p class="tenue">Nessun prodotto corrisponde ai criteri.</p>
    <?php endif; ?>
</main>
</body>
</html>
