<?php
session_start();
require __DIR__ . "/../includes/connessione.php";
require __DIR__ . "/../includes/flash.php";

$pdo = connetti("biblioteca");

// Gli autori servono per il menu a tendina e per controllare il valore ricevuto
$autori = $pdo->query("SELECT id, nome, cognome FROM autori ORDER BY cognome, nome")->fetchAll();
$idAutori = array_map("intval", array_column($autori, "id"));

function vecchio(string $campo): string
{
    return htmlspecialchars($_POST[$campo] ?? "");
}

$errori = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $titolo  = trim($_POST["titolo"] ?? "");
    $autore  = (int) ($_POST["id_autore"] ?? 0);
    $anno    = trim($_POST["anno"] ?? "");
    $isbn    = trim($_POST["isbn"] ?? "");
    $genere  = trim($_POST["genere"] ?? "");
    $copie   = trim($_POST["copie"] ?? "");

    if (strlen($titolo) < 2 || strlen($titolo) > 120) {
        $errori["titolo"] = "Il titolo deve avere da 2 a 120 caratteri.";
    }
    if (!in_array($autore, $idAutori, true)) {
        $errori["id_autore"] = "Scegli un autore.";
    }
    if (filter_var($anno, FILTER_VALIDATE_INT, ["options" => ["min_range" => 1000, "max_range" => 2100]]) === false) {
        $errori["anno"] = "Anno non valido.";
    }
    if (!preg_match('/^[0-9]{13}$/', $isbn)) {
        $errori["isbn"] = "L'ISBN è formato da 13 cifre.";
    } else {
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM libri WHERE isbn = :isbn");
        $stmt->execute(["isbn" => $isbn]);
        if ($stmt->fetchColumn() > 0) {
            $errori["isbn"] = "Esiste già un libro con questo ISBN.";
        }
    }
    if (strlen($genere) < 2 || strlen($genere) > 30) {
        $errori["genere"] = "Indica il genere (massimo 30 caratteri).";
    }
    if (filter_var($copie, FILTER_VALIDATE_INT, ["options" => ["min_range" => 1, "max_range" => 50]]) === false) {
        $errori["copie"] = "Da 1 a 50 copie.";
    }

    if (count($errori) === 0) {
        $stmt = $pdo->prepare(
            "INSERT INTO libri (titolo, id_autore, anno, isbn, genere, copie_totali, copie_disponibili)
             VALUES (:titolo, :id_autore, :anno, :isbn, :genere, :copie_totali, :copie_disponibili)"
        );
        $stmt->execute([
            "titolo"            => $titolo,
            "id_autore"         => $autore,
            "anno"              => (int) $anno,
            "isbn"              => $isbn,
            "genere"            => $genere,
            "copie_totali"      => (int) $copie,
            "copie_disponibili" => (int) $copie,
        ]);
        // lastInsertId() restituisce l'id AUTO_INCREMENT assegnato dal database alla nuova riga
        flash("ok", "Libro «" . $titolo . "» aggiunto con id " . $pdo->lastInsertId() . ".");
        header("Location: index.php");
        exit;
    }
}

$ultimi = $pdo->query("SELECT id, titolo, anno, genere, copie_totali FROM libri ORDER BY id DESC LIMIT 5")->fetchAll();
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nuovo libro</title>
    <link rel="stylesheet" href="../includes/stile.css">
</head>
<body>
<main>
    <h1>Aggiungi un libro</h1>
    <?php mostraFlash(); ?>

    <form method="post" action="index.php" novalidate>
        <label for="titolo">Titolo</label>
        <input type="text" id="titolo" name="titolo" value="<?= vecchio("titolo") ?>">
        <?php if (isset($errori["titolo"])): ?><p class="errore"><?= $errori["titolo"] ?></p><?php endif; ?>

        <label for="id_autore">Autore</label>
        <select id="id_autore" name="id_autore">
            <option value="">-- scegli --</option>
            <?php foreach ($autori as $a): ?>
                <option value="<?= $a["id"] ?>"<?= (int) ($_POST["id_autore"] ?? 0) === (int) $a["id"] ? " selected" : "" ?>><?= htmlspecialchars($a["cognome"] . " " . $a["nome"]) ?></option>
            <?php endforeach; ?>
        </select>
        <?php if (isset($errori["id_autore"])): ?><p class="errore"><?= $errori["id_autore"] ?></p><?php endif; ?>

        <label for="anno">Anno di pubblicazione</label>
        <input type="text" id="anno" name="anno" value="<?= vecchio("anno") ?>">
        <?php if (isset($errori["anno"])): ?><p class="errore"><?= $errori["anno"] ?></p><?php endif; ?>

        <label for="isbn">ISBN (13 cifre)</label>
        <input type="text" id="isbn" name="isbn" value="<?= vecchio("isbn") ?>">
        <?php if (isset($errori["isbn"])): ?><p class="errore"><?= $errori["isbn"] ?></p><?php endif; ?>

        <label for="genere">Genere</label>
        <input type="text" id="genere" name="genere" value="<?= vecchio("genere") ?>">
        <?php if (isset($errori["genere"])): ?><p class="errore"><?= $errori["genere"] ?></p><?php endif; ?>

        <label for="copie">Copie disponibili</label>
        <input type="text" id="copie" name="copie" value="<?= vecchio("copie") ?>">
        <?php if (isset($errori["copie"])): ?><p class="errore"><?= $errori["copie"] ?></p><?php endif; ?>

        <button type="submit">Aggiungi il libro</button>
    </form>

    <h2>Ultimi libri inseriti</h2>
    <table>
        <tr><th>#</th><th>Titolo</th><th>Anno</th><th>Genere</th><th class="destra">Copie</th></tr>
        <?php foreach ($ultimi as $l): ?>
            <tr>
                <td><?= $l["id"] ?></td>
                <td><?= htmlspecialchars($l["titolo"]) ?></td>
                <td><?= $l["anno"] ?></td>
                <td><?= htmlspecialchars($l["genere"]) ?></td>
                <td class="destra"><?= $l["copie_totali"] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</main>
</body>
</html>
