<?php
// VERSIONE VULNERABILE (fornita dall'esercizio, non modificarla):
// stampa ciò che arriva dal modulo senza alcun controllo.
$autore   = $_POST["autore"] ?? "";
$commento = $_POST["commento"] ?? "";
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Versione vulnerabile</title>
    <link rel="stylesheet" href="../includes/stile.css">
</head>
<body>
<main>
    <h1>Commento ricevuto (versione vulnerabile)</h1>
    <div class="scheda">
        <p><strong><?= $autore ?></strong> ha scritto:</p>
        <div><?= $commento ?></div>
    </div>
    <p><a href="index.html">&larr; Indietro</a></p>
</main>
</body>
</html>
