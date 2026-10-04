<?php
session_start();
require __DIR__ . "/prodotti.php";

// Il carrello è un array nella sessione: codice prodotto => quantità
if (!isset($_SESSION["carrello"])) {
    $_SESSION["carrello"] = [];
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $azione = $_POST["azione"] ?? "";
    $id = (int) ($_POST["id"] ?? 0);

    if ($azione === "aggiungi" && isset($prodotti[$id])) {
        $_SESSION["carrello"][$id] = ($_SESSION["carrello"][$id] ?? 0) + 1;
    } elseif ($azione === "diminuisci" && isset($_SESSION["carrello"][$id])) {
        $_SESSION["carrello"][$id]--;
        if ($_SESSION["carrello"][$id] <= 0) {
            unset($_SESSION["carrello"][$id]);
        }
    } elseif ($azione === "rimuovi") {
        unset($_SESSION["carrello"][$id]);
    } elseif ($azione === "svuota") {
        $_SESSION["carrello"] = [];
    }

    // POST-Redirect-GET: ricaricando la pagina non si ripete l'azione
    header("Location: carrello.php");
    exit;
}

$totale = 0;
foreach ($_SESSION["carrello"] as $id => $quantita) {
    $totale += $prodotti[$id]["prezzo"] * $quantita;
}
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Carrello</title>
    <link rel="stylesheet" href="../includes/stile.css">
</head>
<body>
<main>
    <h1>Il tuo carrello</h1>

    <?php if (count($_SESSION["carrello"]) === 0): ?>
        <p class="messaggio info">Il carrello è vuoto.</p>
    <?php else: ?>
        <table>
            <tr><th>Prodotto</th><th class="destra">Prezzo</th><th class="destra">Quantità</th><th class="destra">Subtotale</th><th></th></tr>
            <?php foreach ($_SESSION["carrello"] as $id => $quantita): ?>
                <tr>
                    <td><?= $prodotti[$id]["nome"] ?></td>
                    <td class="destra">€ <?= number_format($prodotti[$id]["prezzo"], 2, ",", ".") ?></td>
                    <td class="destra"><?= $quantita ?></td>
                    <td class="destra">€ <?= number_format($prodotti[$id]["prezzo"] * $quantita, 2, ",", ".") ?></td>
                    <td>
                        <form method="post" class="inline">
                            <input type="hidden" name="id" value="<?= $id ?>">
                            <button type="submit" name="azione" value="aggiungi">+</button>
                            <button type="submit" name="azione" value="diminuisci" class="secondario">−</button>
                            <button type="submit" name="azione" value="rimuovi" class="pericolo">Rimuovi</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
            <tr>
                <th colspan="3" class="destra">Totale</th>
                <th class="destra">€ <?= number_format($totale, 2, ",", ".") ?></th>
                <th></th>
            </tr>
        </table>
        <form method="post">
            <button type="submit" name="azione" value="svuota" class="secondario">Svuota il carrello</button>
        </form>
    <?php endif; ?>

    <p><a href="index.php">&larr; Continua gli acquisti</a></p>
</main>
</body>
</html>
