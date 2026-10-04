<?php
// Va chiamata prima di qualsiasi output: avvia (o riprende) la sessione dell'utente
session_start();

// Azzeramento: si svuota la sessione e si distrugge
if ($_SERVER["REQUEST_METHOD"] === "POST" && ($_POST["azione"] ?? "") === "azzera") {
    $_SESSION = [];
    session_destroy();
    header("Location: index.php");
    exit;
}

// Ogni richiesta incrementa il contatore memorizzato nella sessione
$_SESSION["visite"] = ($_SESSION["visite"] ?? 0) + 1;
// ??= assegna solo se la chiave non esiste ancora
$_SESSION["prima_visita"] ??= date("d/m/Y H:i:s");
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contatore di visite</title>
    <link rel="stylesheet" href="../includes/stile.css">
</head>
<body>
<main>
    <h1>Contatore di visite</h1>

    <div class="scheda">
        <p>Questa è la tua visita numero <strong><?= $_SESSION["visite"] ?></strong>.</p>
        <p>Prima visita: <?= $_SESSION["prima_visita"] ?></p>
        <p class="tenue">Identificativo di sessione: <code><?= substr(session_id(), 0, 8) ?>…</code></p>
    </div>

    <p>Ricarica la pagina (F5) per aumentare il contatore. Aprendo la pagina in un'altra finestra in
       modalità anonima il contatore riparte da 1: la sessione appartiene al singolo browser.</p>

    <form method="post">
        <input type="hidden" name="azione" value="azzera">
        <button type="submit" class="secondario">Azzera la sessione</button>
    </form>
</main>
</body>
</html>
