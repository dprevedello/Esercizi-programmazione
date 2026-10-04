<?php
require __DIR__ . "/dati.php";

$id = (int) ($_GET["id"] ?? 0);
if (!array_key_exists($id, $film)) {
    http_response_code(404);
    $titolo = "Film non trovato";
    require __DIR__ . "/parti/header.php";
    echo '<p class="messaggio ko">Film non trovato.</p>';
    echo '<p><a href="index.php">&larr; Torna al catalogo</a></p>';
    require __DIR__ . "/parti/footer.php";
    exit;
}

$f = $film[$id];
$titolo = $f["titolo"];
require __DIR__ . "/parti/header.php";
?>
<h1><?= $f["titolo"] ?> <span class="tenue">(<?= $f["anno"] ?>)</span></h1>
<div class="scheda">
    <p><?= $f["trama"] ?></p>
    <p>Regia di <strong><?= $f["regista"] ?></strong> – <?= $f["genere"] ?> – <?= intdiv($f["durata"], 60) ?> h <?= $f["durata"] % 60 ?> min</p>
</div>
<p><a href="index.php">&larr; Torna al catalogo</a></p>
<?php require __DIR__ . "/parti/footer.php"; ?>
