<?php
require __DIR__ . "/comune.php";

$u = utente();
$categoria = $_GET["categoria"] ?? "";
$q = trim($_GET["q"] ?? "");

$condizioni = [];
$parametri = [];
if (isset(CATEGORIE[$categoria])) {
    $condizioni[] = "a.categoria = :categoria";
    $parametri["categoria"] = $categoria;
}
if ($q !== "") {
    $condizioni[] = "(a.titolo LIKE :q1 OR a.testo LIKE :q2)";
    $parametri["q1"] = $parametri["q2"] = "%" . addcslashes($q, "%_\\") . "%";
}
$sql = "SELECT a.id, a.titolo, a.testo, a.categoria, a.pubblicato, a.id_utente, u.username
        FROM annunci a JOIN utenti u ON u.id = a.id_utente";
if ($condizioni) {
    $sql .= " WHERE " . implode(" AND ", $condizioni);
}
$sql .= " ORDER BY a.pubblicato DESC";
$stmt = db()->prepare($sql);
$stmt->execute($parametri);
$annunci = $stmt->fetchAll();

testa("Bacheca annunci");
?>
    <form method="get" action="index.php">
        <div style="display:grid;grid-template-columns:2fr 1fr auto;gap:.75rem;align-items:end">
            <div>
                <label for="q">Cerca</label>
                <input type="text" id="q" name="q" value="<?= htmlspecialchars($q) ?>">
            </div>
            <div>
                <label for="categoria">Categoria</label>
                <select id="categoria" name="categoria">
                    <option value="">Tutte</option>
                    <?php foreach (CATEGORIE as $valore => $etichetta): ?>
                        <option value="<?= $valore ?>"<?= $categoria === $valore ? " selected" : "" ?>><?= $etichetta ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" style="margin-top:0">Filtra</button>
        </div>
    </form>

    <?php if (count($annunci) === 0): ?>
        <p class="tenue">Nessun annuncio trovato.</p>
    <?php endif; ?>
    <?php foreach ($annunci as $a): ?>
        <div class="scheda">
            <h3><?= htmlspecialchars($a["titolo"]) ?> <span class="tenue">[<?= CATEGORIE[$a["categoria"]] ?>]</span></h3>
            <p><?= nl2br(htmlspecialchars($a["testo"])) ?></p>
            <p class="tenue">
                di <?= htmlspecialchars($a["username"]) ?>, <?= date("d/m/Y H:i", strtotime($a["pubblicato"])) ?>
                <?php if ($u !== null && $u["id"] === (int) $a["id_utente"]): ?>
                    – <a href="modifica.php?id=<?= $a["id"] ?>">Modifica</a>
                    <form method="post" action="elimina.php" class="inline" onsubmit="return confirm('Eliminare l\'annuncio?');">
                        <input type="hidden" name="id" value="<?= $a["id"] ?>">
                        <button type="submit" class="pericolo">Elimina</button>
                    </form>
                <?php endif; ?>
            </p>
        </div>
    <?php endforeach; ?>
<?php coda(); ?>
