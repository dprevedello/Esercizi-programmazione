<?php
$n1 = $_POST["n1"] ?? "";
$n2 = $_POST["n2"] ?? "";
$operazione = $_POST["operazione"] ?? "+";
$risultato = null;
$errore = null;

// La pagina elabora i dati solo quando il modulo è stato inviato (richiesta POST)
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (!is_numeric($n1) || !is_numeric($n2)) {
        $errore = "Inserisci due numeri validi.";
    } else {
        $a = (float) $n1;
        $b = (float) $n2;
        if ($operazione === "/" && $b == 0) {
            $errore = "Non si può dividere per zero.";
        } else {
            $risultato = match ($operazione) {
                "+" => $a + $b,
                "-" => $a - $b,
                "*" => $a * $b,
                "/" => $a / $b,
                "^" => $a ** $b,
                default => null,
            };
            if ($risultato === null) {
                $errore = "Operazione non riconosciuta.";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Calcolatrice web</title>
    <link rel="stylesheet" href="../includes/stile.css">
</head>
<body>
<main>
    <h1>Calcolatrice</h1>

    <form method="post" action="index.php">
        <label for="n1">Primo numero</label>
        <input type="text" id="n1" name="n1" value="<?= htmlspecialchars($n1) ?>">

        <label for="operazione">Operazione</label>
        <select id="operazione" name="operazione">
            <?php foreach (["+" => "somma", "-" => "differenza", "*" => "prodotto", "/" => "divisione", "^" => "potenza"] as $simbolo => $nome): ?>
                <option value="<?= $simbolo ?>"<?= $operazione === $simbolo ? " selected" : "" ?>><?= $simbolo ?> (<?= $nome ?>)</option>
            <?php endforeach; ?>
        </select>

        <label for="n2">Secondo numero</label>
        <input type="text" id="n2" name="n2" value="<?= htmlspecialchars($n2) ?>">

        <button type="submit">Calcola</button>
    </form>

    <?php if ($errore !== null): ?>
        <p class="messaggio ko"><?= $errore ?></p>
    <?php elseif ($risultato !== null): ?>
        <p class="messaggio ok"><?= htmlspecialchars($n1) ?> <?= $operazione ?> <?= htmlspecialchars($n2) ?> = <strong><?= $risultato ?></strong></p>
    <?php endif; ?>
</main>
</body>
</html>
