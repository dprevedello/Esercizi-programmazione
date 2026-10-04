<?php
session_start();
require __DIR__ . "/../includes/flash.php";

const CARTELLA = __DIR__ . "/uploads/";
const DIMENSIONE_MAX = 2 * 1024 * 1024;

// Tipi di immagine accettati: il tipo REALE del file decide l'estensione con cui lo si salva.
// L'estensione scritta dall'utente nel nome non conta nulla.
const TIPI = [
    "image/jpeg" => "jpg",
    "image/png"  => "png",
    "image/gif"  => "gif",
];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $f = $_FILES["immagine"] ?? null;

    if ($f === null || $f["error"] === UPLOAD_ERR_NO_FILE) {
        flash("ko", "Scegli un'immagine da caricare.");
    } elseif ($f["error"] !== UPLOAD_ERR_OK) {
        flash("ko", "Caricamento non riuscito (codice errore " . $f["error"] . ").");
    } elseif ($f["size"] > DIMENSIONE_MAX) {
        flash("ko", "L'immagine supera i 2 MB.");
    } else {
        // 1) si guarda il CONTENUTO del file, non il nome né il tipo dichiarato dal browser
        $finfo = new finfo(FILEINFO_MIME_TYPE);
        $tipo = $finfo->file($f["tmp_name"]);

        // 2) un file davvero immagine ha dimensioni leggibili
        $misure = @getimagesize($f["tmp_name"]);

        if (!isset(TIPI[$tipo]) || $misure === false) {
            flash("ko", "Il file non è un'immagine JPEG, PNG o GIF valida.");
        } else {
            // 3) il nome sul server lo sceglie il server: casuale, senza nulla di ciò che ha scritto l'utente
            $nomeFile = bin2hex(random_bytes(8)) . "." . TIPI[$tipo];

            if (move_uploaded_file($f["tmp_name"], CARTELLA . $nomeFile)) {
                flash("ok", "Immagine caricata (" . $misure[0] . " × " . $misure[1] . " pixel).");
            } else {
                flash("ko", "Impossibile salvare l'immagine.");
            }
        }
    }
    header("Location: index.php");
    exit;
}

$immagini = glob(CARTELLA . "*.{jpg,png,gif}", GLOB_BRACE);
$immagini = array_map("basename", $immagini);
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Galleria</title>
    <link rel="stylesheet" href="../includes/stile.css">
</head>
<body>
<main>
    <h1>Galleria di immagini</h1>
    <?php mostraFlash(); ?>

    <form method="post" action="index.php" enctype="multipart/form-data">
        <label for="immagine">Immagine (JPEG, PNG o GIF – massimo 2 MB)</label>
        <input type="file" id="immagine" name="immagine" accept="image/jpeg,image/png,image/gif">
        <button type="submit">Carica</button>
    </form>

    <h2>Immagini (<?= count($immagini) ?>)</h2>
    <div class="griglia">
        <?php foreach ($immagini as $nome): ?>
            <div class="scheda">
                <img src="uploads/<?= htmlspecialchars($nome) ?>" alt="" style="max-width:100%;height:auto">
                <p class="tenue"><?= htmlspecialchars($nome) ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</main>
</body>
</html>
