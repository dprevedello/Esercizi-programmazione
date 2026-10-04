<?php
date_default_timezone_set("Europe/Rome");

// Restituisce il valore inviato per un campo, pronto da stampare dentro un attributo HTML
function vecchio(string $campo): string
{
    return htmlspecialchars($_POST[$campo] ?? "");
}

$errori = [];
$prenotato = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome     = trim($_POST["nome"] ?? "");
    $telefono = trim($_POST["telefono"] ?? "");
    $persone  = trim($_POST["persone"] ?? "");
    $data     = $_POST["data"] ?? "";
    $orario   = $_POST["orario"] ?? "";
    $note     = trim($_POST["note"] ?? "");

    if (strlen($nome) < 2) {
        $errori["nome"] = "Scrivi il tuo nome.";
    }
    if (!preg_match('/^[0-9 +]{8,15}$/', $telefono)) {
        $errori["telefono"] = "Numero non valido (da 8 a 15 cifre).";
    }
    if (filter_var($persone, FILTER_VALIDATE_INT, ["options" => ["min_range" => 1, "max_range" => 10]]) === false) {
        $errori["persone"] = "Da 1 a 10 persone.";
    }
    $timestamp = strtotime($data);
    if ($timestamp === false || $timestamp < strtotime("today")) {
        $errori["data"] = "Scegli una data da oggi in avanti.";
    }
    if (!in_array($orario, ["19:30", "21:00"], true)) {
        $errori["orario"] = "Scegli un orario.";
    }
    if (strlen($note) > 200) {
        $errori["note"] = "Massimo 200 caratteri.";
    }

    $prenotato = count($errori) === 0;
}
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Prenota un tavolo</title>
    <link rel="stylesheet" href="../includes/stile.css">
</head>
<body>
<main>
    <h1>Prenota un tavolo</h1>

    <?php if ($prenotato): ?>
        <p class="messaggio ok">
            Grazie <?= htmlspecialchars($nome) ?>! Tavolo per <?= (int) $persone ?> persone prenotato per il
            <?= date("d/m/Y", $timestamp) ?> alle <?= $orario ?>.
        </p>
        <p><a href="index.php">Nuova prenotazione</a></p>
    <?php else: ?>
        <?php if (count($errori) > 0): ?>
            <p class="messaggio ko">Controlla i campi evidenziati.</p>
        <?php endif; ?>

        <form method="post" action="index.php" novalidate>
            <label for="nome">Nome</label>
            <input type="text" id="nome" name="nome" value="<?= vecchio("nome") ?>">
            <?php if (isset($errori["nome"])): ?><p class="errore"><?= $errori["nome"] ?></p><?php endif; ?>

            <label for="telefono">Telefono</label>
            <input type="text" id="telefono" name="telefono" value="<?= vecchio("telefono") ?>">
            <?php if (isset($errori["telefono"])): ?><p class="errore"><?= $errori["telefono"] ?></p><?php endif; ?>

            <label for="persone">Numero di persone</label>
            <input type="number" id="persone" name="persone" value="<?= vecchio("persone") ?>">
            <?php if (isset($errori["persone"])): ?><p class="errore"><?= $errori["persone"] ?></p><?php endif; ?>

            <label for="data">Data</label>
            <input type="date" id="data" name="data" value="<?= vecchio("data") ?>">
            <?php if (isset($errori["data"])): ?><p class="errore"><?= $errori["data"] ?></p><?php endif; ?>

            <label>Orario</label>
            <?php foreach (["19:30", "21:00"] as $o): ?>
                <div class="riga">
                    <input type="radio" id="o<?= $o ?>" name="orario" value="<?= $o ?>"<?= ($_POST["orario"] ?? "") === $o ? " checked" : "" ?>>
                    <label for="o<?= $o ?>"><?= $o ?></label>
                </div>
            <?php endforeach; ?>
            <?php if (isset($errori["orario"])): ?><p class="errore"><?= $errori["orario"] ?></p><?php endif; ?>

            <label for="note">Note (facoltative)</label>
            <textarea id="note" name="note" rows="3"><?= vecchio("note") ?></textarea>
            <?php if (isset($errori["note"])): ?><p class="errore"><?= $errori["note"] ?></p><?php endif; ?>

            <button type="submit">Prenota</button>
        </form>
    <?php endif; ?>
</main>
</body>
</html>
