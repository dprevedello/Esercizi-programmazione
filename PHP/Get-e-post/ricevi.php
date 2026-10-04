<?php
$metodo = $_SERVER["REQUEST_METHOD"];
$indirizzo = $_SERVER["REQUEST_URI"];

// Stampa una tabella con tutte le coppie nome => valore di un array
function tabella(array $dati): void
{
    if (count($dati) === 0) {
        echo '<p class="tenue">(array vuoto)</p>';
        return;
    }
    echo "<table><tr><th>Campo</th><th>Valore</th></tr>";
    foreach ($dati as $campo => $valore) {
        echo "<tr><td>" . htmlspecialchars($campo) . "</td><td>" . htmlspecialchars($valore) . "</td></tr>";
    }
    echo "</table>";
}
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dati ricevuti</title>
    <link rel="stylesheet" href="../includes/stile.css">
</head>
<body>
<main>
    <h1>Dati ricevuti</h1>

    <div class="scheda">
        <p>Metodo della richiesta: <strong><?= $metodo ?></strong></p>
        <p>Indirizzo richiesto: <code><?= htmlspecialchars($indirizzo) ?></code></p>
    </div>

    <h2>Contenuto di <code>$_GET</code></h2>
    <?php tabella($_GET); ?>

    <h2>Contenuto di <code>$_POST</code></h2>
    <?php tabella($_POST); ?>

    <p><a href="index.html">&larr; Torna ai moduli</a></p>
</main>
</body>
</html>
