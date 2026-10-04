<?php
$autore   = trim($_POST["autore"] ?? "");
$commento = trim($_POST["commento"] ?? "");

// Funzione di comodo: converte i caratteri speciali dell'HTML (< > & " ')
// in entità, così il browser li mostra come testo invece di eseguirli
function e(string $testo): string
{
    return htmlspecialchars($testo, ENT_QUOTES, "UTF-8");
}
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Versione sicura</title>
    <link rel="stylesheet" href="../includes/stile.css">
</head>
<body>
<main>
    <h1>Commento ricevuto (versione sicura)</h1>
    <div class="scheda">
        <p><strong><?= e($autore) ?></strong> ha scritto:</p>
        <div><?= nl2br(e($commento)) ?></div>
    </div>
    <p><a href="index.html">&larr; Indietro</a></p>
</main>
</body>
</html>
