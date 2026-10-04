<?php
$nome      = trim($_POST["nome"] ?? "");
$email     = trim($_POST["email"] ?? "");
$messaggio = trim($_POST["messaggio"] ?? "");

$errori = [];
if ($nome === "") {
    $errori[] = "Scrivi il tuo nome.";
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errori[] = "Email non valida.";
}
if (strlen($messaggio) < 5 || strlen($messaggio) > 500) {
    $errori[] = "Il messaggio deve avere da 5 a 500 caratteri.";
}

if (count($errori) === 0) {
    // Nel file ogni messaggio occupa una riga con i campi separati da ";":
    // a capo e punti e virgola scritti dall'utente vanno quindi sostituiti con uno spazio
    $pulisci = fn(string $testo): string => str_replace(["\r", "\n", ";"], " ", $testo);
    $riga = implode(";", [date("d/m/Y H:i"), $pulisci($nome), $pulisci($email), $pulisci($messaggio)]) . "\n";

    $cartella = __DIR__ . "/dati";
    if (!is_dir($cartella)) {
        mkdir($cartella, 0755, true);
    }
    // FILE_APPEND aggiunge in coda, LOCK_EX evita scritture contemporanee
    file_put_contents($cartella . "/messaggi.txt", $riga, FILE_APPEND | LOCK_EX);

    // Redirect: il browser passa a una nuova pagina con una richiesta GET.
    // Se l'utente ricarica la pagina, il messaggio NON viene inviato una seconda volta.
    header("Location: grazie.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Errore nell'invio</title>
    <link rel="stylesheet" href="../includes/stile.css">
</head>
<body>
<main>
    <h1>Messaggio non inviato</h1>
    <div class="messaggio ko">
        <ul>
            <?php foreach ($errori as $e): ?>
                <li><?= $e ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <p><a href="index.html">&larr; Torna al modulo</a></p>
</main>
</body>
</html>
