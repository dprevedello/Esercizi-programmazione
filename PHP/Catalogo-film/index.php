<?php
require __DIR__ . "/dati.php";

// Elenco dei generi presenti, senza doppioni
$generi = array_values(array_unique(array_column($film, "genere")));
sort($generi);

// Filtro facoltativo ?genere=...
$genere = $_GET["genere"] ?? "";
$visibili = [];
foreach ($film as $id => $f) {
    if ($genere === "" || $f["genere"] === $genere) {
        $visibili[$id] = $f;
    }
}

$titolo = "Catalogo";
require __DIR__ . "/parti/header.php";
?>
<h1>Catalogo film</h1>

<p>
    Genere:
    <a href="index.php">Tutti</a>
    <?php foreach ($generi as $g): ?>
        | <a href="index.php?genere=<?= urlencode($g) ?>"><?= $g ?></a>
    <?php endforeach; ?>
</p>

<?php if (count($visibili) === 0): ?>
    <p class="messaggio ko">Nessun film per il genere «<?= htmlspecialchars($genere) ?>».</p>
<?php else: ?>
    <table>
        <thead>
            <tr><th>Titolo</th><th>Regista</th><th>Anno</th><th>Genere</th></tr>
        </thead>
        <tbody>
            <?php $riga = 0; ?>
            <?php foreach ($visibili as $id => $f): ?>
                <tr<?= $riga % 2 === 1 ? ' class="alterna"' : '' ?>>
                    <td><a href="film.php?id=<?= $id ?>"><?= $f["titolo"] ?></a></td>
                    <td><?= $f["regista"] ?></td>
                    <td><?= $f["anno"] ?></td>
                    <td><?= $f["genere"] ?></td>
                </tr>
                <?php $riga++; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
    <p class="tenue"><?= count($visibili) ?> film mostrati.</p>
<?php endif; ?>
<?php require __DIR__ . "/parti/footer.php"; ?>
