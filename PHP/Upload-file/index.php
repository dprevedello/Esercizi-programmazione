<?php
const CARTELLA = __DIR__ . "/uploads/";
const DIMENSIONE_MAX = 2 * 1024 * 1024;   // 2 MB
const ESTENSIONI = ["pdf", "txt", "png", "jpg", "jpeg"];

// Messaggi per i codici di errore di PHP ($_FILES["campo"]["error"])
$erroriUpload = [
    UPLOAD_ERR_INI_SIZE   => "Il file supera il limite upload_max_filesize di php.ini.",
    UPLOAD_ERR_FORM_SIZE  => "Il file supera il limite indicato nel modulo.",
    UPLOAD_ERR_PARTIAL    => "Il file è stato caricato solo in parte.",
    UPLOAD_ERR_NO_FILE    => "Non hai scelto nessun file.",
    UPLOAD_ERR_NO_TMP_DIR => "Manca la cartella temporanea sul server.",
    UPLOAD_ERR_CANT_WRITE => "Impossibile scrivere il file su disco.",
    UPLOAD_ERR_EXTENSION  => "Un'estensione di PHP ha bloccato il caricamento.",
];

$esito = null;      // ["ok" => bool, "testo" => string]
$infoFile = null;   // contenuto di $_FILES, mostrato a scopo didattico

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $infoFile = $_FILES["documento"] ?? null;

    if ($infoFile === null) {
        // Succede quando il file supera post_max_size: PHP scarta l'intera richiesta
        $esito = ["ok" => false, "testo" => "Nessun dato ricevuto: il file è troppo grande."];
    } elseif ($infoFile["error"] !== UPLOAD_ERR_OK) {
        $esito = ["ok" => false, "testo" => $erroriUpload[$infoFile["error"]] ?? "Errore sconosciuto nel caricamento."];
    } elseif ($infoFile["size"] > DIMENSIONE_MAX) {
        $esito = ["ok" => false, "testo" => "Il file supera i 2 MB."];
    } else {
        // Il nome arriva dal browser dell'utente: non ci si può fidare.
        // basename() elimina eventuali percorsi (../../), poi si tengono solo caratteri sicuri.
        $nome = basename($infoFile["name"]);
        $nome = preg_replace('/[^A-Za-z0-9._-]/', "_", $nome);
        $estensione = strtolower(pathinfo($nome, PATHINFO_EXTENSION));

        if (!in_array($estensione, ESTENSIONI, true)) {
            $esito = ["ok" => false, "testo" => "Estensione non ammessa. Sono accettati: " . implode(", ", ESTENSIONI) . "."];
        } elseif (file_exists(CARTELLA . $nome)) {
            $esito = ["ok" => false, "testo" => "Esiste già un file chiamato «" . $nome . "»."];
        } elseif (move_uploaded_file($infoFile["tmp_name"], CARTELLA . $nome)) {
            $esito = ["ok" => true, "testo" => "File «" . $nome . "» caricato."];
        } else {
            $esito = ["ok" => false, "testo" => "Impossibile salvare il file."];
        }
    }
}

// Elenco dei file già presenti (senza il segnaposto .gitkeep)
$file = [];
foreach (scandir(CARTELLA) as $nome) {
    if ($nome[0] !== "." && is_file(CARTELLA . $nome)) {
        $file[] = ["nome" => $nome, "dimensione" => filesize(CARTELLA . $nome)];
    }
}
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Carica un documento</title>
    <link rel="stylesheet" href="../includes/stile.css">
</head>
<body>
<main>
    <h1>Carica un documento</h1>

    <?php if ($esito !== null): ?>
        <p class="messaggio <?= $esito["ok"] ? "ok" : "ko" ?>"><?= htmlspecialchars($esito["testo"]) ?></p>
    <?php endif; ?>

    <!-- enctype="multipart/form-data" è obbligatorio per inviare file -->
    <form method="post" action="index.php" enctype="multipart/form-data">
        <label for="documento">File (PDF, TXT, PNG, JPG – massimo 2 MB)</label>
        <input type="file" id="documento" name="documento">
        <button type="submit">Carica</button>
    </form>

    <?php if ($infoFile !== null): ?>
        <h2>Che cosa è arrivato in <code>$_FILES</code></h2>
        <pre class="scheda"><?= htmlspecialchars(print_r($infoFile, true)) ?></pre>
    <?php endif; ?>

    <h2>File caricati (<?= count($file) ?>)</h2>
    <?php if (count($file) === 0): ?>
        <p class="tenue">Nessun file caricato.</p>
    <?php else: ?>
        <ul>
            <?php foreach ($file as $f): ?>
                <li><a href="uploads/<?= rawurlencode($f["nome"]) ?>"><?= htmlspecialchars($f["nome"]) ?></a>
                    <span class="tenue">(<?= number_format($f["dimensione"] / 1024, 1, ",", ".") ?> KB)</span></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</main>
</body>
</html>
