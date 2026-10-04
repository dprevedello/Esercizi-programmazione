<?php
session_start();
require __DIR__ . "/../includes/connessione.php";
require __DIR__ . "/../includes/flash.php";

$pdo = connetti("biblioteca");

$id = (int) ($_GET["id"] ?? 0);

$stmt = $pdo->prepare("SELECT id, titolo, anno, genere FROM libri WHERE id = :id");
$stmt->execute(["id" => $id]);
$libro = $stmt->fetch();

if ($libro === false) {
    http_response_code(404);
    echo "<!DOCTYPE html><html lang=\"it\"><head><meta charset=\"UTF-8\"><title>Non trovato</title>";
    echo "<link rel=\"stylesheet\" href=\"../includes/stile.css\"></head><body><main>";
    echo "<p class=\"messaggio ko\">Libro non trovato.</p><p><a href=\"index.php\">&larr; Catalogo</a></p></main></body></html>";
    exit;
}

$errori = [];
// Alla prima visita il modulo mostra i valori letti dal database;
// dopo un invio sbagliato mostra quelli appena scritti dall'utente.
$valori = $libro;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $valori["titolo"] = trim($_POST["titolo"] ?? "");
    $valori["anno"]   = trim($_POST["anno"] ?? "");
    $valori["genere"] = trim($_POST["genere"] ?? "");

    if (strlen($valori["titolo"]) < 2 || strlen($valori["titolo"]) > 120) {
        $errori["titolo"] = "Il titolo deve avere da 2 a 120 caratteri.";
    }
    if (filter_var($valori["anno"], FILTER_VALIDATE_INT, ["options" => ["min_range" => 1000, "max_range" => 2100]]) === false) {
        $errori["anno"] = "Anno non valido.";
    }
    if (strlen($valori["genere"]) < 2 || strlen($valori["genere"]) > 30) {
        $errori["genere"] = "Indica il genere (massimo 30 caratteri).";
    }

    if (count($errori) === 0) {
        $stmt = $pdo->prepare("UPDATE libri SET titolo = :titolo, anno = :anno, genere = :genere WHERE id = :id");
        $stmt->execute([
            "titolo" => $valori["titolo"],
            "anno"   => (int) $valori["anno"],
            "genere" => $valori["genere"],
            "id"     => $id,
        ]);

        // rowCount() = numero di righe realmente modificate (0 se i valori erano già quelli)
        if ($stmt->rowCount() > 0) {
            flash("ok", "Libro «" . $valori["titolo"] . "» aggiornato.");
        } else {
            flash("info", "Nessuna modifica: i dati erano già quelli.");
        }
        header("Location: index.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modifica libro</title>
    <link rel="stylesheet" href="../includes/stile.css">
</head>
<body>
<main>
    <h1>Modifica il libro n. <?= $id ?></h1>

    <form method="post" action="modifica.php?id=<?= $id ?>" novalidate>
        <label for="titolo">Titolo</label>
        <input type="text" id="titolo" name="titolo" value="<?= htmlspecialchars($valori["titolo"]) ?>">
        <?php if (isset($errori["titolo"])): ?><p class="errore"><?= $errori["titolo"] ?></p><?php endif; ?>

        <label for="anno">Anno</label>
        <input type="text" id="anno" name="anno" value="<?= htmlspecialchars((string) $valori["anno"]) ?>">
        <?php if (isset($errori["anno"])): ?><p class="errore"><?= $errori["anno"] ?></p><?php endif; ?>

        <label for="genere">Genere</label>
        <input type="text" id="genere" name="genere" value="<?= htmlspecialchars($valori["genere"]) ?>">
        <?php if (isset($errori["genere"])): ?><p class="errore"><?= $errori["genere"] ?></p><?php endif; ?>

        <button type="submit">Salva le modifiche</button>
        <a href="index.php">Annulla</a>
    </form>
</main>
</body>
</html>
