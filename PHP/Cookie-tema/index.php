<?php
$temiAmmessi = ["chiaro", "scuro"];

// Le azioni arrivano da moduli POST. I cookie si impostano PRIMA di stampare qualsiasi HTML.
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $azione = $_POST["azione"] ?? "";
    $scadenza = time() + 30 * 24 * 60 * 60;   // tra 30 giorni

    if ($azione === "tema" && in_array($_POST["tema"] ?? "", $temiAmmessi, true)) {
        setcookie("tema", $_POST["tema"], $scadenza);
    } elseif ($azione === "nome") {
        $nome = trim($_POST["nome"] ?? "");
        if ($nome !== "" && strlen($nome) <= 30) {
            setcookie("nome", $nome, $scadenza);
        }
    } elseif ($azione === "dimentica") {
        // Per cancellare un cookie lo si reimposta con una scadenza già passata
        setcookie("tema", "", time() - 3600);
        setcookie("nome", "", time() - 3600);
    }

    // Il cookie appena impostato arriva in $_COOKIE solo alla richiesta successiva:
    // il redirect fa fare subito quella richiesta.
    header("Location: index.php");
    exit;
}

$tema = $_COOKIE["tema"] ?? "chiaro";
if (!in_array($tema, $temiAmmessi, true)) {
    $tema = "chiaro";
}
$nome = $_COOKIE["nome"] ?? "";
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Preferenze con i cookie</title>
    <link rel="stylesheet" href="../includes/stile.css">
</head>
<body<?= $tema === "scuro" ? ' class="scuro"' : '' ?>>
<main>
    <h1>
        <?php if ($nome !== ""): ?>
            Ciao, <?= htmlspecialchars($nome) ?>!
        <?php else: ?>
            Ciao, sconosciuto!
        <?php endif; ?>
    </h1>

    <div class="scheda">
        <h2>Tema</h2>
        <p>Tema attuale: <strong><?= $tema ?></strong></p>
        <form method="post" class="inline">
            <input type="hidden" name="azione" value="tema">
            <button type="submit" name="tema" value="chiaro">Chiaro</button>
            <button type="submit" name="tema" value="scuro">Scuro</button>
        </form>
    </div>

    <div class="scheda">
        <h2>Come ti chiami?</h2>
        <form method="post">
            <input type="hidden" name="azione" value="nome">
            <input type="text" name="nome" value="<?= htmlspecialchars($nome) ?>" maxlength="30">
            <button type="submit">Ricordami</button>
        </form>
    </div>

    <div class="scheda">
        <h2>Cookie ricevuti dal browser</h2>
        <?php if (count($_COOKIE) === 0): ?>
            <p class="tenue">Nessun cookie.</p>
        <?php else: ?>
            <ul>
                <?php foreach ($_COOKIE as $chiave => $valore): ?>
                    <li><code><?= htmlspecialchars($chiave) ?></code> = <?= htmlspecialchars($valore) ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
        <form method="post">
            <input type="hidden" name="azione" value="dimentica">
            <button type="submit" class="secondario">Dimentica le mie preferenze</button>
        </form>
    </div>
</main>
</body>
</html>
